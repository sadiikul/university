<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramList extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_id',
        'cate_id',
        'name',
        'slug',
        'status',
        'thumb',
        'desc',
        'meta_title',
        'meta_tag',
        'meta_desc',
    ];

    public function dept()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }

    public function cate()
    {
        return $this->belongsTo(ProgramCategory::class, 'cate_id');
    }

    public function fee()
    {
        return $this->hasMany(TuitionFee::class, 'program_id', 'id');
    }

    public function curr()
    {
        return $this->hasMany(ProgramCurriculum::class, 'program_id');
    }

    public function course()
    {
        return $this->hasMany(CourseCredit::class, 'program_id');
    }

    public function subject()
    {
        return $this->hasMany(SubjectDetails::class, 'program_id');
    }

    public function tuition()
    {
        return $this->hasMany(TuitionFee::class, 'program_id');
    }
}
