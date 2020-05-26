<?php
use App\Member;
use App\Umkm;

function totalMember(){
    return Member::count();
}


function totalUmkm(){
    return Umkm::count();
}
