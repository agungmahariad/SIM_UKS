<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_obat extends Model
{
    protected $fillable = ['obat','stok','kegunaan','expire'];
}
