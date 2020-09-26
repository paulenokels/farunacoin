<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miners extends Model
{
    use HasFactory;

    protected $table = 'miners';
    protected $fillable = ['user_id', 'licence_type', 'status', 'expiry_date'];
    public $timestamps = true;
}
