var createrole_vue = new Vue({
	el: '#createrole',
	data: {
		message: '<h1>菜鸟教程</h1>',
		professions: [
			{
                "base_blood": 800,
                "base_megic_attack": 0,
                "base_megic_protect": 70,
                "base_physical_attack": 70,
                "base_physical_protect": 70,
                "gameprofession_id": "ec528159693d4d92ac2f9c7fe2c6cc67",
                "profession_id": "2",
                "profession_name": "战士"
        }
		],
		userdatas:[
			{
				"INTELLIGENCE":0,
				"MAGIC_ATTACK":0,
				"BLOOD":0,
				"PHYSICAL_PROTECT":0,
				"REMAINEXPERIENCE":0,
				"CRATETIME":"Mar 23, 2017 5:01:41 PM",
				"POWER":0,
				"AGILE":0,
				"PROFESSION":"3",
				"HELMET":0,
				"ARMGUARD":0,
				"LASTLOGINTIME":0,
				"LASTLOGINIP":"192.168.56.1",
				"BELONGUID":"1234",
				"LEVEL":0,
				"ROLEID":1259701586,
				"COAT":0,
				"SHOE":0,
				"ATTACKRATE":0,
				"MEGIC_PROTECT":0,
				"LEGGINGS":0,
				"MONEY":0,
				"ALLEXPERIENCE":0,
				"PHYSICAL_ATTACK":100,
				"ROLENAME":"瞎子",
				"GAMEROLE_ID":"f1c9d07459f147b08c880a37317e6cf3",
				"WEAPON":0,
				"MAGICBAR":0
			
			}
		
		]
	}
});  

//执行注册
var to_getprofession = function() {

	$.get(getprofessionurl, function(response) {
		// process response
		console.log(response);
		// JSON.parse(response);
		console.log("返回的状态码" + JSON.parse(response).status);
		if(JSON.parse(response).status == 200) {

			console.log(JSON.parse(response).pdlist[0].PROFESSION_NAME);
			createrole_vue.professions = JSON.parse(response).pdlist;

		} else {
			//$.toast(JSON.parse(response).message);
			//console.log(response);
		}
	})
}

function Createrole() {

	this.to_getprofession = to_getprofession;

};
//创建角色界面
function createrole_go_createrole() {
	var cr_createrole_rolename = $('#createrole_rolename').val();
	var cr_createrole_selectprofession = $('#createrole_selectprofession').val();
    console.log(cr_createrole_rolename+"   "+cr_createrole_selectprofession);
	$.post(createroleurl, { rolename: cr_createrole_rolename, profession: cr_createrole_selectprofession }, function(response) {
		// process response
		console.log(response);
		// JSON.parse(response);
		
		console.log("返回的状态码" + JSON.parse(response).status);
		if(JSON.parse(response).status == 200) {
			$.toast(JSON.parse(response).message);
			$.router.load('#gameindex');
			//showlogin();
			gamerole=JSON.parse(response).mgamerole;
		} else {
			$.toast(JSON.parse(response).message);
		}
	});

}