<?php

namespace App\Http\Controllers;

use App\Http\Requests\Homework\StoreRequest;
use App\Http\Resources\Homework\HomeworkResource;
use App\Models\Homework;
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

    public function create()
    {
        return inertia('Homework/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data["set_for_date"] = Carbon::parse($data["set_for_date"])->format('Y-m-d');
        Homework::create($data);
        return redirect()->route('homework.index');
    }
    //
}
