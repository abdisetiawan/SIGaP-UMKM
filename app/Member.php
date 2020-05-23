<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $fillable = ['no_ktp','nama','no_telp','alamat','user_id','admin_id'];

    public function umkm()
    {
        return $this->hasMany(UMKM::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
