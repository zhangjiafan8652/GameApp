var fuben_vue = new Vue({
	el: '#fuben',
	data: {
		message: '游戏主页',
		attack_message: 'nidongde',
		monsters: [{
				"GAMEMONSTER_ID": "88f3ea78b3784e6cb6483fcc40161c51",
				"MONSTERID": "2fd23d4a734c45c0a1e3f9a5cdc01d44",
				"MONSTERNAME": "小火鸡",
				"MONSTEREXPERIENCE": 3,
				"MONSTERLEVEL": "2fd23d4a734c45c0a1e3f9a5cdc01d44",
				"MONSTERPHYSICALATTACK": "射手",
				"MONSTERMAGICATTACK": "2fd23d4a734c45c0a1e3f9a5cdc01d44",
				"MONSTERPHYSICALPROTECT": "射手"
			}

		],
		monster: {
			"gamemonsterId": "88f3ea78b3784e6cb6483fcc40161c51",
			"monsterExperience": "2fd23d4a734c45c0a1e3f9a5cdc01d44",
			"monsterId": "小火鸡",
			"monsterLevel": 3,
			"monsterMagicAttack": "2fd23d4a734c45c0a1e3f9a5cdc01d44",
			"monsterName": "射手",
			"monsterPhysicalAttack": "2fd23d4a734c45c0a1e3f9a5cdc01d44",
			"monsterPhysicalProtect": "射手",
			"blood": 0
		},
		fubens:[{

            "fubenid": "1",
            "fubenlevel": 100,
            "fubenname": "蒲家村",
            "gamefuben_id": "z2671859258"
		}
		]

	},
	methods: {
		vue_fuben_gotofubenlist: function(id) {
			console.log('123');
			gotofubenlist(id); //调用本页面的攻击
		}
	}
});
//fuben类
function Fuben() {

	this.fuben_tosetfubendata = fuben_tosetfubendata;
	//this.gameindex_tosetmonsterdata = gameindex_tosetmonsterdata;
};
//去monster页面
function gotofubenlist(fubenid){
	console.log("调往怪物list页面"+fubenid);
	$.router.load('#monster');
	tempfubenid=fubenid;
}

function fuben_tosetfubendata(){
	$.post(getfubenlisturl, { GAMEMONSTER_ID: "1", isfirstattack: "1" }, function(response) {
		// process response
		console.log(response);
		// JSON.parse(response);
		//console.log("返回的状态码" + JSON.parse(response).status);
		if(JSON.parse(response).status==200){
			fuben_vue.fubens=JSON.parse(response).pdlist.data;
            $youziku.submit();
            console.log('在加载字体');
		}
		
	});
}
