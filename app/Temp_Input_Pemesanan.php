<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temp_Input_Pemesanan extends Model
{
    protected $primaryKey = 'kd_menu';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "Temp_Input_Pemesanan";
    protected $fillable=['kd_menu', 'qty_pesan'];
}
