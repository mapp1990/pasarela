<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    public $table = "orders";

    protected $fillable = [
        'customer_name',
        'customer_email',
        'status',
    ];
}