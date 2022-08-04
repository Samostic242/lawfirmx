<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name','last_name','email','primary_legal_counsel','date_of_birth','case_details', 'image'
    ];
}
