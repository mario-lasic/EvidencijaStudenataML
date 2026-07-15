<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::query()
            ->orderBy('prezime')
            ->orderBy('ime')
            ->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validateStudent($request);

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student je uspješno dodan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $this->validateStudent($request);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student je uspješno ažuriran.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student je uspješno obrisan.');
    }

    private function validateStudent(Request $request): array
    {
        return $request->validate(
            [
                'ime' => [
                    'required',
                    'string',
                    'min:2',
                    'max:255',
                ],

                'prezime' => [
                    'required',
                    'string',
                    'min:2',
                    'max:255',
                ],

                'status' => [
                    'required',
                    'in:redovni,izvanredni'
                ],

                'godiste' => [
                    'required',
                    'integer',
                    'between:1980,' . date('Y'),
                ],

                'prosjek' => [
                    'required',
                    'numeric',
                    'between:1,5',
                ],

                'stipendija' => [
                    'required',
                    'numeric',
                    'min:0',
                ],
            ],
        );
    }
}
