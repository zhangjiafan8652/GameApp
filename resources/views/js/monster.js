var monster_vue = new Vue({
	el: '#monster',  
	data: {
		message: '游戏主页',
		attack_message: 'nidongde',
		monsters: [

		],
		monster: {
            "belongfuben": "1",
            "blood": 100,
            "gamemonster_id": "a8d8d2adfaa14d50a293756a1d7cded1",
            "monsterexperience": 100,
            "monsterid": 1,
            "monsterlevel": 1,
            "monstermagicattack": 100,
            "monstermagicprotect": 49,
            "monstername": "三眼猴",
            "monsterphysicalattack": 100,
            "monsterphysicalprotect": 50
		}

	},
	methods: {  
		
		vue_monster_attack: function(id) {
			console.log('123');
			fubenlist_attack(id); //调用本页面的攻击
		}
	}
});
//Monster类
function Monster() {

	this.monster_tosetmonsterdata = monster_tosetmonsterdata;
};

//设置怪物信息
function monster_tosetmonsterdata(fubenid) {
	console.log();

	$.post(getmosterlisturl, { belongfuben:fubenid }, function(response) {
		// process response
		console.log("获取怪物列表返回" + response);
		// JSON.parse(response);  
		console.log("返回的状态码" + JSON.parse(response).status);
		if(JSON.parse(response).status==200){
			monster_vue.monsters = JSON.parse(response).mgamemonsters;
		}
		
	});

}

//玩家攻击野怪
function fubenlist_attack(monsterid) {
	console.log('攻击的野怪id' + monsterid);
	$.post(role_attackurl, { GAMEMONSTER_ID: monsterid, isfirstattack: "1" }, function(response) {
		// process response
		console.log(response);
		// JSON.parse(response);
		//console.log("返回的状态码" + JSON.parse(response).status);
		if(JSON.parse(response).status==202){
			
			monster_vue.attack_message=monster_vue.attack_message+"<br/>"+JSON.parse(response).Message;
		    $.toast("经验增加"+JSON.parse(response).mgamemonster.monsterExperience);
		}else if(JSON.parse(response).status==200){
			monster_vue.monster=JSON.parse(response).mgamemonster;
			monster_vue.attack_message=monster_vue.attack_message+"<br/>"+JSON.parse(response).Message;
			monster_attack_player();
		}
		
	});
}
//野怪攻击玩家
function monster_attack_player(){
	$.post(monster_attackurl, { GAMEMONSTER_ID: "12", isfirstattack: "1" }, function(response) {
		// process response
		console.log(response);
		// JSON.parse(response);
		//console.log("返回的状态码" + JSON.parse(response).status);
		if(JSON.parse(response).status==202){
			
			monster_vue.attack_message=monster_vue.attack_message+"<br/>"+JSON.parse(response).Message;
		    $.toast("打不过，死掉了");
		    $.router.load('#gameindex');
		}else if(JSON.parse(response).status==200){
			monster_vue.monster=JSON.parse(response).mgamemonster;
			monster_vue.attack_message=monster_vue.attack_message+"<br/>"+JSON.parse(response).Message;
			attack_monster();
		}
		
	});
}
//玩家第二次攻击野怪
function attack_monster() {
	
	$.post(role_attackurl, { GAMEMONSTER_ID: "123", isfirstattack: "0" }, function(response) {
		// process response
		console.log(response);
		// JSON.parse(response);
		//console.log("返回的状态码" + JSON.parse(response).status);
		if(JSON.parse(response).status==202){
			
			monster_vue.attack_message=monster_vue.attack_message+"<br/>"+JSON.parse(response).Message;
		    $.toast("经验增加"+JSON.parse(response).mgamemonster.monsterExperience);
		}else if(JSON.parse(response).status==200){
			monster_vue.monster=JSON.parse(response).mgamemonster;
			monster_vue.attack_message=monster_vue.attack_message+"<br/>"+JSON.parse(response).Message;
			monster_attack_player();
		}
		
	});
}