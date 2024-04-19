<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpAddressLog extends Model
{
    use HasFactory;

    protected $table = 'ip_address_logs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'event_type',
        'user_uuid',
        'ip_address_id',
        'changes_made',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'changes_made' => 'json'
    ];
}
