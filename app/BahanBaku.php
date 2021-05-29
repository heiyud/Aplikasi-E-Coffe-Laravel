<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $primaryKey = 'kd_bb';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "bahanbaku";
    protected $fillable=['kd_bb', 'nm_bb', 'harga', 'stok'];
}
