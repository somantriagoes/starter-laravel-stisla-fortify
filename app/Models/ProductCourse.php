<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'language',
        'course_level',
        'description',
        'lecturer_id',
        'discount_id',
        'price',
        'series',
        'image_ads',
        'rating',
        'duration',
        'created_by'
    ];

    // public function lecturers(){
    //     return $this->hasMany("App\Models\Lecturer", "id");
    // }

    // public function categories(){
    //     return $this->hasMany("App\Models\Category", "id");
    // }

    public function lecturers(){
        return $this->belongsTo("App\Models\Lecturer", "lecturer_id");
    }

    public function categories(){
        return $this->belongsTo("App\Models\Category", "category_id");
    }

    public function discounts(){
        return $this->belongsTo("App\Models\Discount", "discount_id");
    }
}
