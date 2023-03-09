<?php
namespace App\Controllers;

use PDO;
use App\Models\item;
use src\DataBase\DB;
use src\Http\Request;
use src\Support\Session;
use App\Models\borrowings;
use App\Models\reservation;

class ReservationAndBorrowingSearch
{
    public function Search()
    {
        $request = new Request();
        $RequestData = $request->all();
        if (is_admin()) {
            // the search and all data is only available for admin not users
            // START OF GET all Reservations DATA with Search if Exist
            // $ReservationsQuery = reservation::select();
            // $ReservationsQuery = reservation::select([
            //     "Reservation_Code",
            //     "Reservation_Date",
            //     "Reservation_Expiration_Date",
            //     "reservation.Item_Code",
            //     "Nickname",
            //     "item.Title",
            //     "item.Author_Name",
            //     "item.Cover_Image",
            //     "item.State",
            //     "item.Status",
            // ])->join('item')->where('reservation.Item_Code', 'item.Item_Code');
            $query = "      
       SELECT      reservation.Reservation_Code,
           Reservation_Date,
           Reservation_Expiration_Date,
           reservation.Item_Code,
           reservation.Nickname,
           item.Title,
           item.Author_Name,
           item.State,
           item.Status,
           item.Cover_Image,
           borrowings.Borrowing_Code
FROM `reservation` 
LEFT JOIN item ON item.Item_Code = reservation.Item_Code 
LEFT JOIN borrowings ON reservation.Reservation_Code = borrowings.Reservation_Code  WHERE 1 
       ";
            if (isset($RequestData['Reservation_Code']) && !empty($RequestData['Reservation_Code'])) {
                $query .= '  AND reservation.Reservation_Code =  ' . $RequestData['Reservation_Code'] . ' ';
            }
            if (isset($RequestData['Reservation_NickName']) && !empty($RequestData['Reservation_NickName'])) {
                $query .= " AND reservation.Nickname LIKE '%" . $RequestData['Reservation_NickName'] . "%'  ";
            }
            $query .= ' ORDER BY Reservation_Date DESC ';
            $stm = DB::$conn->prepare($query);
            $stm->execute();
            $ReservationsQuery = $stm->fetchAll(PDO::FETCH_ASSOC);

            $Reservations = $ReservationsQuery;
            // END OF GET all Reservations DATA with Search if Exist
            // START OF GET all Borrowings DATA with Search if Exist
            // $BorrowingsQuery = borrowings::select();
            $BorrowingsQuery = borrowings::select([
                "Borrowing_Code",
                "Borrowing_Date",
                "Borrowing_Return_Date",
                "borrowings.Item_Code",
                "Nickname",
                "item.Title",
                "item.Author_Name",
                "item.Cover_Image",
                "item.State"
            ])->join('item')->where('borrowings.Item_Code', 'item.Item_Code');
            if (isset($RequestData['Borrowing_Code']) && !empty($RequestData['Borrowing_Code'])) {
                $BorrowingsQuery->where('Borrowing_Code', $RequestData['Borrowing_Code']);
            }
            if (isset($RequestData['Borrowing_NickName']) && !empty($RequestData['Borrowing_NickName'])) {
                $BorrowingsQuery->where('Nickname', $RequestData['Borrowing_NickName']);
            }
            $Borrowings = $BorrowingsQuery->orderBy("Borrowing_Date", "DESC")->get();
            if (isset($Borrowings['Borrowing_Code'])) {
                $Borrowings = [$Borrowings];
            }
            // END OF GET all Borrowings DATA with Search if Exist
            $session = new Session;
            $session->setFlash('old', $RequestData);
            return view('profile', ['Reservations' => $Reservations, 'Borrowings' => $Borrowings]);
        }
        if (is_user()) {
            // here we will get all reservations and borrowing data of the authaunticated user
            // START OF GET all Reservations DATA  of the current user
            // $ReservationsQuery = reservation::select();
            // $ReservationsQuery = reservation::select([
            //     "Reservation_Code",
            //     "Reservation_Date",
            //     "Reservation_Expiration_Date",
            //     "reservation.Item_Code",
            //     "Nickname",
            //     "item.Title",
            //     "item.Author_Name",
            //     "item.Cover_Image",
            //     "item.State",
            //     "item.Status",
            // ])->join('item')->where('reservation.Item_Code', 'item.Item_Code')
            // ->where('Nickname',getUser('Nickname'));
            // $Reservations = $ReservationsQuery->orderBy("Reservation_Date" , "DESC")->get();
            // if (isset($Reservations['Reservation_Code'])) {
            //     $Reservations = [$Reservations];
            // }
            $query = "      
        SELECT reservation.Reservation_Code,
            Reservation_Date,
            Reservation_Expiration_Date,
            reservation.Item_Code,
            reservation.Nickname,
            item.Title,
            item.Author_Name,
            item.State,
            item.Status,
            item.Cover_Image,
            borrowings.Borrowing_Code
 FROM `reservation` 
 LEFT JOIN item ON item.Item_Code = reservation.Item_Code 
 LEFT JOIN borrowings ON reservation.Reservation_Code = borrowings.Reservation_Code  
 WHERE reservation.Nickname = '";
            $query .= getUser('Nickname');
            $query .= "' ORDER BY Reservation_Date DESC ";
            $stm = DB::$conn->prepare($query);
            $stm->execute();
            $Reservations = $stm->fetchAll(PDO::FETCH_ASSOC);
            // END OF GET all Reservations DATA  of the current user
            // START OF GET all Borrowings DATA  of the current user
            $BorrowingsQuery = borrowings::select([
                "Borrowing_Code",
                "Borrowing_Date",
                "Borrowing_Return_Date",
                "borrowings.Item_Code",
                "Nickname",
                "item.Title",
                "item.Author_Name",
                "item.Cover_Image",
                "item.State"
            ])->join('item')->where('borrowings.Item_Code', 'item.Item_Code')
                ->where('Nickname', getUser('Nickname'));
            $Borrowings = $BorrowingsQuery->orderBy("Borrowing_Date", "DESC")->get();
            if (isset($Borrowings['Borrowing_Code'])) {
                $Borrowings = [$Borrowings];
            }
            // END OF GET all Borrowings DATA of the current user
            $session = new Session;
            $session->setFlash('old', $RequestData);
            return view('profile', ['Reservations' => $Reservations, 'Borrowings' => $Borrowings]);
        }
    }
}