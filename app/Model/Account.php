<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $table = 'accounts';

    protected $primaryKey ='id';

    // protected $incrementing = false;

    protected $keyType = 'integer';

    protected $fillable = [
        'id',
        'username',
        'password',
        'email',
        'full_name',
        'role_id',
        'del_flg',
        'department',
        'created_at',
        'updated_at'
    ];

     protected $hidden = [ 'password' ];
}
