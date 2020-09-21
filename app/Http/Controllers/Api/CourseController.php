<?php

namespace App\Http\Controllers\Api;

use App\Filters\Course\CourseFilters;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(Request $request){

        $courses = new CourseResource(
            Course::with(['subjects', 'users'])->filter($request, $this->getFilters())->paginate(2)
        );

        return $courses;

    }

    protected function getFilters()
    {
        return [
            //
        ];
    }

    public function filters()
    {
        return response()->json([
            'data' => CourseFilters::mapping()
        ], 200) ;
    }

}
