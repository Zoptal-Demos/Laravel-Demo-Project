<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contentmanagement extends Model
{
    use HasFactory;
    protected $table = 'contentmanagement';
    protected $fillable = [
        'privacy_policy',
        'terms',
        'content_status'
    ];
}
