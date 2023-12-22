<?php

namespace App\Http\Controllers;

use App\Http\Requests\Homework\StoreRequest;
use App\Http\Resources\Homework\HomeworkResource;
use App\Models\Homework;
use App\Models\SchoolClass;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index()
    {
        $homeworks = Homework::all();
        $homeworks = HomeworkResource::collection($homeworks)->resolve();
        return inertia('Homework/Index', compact('homeworks'));
    }
    public function getHomeworks(SchoolClass $schoolClass, Subject $Subject)
    {
        $homeworks = Homework::all()->where("class_id", $schoolClass->id)->where('subject_id', $Subject->id);
        $homeworks = HomeworkResource::collection($homeworks)->resolve();
        return $homeworks;
//        dd($homeworks);
//        return inertia('Homework/Index', compact('homeworks'));
    }

    public function create(SchoolClass $schoolClass, Subject $Subject)
    {
//        dd($schoolClass, $Subject);
        return inertia('Homework/Create', compact('schoolClass', 'Subject'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data["set_for_date"] = Carbon::parse($data["set_for_date"])->format('Y-m-d');
        $data["user_id"] = 1;
       // dd($data);
        Homework::create($data);
        return redirect()->route('homework.index');
    }
    //
}
