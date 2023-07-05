<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $data = Project::where('user_id', Auth::id())->get();
        return view('project.index', compact('data'));
    }

    public function create()
    {
        return view('project.editor');
    }

    public function edit($id)
    {
        $data = Project::find($id);
        return view('project.editor', compact('data'));
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
            'address' => 'required',
            'owner' => 'required',
            'year' => 'required|integer',
            'fee' => 'nullable|decimal:0,100',
            'tax' => 'nullable|decimal:0,100',
            'text' => 'nullable',
        ], [
            'name.required' => 'Nama harus diisi.',
            'address.required' => 'Alamat harus diisi.',
            'owner.required' => 'Pemilik harus diisi.',
            'year.required' => 'Tahun harus diisi.',
            'fee.decimal' => 'Nilai Fee tidak benar.',
            'tax.decimal' => 'Nilai Pajak tidak benar.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['owner'] = $request->owner;
        $data['year'] = $request->year;
        $data['fee'] = $request->fee;
        $data['tax'] = $request->tax;
        $data['notes'] = $request->notes ? $request->notes : '';
        $data['user_id'] = Auth::id();

        if ($id) {
            Project::whereId($id)->update($data);
            $message = 'Rekaman proyek telah diperbarui.';
        }
        else {
            Project::create($data);
            $message = 'Rekaman proyek telah disimpan.';
        }

        return redirect()->to('/projects')->with('success', $message);
    }

    public function delete($id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->delete();
        }
        
        return redirect()->to('/projects')->with('success', 'Rekaman proyek telah dihapus.');
    }
}
