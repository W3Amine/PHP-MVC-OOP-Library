<?php
namespace App\Controllers;

use App\Models\User;
use src\Http\Request;
use src\Support\Session;

class EditAccount
{
    public function edit()
    {
        $request = new Request;
        $errors = [];
        $RequestData = $request->all();
        $session = new Session();
        // START filtring and validation
        foreach ($RequestData as $key => $value) {
            if (empty($value)) {
                array_push($errors, ' please fill the ' . $key . '  required ');
            }
        }
        if (filter_var($RequestData['Email'], FILTER_VALIDATE_EMAIL) === false) {
            array_push($errors, 'email is not a valid email address');
        } else {
            // check if the email exist already in db
            $checkemail = User::select(["Email"])->where("Email", $RequestData['Email'])->get();
            if (count($checkemail) != 0) {
                if (getUser('Email') != $RequestData['Email']) {
                    array_push($errors, 'this email is used already');
                }
            }
            // check if the Nickname exist already in db
            $checkNickname = User::select(["Nickname"])->where("Nickname", $RequestData['Nickname'])->get();
            if (count($checkNickname) != 0) {
                if (getUser('Nickname') != $RequestData['Nickname']) {
                    array_push($errors, 'this Nickname is used already');
                }
            }
        }
        if ($RequestData['Password'] !== $RequestData['ConfirmPassword']) {
            array_push($errors, 'the passwords are not equal');
        }
        $RequestData['Nickname'] = filter_var($RequestData['Nickname'], FILTER_SANITIZE_STRING);
        $RequestData['Full_Name'] = filter_var($RequestData['Full_Name'], FILTER_SANITIZE_STRING);
        $RequestData['Address'] = filter_var($RequestData['Address'], FILTER_SANITIZE_STRING);
        $RequestData['Occupation'] = filter_var($RequestData['Occupation'], FILTER_SANITIZE_STRING);
        // END filtring and validation
        if (count($errors) == 0) {
            // insert data into db and redirect and start user session
            User::update([
                "Nickname" => $RequestData['Nickname'],
                "Full_Name" => $RequestData['Full_Name'],
                "Email" => $RequestData['Email'],
                "Password" => password_hash($RequestData['Password'], PASSWORD_DEFAULT),
                "Address" => $RequestData['Address'],
                "Phone" => $RequestData['Phone'],
                "CIN" => $RequestData['CIN'],
                "Birth_Date" => $RequestData['Birth_Date'],
                "Occupation" => $RequestData['Occupation'],
            ])->where('Nickname', getUser('Nickname'))->run();
            $session = new Session();
            if (getUser('Admin') === true) {
                $session->set('UserData', [
                    "Nickname" => $RequestData['Nickname'],
                    "Full_Name" => $RequestData['Full_Name'],
                    "Email" => $RequestData['Email'],
                    "Address" => $RequestData['Address'],
                    "Phone" => $RequestData['Phone'],
                    "CIN" => $RequestData['CIN'],
                    "Birth_Date" => $RequestData['Birth_Date'],
                    "Occupation" => $RequestData['Occupation'],
                    "Admin" => true,
                ]);
            } else {
                $session->set('UserData', [
                    "Nickname" => $RequestData['Nickname'],
                    "Full_Name" => $RequestData['Full_Name'],
                    "Email" => $RequestData['Email'],
                    "Address" => $RequestData['Address'],
                    "Phone" => $RequestData['Phone'],
                    "CIN" => $RequestData['CIN'],
                    "Birth_Date" => $RequestData['Birth_Date'],
                    "Occupation" => $RequestData['Occupation'],
                    "Admin" => false,
                ]);
            }
            // REDIRECT
            header("Location: /items");
        } else {
            // return to the page with $errors and session Flash 
            $session = new Session();
            $session->setFlash('errors', $errors);
            // REDIRECT
            header("Location: /profile/edit");
        }
    }
}