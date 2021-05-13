<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sort;

class SortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $niz = [["price", "asc"],["price", "desc"],["title","asc"],["title","desc"]];
    public function run()
    {
        foreach ($this->niz as $sort){
            Sort::create(["order_by"=>$sort[0],"value"=>$sort[1]]);
        }
    }
}
