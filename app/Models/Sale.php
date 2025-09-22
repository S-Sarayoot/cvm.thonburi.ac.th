<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'shares',
        'price',
        'sold_at',
        'user_id',
        'created_at',
        'updated_at',
        'transfer',
        'transfer_to'
    ];
}
