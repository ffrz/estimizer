<?php

namespace App\Http\Controllers\AhspMgr;

use App\Http\Controllers\Controller;
use App\Models\AhspMgr\BaseItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseItemCategoryController extends Controller
{
    protected $redirectUrl = '/ahsp-mgr/base-item-categories';

    public function index()
    {
        $categories = BaseItemCategory::orderBy('name', 'asc')->get();
        return view('ahsp-mgr.base-item-category.index', compact('categories'));
    }

    public function create()
    {
        return $this->show();
    }

    public function show($id = null)
    {
        $data = BaseItemCategory::find($id);
        return view('ahsp-mgr.base-item-category.editor', compact('data'));
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
            'name' => 'required|unique:lib_base_item_categories' . ($id ? ",name,$id" : ''),
        ], [
            'name.required' => 'Nama harus diisi.',
            'name.unique' => 'Nama harus unik.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['name'] = $request->name;

        if ($id) {
            BaseItemCategory::whereId($id)->update($data);
            $message = 'Kategori telah diperbarui.';
        }
        else {
            BaseItemCategory::create($data);
            $message = 'Kategori telah disimpan.';
        }

        return redirect()->to($this->redirectUrl)->with('success', $message);
    }

    public function destroy($id)
    {
        $item = BaseItemCategory::find($id);
        if ($item) {
            $item->delete();
            return redirect()->to($this->redirectUrl)->with('success', 'Kategori telah dihapus.');
        }

        return redirect()->to($this->redirectUrl)->with('warning', 'Kategori tidak ditemukan.');
    }
}
