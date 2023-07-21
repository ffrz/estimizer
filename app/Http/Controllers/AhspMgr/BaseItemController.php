<?php

namespace App\Http\Controllers\AhspMgr;

use App\Http\Controllers\Controller;
use App\Models\AhspMgr\BaseItem;
use App\Models\AhspMgr\BaseItemCategory;
use App\Models\AhspMgr\BaseItemGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseItemController extends Controller
{
    protected $redirectUrl = '/ahsp-mgr/base-items';

    public function index(Request $request)
    {
        $query = BaseItem::query();
        $groups = BaseItemGroup::orderBy('name', 'asc')->get();
        $group_id = $request->group_id;
        $type = $request->type;

        if ($group_id == null) {
            $group_id = $request->session()->get('ahsp-mgr.base-item.filter.group_id', 0);
        }
        if ($type == null) {
            $type = $request->session()->get('ahsp-mgr.base-item.filter.type', 0);
        }
        
        if ($group_id > 0) {
            $query->where('group_id', '=', $group_id);
        }
        $query->where('type', '=', $type);
        $items = $query->orderBy('type', 'asc')->orderBy('name', 'asc')->get();

        $request->session()->put('ahsp-mgr.base-item.filter.type', $type);
        $request->session()->put('ahsp-mgr.base-item.filter.group_id', $group_id);
        
        return view('ahsp-mgr.base-item.index', compact('items', 'groups', 'group_id', 'type'));
    }

    public function create()
    {
        return $this->show();
    }

    public function show($id = null)
    {
        $data = BaseItem::find($id);
        $categories = BaseItemCategory::orderBy('name', 'asc')->get();
        $groups = BaseItemGroup::orderBy('name', 'asc')->get();
        return view('ahsp-mgr.base-item.editor', compact('data', 'categories', 'groups'));
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
            'group_id' => 'required',
            'price' => 'required',
            'source' => 'required',
        ], [
            'name.required' => 'Nama item harus diisi.',
            'name.unique' => 'Nama item harus unik.',
            'uom.required' => 'Satuan harus diisi.',
            'brand.required' => 'Merk harus diisi.',
            'specification.required' => 'Spesifikasi harus diisi.',
            'category_id.required' => 'Silahkan pilih kategori.',
            'group_id.required' => 'Silahkan pilih grup.',
            'price.required' => 'Harga harus diisi.',
            'source.required' => 'Sumber data harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['type'] = $request->type;
        $data['group_id'] = $request->group_id;
        $data['name'] = $request->name;
        $data['uom'] = $request->uom;
        $data['brand'] = $request->brand;
        $data['specification'] = $request->specification;
        $data['source'] = $request->source;
        $data['price'] = $request->price;
        $data['category_id'] = $request->category_id;

        if ($id) {
            BaseItem::whereId($id)->update($data);
            $message = 'Item telah diperbarui.';
        }
        else {
            BaseItem::create($data);
            $message = 'Item telah disimpan.';
        }

        return redirect()->to($this->redirectUrl)->with('success', $message);
    }

    public function destroy($id)
    {
        $item = BaseItem::find($id);
        if ($item) {
            $item->delete();
            return redirect()->to($this->redirectUrl)->with('success', 'Item telah dihapus.');
        }

        return redirect()->to($this->redirectUrl)->with('warning', 'Item tidak ditemukan.');
    }
}
