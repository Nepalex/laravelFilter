<?php


namespace App\Filters\Course;


use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterAbstract;

class SubjectFilter extends FilterAbstract
{

    public function filter(Builder $builder, $value)
    {
        $result = $builder->whereHas('subjects', function (Builder $builder) use ($value){
            $builder->where('slug', $value);
        });

        return $result;
    }
}
