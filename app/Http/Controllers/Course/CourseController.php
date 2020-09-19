<?php

namespace App\Http\Controllers\Course;

use App\Filters\DifficultyFilter;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(Request $request){

        $item = Course::with('subjects')->filter($request, $this->getFilters())->get();

        return $item;

    }

    protected function getFilters()
    {
        return [
            //
        ];
    }
}
