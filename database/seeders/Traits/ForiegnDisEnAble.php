<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait ForiegnDisEnAble
{
    protected function disable()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
    protected function enable()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}
