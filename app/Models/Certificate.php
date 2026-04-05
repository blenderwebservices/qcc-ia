<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'organization',
        'roc',
        'status',
        'reference_standard',
        'sectors',
        'contact_email',
        'access_password',
    ];
}
