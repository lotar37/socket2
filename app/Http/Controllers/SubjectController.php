<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subject\StoreRequest;
use App\Http\Resources\Subject\SubjectResource;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $subjects = SubjectResource::collection($subjects)->resolve();
        return inertia('Subject/', compact('subjects'));
    }
    public function getSubjects()
    {
        $subjects = Subject::all()->sortBy("name");
        return SubjectResource::collection($subjects)->resolve();
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Subject::create($data);
//        return redirect()->route('homework.index');
    }
    //
}
