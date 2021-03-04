<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'code',
        'next_code',
        'description',
        'priority',
        'exec_function',
        'html_icon',
        'is_active',
        ];

    protected $attributes = [
        'is_active'     => true
    ];

}
