<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_pasien extends Model
{
    protected $fillable = ['nis','nama','keterangan','obat','jumlah_obat','tanggal_masuk','bulan'];
}
