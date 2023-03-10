<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\Truncate;
use Database\Seeders\Traits\ForiegnDisEnAble;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
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
        $this->tCate('comments');
        \App\Models\Comment::factory(10)->create();
        $this->enable();
    }
}
