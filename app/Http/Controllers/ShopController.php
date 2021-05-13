<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sort;
use App\Models\Product;

class ShopController extends OsnovniController
{

    public function index(){
        $this->data["categories"]=Category::all();
        $this->data["sorts"]=Sort::all();

        return view("main.shop",$this->data);
    }

    public function allProductsAjax(){

        $this->data["products"]=Product::with("images")->get();
        return $this->data;
    }

    public function ajaxNewest(){
        $this->data["products"]=Product::with("images")->where("new",1)->get();
        return $this->data;
    }

    public function ajaxPopular(){
        $this->data["products"]=Product::with("images")->where("popular",1)->get();
        return $this->data;
    }

    public function sortFilter(Request $request){

        $sort = $request->input("sort");

        $filter = $request->input("filter");

        if($filter != 0 && $sort == 0){
            $this->data["products"]=Product::with("images")->where("category_id",$filter)->get();
        }

        if($sort != 0 && $filter == 0){
            $dataSort = Sort::where("id",$sort)->get();
            $orderBy = $dataSort[0]->order_by;
            $value = $dataSort[0]->value;
            $this->data["products"]=Product::with("images")->orderBy($orderBy,$value)->get();
        }

        if($sort != 0 && $filter != 0){
            $dataSort = Sort::where("id",$sort)->get();
            $orderBy = $dataSort[0]->order_by;
            $value = $dataSort[0]->value;
            $this->data["products"]=Product::with("images")->where("category_id",$filter)->orderBy($orderBy,$value)->get();
        }
        return $this->data;
    }

    public function search(Request $request){
        $search = $request->input("search");
        $this->data["products"]=Product::with("images")->where("title","LIKE","%".$search."%")->get();
        return $this->data;
    }
}
