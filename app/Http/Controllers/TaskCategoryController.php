<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\TaskCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskCategoryController extends Controller
{
    //
    public function index($project_id)
    {
        $project = Project::find($project_id);
        $categories = $project->taskCategories()->orderBy('priority')->orderBy('name')->get();
        return view('task-category.index', compact('project', 'categories'));
    }

    public function add($project_id)
    {
        $project = Project::find($project_id);
        return view('task-category.editor', compact('project'));
    }

    public function edit($project_id, $id)
    {
        $project = Project::find($project_id);
        $data = TaskCategory::find($id);
        return view('task-category.editor', compact('project', 'data'));
    }

    public function update(Request $request, $project_id, $id = 0)
    {
        $project = Project::find($project_id);
        if (!$project) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'priority' => 'required|integer:0,99',
        ], [
            'name.required' => 'Nama harus diisi.',
            'priority.required' => 'Nomor urut harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['name'] = $request->name;
        $data['priority'] = $request->priority;
        $data['project_id'] = $project_id;

        if ($id) {
            TaskCategory::whereId($id)->update($data);
            $message = 'Kategori Pekerjaan telah diperbarui.';
        } else {
            TaskCategory::create($data);
            $message = 'Kategori Pekerjaan telah disimpan.';
        }

        return redirect()->to("/projects/$project_id/task-categories")->with('success', $message);
    }

    public function process(Request $request, $project_id, $id)
    {
        $project = Project::find($project_id);
        $category = TaskCategory::find($id);

        if ($request->do == 'delete') {
            $category->delete();
            return redirect()->to("/projects/$project_id/task-categories")->with('success', 'Kategori telah dihapus');
        }

        abort(404);
    }
}
