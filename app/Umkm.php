<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    //
    protected $table = 'umkm';
    protected $fillable = ['nama_umkm','alamat','keterangan','member_id','kecamatan_id','kelurahan_id','kategori_id','latitude','longitude'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

}


