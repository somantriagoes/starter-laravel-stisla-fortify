<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'discount',
        'active',
        'created_by'
    ];

    public function product(){
        return $this->hasMany("App\Models\ProductCourse", "id")->withDefault([
            'discount_id' => '',
        ]);
    }

}
