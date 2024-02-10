<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_name',
        'website_url',
        'username',
        'password',
        'note',
        'user_id',
    ];

    // Definisanje relacije ka User modelu
    public function user()
    {
        return $this->belongsTo(User::class);
    }}
