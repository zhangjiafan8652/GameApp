<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table="sys_menu";
    public $timestamps=false;
    protected $primaryKey='menu_id';
    public $incrementing=false;



}
