<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class GridController extends Controller
{
    public function indexEmployee() {
        return Employee::query()->with('departments')->get(['id', 'name', 'surname']);
    }

    public function indexDepartments() {
        return Department::query()->get(['id', 'name']);
    }

}
