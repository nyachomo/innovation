<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    //

    protected $table='student_answers';
    protected $fillable=[
        'user_id',
        'exam_id',
        'question_id',
        'student_answer',
        'score',
    ];


    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with Question
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    // Relationship with Exam
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }


}
