<?php

namespace Database\Seeders;

use Database\Seeders\Traits\ForiegnDisEnAble;
use Database\Seeders\Traits\Truncate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    use ForiegnDisEnAble, Truncate;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disable();
        $this->tCate('posts');
        \App\Models\Posts::factory(200)->create();
        $this->enable();
    }
}
