<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index() {

        return Department::all();

    }

    public function store(Request $request) {
        $department = new Department($request->all());
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $department->save();
    }

    public function delete(Request $request) {
        $id = $request->id;
        $department = Department::find($id);
        $department->delete();
    }
}