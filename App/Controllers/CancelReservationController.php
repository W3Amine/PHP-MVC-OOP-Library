<?php
namespace App\Controllers;

use App\Models\item;
use src\Http\Request;
use src\Support\Session;
use App\Models\reservation;

class CancelReservationController
{
    public function Cancel()
    {
        $request = new Request;
        $session = new Session();
        $user = getUser('Nickname');
        $errors = [];
        $RequestData = $request->all();
        if (isset($RequestData['id']) && !empty($RequestData['id'])) {
            // check if the id  exist
            $reservation = reservation::select()->where('Reservation_Code', $RequestData['id'])->get();
            if (count($reservation) != 0) {
                // check if the reservation exist
                if ($reservation['Nickname'] == $user) {
                    $item = item::select(['Status'])->where('Item_Code', $reservation['Item_Code'])->get();
                    if (!empty($item)) {
                        if ($item['Status'] == 'Reserved') {
                            // if the item status is Reserved  then we can cancel it
// code update item status to Available 
                            $updateitem = item::update(['Status' => 'Available'])->where('Item_Code', $reservation['Item_Code'])->run();
                            if ($updateitem) {
                                // if the status changed with success redirect
                                reservation::delete()->where('Reservation_Code', $RequestData['id'])->run();
                                header("Location: /profile");
                            }
                        } else {
                            array_push($errors, 'this item is not Reserved ');
                            $session->setFlash('errors', $errors);
                            header("Location: /items");
                        }
                    }
                } else {
                    array_push($errors, 'you are not the owner of this reservation');
                    $session->setFlash('errors', $errors);
                    header("Location: /items");
                }
            }
        } else {
            array_push($errors, 'please choose a valid item');
            $session->setFlash('errors', $errors);
            header("Location: /items");
        }
    }
}