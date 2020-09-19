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
        'started'
    ];

    public $hidden = [
        'users'
    ];

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
