<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $niz = ["Admin","User"];
    public function run()
    {
        foreach ($this->niz as $role){
            Role::create(["name"=>$role]);
        }
    }
}
