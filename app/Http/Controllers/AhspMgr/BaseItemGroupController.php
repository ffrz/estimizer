<?php

namespace App\Http\Controllers\AhspMgr;

use App\Http\Controllers\Controller;
use App\Models\AhspMgr\BaseItemGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseItemGroupController extends Controller
{
    //
    public function index()
    {
        $groups = BaseItemGroup::orderBy('name')->get();
        return view('ahsp-mgr.base-item-group.index', compact('groups'));
    }

    public function create()
    {
        return $this->show();
    }

    public function show($id = null)
    {
        $data = BaseItemGroup::find($id);
        return view('ahsp-mgr.base-item-group.editor', compact('data'));
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
            'name' => 'required|unique:lib_ahsp_task_groups' . ($id ? ",name,$id" : ""),
        ], [
            'name.required' => 'Nama harus diisi.',
            'name.unique' => 'Nama harus unik.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['name'] = $request->name;

        if ($id) {
            BaseItemGroup::whereId($id)->update($data);
            $message = 'Kelompok telah diperbarui.';
        } else {
            BaseItemGroup::create($data);
            $message = 'Kelompok telah disimpan.';
        }

        return redirect()->to("/ahsp-mgr/base-item-groups")->with('success', $message);
    }

    public function destroy($id)
    {
        $category = BaseItemGroup::find($id);
        $category->delete();

        return redirect()->to("/ahsp-mgr/base-item-groups")->with('success', 'Kelompok telah dihapus');
    }
}
