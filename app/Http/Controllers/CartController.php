<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends OsnovniController
{
    public function index(){

        return view("main.userRelated.cart",$this->data);
    }

    public function addToCart(Request $request){
        $prodId = $request->input("prodId");
        $user = $request->input("sesijaCart");
        $quantity = 1;
        $exists = Cart::where("user_id",$user)->where("product_id",$prodId)->get();
        if(count($exists)!=1){
            Cart::create([
                "product_id"=>$prodId,
                "user_id"=>$user,
                "quantity"=>$quantity
            ]);
            if(Session::has("user")){
                Analytics::create([
                    "details"=>Session::get("user")[0]->name." ".Session::get("user")[0]->lastname." "."Just added an item to the cart!"
                ]);
            }
        }
        else{
            $currentQuantity = $exists[0]->quantity;
            $new = $currentQuantity + $quantity;
            Cart::where("user_id",$user)->where("product_id",$prodId)->update(["quantity"=>$new]);
            if(Session::has("user")){
                Analytics::create([
                    "details"=>Session::get("user")[0]->name." ".Session::get("user")[0]->lastname." "."Just added the same item to the cart so quantity increased!"
                ]);
            }
        }
    }
    public function getCartItems(Request $request){

        $user = $request->input("sesijaCartGet");
        return $this->data["cart"]=Cart::with("product.images")->where("user_id",$user)->get();
    }
    public function addToCartPlus(Request $request){

        $prodIdPlus = $request->input("productPlus");
        $queryQuantity = Cart::where("product_id",$prodIdPlus)->get();
        $currentQuantity = $queryQuantity[0]->quantity;
        $quantity = 1;
        $quantityPlus = $currentQuantity + $quantity;
        Cart::where("product_id",$prodIdPlus)->update(["quantity"=>$quantityPlus]);

    }
    public function addToCartMinus(Request $request){

        $prodIdMinus = $request->input("productMinus");
        $queryQuantity = Cart::where("product_id",$prodIdMinus)->get();
        $currentQuantity = $queryQuantity[0]->quantity;
        $quantity = 1;
        $quantityPlus = $currentQuantity - $quantity;
        Cart::where("product_id",$prodIdMinus)->update(["quantity"=>$quantityPlus]);

    }
    public function removeFromCart(Request $request){
        $sesionCartRemove = $request->input("sesijaRemove");
        $prodIdRemove = $request->input("prodIdRemove");
        Cart::where("product_id",$prodIdRemove)->where("user_id",$sesionCartRemove)->delete();
        if(Session::has("user")){
            Analytics::create([
                "details"=>Session::get("user")[0]->name." ".Session::get("user")[0]->lastname." "."just removed an item from the cart!"
            ]);
        }
    }
}
