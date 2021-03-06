<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'option',
        'name',
        'seller',
        'price',
        'cost',
        'image',
        'category',
        'available',
        'is_deprecated',
        'is_active'
    ];

    protected $attributes = [
        'is_deprecated' => false,
        'is_active'     => true
    ];

    //public function getGetImageAttribute(){
    //    if ($this->image) 
    //        return url( 'storage/'.$this->image);
    //}

    public function getGetNameAttribute(){
        return ($this->option)?$this->name . ' [' . $this->option . ']':$this->name;
    }

    public function getGetWhatsappURLAttribute(){
        $name = str_replace(' ','%20',$this->GetName);
        // $name = '[' . $this->code . '] ' . $name;
        return "https://api.whatsapp.com/send?phone=50497677876&text=Estoy%20interesado%20en%20este%20producto%20".$name;
    }

    public function getHasImageAttribute(){
        return ($this->image)?true:false;
    }


}
