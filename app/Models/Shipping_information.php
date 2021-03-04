<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_information extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_holder',
        'phone',
        'city',
        'address',
        'client_id',
        'is_default',
        'is_locked'
    ];

    protected $attributes = [
        'city'          =>'Ciudad',
        'address'       =>'Direccion',
        'is_active'     => true,
        'is_locked'     => false
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }



}
