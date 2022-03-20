<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Http\Traits\WithPerson;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use WithPerson;

    /**
     * Display a listing of the resource.
     *
     */
    public function index(): StudentCollection
    {
        return new StudentCollection(Student::all());
    }


    public function store(Request $request): StudentResource
    {
        WithPerson::store($request);
        $student = Student::create($request->all());
        return new StudentResource($student);
    }

    public function show(Student $student)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
