<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRegistration extends Model
{
    use HasFactory;
    protected $fillable = [
        'cname',
        'caddress',
        'cnumber',
        'cfax',
        'cmail',
        'curl',
        'cregistration',
        'cpan',
        'name',
        'phone',
        'email',
        'designation',
        'slug',
        'status',
        'agreement',
    ];
}
