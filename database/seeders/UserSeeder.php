<?php

namespace Database\Seeders;

use Database\Seeders\Traits\Truncate;
use Database\Seeders\Traits\ForiegnDisEnAble;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    use ForiegnDisEnAble,Truncate;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disable();
        $this->tCate('users');
         \App\Models\User::factory(10)->create();
        $this->enable();
 
    }
}
