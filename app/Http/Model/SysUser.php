<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class SysUser extends Model
{
    //
    protected $table="sys_user";
    public $timestamps=false;
    protected $primaryKey='USER_ID';
    public $incrementing=false;



}
