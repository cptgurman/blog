<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; //Привязка на всякий случай
    protected $guarded = false; //Чтобы можно было записывать, в массиве можно указать поля, которые нужно заблочить
}
