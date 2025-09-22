<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investment extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'shares',
        'price',
        'invested_at',
        'user_id',
        'reinvestment',
        'created_at',
        'updated_at',
        'complimentary',
        'transfer',
        'transfer_from'
    ];

}
