<?php
namespace App\Controllers;

use App\Models\User;
use src\Http\Request;
use src\Support\Session;

class LoginAndLogout
{
    public function login()
    {
        $request = new Request;
        $errors = [];
        $RequestData = $request->all();
        // START filtring and validation
        foreach ($RequestData as $key => $value) {
            if (empty($value)) {
                array_push($errors, ' please fill the ' . $key . '  required ');
            }
        }
        // check if the Nickname exist already in db
        $userData = User::select()->where("Nickname", $RequestData['Nickname'])->get();
        if (count($userData) == 0) {
            array_push($errors, 'this Nickname is not registred yet');
        } else {
            if (!password_verify($RequestData['Password'], $userData['Password'])) {
                array_push($errors, 'the Password is incorrect');
            }else {
            if ($userData['Penalty_Count'] == 3) {
                array_push($errors, 'your account is banned because you stole items ');
            }
        }
        }
        // END filtring and validation
        if (count($errors) == 0) {
            // insert data into db and redirect and start user session depending on the user role
            $session = new Session();
            if ($userData['Admin'] === 1) {
                $session->set('UserData', [
                    "Nickname" => $userData['Nickname'],
                    "Full_Name" => $userData['Full_Name'],
                    "Email" => $userData['Email'],
                    "Address" => $userData['Address'],
                    "Phone" => $userData['Phone'],
                    "CIN" => $userData['CIN'],
                    "Birth_Date" => $userData['Birth_Date'],
                    "Occupation" => $userData['Occupation'],
                    "Penalty_Count" => $userData['Penalty_Count'],
                    
                    "Admin" => true,
                ]);
            } else {
                $session->set('UserData', [
                    "Nickname" => $userData['Nickname'],
                    "Full_Name" => $userData['Full_Name'],
                    "Email" => $userData['Email'],
                    "Address" => $userData['Address'],
                    "Phone" => $userData['Phone'],
                    "CIN" => $userData['CIN'],
                    "Birth_Date" => $userData['Birth_Date'],
                    "Occupation" => $userData['Occupation'],
                    "Penalty_Count" => $userData['Penalty_Count'],
                    "Admin" => false,
                ]);
            }
            // REDIRECT
            header("Location: /items");
        } else {
            // return to the page with $errors and session Flash 
            $session = new Session();
            $session->setFlash('errors', $errors);
            $session->setFlash('old', [
                "Nickname" => $RequestData['Nickname'],
            ]);
            // REDIRECT
            header("Location: /login");
        }
    }
    public function logout()
    {
        $session = new Session();
        $session->remove('UserData');
        header("Location: /");
        exit();
    }
}