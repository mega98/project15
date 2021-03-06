<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\UserDetail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Penjual extends Authenticatable
{
    protected $table = 'penjual';
    use Notifiable;

    function detail(){
        return $this->hasOne(UserDetail::class, 'id_user');
    }

    function produk(){
    	return $this->hasMany(Produk::class, 'id_user');
    }

}
