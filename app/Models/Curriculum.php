<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculum extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'curriculums';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip_code',
        'linkedin',
        'github',
        'portfolio',
        'objective',
        'skills',
        'experience',
        'education',
        'certifications',
        'languages',
        'hobbies',
    ];

    // Get the user that owns the curriculum.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
