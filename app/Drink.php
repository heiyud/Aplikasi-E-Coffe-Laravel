<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $primaryKey = 'kd_menu';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "drink";
    protected $fillable=['kd_menu', 'nm_menu','gambar', 'harga'];
}
