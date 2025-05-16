<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leed extends Model
{
    //
    protected $table="leeds";
    protected $fillable=[
        'student_firstname',
        'student_lastname',
        'student_email',
        'student_phone',
        'student_gender',
        'student_school',
        'student_form',
        'comment',
        'year_data_captured',
        'parent_name',
        'parent_phone',
        'parent_email',
        'student_location',
        'is_form_four',
        'course_id',
        'school_id',
        'serial_number',
        'course_register_for',
        'scholarship_letter',
    ];

    public function school()
    {
        return $this->belongsTo(School::class,'school_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
