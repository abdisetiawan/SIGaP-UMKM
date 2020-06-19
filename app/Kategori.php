<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    //
    use SoftDeletes;
    protected $table = 'kategori';
    protected $fillable = ['nama_ktgr'];
    

    public function umkm()
    {
        return $this->hasMany(UMKM::class);
    }
    
}
