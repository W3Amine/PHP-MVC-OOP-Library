<?php
namespace App\Controllers;

use App\Models\User;
use src\Http\Request;
use src\Support\Session;

class RegisterController
{
    public function register()
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
        if (filter_var($request->Email, FILTER_VALIDATE_EMAIL) === false) {
            array_push($errors, 'email is not a valid email address');
        } else {
            // check if the email exist already in db
            $checkemail = User::select(["email"])->where("email", $request->Email)->get();
            if (count($checkemail) != 0) {
                array_push($errors, 'this email is used already');
            }
            // check if the Nickname exist already in db
            $checkNickname = User::select(["Nickname"])->where("Nickname", $request->Nickname)->get();
            if (count($checkNickname) != 0) {
                array_push($errors, 'this Nickname is used already');
            }
        }
        if ($request->Password !== $request->ConfirmPassword) {
            array_push($errors, 'the passwords are not equal');
        }
        $RequestData['Nickname'] = filter_var($request->Nickname, FILTER_SANITIZE_STRING);
        $RequestData['Full_Name'] = filter_var($request->Full_Name, FILTER_SANITIZE_STRING);
        $RequestData['Address'] = filter_var($request->Address, FILTER_SANITIZE_STRING);
        $RequestData['Occupation'] = filter_var($request->Occupation, FILTER_SANITIZE_STRING);
        // END filtring and validation
        if (count($errors) == 0) {
            // insert data into db and redirect and start user session
            User::insert([
                "Nickname" => $RequestData['Nickname'],
                "Full_Name" => $RequestData['Full_Name'],
                "Email" => $RequestData['Email'],
                "Password" => password_hash($RequestData['Password'], PASSWORD_DEFAULT),
                "Address" => $RequestData['Address'],
                "Phone" => $RequestData['Phone'],
                "CIN" => $RequestData['CIN'],
                "Birth_Date" => $RequestData['Birth_Date'],
                "Occupation" => $RequestData['Occupation'],
                "Penalty_Count" => 0,
                "Creation_Date" => date("Y-m-d"),
            ])->run();
            $session = new Session();
            $session->set('UserData', [
                "Nickname" => $RequestData['Nickname'],
                "Full_Name" => $RequestData['Full_Name'],
                "Email" => $RequestData['Email'],
                "Address" => $RequestData['Address'],
                "Phone" => $RequestData['Phone'],
                "CIN" => $RequestData['CIN'],
                "Birth_Date" => $RequestData['Birth_Date'],
                "Occupation" => $RequestData['Occupation'],
                "Penalty_Count" => 0,
                "Admin" => false,
            ]);
            // REDIRECT
            header("Location: /items");
        } else {
            // return to the page with $errors and session Flash 
            $session = new Session();
            $session->setFlash('errors', $errors);
            $session->setFlash('old', [
                "Nickname" => $RequestData['Nickname'],
                "Full_Name" => $RequestData['Full_Name'],
                "Email" => $RequestData['Email'],
                "Address" => $RequestData['Address'],
                "Phone" => $RequestData['Phone'],
                "CIN" => $RequestData['CIN'],
                "Birth_Date" => $RequestData['Birth_Date'],
                "Occupation" => $RequestData['Occupation'],
            ]);
            // REDIRECT
            header("Location: /register");
        }
    }
}