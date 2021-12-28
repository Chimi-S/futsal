<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class BankAccountDetail extends Model
{
    use HasFactory, HasApiTokens, HasFactory, Notifiable, Uuid;

    protected $table = "bank_account_details";

    protected $fillable = [
        'id',
        'account_number',
        'qr_code_photo_path'
    ];

    protected $appends = [
        'profile_photo_url',
    ];
}
