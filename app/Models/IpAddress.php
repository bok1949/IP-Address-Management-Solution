<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    use HasFactory;

    protected $table = 'ip_adresses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ip_address',
        'ip_label',
        'created_at',
        'updated_at',
    ];
}
