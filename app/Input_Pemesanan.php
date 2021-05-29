<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input_Pemesanan extends Model
{
    protected $primaryKey = 'no_pesan';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "Input_Pemesanan";
    protected $fillable=['no_pesan','nm_pemesan', 'tgl_pesan', 'total'];
}
