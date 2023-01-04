<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sankirtan extends Model
{
    use HasFactory;

    protected $table = 'sankirtans';
    public $primaryKey = 'id';
    public $timestamps = true;
}
