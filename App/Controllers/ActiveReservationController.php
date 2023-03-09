<?php
namespace App\Controllers;

use App\Models\item;
use src\Http\Request;
use src\Support\Session;
use App\Models\Borrowings;
use App\Models\reservation;

class ActiveReservationController
{
    public function ActiveReservation()
    {
        $request = new Request;
        $errors = [];
        $RequestData = $request->all();
        if (isset($RequestData['id']) && !empty($RequestData['id'])) {
            $checkIfItemisAlreadyBorrowed = Borrowings::select(['Reservation_Code'])->where('Reservation_Code', $RequestData['id'])->get();
            if (count($checkIfItemisAlreadyBorrowed) == 0) {
                $reservationinfo = reservation::select()->where('Reservation_Code', $RequestData['id'])->get();
                if (count($reservationinfo) != 0) {
// create a new borrowing with the informations of the reservation
                    $insertNewBorrow = borrowings::insert([
                        "Borrowing_Date" => now(),
                        "Item_Code" => $reservationinfo['Item_Code'],
                        "Nickname" => $reservationinfo['Nickname'],
                        "Reservation_Code" => $reservationinfo['Reservation_Code'],
                    ])->run();
                    if ($insertNewBorrow) {
                        // if the new borrowing info inserted then change the state of the item to borrowed
                        $updateitem = item::update(['Status' => 'Borrowed'])->where('Item_Code', $reservationinfo['Item_Code'])->run();
                        if ($updateitem) {
                            header("Location: /profile");
                        } else {
                            array_push($errors, 'something went wrong');
                        }
                    }
                } else {
                    array_push($errors, 'this item is not found');
                }
            } else {
                array_push($errors, 'this item is already Borrowed');
            }
        } else {
            array_push($errors, 'Please enter a valid ID');
        }
        if (count($errors) > 0) {
            $session = new Session();
            $session->setFlash('errors', $errors);
            header("Location: /items");
        }
    }
}