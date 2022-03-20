<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    public function index()
    {
        $classrooms = classroom::all();
        return view('classroom.index', compact('classrooms'));
    }


    public
    function store(Request $request)
    {
    }

    public
    function show(classroom $classroom)
    {

    }

    public
    function update(Request $request, classroom $classroom)
    {
        //
    }

    public
    function destroy(classroom $classroom)
    {
        //
    }
}
