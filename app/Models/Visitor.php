<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'visitors';
    public $timestamps = false;

    protected $fillable = [
        'visitor_id',
        'user_id',
        'member_name',
        'institution',
        'checkin_date',
    ];

}
