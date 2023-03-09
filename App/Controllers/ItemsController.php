<?php
namespace App\Controllers;

use App\Models\item;
use src\Http\Request;
use src\Support\Session;

class ItemsController
{
    public function add()
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
        if (!isset($_FILES['Cover_Image']) || $_FILES['Cover_Image']['error'] != 0) {
            array_push($errors, ' please add the image is required ');
        } else {
            $file_name = $_FILES['Cover_Image']['name'];
            $file_size = $_FILES['Cover_Image']['size'];
            $file_tmp = $_FILES['Cover_Image']['tmp_name'];
            $file_type = $_FILES['Cover_Image']['type'];
            $file_ext = explode('.', $file_name)[count(explode('.', $file_name)) - 1];
            $extensions = array("jpeg", "jpg", "png");
            if (in_array($file_ext, $extensions) === false) {
                array_push($errors, " extension not allowed, please choose a JPEG or PNG file. ");
            }
        }
        $RequestData['Title'] = filter_var($RequestData['Title'], FILTER_SANITIZE_STRING);
        $RequestData['Author_Name'] = filter_var($RequestData['Author_Name'], FILTER_SANITIZE_STRING);
        $RequestData['Type'] = filter_var($RequestData['Type'], FILTER_SANITIZE_STRING);
        $RequestData['State'] = filter_var($RequestData['State'], FILTER_SANITIZE_STRING);
        $RequestData['Status'] = filter_var($RequestData['Status'], FILTER_SANITIZE_STRING);
        if (count($errors) == 0) {
            $publicDir = __DIR__ . '/../../public/';
            $filename = "Item_Images/" . uniqid() . "-" . time() . '.' . $file_ext; // 5dab1961e93a7-1571494241
            // insert data into db and redirect
            move_uploaded_file($file_tmp, $publicDir . $filename);
            item::insert([
                "Title" => $RequestData['Title'],
                "Author_Name" => $RequestData['Author_Name'],
                "Type" => $RequestData['Type'],
                "State" => $RequestData['State'],
                "PagesNumber" => $RequestData['PagesNumber'],
                "Edition_Date" => $RequestData['Edition_Date'],
                "Purchase_Date" => $RequestData['Purchase_Date'],
                "Status" => $RequestData['Status'],
                "Cover_Image" => $filename,
            ])->run();
            // REDIRECT
            header("Location: /items");
        } else {
            // return to the page with $errors and session Flash 
            $session = new Session();
            $session->setFlash('errors', $errors);
            $session->setFlash('old', $RequestData);
            // REDIRECT
            header("Location: /items/add");
        }
    }
    public function GetItemInfo()
    {
        $request = new Request;
        $errors = [];
        $RequestData = $request->all();
        if (isset($RequestData['id']) && !empty($RequestData['id'])) {
            $iteminfo = item::select()->where('Item_Code', $RequestData['id'])->get();
            // dd(count($iteminfo));
            if (count($iteminfo) == 0) {
                $session = new Session();
                $session->setFlash('errors', ["this item is not found / wrong id"]);
                return view('editItem');
            } else {
                return view('editItem', ["item" => $iteminfo, "id" => $RequestData['id']]);
            }
        } else {
            header("Location: /items");
        }
    }
    public function edit()
    {
        $request = new Request;
        $errors = [];
        $RequestData = $request->all();
        if (isset($RequestData['Item_Code']) && !empty($RequestData['Item_Code'])) {
            foreach ($RequestData as $key => $value) {
                if (empty($value)) {
                    array_push($errors, ' please fill the ' . $key . '  required ');
                }
            }
            $RequestData['Title'] = filter_var($RequestData['Title'], FILTER_SANITIZE_STRING);
            $RequestData['Author_Name'] = filter_var($RequestData['Author_Name'], FILTER_SANITIZE_STRING);
            $RequestData['Type'] = filter_var($RequestData['Type'], FILTER_SANITIZE_STRING);
            $RequestData['State'] = filter_var($RequestData['State'], FILTER_SANITIZE_STRING);
            $RequestData['Status'] = filter_var($RequestData['Status'], FILTER_SANITIZE_STRING);
            if (isset($_FILES['Cover_Image']) && $_FILES['Cover_Image']['error'] == 0) {
                $file_name = $_FILES['Cover_Image']['name'];
                $file_size = $_FILES['Cover_Image']['size'];
                $file_tmp = $_FILES['Cover_Image']['tmp_name'];
                $file_type = $_FILES['Cover_Image']['type'];
                $file_ext = explode('.', $file_name)[count(explode('.', $file_name)) - 1];
                $extensions = array("jpeg", "jpg", "png");
                if (in_array($file_ext, $extensions) === false) {
                    array_push($errors, " extension not allowed, please choose a JPEG or PNG file. ");
                }
            }
            if (count($errors) == 0) {
                $data = [
                    "Title" => $RequestData['Title'],
                    "Author_Name" => $RequestData['Author_Name'],
                    "Type" => $RequestData['Type'],
                    "State" => $RequestData['State'],
                    "PagesNumber" => $RequestData['PagesNumber'],
                    "Edition_Date" => $RequestData['Edition_Date'],
                    "Purchase_Date" => $RequestData['Purchase_Date'],
                    "Status" => $RequestData['Status'],
                ];
                if (isset($_FILES['Cover_Image']) && $_FILES['Cover_Image']['error'] == 0) {
                    $publicDir = __DIR__ . '/../../public/';
                    $filename = "Item_Images/" . uniqid() . "-" . time() . '.' . $file_ext; // 5dab1961e93a7-1571494241
                    // insert data into db and redirect
                    move_uploaded_file($file_tmp, $publicDir . $filename);
                    $data += ["Cover_Image" => $filename];
                }
                item::update($data)->where('Item_Code', $RequestData['Item_Code'])->run();
                // REDIRECT
                header("Location: /items");
            } else {
                // return to the page with $errors and session Flash 
                $session = new Session();
                $session->setFlash('errors', $errors);
                $session->setFlash('old', $RequestData);
                // REDIRECT
                header("Location: /items/edit?id=" . $RequestData['Item_Code']);
            }
        } else {
            header("Location: /items");
        }
    }
    public function delete()
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
        if (isset($RequestData['id']) && !empty($RequestData['id'])) {
            if (count($errors) == 0) {
                // insert data into db and redirect
                item::delete()->where('Item_Code', $RequestData['id'])->run();
                // REDIRECT
                header("Location: /items");
            } else {
                // return to the page with $errors and session Flash 
                $session = new Session();
                $session->setFlash('errors', $errors);
                $session->setFlash('old', $RequestData);
                // REDIRECT
                header("Location: /");
            }
        } else {
            header("Location: /items");
        }
    }
}