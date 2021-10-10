<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index() {
        return Department::all();
    }

    public function edit(Request $request) {
        return Department::find($request->id);
    }

    public function store(Request $request) {
        $department = Department::find($request->id);
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $department->name = $request->name;
        $department->save();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $department = Department::find($id);
        $department->delete();
    }
}
