<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolClass\StoreRequest;
use App\Http\Resources\SchoolClass\SchoolClassResource;
use App\Models\SchoolClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();
        $classes = SchoolClassResource::collection($classes)->resolve();
        return inertia('SchoolClass/', compact('classes'));
    }
    public function getClasses()
    {
        $classes = SchoolClass::all()->sortBy("name");
        return SchoolClassResource::collection($classes)->resolve();
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        SchoolClass::create($data);
//        return redirect()->route('homework.index');
    }
    //
}
