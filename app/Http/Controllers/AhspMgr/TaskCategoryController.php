<?php

namespace App\Http\Controllers\AhspMgr;

use App\Http\Controllers\Controller;
use App\Models\AhspMgr\TaskCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskCategoryController extends Controller
{
    //
    public function index()
    {
        $categories = TaskCategory::orderBy('name')->get();
        return view('ahsp-mgr.task-category.index', compact('categories'));
    }

    public function create()
    {
        return $this->show();
    }

    public function show($id = null)
    {
        $data = TaskCategory::find($id);
        return view('ahsp-mgr.task-category.editor', compact('data'));
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
            'name' => 'required|unique:lib_ahsp_task_categories' . ($id ? ",name,$id" : ""),
        ], [
            'name.required' => 'Nama kategori harus diisi.',
            'name.unique' => 'Nama kategori harus unik.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['name'] = $request->name;

        if ($id) {
            TaskCategory::whereId($id)->update($data);
            $message = 'Kategori Pekerjaan telah diperbarui.';
        } else {
            TaskCategory::create($data);
            $message = 'Kategori Pekerjaan telah disimpan.';
        }

        return redirect()->to("/ahsp-mgr/task-categories")->with('success', $message);
    }

    public function destroy($id)
    {
        $category = TaskCategory::find($id);
        $category->delete();
        
        return redirect()->to("/ahsp-mgr/task-categories")->with('success', 'Kategori telah dihapus');
    }
}
