//	 var rooturl = "http://192.168.2.9:8080/FHMYSQL";	
var rooturl = "http://www.gameworld.com"; //根路径
var registerurl = rooturl + "/apigameuser/save"; //创建用户
var loginurl = rooturl + "/apigameuser/login"; //登陆
var getprofessionurl = rooturl + '/apigameprofession/list'; //获取职业列表
var createroleurl = rooturl + '/apigamerole/save'; //创建角色
var refreshroleurl = rooturl + '/apigamerole/refresh'; //刷新角色数据
var role_attackurl = rooturl + '/apigame/role_attack'; //玩家攻击怪物
var monster_attackurl = rooturl + '/apigame/monster_attack'; //怪物攻击玩家
var getfubenlisturl = rooturl + '/apigamefuben/list'; //获取副本列表
var getmosterlisturl = rooturl + '/apigamemonster/list'; //获取怪物列表
var temptext = "填入密码登陆三眼猴子黄口稻草人狂奔的小龙注册输入打架";//用到的字体
var LOGINPAGE = "loginpage";
var GAMEINDEX = "gameindex";
var FUBEN = "fuben";
var MONSTER = "monster";
var CREATEROLE = "createrole";
var tempfubenid='';
var gamerole = {
    "agile": 0,
    "allexperience": 0,
    "armguard": "1",
    "attackrate": 0,
    "blood": 500,
    "coat": "1",
    "createtime": "17-05-17 01:35:39",
    "gamerole_id": "zz5028139749",
    "helmet": "1",
    "intelligence": 0,
    "lastloginip": "127.0.0.1",
    "lastlogintime": "17-05-17 01:35:39",
    "leggings": "1",
    "level": 0,
    "magicbar": 0,
    "megic_attack": 100,
    "megic_protect": 50,
    "money": 0,
    "physical_attack": 0,
    "physical_protect": 50,
    "power": 0,
    "profession": "魔法师",
    "remainexperience": 0,
    "remainpoint": 0,
    "rolename": "你懂得",
    "shoe": "1",
    "userid": "12344321",
    "weapon": "1"
}; //全局role对象

$(document).on("pageInit", function(e, pageId, $page) {
	console.log("当前加载的是：" + pageId);

	if(pageId == GAMEINDEX) {
		//生成游戏页面对象
		var mgameindex = new GameIndex();
		//调用游戏页面设置vue数据方法
		mgameindex.init();

		//
	}
	if(pageId == FUBEN) {
        var fubenc = new Fuben();
        fubenc.fuben_tosetfubendata();
	}
	if(pageId == MONSTER) {
        var monsterc=new Monster();
        monsterc.monster_tosetmonsterdata(tempfubenid);
	}
	if(pageId == CREATEROLE) {

	}

});