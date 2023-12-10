<?php

namespace App\Http\Controllers;

use App\Http\Resources\Homework\HomeworkResource;
use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index()
    {
        $homeworks = Homework::all();
        $homeworks = HomeworkResource::collection($homeworks)->resolve();
        return inertia('Homework/Index', compact('homeworks'));
    }
    //
}
