<?php
namespace App\Controllers;

use App\Models\Reservation;
use App\Models\User;
use PDO;
use App\Models\item;
use src\DataBase\DB;
use src\Http\Request;
use src\Support\Session;

class itemReservationController
{
    public function reserve()
    {
        $request = new Request;
        $session = new Session();
        $errors = [];
        $RequestData = $request->all();
        $user = getUser('Nickname');

      //  use User Model banned method to redirect the user to login PAGE if is banned
        $redirectUserIfIsBanned = new User;
        $redirectUserIfIsBanned->banned($user);
       // END

        if (isset($RequestData['id']) && !empty($RequestData['id'])) {
            // $iteminfo = item::select()->where('Item_Code', $RequestData['id'])->get();
            
            // $stm = DB::$conn->prepare("
            // SELECT IF(
            //     (
            //     SELECT COUNT(Reservation_Code) FROM `reservation` JOIN item WHERE CURRENT_TIMESTAMP <= `Reservation_Expiration_Date` AND Nickname = '$user' AND item.Status = 'Reserved' AND reservation.Item_Code = item.Item_Code
            //     )
            //     +
            //     (SELECT COUNT(*) FROM `borrowings` WHERE `Borrowing_Return_Date` IS NULL AND Nickname = '$user')
            //         < 
            //        3
            //         , true, false) AS 'check'
            // ");

                        $stm = DB::$conn->prepare("
            SELECT IF(
                (
                    SELECT COUNT(reservation.Reservation_Code) FROM `reservation` LEFT JOIN  borrowings ON reservation.Reservation_Code = borrowings.Reservation_Code 
                    WHERE CURRENT_TIMESTAMP <= Reservation_Expiration_Date AND reservation.Nickname = '$user' AND borrowings.Borrowing_Code is  NULL
                )
                +
                (SELECT COUNT(*) FROM `borrowings` WHERE `Borrowing_Return_Date` IS NULL AND Nickname = '$user')
                    < 
                   3
                    , true, false) AS 'check'
            ");
            
            $stm->execute();
            $data = $stm->fetch(PDO::FETCH_ASSOC);
            if ($data['check']) {
                // if this user have not reached the max number of borrowings and reservations 3
                $item = item::select(['Status'])->where('Item_Code', $RequestData['id'])->get();
                if (!empty($item)) {
                    if ($item['Status'] == 'Available') {
                        // if the item status is available  then add reservation
// code insert into reservations using nickname and item id
                        $reserve = Reservation::insert([
                            'Nickname' => $user,
                            'Item_Code' => $RequestData['id'],
                            'Reservation_Date' => now(),
                            'Reservation_Expiration_Date' => nowPlus24h(),
                        ])->run();
                        if ($reserve) {
                            // if reservation inserted change item status to Reserved
                            item::update(['Status' => 'Reserved'])->where('Item_Code', $RequestData['id'])->run();
                            // redirect to profile
                            header("Location: /profile");
                        }
                    } else {
                        array_push($errors, 'this item is not available Right now');
                        $session->setFlash('errors', $errors);
                        header("Location: /items");
                    }
                }
            } else {
                array_push($errors, 'you cannot reserve items because you reached the max items 3');
                $session->setFlash('errors', $errors);
                header("Location: /items");
            }
        } else {
            array_push($errors, 'please choose a valid item');
            $session->setFlash('errors', $errors);
            header("Location: /items");
        }
    }
}