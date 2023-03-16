<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories'; //Привязка на всякий случай
    protected $guarded = false; //Чтобы можно было записывать, в массиве можно указать поля, которые нужно заблочить
}
