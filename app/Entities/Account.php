<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //

    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';
    
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
