<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'admin';
    protected $fillable = ['nama','no_telp','alamat','user_id'];

    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
