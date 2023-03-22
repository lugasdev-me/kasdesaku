<?php

namespace App\Http\Controllers;

use App\Exports\PemasukanExport;
use App\Models\Pemasukan;
use Illuminate\Http\Request;

use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class PemasukanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pemasukan::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function($data){
                        return date('d-m-Y', strtotime($data->created_at));
                    })
                    ->editColumn('updated_at', function($data){
                        return $data->updated_at->diffForHumans();
                    })
                    ->addColumn('action', 'action.pemasukan')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.pemasukan.index');
    }

    public function create()
    {
        return view('pages.pemasukan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'string|max:255',
            'jumlah' => 'required|integer'
        ]);
        Pemasukan::create($request->all());

        return redirect()->route('pemasukan.index');
    }

    public function destroy($id)
    {
        $data = Pemasukan::find($id);
        $data->delete();

        return back();
    }

    public function drop()
    {
        $user = Auth::user();
        if($user->role == "superadmin"){
            Pemasukan::truncate();
            return back();
        }else{
            return abort(403);
        }        
    }

    public function edit($id)
    {
        $data = Pemasukan::findOrFail($id);
        return view('pages.pemasukan.edit')->with([
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Pemasukan::findOrFail($id);
        $request->validate([
            'keterangan' => 'string|max:255',
            'jumlah' => 'required|integer'
        ]);
        $data->update($request->all());

        return redirect()->route('pemasukan.index');
    }

    public function export()
    {
        return Excel::download(new PemasukanExport, 'pemasukan.xlsx');
    }
}
