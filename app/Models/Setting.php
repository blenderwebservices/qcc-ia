<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'instagram_url',
        'facebook_url',
        'linkedin_url',
        'email_1',
        'email_2',
        'public_admin_image',
        'health_image',
        'education_image',
        'social_services_image',
        'other_services_image',
    ];
}
