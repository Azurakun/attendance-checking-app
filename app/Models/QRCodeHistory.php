<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCodeHistory extends Model
{
    use HasFactory;

    protected $table = 'q_r_code_histories'; // Explicitly set the table name

    protected $fillable = [
        'class_id',
        'class_name',
        'qr_code',
    ];
}
