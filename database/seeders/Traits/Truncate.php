<?php
namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait Truncate
{
    protected function tCate(string $table)
    {
        DB::table($table)->truncate();
    }   
}