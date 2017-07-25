<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AdminLoginLog extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'admin_login_log';
    public $timestamps = false;

    protected $hidden = [];
    protected $fillable = ['aid','ip','login_time','browser','address','device','device_type','platform','language'];

}
