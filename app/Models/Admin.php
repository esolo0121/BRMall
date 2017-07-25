<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable implements Transformable
{
    use TransformableTrait;
    protected $guarded = [];
    // protected $hidden = ['password', 'remember_token','salt'];
    // protected $fillable = ['account','mobile','email','realname','password','last_login','last_ip','remember_token','is_lock','salt'];
	// protected $rememberTokenName = '';

}
