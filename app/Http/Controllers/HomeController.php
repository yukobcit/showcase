<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function home()
    {   
        $project = Project::inRandomOrder()->first();
        $sub_projects = Project::inRandomOrder()->whereNotIn('id', [$project->id])->take(3)->get();
        return view('home', ['project' => $project, 'sub_projects' => $sub_projects]);
    }
        
    public function about()
    {
        return view('about');
        }
}
