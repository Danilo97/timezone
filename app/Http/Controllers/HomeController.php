<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends OsnovniController
{
    public function index(){
        $this->data["newArrival"]=Product::with("images")->where("new",1)->get();
        $this->data["popular"]=Product::with("images")->where("popular",1)->get();
        $this->data["best"]=Product::with("images")->get()->random();
        return view("main.home",$this->data);
    }
}
