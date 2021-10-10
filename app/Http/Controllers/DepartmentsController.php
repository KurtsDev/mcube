<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class DepartmentsController extends Controller
{
    public function index() {
        return Department::all();
    }

    public function edit(Request $request) {
        return Department::query()
            ->where('id', $request->id)
            ->first();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        if ($request->id) {
            $employee = Department::find($request->id);
            $employee->update($request->all());
        } else {
            $employee = new Department($request->all());
            $employee->save();
        }


    }

    public function delete(Request $request) {
        $id = $request->id;
        $department = Department::find($id);
        $department->delete();
    }
}
