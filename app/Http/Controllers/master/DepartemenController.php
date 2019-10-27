<?php

namespace App\Http\Controllers\master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use App\Models\Departemen;

class DepartemenController extends Controller
{
    public function link($id = null)
    {
    	if($id == null){
    		$data = null;
    	}else{
    		$data = Departemen::find($id);
    	}

    	// dd($data);
    	return view('master.departemen', ['data' => $data]);
    }

    public function data()
    {
    	$query = Departemen::select('*');

    	return Datatables::of($query)
                        ->addColumn('menu', function($model) {
                            $edit = '<a href="' . route("departemen-link", ['id' => $model->id]) . '"><button type="button" class="btn btn-sm btn-warning">Edit</button></a>';
                            $hapus = '<button type="button" onclick="hapus(' . $model->id . ')" class="btn btn-sm btn-danger">Hapus</button>';
                            return $edit . ' ' . $hapus;
                        })
                        ->rawColumns(['menu'])
                        ->make(true);
    }

    public function simpan(Request $req){
    	// dd($req);
        if($req->tipe == 1){
            $data = new Departemen;
            $data->kode = $req->kode;
            $data->nama = $req->nama;
            $data->save();
        }else{
            $data = Departemen::find($req->id);
            $data->kode = $req->kode;
            $data->nama = $req->nama;
            $data->save();
        }

        return redirect()->route('departemen-link');
    }

    public function hapus(Request $req){
    	// dd($req->id);
        Departemen::find($req->id)->delete();
        return response()->json(['hasil' => true]);
    }

}
