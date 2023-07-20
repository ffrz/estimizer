<?php

namespace App\Http\Controllers\AhspMgr;

use App\Http\Controllers\Controller;
use App\Models\AhspMgr\BaseItem;
use App\Models\AhspMgr\Task;
use App\Models\AhspMgr\TaskDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskDetailController extends Controller
{
    //
    public function index(Request $request, $task_id)
    {
        $task = Task::find($task_id);
        $items = $task->details()->get();
        return view('ahsp-mgr.task-detail.index', compact('task', 'items'));
    }

    public function create($task_id)
    {
        return $this->show($task_id);
    }

    public function show($task_id = null, $id = null)
    {
        $data = TaskDetail::find($id);
        $items = BaseItem::orderBy('name', 'asc')->get();
        return view('ahsp-mgr.task-detail.editor', compact('data', 'task_id', 'items'));
    }

    public function store(Request $request, $task_id)
    {
        return $this->save($request, $task_id);
    }

    public function update(Request $request, $task_id, $id)
    {
        return $this->save($request, $task_id, $id);
    }

    public function save(Request $request, $task_id, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required',
            'coefficient' => 'required',
        ], [
            'item_id.required' => 'Item harus diisi.',
            'coefficient.required' => 'Koefisien harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['task_id'] = $request->task_id;
        $data['item_id'] = $request->item_id;
        $data['coefficient'] = $request->coefficient;

        if ($id) {
            TaskDetail::whereId($id)->update($data);
            $message = 'Rincian item telah diperbarui.';
        } else {
            TaskDetail::create($data);
            $message = 'Rincian item telah disimpan.';
        }

        return redirect()->to("/ahsp-mgr/tasks/$task_id/details")->with('success', $message);
    }

    public function destroy($task_id, $id)
    {
        $category = TaskDetail::find($id);
        $category->delete();

        return redirect()->to("/ahsp-mgr/tasks/$task_id/details")->with('success', 'Rincian item telah dihapus.');
    }

}
