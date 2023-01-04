<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Darshan extends Model
{
    use HasFactory;

    protected $table = 'darshans';
    public $primaryKey = 'id';
    public $timestamps = true;
}
