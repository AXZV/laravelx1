<?php

namespace App\Http\Controllers\crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\crud;


class crudController extends Controller
{
    public function __construct() {
        $this->konverter = 'App\Http\Controllers\Konverter\KonverterController';
    }

    public function crud()
    {
        $data=crud::all();
        $totalsaldox = crud::where('nomor_telepon','08133737549')->sum('saldo');
        $totalsaldo = app()->call($this->konverter.'@normal', [$totalsaldox]);
        return view('/crud/crud', compact('data','totalsaldo'));
    }

   
    public function crud_add(Request $request)
    {
        $saldofix=$request->get('saldo');

        $data = new crud;
        $data->nama_siswa=$request->get('nama');
        $data->alamat=$request->get('alamat');
        $data->nomor_telepon=$request->get('telepon');
        $data->saldo=app()->call($this->konverter.'@nonnormal', [$saldofix]);
        $data->save();

        return redirect()->back()->with('successadd', true);
    }

    public function crud_del($id)
    {
        $data=crud::find($id);
        $data->delete();
        return redirect()->back()->with('successdell', true);
    }
}
