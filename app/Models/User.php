<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'secondname',
        'lastname',
        'phonenumber',
        'email',
        'gender',
        'status',
        'role',
        'profile_image',

        'has_paid_reg_fee',
        'date_paid_reg_fee',
        'reg_fee_ref_no',

        'school_id',
        'course_id',
        'clas_id',
        'is_admin',
        'is_principal',
        'is_deputy_principal',
        'is_registrar',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function clas()
    {
        return $this->belongsTo(Clas::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class); 
    }

    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class, 'user_id');
    }
}
