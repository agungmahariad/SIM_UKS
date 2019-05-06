<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\tbl_login;
use App\tbl_rayon;
use App\tbl_rombel;
use App\tbl_jurusan;
use App\tbl_siswa;
use carbon\carbon;
use App\tbl_obat;
use App\tbl_pasien;

class admin extends Controller
{
    public function index()
    {
        $dt = carbon::now();
        $data['datapasien'] = tbl_pasien::where('tanggal_masuk',date('y-m-d'))->get();
        $data['hari'] = tbl_pasien::where('tanggal_masuk',date('y-m-d'))->get();
        $data['bulan'] = tbl_pasien::where('bulan','=',$dt->format('F'))->get();
        $data['dataobat']   = tbl_obat::where('stok','>',1)->where('expire','>=',date('y-m-d'))->get();
        return view('Dashboard',compact('data'));
    }

    public function pasien()
    {
        $data['datasiswa'] = tbl_siswa::all();
        $data['dataobat'] = tbl_obat::all();
        return view('pasien',compact('data'));
    }
    public function getDetailPasien($id)
    {
        $data = tbl_siswa::where('nis', $id)->first();
        return response()->json($data);
    }
    public function savepasien(Request $request)
    {
        $dt = carbon::now();
        $this->validate($request,[
            'nis'=>'required',
            'nama'=>'required',
            'keterangan'=>'required',
            'obat'=>'required',
            'jumlah'=>'required'
        ]);
        tbl_pasien::insert([
            'nis'           => $request->nis,
            'nama'          => $request->nama,
            'keterangan'    => $request->keterangan,
            'obat'          => $request->obat,
            'jumlah_obat'   => $request->jumlah,
            'tanggal_masuk' => date('y-m-d'),
            'bulan'         => $dt->format('F')
        ]);
        return redirect('dashboard')->withMessage('Data berhasil disimpan !');
    }
    public function deletepasien($id)
    {
        tbl_pasien::where('id',$id)->delete();
        return back()->withMessage('Data berhasil dihapus !');
    }

    public function laporan()
    {
        $data = tbl_pasien::all();
        return view('laporan',compact('data'));
    }
    public function excel()
    {

        $tanggal = date('y-m-d');
        header("Content-type:application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename = $tanggal-datapasien.xls");
        $data = tbl_pasien::all();
        return view('data.data-pasien',compact('data'));
    }

    public function rayon()
    {
    	$data = tbl_rayon::all();
    	return view('rayon.rayon',compact('data'));
    }
    public function createrayon()
    {
    	return view('rayon.create');
    }
    public function saverayon(Request $request)
    {
    	$this->validate($request,[
    		'rayon'=>'required',
    		'pembimbing'=>'required',
    	]);
    	tbl_rayon::insert([
    		'rayon'=> $request->rayon,
    		'pembimbing'=> $request->pembimbing
    	]);
    	return redirect('rayon')->withMessage('Data berhasil disimpan !');
    }
    public function editrayon($id_rayon)
    {
    	$data = tbl_rayon::where('id_rayon',$id_rayon)->first();
    	Session::put('rayon_lama',$data->id_rayon);
    	return view('rayon.edit',compact('data'));
    }
    public function updaterayon(Request $request, $id_rayon)
    {
    	if($request->id_rayon==session('rayon_lama')){
    		$this->validate($request,[
    			'rayon'=>'required',
    			'pembimbing'=>'required'
    		]);
    		tbl_rayon::where('id_rayon',$id_rayon)->update([
    			'rayon'=> $request->rayon,
    			'pembimbing'=> $request->pembimbing,
    		]);
    		return redirect('rayon')->withMessage('Data berhasil diubah !');
    	}else{
    		$this->validate($request,[
    			'rayon'=>'required',
    			'pembimbing'=>'required'
    		]);
    		tbl_rayon::where('id_rayon',$id_rayon)->update([
    			'rayon'=> $request->rayon,
    			'pembimbing'=> $request->pembimbing,
    		]);
    		return redirect('rayon')->withMessage('Data berhasil diubah !');
    	}
    }
    public function deleterayon($id_rayon)
    {
    	tbl_rayon::where('id_rayon',$id_rayon)->delete();
    	return back()->withMessage('Data berhasil dihapus !');
    }

    public function rombel()
    {
    	$data = tbl_rombel::all();
    	return view('rombel.rombel',compact('data'));
    }
    public function createrombel()
    {
    	return view('rombel.create');
    }
    public function saverombel(Request $request)
    {
    	$this->validate($request,[
    		'rombel'=>'required',
    		'jumlah_siswa'=>'required',
    	]);
    	tbl_rombel::insert([
    		'rombel'=> $request->rombel,
    		'jumlah_siswa'=> $request->jumlah_siswa
    	]);
    	return redirect('rombel')->withMessage('Data berhasil disimpan !');
    }
    public function editrombel($id_rombel)
    {
    	$data = tbl_rombel::where('id_rombel',$id_rombel)->first();
    	Session::put('rombel_lama',$data->id_rombel);
    	return view('rombel.edit',compact('data'));
    }
    public function updaterombel(Request $request, $id_rombel)
    {
    	if($request->id_rombel==session('rombel_lama')){
    		$this->validate($request,[
    			'rombel'=>'required',
    			'jumlah_siswa'=>'required'
    		]);
    		tbl_rombel::where('id_rombel',$id_rombel)->update([
    			'rombel'=> $request->rombel,
    			'jumlah_siswa'=> $request->jumlah_siswa,
    		]);
    		return redirect('rombel')->withMessage('Data berhasil diubah !');
    	}else{
    		$this->validate($request,[
    			'rombel'=>'required',
    			'jumlah_siswa'=>'required'
    		]);
    		tbl_rombel::where('id_rombel',$id_rombel)->update([
    			'rombel'=> $request->rombel,
    			'jumlah_siswa'=> $request->jumlah_siswa,
    		]);
    		return redirect('rombel')->withMessage('Data berhasil diubah !');
    	}
    }
    public function deleterombel($id_rombel)
    {
    	tbl_rombel::where('id_rombel',$id_rombel)->delete();
    	return back()->withMessage('Data berhasil dihapus !');
    }

    public function jurusan()
    {
    	$data = tbl_jurusan::all();
    	return view('jurusan.jurusan',compact('data'));
    }
    public function createjurusan()
    {
    	return view('jurusan.create');
    }
    public function savejurusan(Request $request)
    {
    	$this->validate($request,[
    		'jurusan'=>'required'
    	]);
    	tbl_jurusan::insert([
    		'jurusan'=> $request->jurusan
    	]);
    	return redirect('jurusan')->withMessage('Data berhasil disimpan !');
    }
    public function editjurusan($id_jurusan)
    {
    	$data = tbl_jurusan::where('id_jurusan',$id_jurusan)->first();
    	Session::put('jurusan_lama',$data->id_jurusan);
    	return view('jurusan.edit',compact('data'));
    }
    public function updatejurusan(Request $request, $id_jurusan)
    {
    	if($request->id_jurusan==session('jurusan_lama')){
    		$this->validate($request,[
    			'jurusan'=>'required'
    		]);
    		tbl_jurusan::where('id_jurusan',$id_jurusan)->update([
    			'jurusan'=> $request->jurusan
    		]);
    		return redirect('jurusan')->withMessage('Data berhasil diubah !');
    	}else{
    		$this->validate($request,[
    			'jurusan'=>'required'
    		]);
    		tbl_jurusan::where('id_jurusan',$id_jurusan)->update([
    			'jurusan'=> $request->jurusan
    		]);
    		return redirect('jurusan')->withMessage('Data berhasil diubah !');
    	}
    }
    public function deletejurusan($id_jurusan)
    {
    	tbl_jurusan::where('id_jurusan',$id_jurusan)->delete();
    	return back()->withMessage('Data berhasil dihapus !');
    }

    public function murid()
    {
    	$data = tbl_siswa::all();
    	return view('murid.murid',compact('data'));
    }
    public function createmurid()
    {
    	$data['datajurusan'] = tbl_jurusan::all();
    	$data['datarombel'] = tbl_rombel::all();
        $data['datarayon'] = tbl_rayon::all();
    	return view('murid.create',compact('data'));
    }
    public function savemurid(Request $request)
    {
    	$rules = [
    		'nis'=>'required|max:8|unique:tbl_siswas'
    	];
    	$costume = [
    		'nis.required'=>'Nis tidak boleh kosong !',
    		'nis.max'=>'Nis tidak boleh lebih atau kurang dari 6 digit !',
    		'nis.unique'=>'Nis telah dipakai !'
    	];
    	$this->validate($request,$rules,$costume);
    	tbl_siswa::insert([
    		'nis'=> $request->nis,
    		'nama'=> $request->nama,
    		'jurusan'=> $request->jurusan,
    		'rombel'=> $request->rombel,
    		'rayon'=> $request->rayon
    	]);
    	return redirect('murid')->withMessage('Data berhasil disimpan !');
    }
    public function editmurid($nis)
    {
        $datajurusan = tbl_jurusan::all();
        $datarombel = tbl_rombel::all();
        $datarayon = tbl_rayon::all();
    	$data = tbl_siswa::where('nis',$nis)->first();
    	Session::put('nis_lama',$data->nis);
    	return view('murid.edit',compact('data','datajurusan','datarombel','datarayon'));
    }
    public function updatemurid(Request $request, $nis)
    {
    	if($request->nis == session('nis_lama')){
    		$this->validate($request,[
    			'nama'=> 'required',
	    		'jurusan'=> 'required',
	    		'rombel'=> 'required',
	    		'rayon'=> 'required',
    		]);
    		tbl_siswa::where('nis',$nis)->update([
    			'nis'=> $request->nis,
    			'nama'=> $request->nama,
	    		'jurusan'=> $request->jurusan,
	    		'rombel'=> $request->rombel,
	    		'rayon'=> $request->rayon
    		]);
    		return redirect('murid')->withMessage('Data berhasil diubah !');
    	}else{
    		$this->validate($request,[
    			'nis'=>'required',
    			'nama'=> 'required',
	    		'jurusan'=> 'required',
	    		'rombel'=> 'required',
	    		'rayon'=> 'required',
    		]);
    		tbl_siswa::where('nis',$nis)->update([
    			'nis'=> $request->nis,
    			'nama'=> $request->nama,
	    		'jurusan'=> $request->jurusan,
	    		'rombel'=> $request->rombel,
	    		'rayon'=> $request->rayon
    		]);
    		return redirect('murid')->withMessage('Data berhasil diubah !');
    	}
    }
    public function deletemurid($nis)
    {
    	tbl_siswa::where('nis',$nis)->delete();
    	return back()->withMessage('Data berhasil dihapus !');
    }

    public function obat()
    {
        $data = tbl_obat::all();
        return view('obat.obat',compact('data'));
    }

    public function createobat()
    {
        $data['datajurusan'] = tbl_jurusan::all();
        $data['datarombel'] = tbl_rombel::all();
        $data['datarayon'] = tbl_rayon::all();
        return view('obat.create',compact('data'));   
    }
    public function saveobat(Request $request)
    {
        $this->validate($request,[
            'obat'=>'required',
            'kegunaan'=>'required',
            'stok'=>'required',
            'expire'=>'required'
        ]);
        tbl_obat::insert([
            'obat'=> $request->obat,
            'stok'=> $request->stok,
            'kegunaan'=> $request->kegunaan,
            'expire'=> $request->expire
        ]);
        return redirect('obat')->withMessage('Data berhasil disimpan !');
    }
    public function editobat($id_obat)
    {
        $data = tbl_obat::where('id_obat',$id_obat)->first();
        Session::put('obat_lama',$data->id_obat);
        return view('obat.edit',compact('data'));
    }
    public function updateobat(Request $request, $id_obat)
    {
        if($request->id_obat==session('obat_lama')){
            $this->validate($request,[
                'obat'=>'required',
                'kegunaan'=>'required',
                'stok'=>'required',
                'expire'=>'required'
            ]);
            tbl_obat::where('id_obat',$id_obat)->update([
                'obat'=> $request->obat,
                'stok'=> $request->stok,
                'kegunaan'=> $request->kegunaan,
                'expire'=> $request->expire
            ]);
            return redirect('obat')->withMessage('Data berhasil diubah !');
        }else{
            $this->validate($request,[
                'obat'=>'required',
                'kegunaan'=>'required',
                'stok'=>'required',
                'expire'=>'required'
            ]);
            tbl_obat::where('id_obat',$id_obat)->update([
                'obat'=> $request->obat,
                'stok'=> $request->stok,
                'kegunaan'=> $request->kegunaan,
                'expire'=> $request->expire
            ]);
            return redirect('obat')->withMessage('Data berhasil diubah !');
        }
    }
    public function deleteobat($id_obat)
    {
        tbl_obat::where('id_obat',$id_obat)->delete();
        return back()->withMessage('Data berhasil dihapus !');
    }
}
