<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $niz = [["Home","home"],["Shop","shop"],["About","about"],["Contact","contact"]];

    public function run()
    {
        foreach ($this->niz as $menu){
            Menu::create(["name"=>$menu[0],"route"=>$menu[1]]);
        }
    }
}
