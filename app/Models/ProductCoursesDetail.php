<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCoursesDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
        'type',
        'link_file',
        'task_completed',
        'created_by'
    ];

}
