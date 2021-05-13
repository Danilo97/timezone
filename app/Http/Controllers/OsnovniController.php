<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class OsnovniController extends Controller
{
    protected $data;
    public function __construct(){
        $this->data["menus"]= Menu::all();
    }
}
