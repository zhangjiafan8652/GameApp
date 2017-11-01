var gameindex_vue = new Vue({
	el: '#gameindex',
	data: {
		message: '游戏主页',
		attack_message: 'nidongde',
		professions: [
			{ "PROFESSION_ID": 3, "GAMEPROFESSION_ID": "2fd23d4a734c45c0a1e3f9a5cdc01d44", "PROFESSION_NAME": "射手" },

		],
		userdatas: {
            "agile": 0,
            "allexperience": 0,
            "armguard": "1",
            "attackrate": 0,
            "blood": 0,
            "coat": "1",
            "createtime": "0",
            "gamerole_id": "0",
            "helmet": "1",
            "intelligence": 0,
            "lastloginip": "0",
            "lastlogintime": "0",
            "leggings": "1",
            "level": 0,
            "magicbar": 0,
            "megic_attack": 0,
            "megic_protect": 0,
            "money": 0,
            "physical_attack": 0,
            "physical_protect": 0,
            "power": 0,
            "profession": "0",
            "remainexperience": 0,
            "remainpoint": 0,
            "rolename": "0",
            "shoe": "1",
            "userid": "0",
            "weapon": "1"
		}

	},
	methods: {
		vue_gameindex_attack: function(id) {
			console.log('123');
			//gameindex_attack(id); //调用本页面的攻击
		}
	}
});

function gameIndex_setroledata(pddata) {
	console.log(pddata);
	console.log('这是？');
	gameindex_vue.userdatas = pddata;
	
	//console.log(vue);

}

//gameindex类
function GameIndex() {
	//设置角色信息
	this.to_setroledata = gameIndex_setroledata;
	this.init = initGameindex;

};

function initGameindex() {
	console.log("初始化游戏首页信息");
	if(gamerole.roleid == 0) {
		$.router.load('#' + LOGINPAGE);
	} else {
		gameIndex_setroledata(gamerole);
	}

}
//跳到副本
function gameindex_gotofuben() {
	console.log("调往副本");
	$.router.load('#fuben');

}