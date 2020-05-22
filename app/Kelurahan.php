<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $fillable = ['kecamatan_id','nama_klrhn'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function umkm()
    {
        return $this->hasMany(UMKM::class);
    }
}
