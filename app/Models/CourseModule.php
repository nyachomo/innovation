<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModule extends Model
{
    //
    protected $table='course_modules';
    protected $fillable=[
        'course_id',
        'module_name',
        'module_content',
    ];

    public function topics(){
        return $this->hasMany(Topic::class);
    }
}
