<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index() {

        return Employee::all();

    }
    public function edit(Request $request) {
        return Employee::query()
            ->where('id', $request->id)
            ->first();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
        ]);
        if ($request->id) {
            $employee = Employee::find($request->id);
            $employee->update($request->all());
            $employee->departments()->attach($request->departments);
        } else {
            $employee = new Employee($request->all());
            $employee->save();
            $employee->departments()->attach($request->departments);
        }

    }

    public function delete(Request $request) {
        $id = $request->id;
        $department = Employee::find($id);
        $department->delete();
    }
}
