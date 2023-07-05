<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index($project_id)
    {
        $project = Project::find($project_id);
        $categories = $project->taskCategories()->orderBy('priority')->orderBy('name')->get();
        return view('task.index', compact('project', 'categories'));
    }
}
