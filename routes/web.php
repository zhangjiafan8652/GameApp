<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/foo', 'UserController@index');
Route::get('/', 'GameController@index');
Route::get('/hello',function(){
    echo 'guaiguai';
    return redirect()->route('user');
});

Route::post('apigameuser/save', 'UserController@save');//注册
Route::any('apigameuser/login', 'UserController@login');
Route::get('apigameuser/index', 'UserController@index');
Route::any('/apigameprofession/list', 'UserController@profession');
Route::any('/apigamerole/save', 'UserController@gamecreaterole');

Route::any('/apigamerole/sessionset', 'UserController@sessionset');
Route::any('/apigamerole/sessionget', 'UserController@sessionget');
Route::any('/apigamefuben/list', 'UserController@fubenlist');
Route::any('/apigamemonster/list', 'UserController@monsterlist');
Route::any('/apigamemonster/setroledata', 'UserController@setroledata');




Route::group(['middleware' => ['nofilterlogin']], function () {
    Route::get('admin/signup', 'Admin\IndexController@signup');
    Route::get('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');
    Route::any('admin/tologin', 'Admin\LoginController@tologin');
    Route::get('admin/getcode', 'Admin\LoginController@getcode');

});

Route::any('/userinfo', 'UserinfoController@index');

//需要经过  Kernel.php 中login 组的中间件
Route::group(['middleware' => ['login']], function () {
    Route::get('admin', 'Admin\IndexController@index');
    Route::get('admin/index', 'Admin\IndexController@index');
    Route::get('admin/user', 'Admin\UserListController@index');
    Route::get('admin/content', 'Admin\IndexController@content');


    //菜单管理
    Route::get('admin/sys_menu/ceshi', 'Admin\Sys_MenuListController@datalist');
    Route::get('admin/sys_menu', 'Admin\Sys_MenuListController@index');
    Route::get('admin/sys_menuedit', 'Admin\Sys_MenuListController@edit');
    Route::get('admin/sys_menuupdate', 'Admin\Sys_MenuListController@update');
    Route::get('admin/sys_menusave', 'Admin\Sys_MenuListController@save');


    //玩家信息
    Route::get('admin/gameuser/ceshi', 'Admin\GameUserListController@datalist');
    Route::get('admin/gameuser', 'Admin\GameUserListController@index');
    Route::get('admin/gameuseredit', 'Admin\GameUserListController@edit');
    Route::get('admin/gameuserupdate', 'Admin\GameUserListController@update');
    Route::get('admin/gameusersave', 'Admin\GameUserListController@save');

    //角色信息
    Route::get('admin/gamerole/ceshi', 'Admin\GameRoleListController@datalist');
    Route::get('admin/gamerole', 'Admin\GameRoleListController@index');
    Route::get('admin/gameroleedit', 'Admin\GameRoleListController@edit');
    Route::get('admin/gameroleupdate', 'Admin\GameRoleListController@update');
    Route::get('admin/gamerolesave', 'Admin\GameRoleListController@save');

    //怪物列表
    Route::get('admin/gamemonster/ceshi', 'Admin\GameMonsterListController@datalist');
    Route::get('admin/gamemonster', 'Admin\GameMonsterListController@index');
    Route::get('admin/gamemonsteredit', 'Admin\GameMonsterListController@edit');
    Route::get('admin/gamemonsterupdate', 'Admin\GameMonsterListController@update');
    Route::get('admin/gamemonstersave', 'Admin\GameMonsterListController@save');


    //玩家职业列表
    Route::get('admin/gameprofession/ceshi', 'Admin\GameProfessionListController@datalist');
    Route::get('admin/gameprofession', 'Admin\GameProfessionListController@index');
    Route::get('admin/gameprofessionedit', 'Admin\GameProfessionListController@edit');
    Route::get('admin/gameprofessionupdate', 'Admin\GameProfessionListController@update');
    Route::get('admin/gameprofessionsave', 'Admin\GameProfessionListController@save');


//玩家副本
    Route::get('admin/gamefuben/ceshi', 'Admin\GameFubenListController@datalist');
    Route::get('admin/gamefuben', 'Admin\GameFubenListController@index');
    Route::get('admin/gamefubenedit', 'Admin\GameFubenListController@edit');
    Route::get('admin/gamefubenupdate', 'Admin\GameFubenListController@update');
    Route::get('admin/gamefubensave', 'Admin\GameFubenListController@save');



    //游戏配置文件
    Route::get('admin/gameconfig/ceshi', 'Admin\GameConfigListController@datalist');
    Route::get('admin/gameconfig', 'Admin\GameConfigListController@index');
    Route::get('admin/gameconfigedit', 'Admin\GameConfigListController@edit');
    Route::get('admin/gameconfigupdate', 'Admin\GameConfigListController@update');
    Route::get('admin/gameconfigsave', 'Admin\GameConfigListController@save');

});
Auth::routes();

Route::get('/home', 'HomeController@index');
