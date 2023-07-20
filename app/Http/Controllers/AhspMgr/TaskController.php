<?php

namespace App\Http\Controllers\AhspMgr;

use App\Http\Controllers\Controller;
use App\Models\AhspMgr\Task;
use App\Models\AhspMgr\TaskCategory;
use App\Models\AhspMgr\TaskGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Task::query();
        $groups = TaskGroup::orderBy('name', 'asc')->get();
        $group_id = (int)$request->group_id;
        if ($group_id) {
            $query->where('group_id', '=', $group_id);
        }
        $tasks = $query->orderBy('name', 'asc')->get();
        return view('ahsp-mgr.task.index', compact('tasks', 'groups', 'group_id'));
    }

    public function create()
    {
        return $this->show();
    }

    public function show($id = null)
    {
        $data = Task::find($id);
        $groups = TaskGroup::orderBy('name', 'asc')->get();
        $categories = TaskCategory::orderBy('name', 'asc')->get();
        return view('ahsp-mgr.task.editor', compact('data', 'groups', 'categories'));
    }

    public function store(Request $request)
    {
        return $this->save($request);
    }

    public function update(Request $request, $id)
    {
        return $this->save($request, $id);
    }

    public function save(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'group_id' => 'required',
            'category_id' => 'required',
            'uom' => 'required',
        ], [
            'name.required' => 'Nama pekerjaan harus diisi.',
            'group_id.required' => 'Grup harus diisi.',
            'category_id.required' => 'Kategori harus diisi.',
            'uom.required' => 'Satuan  harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['name'] = $request->name;
        $data['group_id'] = $request->group_id;
        $data['category_id'] = $request->category_id;
        $data['uom'] = $request->uom;

        if ($id) {
            Task::whereId($id)->update($data);
            $message = 'Pekerjaan telah diperbarui.';
        } else {
            Task::create($data);
            $message = 'Pekerjaan telah disimpan.';
        }

        return redirect()->to("/ahsp-mgr/tasks")->with('success', $message);
    }

    public function destroy($id)
    {
        $category = Task::find($id);
        $category->delete();

        return redirect()->to("/ahsp-mgr/tasks")->with('success', 'Pekerjaan telah dihapus');
    }
}
