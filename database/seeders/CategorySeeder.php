<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $niz = ["Jaguar","Sector","Armani","Diesel","Festina"];
    public function run()
    {
        foreach ($this->niz as $category){
            Category::create(["name"=>$category]);
        }

    }
}
