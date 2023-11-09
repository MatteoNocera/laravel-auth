<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $total_projects = Project::all()->count();
        $total_users = User::all()->count();

        return view('admin.dashboard', compact('user', 'total_projects', 'total_users'));
    }
}
