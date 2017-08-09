<?php

namespace App\Http\Controllers;

use App\Http\Model\GameConfig;
use App\Http\Model\GameMonster;
use App\Http\Model\GameProfession;
use App\Http\Model\GameRole;
use App\Http\Model\GameUser;
use App\Http\Model\GameFuben;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Support\Facades\Input;


class UserinfoController extends CommonController
{
    //

    public function index()
    {
      //  dd('haolihai');
     return view('userinfo.index');
    }

    //登陆
    public function login()
    {
        $input=Input::all();

        $reuid=$input['uid'];
        $repassword=$input['password'];
        $user=GameUser::find($reuid);
        if ($user!=null){

          //  $request->session()->push('user.teams', 'developers');
            session(['uid'=>$reuid]);
           $mgameRole=GameRole::where('userid', $user->gameuser_id)->get();
         //  echo '账号'.($mgameRole);
            if (empty($mgameRole[0])){

                $this->gameresponse["status"]="200";
                $this->gameresponse["message"]="登陆成功，请创建角色";
                return json_encode($this->gameresponse);

            }else{
                $this->gameresponse["status"]="201";
                $this->gameresponse["message"]="登陆成功";
                $this->gameresponse["mgamerole"]=$mgameRole[0];
                return json_encode($this->gameresponse);
               // echo '登陆成功有角色'.$mgameRole;
            }
        }else{
                $this->gameresponse["status"]="400";
                $this->gameresponse["message"]="用户不存在";
                return json_encode($this->gameresponse);
        }
    }

  private $powertophysical_attack=0;
    private $intelligencetophysical_attack=0;
   // private $powertophysical_attack=0;



    //将属性加在
    public function setroledata()
    {
            //1.获取config中的配置
            $config=GameConfig::all();


            return $config;
    }


    //创建角色获取角色职业
    public function profession()
    {
        $userdata=GameProfession::paginate(4);
       // dd($userdata->items());
       $this->gameresponse["status"]="200";
        $this->gameresponse["message"]="用户不存在";
        $this->gameresponse["pdlist"]=$userdata->items();
        return json_encode($this->gameresponse);

    }

    //创建角色
    public function gamecreaterole()
    {
        $input=Input::all();
       $rolename= $input['rolename'];

       // echo 'seesion的uid。。'.session('user');

        $professionid=$input['profession'];
       $professon= GameProfession::find($professionid);

        //echo 'seesion的uid。。'.session('uid').'profess:'.$professon;
        //通过时间函数获取唯一id
        $nowpriid=$this->getUUID();
        $mgamerole= new GameRole();
        $mfgamerole= GameRole::find($nowpriid);
        if ($mfgamerole!=null){
            $this->gameresponse["status"]="200";
            $this->gameresponse["message"]="用户已经存在，请重新创建";
            $this->gameresponse['mgamerole']=$mgamerole;
            return json_encode($this->gameresponse);
        }else{

            $mgamerole->gamerole_id=$nowpriid;
            $mgamerole->userid=session('uid');
            $mgamerole->rolename=$rolename;
            $mgamerole->blood=$professon->base_blood;
            $mgamerole->megic_attack=$professon->base_megic_attack;
            $mgamerole->megic_protect=$professon->base_megic_protect;
            $mgamerole->physical_attack=$professon->base_physical_attack;
            $mgamerole->physical_protect=$professon->base_physical_protect;
            $mgamerole->profession=$professon->profession_name;
            $mgamerole->createtime=date('y-m-d h:i:s',time());
            $mgamerole->lastloginip=$_SERVER["REMOTE_ADDR"];
            $mgamerole->lastlogintime=date('y-m-d h:i:s',time());

            $mgamerole->save();
         //   echo 'seesion的uid。。'. session('uid');
            if ($mgamerole){
                $this->gameresponse["status"]="200";
                $this->gameresponse["message"]="角色创建成功";
                $this->gameresponse['mgamerole']=$mgamerole;
                return json_encode($this->gameresponse);
            }
        }


    }

    public function save(){
        $input=Input::all();
        $reuid=$input['uid'];
        $repassword=$input['password'];
        $user=GameUser::find($reuid);
        if ($user!=null){
            $this->gameresponse["status"]="201";
            $this->gameresponse["message"]="用户已经存在";
            $this->gameresponse["gameuser"]=$user;

            return json_encode($this->gameresponse);
        }else{
            $gameuser=new GameUser();
            $gameuser->gameuser_id=$reuid;
            $gameuser->uid=$reuid;
            $gameuser->password=md5($repassword);

            if($gameuser->save()){
                $this->gameresponse["status"]="200";
                $this->gameresponse["message"]="创建成功";
                return json_encode($this->gameresponse);
            }else{
                $this->gameresponse["status"]="201";
                $this->gameresponse["message"]="创建失败";
                return json_encode($this->gameresponse);
            }


        }

    }

    //获取副本列表
    public function fubenlist()
    {
        $userdata= GameFuben::paginate(40);
        $this->gameresponse["status"]="200";
        $this->gameresponse["message"]="用户已经存在";
       $this->gameresponse["pdlist"]=$userdata;

        return json_encode($this->gameresponse);
       // return $userdata->data();

    }
    //获取副本怪物
    public function monsterlist()
    {

        $input=Input::all();
        $belongfuben=$input['belongfuben'];

        $monsters= GameMonster::where('belongfuben', $belongfuben)

            ->get();;
       $this->gameresponse["status"]="200";
        $this->gameresponse["message"]="用户已经存在";
        $this->gameresponse["mgamemonsters"]=$monsters;

        return json_encode($this->gameresponse);
    }

    public function sessionset()
    {
        $input=Input::all();
        $reuid=$input['uid'];
        session(['user'=>$reuid]);
        echo 'sessionset'.$reuid;
    }

    public function sessionget()
    {
      echo session('user');
    }
}
