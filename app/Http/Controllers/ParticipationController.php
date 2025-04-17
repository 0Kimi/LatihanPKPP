<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Register;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Participation;

class ParticipationController extends Controller
{
    
    public function index()
    {
        $participations = Participation::with(['register', 'department'])->get();
        return view('participations.index', compact('participations'));
    }

    public function create()
    {
        $registers = Register::all();
        $departments = Department::all();
        $employees = Employee::all();
        return view('participations.create', compact('registers', 'departments', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'register_id' => 'required',
            'department_id' => 'required',
            'employees' => 'required|array',
        ]);

        $participation = Participation::create($request->only(['register_id', 'department_id']));
        $participation->employees()->sync($request->input('employees', []));

        return redirect()->route('participations.index')->with('success', 'Participation created successfully.');
    }

    public function edit($id)
    {
        $participation = Participation::with(['register', 'department', 'employees'])->findOrFail($id);
        $registers = Register::all();
        $departments = Department::all();
        $employees = Employee::all();

        return view('participations.edit', compact('participation', 'registers', 'departments', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'register_id' => 'required',
            'department_id' => 'required',
            'employees' => 'required|array',
        ]);

        $participation = Participation::findOrFail($id);
        $participation->update($request->only(['register_id', 'department_id']));
        $participation->employees()->sync($request->input('employees', []));

        return redirect()->route('participations.index')->with('success', 'Participation updated successfully.');
    }

    public function destroy($id)
    {
        $participation = Participation::findOrFail($id);
        $participation->delete();

        return redirect()->route('participations.index')->with('success', 'Participation deleted successfully.');
    }
}