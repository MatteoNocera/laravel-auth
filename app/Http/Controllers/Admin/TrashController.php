<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function trash()
    {
        $projects = Project::onlyTrashed()->orderByDesc('id')->get();
        //dd($projects);
        return view('admin.projects.trash', compact('projects'));
    }
}
