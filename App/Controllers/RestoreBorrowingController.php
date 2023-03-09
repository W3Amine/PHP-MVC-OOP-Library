<?php
namespace App\Controllers;

use App\Models\item;
use src\DataBase\DB;
use src\Http\Request;
use src\Support\Session;
use App\Models\Borrowings;

class RestoreBorrowingController
{
    public function Restore()
    {
        $request = new Request;
        $errors = [];
        $RequestData = $request->all();
        if (isset($RequestData['id']) && !empty($RequestData['id'])) {
            $Borrowingsinfo = Borrowings::select()->where('Borrowing_Code', $RequestData['id'])->get();
            if (count($Borrowingsinfo) != 0) {
                ############################################################################
                # CHECK IF THIS BORROWING IS ALREADY SCEDULED
                # IF === 1 THEN THE ONLY THINGS TO DO :
                # SET THE RETURN DATE / SET THE ITEM STATUS TO AVAILABLE
                # DONT CHECK FOR PENALTIES BECAUSE IT'S already HANDLED BY THE SCHEDULER
                ############################################################################
                if ($Borrowingsinfo["Scheduled"] === 1) {
                    // update THE borrowing Borrowing_Return_Date WITH now
                    $UPDATEtHEBorrow = borrowings::update([
                        "Borrowing_Return_Date" => now(),
                    ])->where('Borrowing_Code', $RequestData['id'])->run();
                    if ($UPDATEtHEBorrow) {
                        // if the  borrowing UPDATED   change the status of the item to Available
                        $updateitem = item::update(['Status' => 'Available'])->where('Item_Code', $Borrowingsinfo['Item_Code'])->run();
                    }
                    header("Location: /profile");
                } else {
                    ############################################
                    # else if the Sceduler !== 1
                    ############################################
                    // update THE borrowing Borrowing_Return_Date WITH now
                    $UPDATEtHEBorrow = borrowings::update([
                        "Borrowing_Return_Date" => now(),
                    ])->where('Borrowing_Code', $RequestData['id'])->run();
                    if ($UPDATEtHEBorrow) {
                        // if the  borrowing UPDATED   change the status of the item to Available
                        $updateitem = item::update(['Status' => 'Available'])->where('Item_Code', $Borrowingsinfo['Item_Code'])->run();
                        if ($updateitem) {
                            ####################################################################################
                            # NOW WHEN YOU UPDATED THE ITEM Status AND ADDED THE Borrowing_Return_Date
                            # NOW MAYBE YOU WILL ADD A PENALTY TO THE USER
                            # BUT BEFORE THAT CHANGE THE Scheduled column to 1
                            # THEN THE SCHEDULER WILL PREVENT IT
                            ####################################################################################
                            Borrowings::update(['Scheduled' => 1])->where('Borrowing_Code', $Borrowingsinfo['Borrowing_Code'])->run();
                            #####################################################################################
                            // if Status Updated successfully :
                            // check if the TIMESTAMPDIFF between the Borrowing_Date and the Borrowing_Return_Date
                            // OF this borrowing is > 15
                            // IF TRUE ADD  a penalty to the user
                            $TIMESTAMPDIFF = Borrowings::select(['TIMESTAMPDIFF(DAY,`Borrowing_Date`,`Borrowing_Return_Date`)'])->where('Borrowing_Code', $RequestData['id'])->get();
                            $TIMESTAMPDIFF = array_values($TIMESTAMPDIFF);
                            if ($TIMESTAMPDIFF[0] > 15) {
                                $q = " UPDATE `members` SET Penalty_Count = Penalty_Count + 1 WHERE Nickname = '" . $Borrowingsinfo['Nickname'] . "' ";
                                $updateUserPenalty = DB::$conn->prepare($q)->execute();
                            }
                            header("Location: /profile");
                        } else {
                            array_push($errors, 'something went wrong');
                        }
                    }
                }
            } else {
                array_push($errors, 'this borrowing code is not found');
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