<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassNotes extends Model
{
    //

    protected $table="class_notes";
    protected $fillable=[
        'clas_id',
        'date',
        'notes',
        'video_link',
        'clas_id',
    ];

    public function clas()
    {
        return $this->belongsTo(Clas::class, 'clas_id'); // Foreign key in 'class_notes' table
    }
}
