<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $fillable = ['no_ktp','nama','no_telp','alamat','user_id','avatar'];

    public function umkm()
    {
        return $this->hasMany(UMKM::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function getAvatar()
    {
        # code...
        if (!$this->avatar) {
            # code...
            return asset('images/user.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
