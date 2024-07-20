<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContactUs extends Model
{
    use HasFactory;

    // Define fillable attributes if needed
    protected $fillable = [
        'name',
        'email',
        'message',
    ];

}
