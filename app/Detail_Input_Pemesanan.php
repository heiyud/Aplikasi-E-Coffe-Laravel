<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Input_Pemesanan extends Model
{
    protected $primaryKey = 'no_pesan';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "Detail_Input_Pemesanan";
    protected $fillable=['no_pesan','kd_menu','qty_pesan','sub_total'];
}
