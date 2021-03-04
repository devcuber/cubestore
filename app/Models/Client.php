<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'is_Active'
    ];

    protected $attributes = [
        'is_active'     => true
    ];


    public function Shipping_Informations()
    {
        return $this->hasMany(Shipping_Information::class)
                    ->where('is_active',true)
                    ->orderBy('is_default','DESC')
                    ->orderBy('id','DESC');
    }

    public function getGetShippingInfoidAttribute()
    {
        /** TODO
         * Se puede quitar el ciclo foreach y hacer un where (is_default , true)
         */
        foreach ($this->Shipping_Informations()->get() as $shipping_info) {
            if ($shipping_info->is_default)
                return $shipping_info->id;
        }
        return null;
    }

    public function getGetShippingInfoDescAttribute()
    {
        /** TODO
        * Se puede quitar el ciclo foreach y hacer un where (is_default , true)
        */
        foreach ($this->Shipping_Informations()->get() as $shipping_info) {
            if ($shipping_info->is_default)
                return $shipping_info->address;
        }
        return 'no hay info';
    }


}
