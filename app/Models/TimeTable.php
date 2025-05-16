<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    //
    protected $table="time_tables";
    protected $fillable=[
       'clas_id',
       'time_table',
    ];

    public function clas()
    {
        return $this->belongsTo(Clas::class, 'clas_id'); // Foreign key in 'class_notes' table
    }
}
