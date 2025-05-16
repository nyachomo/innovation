<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table='courses';
    protected $fillable=[
        'course_name',
        'course_level',
        'course_duration',
        'course_price',
        'course_status',
        'course_intoduction_text',
        'course_description',
        'course_two_like',
        'course_one_like',
        'course_not_interested',
        'course_inclusion',
        'course_leaners_already_enrolled',
        'what_to_learn',
        'course_image',
        'course_publisher_name',
        'course_publisher_description',
        'course_publisher_image',
        'course_outline',

    ];

        public function users()
        {
            return $this->hasMany(User::class);
        }

        public function exams(){
            return $this->hasMany(Exam::class,'course_id','id');
        }

        public function leeds()
    {
        return $this->hasMany(Leed::class);
    }

}
