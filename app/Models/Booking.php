<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Booking extends Model
{
    use HasFactory, HasApiTokens, HasFactory, Notifiable, Uuid;

    protected $table = "booking";

    protected $fillable = [
        'id',
        'user_id',
        'date',
        'time_slot_id'
    ];
}
