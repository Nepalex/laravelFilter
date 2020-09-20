<?php

namespace App\Models;

use App\Filters\Course\CourseFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\User;

class Course extends Model
{
    protected $appends = [
        'started',
        'formattedAccess',
        'formattedDifficulty',
        'formattedType',
        'formattedStarted',
    ];

    public $hidden = [
        'users'
    ];

    public function getFormattedAccessAttribute()
    {
        return $this->free === true ? 'Free' : 'Premium';
    }

    public function getFormattedDifficultyAttribute()
    {
        return ucfirst($this->difficulty);
    }

    public function getFormattedStartedAttribute()
    {
        return $this->started === true ? 'Started' : 'Not started';
    }

    public function getFormattedTypeAttribute()
    {
        return ucfirst($this->type);
    }


    public function scopeFilter(Builder $builder, $request, array $filters = []){

        $result = (new CourseFilters($request))->add($filters)->filter($builder);

        return $result;

    }

    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }

    public function getStartedAttribute()
    {
        if (!auth()->check())
        {
            return false;
        }

        return $this->users->contains( auth()->user());
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
