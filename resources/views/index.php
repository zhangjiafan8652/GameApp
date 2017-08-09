<html id="thtml">
	<head>
		<meta charset="utf-8" />
		<title></title>
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"/> -->
		<title>我的生活</title>
		<!-- <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
		<link rel="shortcut icon" href="/favicon.ico">
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/> -->

		<!--<script type='text/javascript' src='http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js' charset='utf-8'></script>-->
		<link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
		<script type='text/javascript' src='http://g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
		<script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>

		<link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
		<link rel="stylesheet" type="text/css" href="/resources/views/css/index.css" />
		<link rel="stylesheet" type="text/css" href="/resources/views/css/gameindex.css" />
		<link rel="stylesheet" type="text/css" href="/resources/views/css/fuben.css" />
		<link rel="stylesheet" type="text/css" href="/resources/views/css/monster.css" />
		<script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
		<script type='text/javascript' src='/resources/views/js/lib/vue.min.js' charset='utf-8'></script>
		<script type='text/javascript' src='/resources/views/js/constantsurl.js' charset='utf-8'></script>
	</head>  

	<body id="body">
		<!-- page集合的容器，里面放多个平行的.page，其他.page作为内联页面由路由控制展示 -->
		<div class="page-group" id="page-group">
			<!-- 单个page ,第一个.page默认被展示-->
			<div class="page  page-current" id="loginpage">
				<!-- 标题栏 -->
				<header class="bar bar-nav">

					<h1 class="title">剑灵山</h1>
				</header>

				<!-- 这里是页面内容区 -->
				<div class="content">
					<div id="loginpage">
						<div id="top">
							<div id="top_left" onclick="showlogin()">

								登陆

							</div>
							<div id="top_right" onclick="showregister()">
								注册

							</div>
						</div>

						<!--登陆模块-->
						<div class="list-block" id="av_login">
							<ul>
								<!-- Text inputs -->
								<li>
									<div class="item-content">
										<div class="item-inner">
											<div class="item-title label">uid</div>
											<div class="item-input">
												<input type="text" id="login_uid" placeholder="填入登陆uid">
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="item-content">
										<div class="item-inner">
											<div class="item-title label">password</div>
											<div class="item-input">
												<input type="email" id="login_password" placeholder="填入密碼">
											</div>
										</div>
									</div>
								</li>

							</ul>
							<p onclick="go_login()">

								<a href="#" class="button button-big button-round">登陆 </a>
							</p>
						</div>

						<!--注册模块-->
						<div class="list-block" id="register" hidden="true">
							<ul>
								<!-- Text inputs -->
								<li>
									<div class="item-content">
										<div class="item-inner">
											<div class="item-title label">uid</div>
											<div class="item-input">
												<input type="text" id="register_uid" placeholder="填入注册uid">
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="item-content">
										<div class="item-inner">
											<div class="item-title label">password</div>
											<div class="item-input">
												<input type="email" id="register_password" placeholder="填入密碼">
											</div>
										</div>
									</div>
								</li>

							</ul>
							<p onclick="to_register()">
								<a href="#" class="button button-big button-round">注册 </a>
							</p>
						</div>

					</div>

				</div>
			</div>

			<!-- 游戏首页内连 -->
			<div class="page " id="gameindex">

				<header class="bar bar-nav">
					<h1 class='title'>{{message}}</h1>
				</header>
				<div class="content" id="gameindex_content">
					<div id="gameindex_top">
						<div id="gameindex_top_left">

							<div id="gameindex_ROLEID">角色id：{{userdatas.gamerole_id}}</div>
							<div id="gameindex_BLOOD">血量：{{userdatas.blood}}</div>
							<div id="gameindex_LEVEL">等级：{{userdatas.level}}</div>
							<div id="gameindex_MONEY">金币：{{userdatas.money}}</div>
							<div id="gameindex_PROFESSION">职业：{{userdatas.profession}}</div>
							<div id="gameindex_INTELLIGENCE">智力：{{userdatas.intelligence}}</div>
							<div id="gameindex_AGILE">敏捷：{{userdatas.agile}}</div>
							<div id="gameindex_POWER">力量：{{userdatas.power}}</div>
							<div id="gameindex_PHYSICAL_ATTACK">物理攻击：{{userdatas.physical_attack}}</div>
							<div id="gameindex_PHYSICAL_PROTECT">物理防御：{{userdatas.physical_protect}}</div>
							<div id="gameindex_MAGIC_ATTACK">魔法攻击：{{userdatas.megic_attack}}</div>
							<div id="gameindex_MEGIC_PROTECT">魔法防御：{{userdatas.megic_protect}}</div>
							<div id="gameindex_ALLEXPERIENCE">剩余经验：{{userdatas.allexperience}}</div>
						</div>
						<div id="gameindex_top_right">
							<div id="gameindex_top_headpicture">

							</div>
							<div id="gameindex_top_rolename">{{userdatas.rolename}}</div>
							<div id="gameindex_top_userid">{{userdatas.belonguid}}</div>
							<div id="gameindex_top_roleid">{{userdatas.roleid}}</div>

						</div>

					</div>
					<div id="gameindex_buttom">
						<div id="gameindex_fuben" class="button gameindex_listitem" onclick="gameindex_gotofuben()">副本

						</div>
					</div>
				</div>
			</div>

			<!-- 副本页面 -->
			<div class="page " id="fuben">

				<header class="bar bar-nav">
					<a class="button button-link button-nav pull-left back" href="#gameindex">
						<span class="icon icon-left"></span> 返回
					</a>
					<h1 class='title'>副本界面</h1>
				</header>
				<div class="content" id="fuben_content">

					<div class="fuben_item button" v-for="fuben in fubens" v-on:click="vue_fuben_gotofubenlist(fuben.fubenid)">
						{{fuben.fubenname}}
					</div>
				</div>
			</div>
			<!-- 野怪页面 -->
			<div class="page " id="monster">

				<header class="bar bar-nav">
					<a class="button button-link button-nav pull-left back" href="#fuben">
						<span class="icon icon-left"></span> 返回
					</a>
					<h1 class='title'>野怪界面</h1>
				</header>
				<div class="content" id="monster_content">
					<div class="button monster_yeguai" v-for="monster in monsters" v-bind:id="monster.gamemonsterId">
						<div class="monster_yeguai_monstername">
							{{monster.monstername}}
						</div>
						<div class="button button-round monster_yeguai_monsterattack" v-on:click="vue_monster_attack(monster.gamemonsterId)">
							攻击
						</div>
						<div class="button button-round monster_yeguai_monsterguaji">
							挂机
						</div>
					</div>

					<div id="monster_message">
						{{attack_message}}
					</div>

					<div id="">

					</div>
				</div>
			</div>
			<!-- 创建角色页面 -->
			<div class="page " id="createrole">

				<header class="bar bar-nav">
					<h1 class='title'>创建角色界面</h1>
				</header>
				<div class="content" id="createrole_content">
					<div class="list-block">
						<ul>
							<!-- Text inputs -->
							<li>
								<div class="item-content">
									<div class="item-media"><i class="icon icon-form-name"></i></div>
									<div class="item-inner">
										<div class="item-title label">姓名</div>
										<div class="item-input">
											<input type="text" id="createrole_rolename" placeholder="Your name">
										</div>
									</div>
								</div>
							</li>

							<li>
								<div class="item-content">
									<div class="item-media"><i class="icon icon-form-gender"></i></div>
									<div class="item-inner">
										<div class="item-title label">职业</div>
										<div class="item-input">
											<select id="createrole_selectprofession">
												<option v-for="profession in professions" v-bind:value="profession.gameprofession_id">
													{{profession.profession_name}}
												</option>

											</select>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="content-block">
						<div class="row">

							<div class="col-50">
								<a href="#" class="button button-big button-fill button-success" onclick="createrole_go_createrole()">提交</a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- popup, panel 等放在这里 -->
		<!--<div class="panel-overlay"></div>-->

		<!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
		<script>
			console.log($.device);
			console.log($.device.os);

			if($.device.os == null) {
				console.log('这是浏览器');
				var div = document.getElementById('thtml');
				div.setAttribute('style', 'font-size: 20px !important');
				var fbody = document.getElementById('body');
				fbody.style.cssText = "margin: auto;width: 720px;overflow-x: hidden; overflow-y: auto; ";
				var fgrop = document.getElementById('page-group');
				//div.style.cssText='width:250px;height:250px;border:1px red solid;';
				fgrop.style.cssText = "width: 720px;height: 1280px;";
			}

			$(function() {
				$.init()
			});
			//打开登陆页面
			function showlogin() {
				console.log('显示登陆');
				$('#av_login').attr('hidden', null);
				$('#register').attr('hidden', true);
			}
			//打开注册页面
			function showregister() {
				console.log('显示注册');
				$('#av_login').attr('hidden', true);
				$('#register').attr('hidden', null);

			}
			//执行登陆
			function go_login() {
				console.log("正在登陆。。。");
				var lo_uid = $('#login_uid').val();
				var lo_password = $('#login_password').val();

				$.post(loginurl, { uid: lo_uid, password: lo_password }, function(response) {
					// process response
					console.log(response);
					// JSON.parse(response);
					console.log("返回的状态码" + JSON.parse(response).status);
					if(JSON.parse(response).status == 200) {
						$.toast(JSON.parse(response).message);
						$.router.load('#createrole');
						//showlogin();
						var mcreaterole = new Createrole();
						mcreaterole.to_getprofession();
					} else if(JSON.parse(response).status == 201) {
						$.toast(JSON.parse(response).message);
						console.log("登陆获得的role"+JSON.parse(response).mgamerole);
						//设置全局gamerole对象
						gamerole = JSON.parse(response).mgamerole;
						$.router.load('#gameindex'); //mgameindex.gameindex_tosetmonsterdata();
					}else if (JSON.parse(response).status == 400){

                        $.toast(JSON.parse(response).message);
                    }
				});
			}
			//执行注册
			function to_register() {

				var re_uid = $('#register_uid').val();
				var re_password = $('#register_password').val();
				$.post(registerurl, { uid: re_uid, password: re_password }, function(response) {
					// process response
					console.log(response);
					// JSON.parse(response);
					console.log("返回的状态码" + JSON.parse(response).status);
					if(JSON.parse(response).status == 200) {
						$.toast("注册成功！请登陆");
						showlogin();
					} else {
						$.toast(JSON.parse(response).message);
					}
				})
			}
		</script>

		<script type='text/javascript' src='/resources/views/js/createrole.js' charset='utf-8'></script>
		<script type='text/javascript' src='/resources/views/js/gameindex.js' charset='utf-8'></script>
		<script type='text/javascript' src='/resources/views/js/fuben.js' charset='utf-8'></script>
		<script type='text/javascript' src='/resources/views/js/monster.js' charset='utf-8'></script>
	</body>

</html>