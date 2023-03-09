<?php
namespace App\Models;

use src\DataBase\Model;
use src\Support\Session;

class User extends Model
{
    // very important put the name of the table here $ModelName
    public static $ModelName = 'members';
// public static $ModelName  = 'anything';



public function banned($AuthUser){
    //this method will check if the user is banned if true session unset and redired
$Penalty_Count = self::select(['Penalty_Count'])->where('Nickname',$AuthUser)->get();

if($Penalty_Count['Penalty_Count'] === 3){
    //banned user unset user And redirect
    $session = new Session();
    $errors = [];
    array_push($errors, 'your account has been banned');
    $session->setFlash('errors', $errors);


        $session->remove('UserData');
        header("Location: /login");
        exit();
} else {
    return false ;
}

}




}