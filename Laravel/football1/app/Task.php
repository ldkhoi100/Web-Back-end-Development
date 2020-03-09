<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    static function show()
    {
        return DB::table('tasks')->get();
    }
}