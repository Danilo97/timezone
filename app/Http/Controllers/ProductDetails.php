<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductDetails extends OsnovniController
{
    public function index($id){
        $this->data['details']=Product::with("images")->find($id);
        return view("main.details",$this->data);
    }
}
