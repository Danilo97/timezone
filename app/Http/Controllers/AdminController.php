<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends OsnovniController
{
    public function index(){

        return view("main.admin.admin",$this->data);

    }
    //ADMIN PRODUCTS MANAGEMENT

    public function adminProducts(){
        return view("main.admin.manageProducts.manageProducts",$this->data);
    }

    public function manageProductsInsert(){
        $this->data["categories"]=Category::all();
        return view("main.admin.manageProducts.manageProductsInsert",$this->data);
    }
    //INSERT PRODUCT
    public function productsInsert(Request $request){

        $titleInsert = $request->input("title");
        $priceInsert = $request->input("price");
        $catInsert = $request->input("catInsert");
        $descInsert = $request->input("description");
        $pictureInsert = $request->file("pictureInsert");
        $popular = 0;
        $new = 0;
        $extension='';

        if($pictureInsert != null){

            $extension = $request->file("pictureInsert")->extension();
            $newPictureName = date("Y-m-d")."-".Str::random(10).".".$extension;
            $pictureInsert->move(public_path('assets/img/gallery'),$newPictureName);

        }

        $lastId = Product::create([

           "title"=>$titleInsert,
           "description"=>$descInsert,
            "price"=>$priceInsert,
            "category_id"=>$catInsert,
            "new"=>$new,
            "popular"=>$popular

        ]);

        Image::create([

            "src"=>$newPictureName,
            "product_id"=>$lastId->id

        ]);

        return view("main.admin.manageProducts.manageProducts");
    }

    //UPDATE PRODUCT
    public function manageProductsUpdate(){
        $this->data["categories"]=Category::all();
        $this->data["products"]=Product::all();
        return view("main.admin.manageProducts.manageProductsUpdate",$this->data);
    }
    public function getProductUpdate(Request $request){
        $prodIdUpdate = $request->input("idProdUpdate");
        if($prodIdUpdate != 0){
            return Product::where("id",$prodIdUpdate)->get();
        }
    }
    public function productsUpdate(Request $request){

        $prodId = $request->input("prodUpdate");
        $titleUpdate = $request->input("titleUpdate");
        $priceUpdate = $request->input("priceUpdate");
        $catUpdate = $request->input("catUpdate");
        $descUpdate = $request->input("descriptionUpdate");
        $pictureUpdate = $request->file("pictureUpdate");
        $popular = 0;
        $new = 0;
        $extensionUpdate='';

        if($pictureUpdate != null){

            $extensionUpdate = $request->file("pictureUpdate")->extension();
            $newPictureNameUpdate = date("Y-m-d")."-".Str::random(10).".".$extensionUpdate;
            $pictureUpdate->move(public_path('assets/img/gallery'),$newPictureNameUpdate);

            Image::where("product_id",$prodId)->update([
                "src"=>$newPictureNameUpdate
            ]);

            Product::where("id",$prodId)->update([
                "title"=>$titleUpdate,
                "description"=>$descUpdate,
                "price"=>$priceUpdate,
                "category_id"=>$catUpdate,
                "new"=>$new,
                "popular"=>$popular
            ]);
        }
        else{
            Product::where("id",$prodId)->update([
                "title"=>$titleUpdate,
                "description"=>$descUpdate,
                "price"=>$priceUpdate,
                "category_id"=>$catUpdate,
                "new"=>$new,
                "popular"=>$popular
            ]);
        }
        return view("main.admin.manageProducts.manageProducts");
    }

    //DELETE PRODUCT
    public function manageProductsDelete(){
        //$this->data["categories"]=Category::all();
        $this->data["products"]=Product::all();
        return view("main.admin.manageProducts.manageProductsDelete",$this->data);
    }
    public function getProductDelete(Request $request){
        $prodIdDelete = $request->input("idProdDelete");
        if($prodIdDelete != 0){
            return Product::with("images")->where("id",$prodIdDelete)->get();
        }
    }
    public function productsDelete(Request $request){
        $prodIdDel = $request->input("prodDelete");
        Product::where("id",$prodIdDel)->delete();
        Image::where("product_id",$prodIdDel)->delete();

        return view("main.admin.manageProducts.manageProducts");
    }

    //ADMIN PRODUCTS MANAGEMENT END ---------------

    //ADMIN CATEGORIES MANAGEMENT

    public function adminCategories(){
        return view("main.admin.manageCategories.manageCategories",$this->data);
    }

    //INSERT
    public function manageCategoriesInsert(){

        return view("main.admin.manageCategories.manageCategoriesInsert",$this->data);
    }
    public function categoryInsert(Request $request){
        $catNameInsert = $request->input("catName");
        Category::create([
           "name"=>$catNameInsert
        ]);
        return view("main.admin.manageCategories.manageCategories",$this->data);
    }

    //UPDATE
    public function manageCategoriesUpdate(){
        $this->data["categoriesUpdate"]=Category::all();
        return view("main.admin.manageCategories.manageCategoriesUpdate",$this->data);
    }
    public function getCategoryUpdate(Request $request){
        $catUpdateGet = $request->input("catId");
        return Category::where("id",$catUpdateGet)->get();
    }
    public function categoryUpdate(Request $request){
        $catIdUpdate = $request->input("categoryUpdate");
        $catNameUpdate = $request->input("catNameUpdate");
        Category::where("id",$catIdUpdate)->update([
           "name"=>$catNameUpdate
        ]);
        return view("main.admin.manageCategories.manageCategories",$this->data);
    }

    //DELETE
    public function manageCategoriesDelete(){
        $this->data["categoriesDelete"]=Category::all();
        return view("main.admin.manageCategories.manageCategoriesDelete",$this->data);
    }
    public function categoryDelete(Request $request){
        $catDelete = $request->input("categoryDelete");
        Category::destroy($catDelete);
        return view("main.admin.manageCategories.manageCategories",$this->data);
    }

    //ADMIN ANALYTICS

    public function adminAnalytics(){

        return view("main.admin.analytics.analytics",$this->data);
    }
    public function getAnalytics(){
        return Analytics::orderBy("created_at","desc")->get();
    }
    public function filterDate(Request $request){
        $dateFrom = $request->input("dateFrom");
        $dateTo = $request->input("dateTo");

        if($dateFrom != null && $dateTo == null){
            return Analytics::where("created_at",">",$dateFrom)->orderBy("created_at","desc")->get();
        }
        if($dateTo != null && $dateFrom == null){
            return Analytics::where("created_at","<",$dateTo)->orderBy("created_at","desc")->get();
        }
        if($dateFrom != null && $dateTo != null){
            return Analytics::whereBetween("created_at",[$dateFrom,$dateTo])->orderBy("created_at","desc")->get();
        }
    }
}
