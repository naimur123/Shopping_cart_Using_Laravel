<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class app extends Model
{
    protected $table = "info";
    protected $primaryKey = "id";
    public $timestamps = false;
}