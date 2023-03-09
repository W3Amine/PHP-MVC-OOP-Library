<?php
namespace App\Controllers;

use PDO;
use App\Models\item;
use App\Models\User;
use src\DataBase\DB;
use src\Http\Request;
use src\Support\Session;
use App\Models\Borrowings;
use App\Models\Reservation;

class schedulers
{
  public function run()
  {
    ///////////START 
    /// first task is for reservations to change the schedule status and the item status to Available only for expired resirvations that dont have a 
    // reservations than are no convert to borrwing and are expired 
    $query = 'SELECT reservation.Reservation_Code , reservation.Item_Code  FROM `reservation` LEFT JOIN borrowings ON reservation.Reservation_Code = borrowings.Reservation_Code 
WHERE `Reservation_Expiration_Date` < CURRENT_TIMESTAMP AND borrowings.Borrowing_Code IS NULL
AND reservation.Scheduled is NULL OR reservation.Scheduled = 0';
    $stm = DB::$conn->prepare($query);
    $stm->execute();
    $ReservationsData = $stm->fetchAll(PDO::FETCH_ASSOC);
    // dump($ReservationsData);
    $success = [];
    foreach ($ReservationsData as $key => $value) {
      //update Scheduled column to 1 then in the next check it will be skiped 
      // like this we will prevent the running of the script on  reservations again  every time we run the script

      $updateReservation = Reservation::update(['Scheduled' => 1])->where('Reservation_Code', $value['Reservation_Code'])->run();
      array_push($success, $updateReservation);
      // then update the item status from Reserved To Available
      $updateItem = item::update(['Status' => 'Available'])->where('Item_Code', $value['Item_Code'])->run();
      array_push($success, $updateItem);
    }
    // END 
    // START OF BORROWING SCHEDULERS
    $Borrowingquery = "SELECT `Borrowing_Code` , `Nickname` FROM `borrowings` WHERE TIMESTAMPDIFF(DAY, `Borrowing_Date`, `Borrowing_Return_Date`) > 15 AND Scheduled is NULL OR Scheduled = 0";
    // THIS QUERY WILL RUN ONLY ON THE BOOKS THAT RETURNED ALREADY AND HAVING A Borrowing_Return_Date
    $stm = DB::$conn->prepare($Borrowingquery);
    $stm->execute();
    $BorrowingData = $stm->fetchAll(PDO::FETCH_ASSOC);
    // dump($BorrowingData);
    foreach ($BorrowingData as $key => $value) {
      //update the borrowing Scheduled column to 1 to be skiped in later checks

      $updateBorrowingSchedule = Borrowings::update(['Scheduled' => 1])->where('Borrowing_Code', $value['Borrowing_Code'])->run();
      array_push($success, $updateBorrowingSchedule);
      // add penalty to the user who return his book but but he exceed the max 15 days
      $q = " UPDATE `members` SET Penalty_Count = Penalty_Count + 1 WHERE Nickname = '" . $value['Nickname'] . "' ";
      $updateUserPenalty = DB::$conn->prepare($q)->execute();
      array_push($success, $updateUserPenalty);
      // I WON'T change the borrowed item to Available because is not restored yet
    }
    // BORROWING CODE FOR borrowowings with Borrowing_Return_Date = NULL / MEANS THAT THE USER DIDN't return the item
    $Borrowingquery = "SELECT `Borrowing_Code` , `Nickname` FROM `borrowings` WHERE Borrowing_Return_Date IS NULL AND TIMESTAMPDIFF(DAY, `Borrowing_Date`, CURRENT_TIMESTAMP ) > 15 AND Scheduled is NULL OR Scheduled = 0";
    $stm = DB::$conn->prepare($Borrowingquery);
    $stm->execute();
    $BorrowingDataNullDate = $stm->fetchAll(PDO::FETCH_ASSOC);
    // dump($BorrowingDataNullDate);
    foreach ($BorrowingDataNullDate as $key => $value) {
      //update the borrowing Scheduled column to 1 to be skiped in later checks
      $updateBorrowingSchedule = Borrowings::update(['Scheduled' => 1])->where('Borrowing_Code', $value['Borrowing_Code'])->run();
      array_push($success, $updateBorrowingSchedule);
      // add penalty to the user who didn't return the item
      $q = " UPDATE `members` SET Penalty_Count = Penalty_Count + 1 WHERE Nickname = '" . $value['Nickname'] . "' ";
      $updateUserPenalty = DB::$conn->prepare($q)->execute();
      array_push($success, $updateUserPenalty);
      // I WON'T change the borrowed item to Available because is not restored yet
    }
    // START OF DEALING WITH BORROWINGS AN PENALTIES GIVING PENALTIES TO PEOPLES WITH MORE THAN 15 DAYS
    // dump($success);
    if (in_array(false, $success)) {
      echo " someThing Went Wrong / you will be redirected to the home page in 5s";
      header("Refresh:5; url=/");
    } else {
      echo 'every thing is OK  / you will be redirected to the home page in 5s / number of Sceduled tasks is ' . count($success)/2 ;
      header("Refresh:5; url=/");
    }
  }
}