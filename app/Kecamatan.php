<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    //
    protected $table = 'kecamatan';
    protected $fillable = ['nama_kcmtn'];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function umkm()
    {
        return $this->hasMany(UMKM::class);
    }
    
}
