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

    public function index(): StudentCollection
    {
        return new StudentCollection(Student::all());
    }


    public function store(Request $request): StudentResource
    {
        $personId = WithPerson::store($request);
        $request->merge(['id' => $personId]);
        $student = Student::create($request->all());

        return new StudentResource($student);
    }

    public function show(Student $student)
    {
        return new StudentResource($student);


    }

    public
    function update(Request $request, Student $student): StudentResource
    {
        $student->update($request->all());
        return new StudentResource($student);
    }

    public
    function destroy(Student $student)
    {
        WithPerson::delete($student->person);
        $student->delete();
    }
}
