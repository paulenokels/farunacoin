<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;
    protected $table = 'ledger';
    protected $fillable = ['sender_address', 'receiver_address', 'fac_amount', 'channel', 'reference'];
    public $timestamps = TRUE;
}
