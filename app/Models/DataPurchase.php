<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPurchase extends Model
{
    use HasFactory;

    protected $table = 'data_purchase';
    protected $fillable = ['user_id','network', 'phone_number', 'amount', 'status'];
    public $timestamps = TRUE;

}
