<?php

namespace App\Http\Controllers;

use App\Models\JobPosts;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response {
        $jobs = JobPosts::all();

        return Inertia::render('Dashboard', compact('jobs'));
    }
}
