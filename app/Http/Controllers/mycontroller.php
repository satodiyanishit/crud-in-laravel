<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class mycontroller extends Controller
{
    function insert(Request $req)
    {
        //insert data
        $name= $req->get('pname');
        $price= $req->get('pprice');
        $pimage= $req->file('image')->GetClientOriginalName();
        //move upload file
        $req->image->move(public_path('images'), $pimage);

        $prod = new product();
        $prod->PName = $name;
        $prod->PPrice = $price;
        $prod->PImage = $pimage;
        $prod->save();
        return redirect('/');   
    }

    //get data from database
    function readdata()
    {
        $pdata = product::all();
        return view('insertRead',['data'=>$pdata]);
    }

    function updateordelete(Request $req)
    {
        //update data 
         $id = $req->get('id');
         $name = $req->get('name');
         $price = $req->get('price');
         if($req->get('update') == 'Update')
         {
            return view('updateview',['pid'=>$id, 'pname'=>$name, 'pprice'=>$price]);
         }
         else{
            //delete record
            $prod = product::find($id);
            $prod->delete();
         }
         return redirect('/');
    }

    //get updated data
    function update(Request $req)
    {
        $ID = $req->get('id');
        $Name = $req->get('name');
        $Price = $req->get('price');

        //update details
        $prod = product::find($ID);
        $prod->PName = $Name;
        $prod->PPrice = $Price;
        $prod->save();
        return redirect('/');

    }
}
?>