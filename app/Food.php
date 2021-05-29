<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $primaryKey = 'kd_menu';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "food";
    protected $fillable=['kd_menu', 'nm_menu','gambar', 'harga'];
}
