<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactLead extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'service',
        'budget',
        'timeline',
        'message',
        'status',
        'ip_address',
        'browser',
        'device',
        'admin_notes',
    ];
}
