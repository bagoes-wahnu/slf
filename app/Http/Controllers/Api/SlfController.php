<?php

namespace App\Http\Controllers\Api;

use Symfony\Component\HttpFoundation\Response;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Slf;
use DataTables;
use Validator;

class SlfController extends Controller
{
    public function json(Request $request){
        if ($request->ajax()) {
            $data = Slf::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        // $gid = $data->gid;
                        // dd($gid);
                        $view = route('show', $data);
                        $btn = '<input type="hidden" name="gid" id="gid" value="'.$data->gid.'">';
                        $btn = $btn . '<a href="'.$view.'" target="_blank" onclick="show_json('.$data->gid.')" data-gid="'.$data->gid.'" class="edit btn btn-info btn-sm mr-2 mb-2">
                        View
                        </a>';
                        $btn = $btn . '<a href="javascript:void(0)" onclick="edit_json('.$data->gid.')" data-gid="'.$data->gid.'" data-toggle="modal" data-target="#modal-lg" class="edit btn btn-primary btn-sm mr-2 mb-2">
                        Update
                        </a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('home1');
    }
    public function show_json($gid)
    {
        $aspects = Slf::find($gid);
        // dd($aspects);
        return response()->json($aspects);
    }

    public function store_json(Request $request)
    {
        // dd(Pengaduan::where('id', $request->id)->exists());
        // $last3 = DB::table('pengaduan')->latest('id')->select('id')->first();
        // dd($last3->id);
        if ($request->hasFile('file_sk_slf')) {
            if (Storage::exists('public/file_sk_slf/'.$request->emp_file_sk_slf)) {
                Storage::delete('public/file_sk_slf/'.$request->emp_file_sk_slf);
            }
            $image = $request->file('file_sk_slf');
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/file_sk_slf', $fileName);
        }else {
            $fileName = $request->emp_file_sk_slf;
        }
        if ($request->hasFile('file_surat_pernyataan')) {
            if (Storage::exists('public/file_surat_pernyataan/'.$request->emp_file_surat_pernyataan)) {
                Storage::delete('public/file_surat_pernyataan/'.$request->emp_file_surat_pernyataan);
            }
            $image2 = $request->file('file_surat_pernyataan');
            $fileName2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
            $image2->storeAs('public/file_surat_pernyataan', $fileName2);
        }else {
            $fileName2 = $request->emp_file_surat_pernyataan;
        }
        if ($request->hasFile('file_imb')) {
            if (Storage::exists('public/file_imb/'.$request->emp_file_imb)) {
                Storage::delete('public/file_imb/'.$request->emp_file_imb);
            }
            $image3 = $request->file('file_imb');
            $fileName3 = date('YmdHis') . "." . $image3->getClientOriginalExtension();
            $image3->storeAs('public/file_imb', $fileName3);
        }else {
            $fileName3 = $request->emp_file_imb;
        }
        if ($request->hasFile('file_gambar_as_build')) {
            if (Storage::exists('public/file_gambar_as_build/'.$request->emp_file_gambar_as_build)) {
                Storage::delete('public/file_gambar_as_build/'.$request->emp_file_gambar_as_build);
            }
            $image4 = $request->file('file_gambar_as_build');
            $fileName4 = date('YmdHis') . "." . $image4->getClientOriginalExtension();
            $image4->storeAs('public/file_gambar_as_build', $fileName4);
        }else {
            $fileName4 = $request->emp_file_gambar_as_build;
        }
        if (Slf::where('gid', $request->gid)->exists()) {
            $slf = Slf::findOrFail($request->gid);
            $slf->no_sk_slf = $request->no_sk_slf;
            $slf->tgl_slf = $request->tgl_slf;
            $slf->jenis_slf = $request->jenis_slf;
            $slf->nama_bangunan = $request->nama_bangunan;
            $slf->no_persetujuan_teknis = $request->no_persetujuan_teknis;
            $slf->nama_pemohon_slf = $request->nama_pemohon_slf;
            $slf->peruntukan = $request->peruntukan;
            $slf->kelurahan = $request->kelurahan;
            $slf->kecamatan = $request->kecamatan;
            $slf->no_imb = $request->no_imb;
            $slf->tgl_imb = $request->tgl_imb;
            $slf->atas_nama = $request->atas_nama;
            $slf->nama_pemohon_imb = $request->nama_pemohon_imb;
            $slf->alamat_persil_imb = $request->alamat_persil_imb;
            $slf->penggunaan_bangunan = $request->penggunaan_bangunan;
            $slf->luas_bangunan = $request->luas_bangunan;
            $slf->jumlah_lantai = $request->jumlah_lantai;
            $slf->file_sk_slf = $fileName;
            $slf->file_surat_pernyataan = $fileName2;
            $slf->file_imb = $fileName3;
            $slf->file_gambar_as_build = $fileName4;
            $slf->save();
        }else {
            Slf::create([
                'gid' => Helper::IDGenerator(new Slf,'gid',5),
                // 'id' => $id,
                'no_sk_slf' => $request->no_sk_slf,
                'tgl_slf' => $request->tgl_slf,
                'jenis_slf' => $request->jenis_slf,
                'nama_bangunan' => $request->nama_bangunan,
                'no_persetujuan_teknis' => $request->no_persetujuan_teknis,
                'nama_pemohon_slf' => $request->nama_pemohon_slf,
                'peruntukan' => $request->peruntukan,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'no_imb' => $request->no_imb,
                'tgl_imb' => $request->tgl_imb,
                'atas_nama' => $request->atas_nama,
                'nama_pemohon_imb' => $request->nama_pemohon_imb,
                'alamat_persil_imb' => $request->alamat_persil_imb,
                'penggunaan_bangunan' => $request->penggunaan_bangunan,
                'luas_bangunan' => $request->luas_bangunan,
                'jumlah_lantai' => $request->jumlah_lantai,
                'file_sk_slf' => $fileName,
                'file_surat_pernyataan' => $fileName2,
                'file_imb' => $fileName3,
                'file_gambar_as_build' => $fileName4,
            ]);
        }       

        return response()->json(['success'=>'Data Pengaduan saved successfully.']);
    }
    public function delete_json($id)
    {
        Slf::find($id)->delete();
      
        return response()->json(['success'=>'Data Pengaduan deleted successfully.']);
    }
    public function search_json(Request $request){
        // dd($request->all());
        if ($request->ajax()) {
            // dd($request->kolom);
            $data = Slf::select('*')->limit(10000);
            if ($request->kolom != '' && $request->nilai != '') {
                // dd($data->where("'$request->kolom'" == 1));
                $data = $data->where($request->kolom, $request->nilai);
                // ->where('nama_lengkap', 'LIKE', '%' . request()->q . '%')
                // dd($data);
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        // $gid = $data->gid;
                        // dd($gid);
                        $view = route('show', $data);
                        $btn = '<input type="hidden" name="gid" id="gid" value="'.$data->gid.'">';
                        $btn = $btn . '<a href="'.$view.'" target="_blank" onclick="show_json('.$data->gid.')" data-gid="'.$data->gid.'" class="edit btn btn-info btn-sm mr-2 mb-2">
                        View
                        </a>';
                        $btn = $btn . '<a href="javascript:void(0)" onclick="edit_json('.$data->gid.')" data-gid="'.$data->gid.'" data-toggle="modal" data-target="#modal-lg" class="edit btn btn-primary btn-sm mr-2 mb-2">
                        Update
                        </a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // return view('home2');
        return response()->json(['success'=>'Data Ditemukan.']);
    }
}
