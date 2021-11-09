<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = "cart";
    protected $primaryKey = "id";
    public $timestamps = false;
}