<?php


namespace App\Filters\Course;


use Illuminate\Database\Eloquent\Builder;

class TypeFilter extends \App\Filters\FilterAbstract
{
    public function mappings()
    {
        $mappings = [
            'theory' => 'theory',
            'project' => 'project',
            'snippet' => 'snippet',
        ];

        return $mappings;
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        if ($value === null){
            return $builder;
        }

        $item = $builder->where('type', $value);

        return $item;
    }
}
