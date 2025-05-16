<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    //
    protected $table="clas";
    protected $fillable=[
       'clas_name',
       'clas_status',
       'clas_timetable',
    ];

    public function exams(){
        return $this->hasMany(Exam::class,'clas_id','id');
    }

    
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function notes()
    {
        return $this->hasMany(ClassNotes::class, 'clas_id'); // Foreign key in 'class_notes' table
    }

    public function timetables()
    {
        return $this->hasMany(TimeTable::class, 'clas_id'); // Foreign key in 'class_notes' table
    }
}
