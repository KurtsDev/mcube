<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index() {

        return Employee::all();

    }

    public function store(Request $request) {
        $department = new Employee($request->all());

        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
        ]);
        $department->save();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $department = Employee::find($id);
        $department->delete();
    }
}
