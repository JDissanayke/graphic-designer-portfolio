<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    use HasFactory;

     protected $fillable = ['title', 'image','status'];

     public function details()
     {
         return $this->hasOne(WorksDetails::class, 'post_id', 'id');
     }
}

