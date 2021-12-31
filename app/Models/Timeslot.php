<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Timeslot extends Model
{
    use HasFactory, HasApiTokens, HasFactory, Notifiable, Uuid;

    protected $table = "time_slot";

    protected $fillable = [
        'start_time',
        'end_time',
        'display_order'
    ];
}
