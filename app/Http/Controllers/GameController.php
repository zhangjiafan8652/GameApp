<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\GameRole;
use Illuminate\Support\Facades\Log;
use App\Http\Model\GameMonster;
use Illuminate\Support\Facades\Input;

class GameController extends Controller
{
    //

    public function index()
    {
        return view('index');
    }
    public $attackmessage='';
    public function roleattack()
    {

        $input=Input::all();
        //$input[''];
        $monsterid=$input['monsterid'];
        $reuid=session('uid');
        $mgameRole=GameRole::where('userid', $reuid)->get()[0];
        $mgameMonster=GameMonster::where('monsterid', $monsterid)->get()[0];
        //拿到怪物的id

        Log::info('角色信息'.$mgameRole);
        Log::info('怪物信息'.$mgameMonster);
        while ($mgameMonster->blood>0&&$mgameRole->blood>0){
            //玩家攻击
            $mgameMonster=$this->playerattackmonster($mgameRole,$mgameMonster);
            if ($mgameMonster->blood<=0){
                $this->addmessage($mgameMonster->monstername.'死掉了');

                $mgameRole->remainexperience=$mgameRole->remainexperience+$mgameMonster->monsterexperience;
                $this->addmessage('获得'.$mgameMonster->monsterexperience.'点经验值~~');
                $mgameRole->save();
                break;
            }

            //怪物攻击玩家
            $mgameRole=$this->monsterattackplayer($mgameRole,$mgameMonster);
            if ($mgameRole->blood<=0){
                $this->addmessage($mgameRole->rolename.'战死了');
                $this->addmessage('失去'.($mgameRole->remainexperience*0.1).'点经验值~~');
                $mgameRole->remainexperience=$mgameRole->remainexperience-($mgameRole->remainexperience*0.1);
                $mgameRole->blood=$mgameRole->maxblood*0.3;
                $mgameRole->save();
                break;
            }


        }

       // Log::info($this->attackmessage);
        echo "攻击野怪123".$mgameRole->blood;
    }

    //玩家攻击怪物计算
    public function playerattackmonster($gamerole,$gamemonster)
    {



        //判断玩家的物理攻击和法术攻击大小

        //如果物理攻击大，玩家物理攻击减去怪物物理防御

        //////如果玩家物理攻击比怪物物理防御低，则返回  攻击里太低打不动哦

        //////如果玩家物理攻击比怪物物理防御高，进行攻击计算
        //////攻击后计算怪物血量，如果小于零，则返回攻击结果

        //Log::info('攻击计算中的角色：'.$gamerole);
       // Log::info('攻击计算中的怪物：'.$gamemonster);
        $this->addmessage($gamerole->rolename.'发起了攻击');
        if ($gamerole->physical_attack>$gamerole->megic_attack){

            if ($gamerole->physical_attack<$gamemonster->monsterphysicalprotect){
               $this->addmessage('攻击力太低，打不动哦~~~！');
            }else{
                $this->addmessage($gamerole->rolename.'对'.$gamemonster->monstername.'造成了'.($gamerole->physical_attack-$gamemonster->monsterphysicalprotect).'点物理伤害！');
                $gamemonster->blood=$gamemonster->blood-($gamerole->physical_attack-$gamemonster->monsterphysicalprotect);
            }

        }else{
            if ($gamerole->megic_attack<$gamemonster->monstermagicprotect){
                $this->addmessage('攻击力太低，打不动哦~~~！');
            }else{
                $this->addmessage($gamerole->rolename.'对'.$gamemonster->monstername.'造成了'.($gamerole->megic_attack-$gamemonster->monstermagicprotect).'点魔法伤害！');
                $gamemonster->blood=$gamemonster->blood-($gamerole->megic_attack-$gamemonster->monstermagicprotect);
            }
        }
        $this->addmessage('怪物剩下'.$gamemonster->blood.'滴血。。');
       // $gamemonster->blood=$gamemonster->blood-10;
        return $gamemonster;
    }

    //怪物攻击玩家
    public function monsterattackplayer($gamerole,$gamemonster)
    {
        $this->addmessage('怪物狂暴发起了攻击');
       // Log::info('攻击计算中的角色：'.$gamerole);
       // Log::info('攻击计算中的怪物：'.$gamemonster);
        if ($gamemonster->monsterphysicalattack>$gamemonster->monstermagicattack){

            if ($gamemonster->monsterphysicalattack<$gamerole->physical_protect){
                $this->addmessage('怪物攻击力太低，打不动哦~~~！');
            }else{
                $this->addmessage($gamemonster->monstername.'对'.$gamerole->rolename.'造成了'.($gamemonster->monsterphysicalattack-$gamerole->physical_attack).'点物理伤害！');
                $gamerole->blood=$gamerole->blood-($gamemonster->monsterphysicalattack-$gamerole->physical_attack);
            }

        }else{
            if ($gamemonster->monstermagicattack<$gamerole->megic_protect){
                $this->addmessage('怪物攻击力太低，打不动哦~~~！');
            }else{
                $this->addmessage($gamemonster->monstername.'对'.$gamerole->rolename.'造成了'.($gamemonster->monstermagicattack-$gamemonster->megic_protect).'点魔法伤害！');
                $gamerole->blood=$gamerole->blood-($gamemonster->monstermagicattack-$gamemonster->megic_protect);

            }
        }
        $this->addmessage('玩家剩下'. $gamerole->blood.'滴血。。');
        // $gamemonster->blood=$gamemonster->blood-10;
        return $gamerole;
    }

    //添加攻击信息方法
    public function addmessage($message)
    {
        Log::info($message);
        $this->attackmessage=$this->attackmessage.'\r\n'.$message;
    }
}
