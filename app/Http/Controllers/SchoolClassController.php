<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchollClass\StoreRequest;
use App\Http\Resources\SchollClass\SchollClassResource;
use App\Models\SchollClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $homeworks = SchollClass::all();
        $homeworks = SchollClassResource::collection($homeworks)->resolve();
        return inertia('SchollClass/Index', compact('homeworks'));
    }

    public function create()
    {
        return inertia('SchollClass/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data["set_for_date"] = Carbon::parse($data["set_for_date"])->format('Y-m-d');
        SchollClass::create($data);
        return redirect()->route('homework.index');
    }
    //
}
