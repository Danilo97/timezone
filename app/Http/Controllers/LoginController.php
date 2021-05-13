<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends OsnovniController
{
    public function index(){
        return view("main.userRelated.login",$this->data);
    }
    public function loginUser(Request $request){



            $email = $request->input("email");
            $pass = $request->input("pass");

            $validate = $request->validate([
                'email' => 'regex:/^[a-zšđčćž,\.-_\d.!?]+@[a-z]+(.[a-z]+){1,2}$/',
                'pass' => "regex:/^.{4,10}$/"
            ]);

            if($validate){
                $getUser = User::where("email",$email)->get();
                if($getUser){
                    $checkPass = Hash::check($pass,$getUser[0]->password);
                    if($checkPass){
                        Session::put("user",$getUser);
                        foreach ($getUser as $user){
                            Analytics::create([
                                "details"=>$user->name." ".$user->lastname." "."just logged-in!"
                            ]);
                        }
                        foreach ($getUser as $user){
                            if($user->role_id==1){
                                return "/admin";
                            }
                            else{
                                return "/";
                            }
                        }

                    }
                }
            }




    }
    public function logoutUser(){
           if(Session::has("user")){
               Analytics::create([
                   "details"=>Session::get("user")[0]->name." ".Session::get("user")[0]->lastname." "."just logged-out!"
               ]);
               Session::forget("user");
           }

           return "/";
    }
}
