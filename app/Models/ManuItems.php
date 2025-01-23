<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManuItems extends Model
{
    protected $table = 'menuitems';
    protected $fillable = ['name', 'price', 'description', 'photo_url', 'category_id', 'is_available', 'popularity_score'];



}
