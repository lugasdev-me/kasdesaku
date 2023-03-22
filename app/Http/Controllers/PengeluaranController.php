<?php

namespace App\Http\Controllers;

use App\Exports\PengeluaranExport;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

use DataTables;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengeluaran::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function($data){
                        return date('d-m-Y', strtotime($data->created_at));
                    })
                    ->editColumn('updated_at', function($data){
                        return $data->updated_at->diffForHumans();
                    })
                    ->addColumn('action', 'action.pengeluaran')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.pengeluaran.index');
    }

    public function create()
    {
        return view('pages.pengeluaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'string|max:255',
            'jumlah' => 'required|integer'
        ]);
        Pengeluaran::create($request->all());

        return redirect()->route('pengeluaran.index');
    }

    public function destroy($id)
    {
        $data = Pengeluaran::find($id);
        $data->delete();

        return back();
    }

    public function drop()
    {
        $user = Auth::user();
        if($user->role == "superadmin"){
            Pengeluaran::truncate();
            return back();
        }else{
            return abort(403);
        }        
    }

    public function edit($id)
    {
        $data = Pengeluaran::findOrFail($id);
        return view('pages.pengeluaran.edit')->with([
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Pengeluaran::findOrFail($id);
        $request->validate([
            'keterangan' => 'string|max:255',
            'jumlah' => 'required|integer'
        ]);
        $data->update($request->all());

        return redirect()->route('pengeluaran.index');
    }

    public function export()
    {
        return Excel::download(new PengeluaranExport, 'pengeluaran.xlsx');
    }
}
