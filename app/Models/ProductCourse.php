<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'lecturer_id',
        'discount',
        'price',
        'image_file',
        'link_file',
    ];

    public function lecturers(){
        return $this->hasMany("App\Models\Lecturer");
    }

    public function categories(){
        return $this->hasMany("App\Models\Category");
    }

}
