<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $project = Project::paginate(3);

        return view('project/index', [
            'project' => $project,
            'modalView' => ['Create', 'Edit', 'Delete']
        ]);
    }

    public function create() {
        $status = ["Belum Dikerjakan", "Sedang Dikerjakan", "Menunggu Diterima", "Sudah Selesai"];
        return view('project/create', [
            'status' => $status
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $slug = Str::slug($request->nama);
        DB::table('projects')->insert([
            'project_name' => $request->project_name,
            'slug' => $slug,
            'project_division' => $request->project_division,
            'project_client' => $request->project_client,
            'project_status' => $request->project_status,
            'project_budget' => $request->project_budget,
            'project_description' => $request->project_description,
        ]);

        Session::flash('message', 'Proyek berhasil ditambahkan');

        return redirect()->to('/project');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $project = DB::table('projects')->where('slug', $slug)->first();

        return view('project/detail', [
            'project' => $project,
        ]);
    }

    public function edit($id) {
        $status = ["Belum Dikerjakan", "Sedang Dikerjakan", "Menunggu Diterima", "Sudah Selesai"];
        $project = Project::findOrFail($id);

        return view('project.edit', [
            'project' => $project,
            'status' => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        $slug = Str::slug($request->nama);

        DB::table('projects')->where('id', $id)->update([
            'nama' => $request->nama,
            'slug' => $slug,
            'tim' => $request->tim,
            'klien' => $request->klien,
            'status' => $request->status,
            'anggaran' => $request->anggaran,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->to('/project')->with('success', 'Proyek berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Project::find($id)->delete();

        return redirect()->to('/project');
    }
}
