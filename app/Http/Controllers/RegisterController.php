<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends OsnovniController
{
    public function index(){
        return view("main.userRelated.register",$this->data);
    }
    public function registerUser(Request $request){
        if($request->input("button")){

            $name = $request->input("name");
            $lastName = $request->input("lastName");
            $phone = $request->input("phone");
            $address = $request->input("address");
            $city = $request->input("city");
            $emailReg = $request->input("emailReg");
            $passReg = $request->input("passReg");
            $passHash = Hash::make($passReg);

            $emailUnique = User::where("email",$emailReg)->get();
            //return count($emailUnique);
            if(count($emailUnique)!=0){
                return "This email is taken!";
            }
            $validate = $request->validate([

                'name' => 'regex:/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,20}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{2,20})?$/',
                'lastName' => 'regex:/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,20}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{2,20})?$/',
                'email' => 'regex:/^[a-zšđčćž,\.-_\d.!?]+@[a-z]+(\.[a-z]+){1,2}$/',
                'password' => 'regex:/^.{4,10}$/',
                'phone' => 'regex:/^[\d]{8,10}$/',
                'address'=>"regex:/^[\w\d]+(\s[\w\d]+){1,4}$/",
                'city' => 'regex:/^[A-ZŠĐČĆŽ][a-zšđčćž]+(\s[A-ZŠĐČĆŽ][a-zšđčćž]+){0,2}$/'

            ]);

            if($validate){
                $userReg=User::create([

                    "name"=>$name,
                    "lastname"=>$lastName,
                    "email"=>$emailReg,
                    "password"=>$passHash,
                    "phone"=>$phone,
                    "address"=>$address,
                    "city"=>$city,
                    "role_id"=>2
                ]);
                $userNew = User::where("id",$userReg->id)->get();
                foreach ($userNew as $user){
                    Analytics::create([
                        "details"=>$user->name." ".$user->lastname." "."just registered!"
                    ]);
                }
                return "/login";
            }

        }



    }
}
