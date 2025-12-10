<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorksDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'second_title',
        'image1',
        'image2',
        'image3',
        'link1',
        'link2',
        'link3',
        'Description'

    ];

    public function workItem()
    {
        return $this->belongsTo(Works::class, 'post_id');
    }
}
