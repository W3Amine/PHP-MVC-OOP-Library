<?php
namespace App\Controllers;

use App\Models\item;
use src\Http\Request;
use src\Support\Session;

class itemSearch
{
    public function search()
    {
        $request = new Request();
        $RequestData = $request->all();
        $query = item::select();
        if (isset($RequestData['Title']) && !empty($RequestData['Title'])) {
            $query->where('Title', $RequestData['Title']);
        }
        if (isset($RequestData['Author_Name']) && !empty($RequestData['Author_Name'])) {
            $query->where('Author_Name', $RequestData['Author_Name']);
        }
        if (isset($RequestData['State']) && !empty($RequestData['State'])) {
            $query->where('State', $RequestData['State']);
        }
        if (isset($RequestData['Type']) && !empty($RequestData['Type'])) {
            $query->where('Type', $RequestData['Type']);
        }
        if (isset($RequestData['MinEditionDate']) && !empty($RequestData['MinEditionDate'])) {
            $query->where('Edition_Date', $RequestData['MinEditionDate'], '>=');
        }
        if (isset($RequestData['MaxEditionDate']) && !empty($RequestData['MaxEditionDate'])) {
            $query->where('Edition_Date', $RequestData['MaxEditionDate'], '<=');
        }
        $items = $query->orderBy("Item_Code")->get();
        if (isset($items['Title'])) {
            $items = [$items];
        }
        $session = new Session;
        $session->setFlash('old', $RequestData);
        return view('items', ['items' => $items]);
    }
}