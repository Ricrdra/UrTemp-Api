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
        $classroom = new classroom();
        $classroom->class_name = $request->name;
        $classroom->area = $request->area;

        $classroom->save();
        return redirect()->route('classroom.index');
    }


    public
    function show(classroom $classroom)
    {
        return view('classroom.show', compact('classroom'));
    }

    public
    function update(Request $request, classroom $classroom)
    {
        $classroom->update($request->all());
        return json_encode($classroom);
    }

    public
    function destroy(classroom $classroom)
    {
        $classroom->delete();
    }
}
