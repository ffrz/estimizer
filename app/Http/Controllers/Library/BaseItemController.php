<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Models\Library\BaseItem;
use App\Models\Library\BaseItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseItemController extends Controller
{
    protected $redirectUrl = '/library/base-items';

    public function index()
    {
        $items = BaseItem::orderBy('name', 'asc')->get();
        return view('library.base-item.index', compact('items'));
    }

    public function create()
    {
        return $this->show();
    }

    public function show($id = null)
    {
        $data = BaseItem::find($id);
        $categories = BaseItemCategory::orderBy('name', 'asc')->get();
        return view('library.base-item.editor', compact('data', 'categories'));
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
            'name' => 'required|unique:lib_base_items' . ($id ? ",id,$id" : ''),
            'uom' => 'required',
            'brand' => 'required',
            'specification' => 'required',
            'category_id' => 'required',
        ], [
            'name.required' => 'Nama item harus diisi.',
            'name.unique' => 'Nama item harus unik.',
            'uom.required' => 'Satuan harus diisi.',
            'brand.required' => 'Merk harus diisi.',
            'specification.required' => 'Spesifikasi harus diisi.',
            'category_id.required' => 'Silahkan pilih kategori.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['name'] = $request->name;
        $data['uom'] = $request->uom;
        $data['brand'] = $request->brand;
        $data['specification'] = $request->specification;
        if ($request->category_id) {
            $data['category_id'] = $request->category_id;
        }

        if ($id) {
            BaseItem::whereId($id)->update($data);
            $message = 'Kategori telah diperbarui.';
        }
        else {
            BaseItem::create($data);
            $message = 'Kategori telah disimpan.';
        }

        return redirect()->to($this->redirectUrl)->with('success', $message);
    }

    public function destroy($id)
    {
        $item = BaseItem::find($id);
        if ($item) {
            $item->delete();
            return redirect()->to($this->redirectUrl)->with('success', 'Kategori proyek telah dihapus.');
        }

        return redirect()->to($this->redirectUrl)->with('warning', 'Kategori tidak ditemukan.');
    }
}
