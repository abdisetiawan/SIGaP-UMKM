<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $fillable = ['member_id','umkm_id','ktrgn_foto','foto'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
