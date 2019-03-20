<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<title>iptv</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />  
	<meta name="baidu-site-verification" content="8X1bKAjuxm"/>
	<meta name="x5-fullscreen" content="true">
	<!-- <meta name="referrer" content="never"> -->
	<!-- <link rel="stylesheet" href="../plug/layui/css/layui.css"> -->
	<link rel="stylesheet" href="../main.css?v=<?php echo time();?>">
	
	<style>
		body{
			background-image:url(./images/bg.png);
		}
		ul{
			padding-left: 0;
		}
		.act312{
			width: 90%;
			height: 90%;
			margin: 0 auto;
			margin-top: 2.5%;
		}
		.act312>.left{
			width:50%;
			height: 100%;
		}
		.act312>.right{
			width:50%;
			height: 100%;
		}
		.act312-left-ul{
			width: 90%;
	    	height: 93%;
	    	padding-top: 6%;
	    	padding-left: 10%;
		}
		.act312-left-box{
			width:100%;
			height: 80%;
			background:url(./images/bg2.png) no-repeat;
			background-size:100% 100%;
		}
		.act312-left-ul li{
			width: 30%;
			height: 32%;
			float: left;
			background: url(./images/tree-bg.png) no-repeat center bottom;
			background-size:100% ;
			text-align:center;
			position: relative;
		}
		img{width: 100%;}
		.act312-left-ul li:nth-child(3n+2){
			margin:0 5%;
		}
		.act312-left-ul li img{
			width: 55%;
			height: 70%;
			position: relative;
			top: 4%;
			opacity: 0;
		}
		.act312-left-ul li.on img{
			opacity: 1;
		}
		.act312-right h1{
			text-align: center;
		}
		.games{
			width: 100%;
			height: 46%;
			background: url(./images/games.png) no-repeat;
			background-size:100% 100%;
		}
		.rule{
			width:100%;
			height:44%;
			background: url(./images/rule.png) no-repeat;
			background-size:100% 100%;
		}
		.act312-right-ul{
			width: 90%;
			height: 70%;
			margin:0 auto;
			position: relative;
			top:22%;
			text-align: center;
			padding-left:0;
		}
		.act312-right-ul li{
			display: inline-block;
			text-align: center;
			margin:2% 5%;
			padding:.3rem;
			background:#fff;
			border-radius:.5rem;
			/*box-sizing: border-box;*/
			position: relative;
		}
		.act312-right-ul li.active{
			background:#FCFF02;
		}
		.act312-right-ul li .img2,.act312-left-ul li .img2{
			position: absolute;
			right: 8%;
			top: 8%;
			width: 16%;
			height: auto;
			opacity: 0;
		}
		.act312-left-ul li .img2{
			top: 30%;
		}
		.act312-right-ul li .img2.mm1,.act312-left-ul li .img2.mm1{
			opacity: 1;
		}
		.act312-right-ul li .img{
			border-radius:.5rem;
		}
		.act312-right-ul li a{
			display: inline-block;
			padding: 4% 10%;
			border:1px solid #ffffff;
			border-radius: .5rem;
			margin-top: 8%;
		}
		.act312-right-ul li.li1{
			width: 28%;
			margin:1% 8%;
			margin-top: 2%;
		}
		.act312-right-ul li.li2{
			width: 28%;
			margin:1% 8%;
			margin-top: 2%;
		}
		.act312-right-ul li.li3{
			width: 28%;
			margin:1%;
			margin-top: 2%;
		}
		.act312-right-ul li.li4{
			width: 18%;
			margin:1%;
			margin-top:6%;
		}
		.act312-right-ul-btn{
			text-align: center;
			width: 100%;
			height: 10%;
			margin-top: 2%;
		}
		.act312-right-ul-btn li{
			width: 40%;
			height: 100%;
			float: left;

		}
		.act312-right-ul-btn li:nth-child(3){
			width: 20%;
		}
		.act312-right-ul-btn li img{
			width: 65%;
			height: 70%;
		}
		.act312-right-ul-btn li img.btn0{
			width: auto;
			/*height: 100%;*/
		}
		.act312-right-ul-btn li img.dou{
			animation: scale .5s linear infinite;
			-moz-animation: scale .5s linear infinite;
			-webkit-animation: scale .5s linear infinite;
			-o-animation: scale .5s linear infinite;
		}
		.bt.active{
			border:.3rem solid #AA742A;
			/*box-sizing: border-box;*/
		}
		.bt.active img{
			border-radius: 0;
		}
		.ul-title{
			width: 90%;
			display:block;
			margin: 4% auto;
		}
		.rule-ul{
			padding-left: 0;
			margin: 0;
		}
		.rule-ul li{
			line-height: 2rem;
		}
		.rule-ul li img{
			position: relative;
			top: 0rem;
		}
		.act312-left-ul li:nth-child(3) .img,.act312-left-ul li:nth-child(9) .img{
			opacity: 1;
			top: 18%;
			height: auto;
		}
		.act312-left-ul li.get img{
			animation: move .3s linear infinite;
			-moz-animation: move .3s linear infinite;
			-webkit-animation: move .3s linear infinite;
			-o-animation: move .3s linear infinite;
		}
		.b{
			border-color: transparent;
		}
		.btn2,.btn7,.lbtn,.btn0{
			border-radius:.5rem;
		}
		.layer-box{
			width: 50%;
			height: 50%;
			margin:-14% 0 0 -25%;
			position: absolute;
			left: 50%;
			top: 50%;
		}
		.ltitle{
			font-weight:bold;
			color: #0D5B68;
			margin-top: 3%;
		}
		.ltext{
			width: 80%;
			height: 58%;
			margin:4% auto 0 auto;
			line-height:3rem;
			font-weight: bold;
			color: #73BBD2;
		}
		.lbtn{
			width: 25%;
			position: absolute;
			margin-left: -12.5%;
			left: 50%;
			bottom: 10%;
		}
		.layer-box2{
			width: 50%;
			height: 60%;
			margin:-18% 0 0 -25%;
			background:url(./images/lbox.png?v=1) no-repeat;
			background-size: 100% 100%;
		}
		.layer-box1{
			background:url(./images/lbox2.png?v=2) no-repeat;
			background-size: 100% 100%;
			height: 66%;
			margin:-19% 0 0 -25%;
		}
		.layer-box1 .ltext{
			margin-top: 30%;
			width: 68%;
			color: #BF8D3C;
			line-height:2.2rem;
		}
		.ltext input{
			text-align: center;
			color: #ffffff;
			background: #BF8D3C;
			border:0;
			outline: none;
			padding:2% 0;
			margin-top:8%;
			border-radius: .5rem;
			letter-spacing:.1rem;
		}
		.layer-box1 .ltitle{
			display: none;
		}
		.layer-box1 .lbtn{
			bottom: 4%;
		}
	
		@-webkit-keyframes rotation{
		from {-webkit-transform: rotate(0deg);}
		to {-webkit-transform: rotate(360deg);}
		}
		
		@-webkit-keyframes scale{
		0 {-webkit-transform: scale(1);}
		50% {-webkit-transform: scale(.9);}
		100% {-webkit-transform: scale(1);}
		}

		@-webkit-keyframes move1{
		0 {-webkit-transform: translateX(0);}
		25% {-webkit-transform: translateX(-.5rem);}
		50% {-webkit-transform: translateX(0);}
		75% {-webkit-transform: translateX(.5rem);}
		100% {-webkit-transform: translateX(0);}
		}
		@-webkit-keyframes move{
		0 {
			-webkit-transform: translateX(0);
			-webkit-transform: rotate(0deg);
		}
		25% {
			-webkit-transform: translateX(-.5rem);
			-webkit-transform: rotate(-5deg);
		}
		50% {
			-webkit-transform: translateX(0);
			-webkit-transform: rotate(0deg);
		}
		75% {-webkit-transform: translateX(.5rem);-webkit-transform: rotate(5deg);}
		100% {-webkit-transform: translateX(0);-webkit-transform: rotate(0deg);}
		}
		
		.zk{
		-webkit-transform: rotate(360deg);
		animation: rotation 3s linear infinite;
		-moz-animation: rotation 3s linear infinite;
		-webkit-animation: rotation 3s linear infinite;
		-o-animation: rotation 3s linear infinite;
		}
		.act312-left-ul  p{
			position: absolute;
			width: 100%;
			text-align: center;
			bottom: -12%;
		}
		.dh{
			position: absolute;
			top: 2%;
			right:2%;
		}
		</style>
		
</head>
<body class='b'>

<!--
<div id='debug' style="position: absolute;width: 70%;height:100vh;top:5%;right: 5%;font-size: 23px;border:0px solid yellow;color:yellow;"> 

    <a href="./main.php" style="color:white;">进入主页</a> 

</div>
-->

	<p class='fs5 dh'>客服电话：184-4707-1615</p>
	<div class='act312 clear b'>
		<div class="left b">
			<img class='ul-title' src="./images/ul-title.png" alt="">
			<div class='act312-left-box'>
			<ul class='act312-left-ul b'>
				<li class='al'>
					<img class='img' src="./images/tree.png" alt="">
					<p>第1天</p>
				</li>
				<li class='al'>
					<img class='img' src="./images/tree.png" alt="">
					<p>第2天</p>
				</li>
				<li class='gf2'>
					<img class='img' src="./images/libao.png" alt="">
					<img class='img2' src="./images/ok.png" alt="">
				</li>
				<li class='al'>
					<img class='img' src="./images/tree.png" alt="">
					<p>第3天</p>
				</li>
				<li class='al'>
					<img class='img' src="./images/tree.png" alt="">
					<p>第4天</p>
				</li>
				<li class='al'>
					<img class='img' src="./images/tree.png" alt="">
					<p>第5天</p>
				</li>
				<li class='al'>
					<img class='img' src="./images/tree.png" alt="">
					<p>第6天</p>
				</li>
				<li class='al'>
					<img class='img' src="./images/tree.png" alt="">
					<p>第7天</p>
				</li>
				<li class='gf7'>
					<img class='img' src="./images/libao.png" alt="">
					<img class='img2' src="./images/ok.png" alt="">
				</li>
			</ul>
			</div>
		</div>
		
		<div class="right act312-right b">
		
			<div class="rule b">
				<p class='fs4' style="width:88%;margin:0 auto;margin-top:16%;">活动时间：2019.3.12-2019.3.31</p>
				<div class='clear' style="width:88%;margin:0 auto;margin-top:2%;">
						<p class='left fs4' style='margin:.2rem 0;'>活动规则：</p>
						<ul class="left rule-ul">
							<li class='fs3'>1、完成全部指定游戏，就可以获得一棵小树<img style="width:auto;height:1.4rem;margin:0 .2rem;" src="./images/tree.png" alt=""></li>
							<li class='fs3'>2、获得2棵<img style="width:auto;height:1.4rem;margin:0 .2rem;" src="./images/tree.png" alt="">，可以领取VSPN游戏视频包<img style="width:auto;height:1.4rem;margin:0 .2rem;" src="./images/libao.png" alt=""></li>
							<li class='fs3'>3、获得7棵<img style="width:auto;height:1.4rem;margin:0 .2rem;" src="./images/tree.png" alt="">，可以领取200元京东E卡<img style="width:auto;height:1.4rem;margin:0 .2rem;" src="./images/libao.png" alt=""></li>
						</ul>
				</div>
			</div>
			
			<div class="games">
				<ul class='act312-right-ul'>
				</ul>
			</div>
			
			<ul class='act312-right-ul-btn'>
				<li class="">
					<img class="bt btn2" src="./images/btn1.png" alt="">
				</li>
				<li class="">
					<img class="bt btn7" src="./images/btn2.png" alt="">
				</li>
				<li class="">
					<img class="bt btn0" src="./images/back.png" alt="">
				</li>
			</ul>
		</div>
	</div>
	
	<div class='layer none' style="position: fixed;width:100%;height:100%;top:0;left:0;z-index:90;background:rgba(0,0,0,.7);text-align: center;">
		<div class='layer-box'>
			<h2 class='ltitle fs6'>系统提示</h2>
			<div class='ltext fs4'>
					
			</div>
			<img class='lbtn bt' src="./images/qr.png" alt="">
		</div>
	</div>
	

	<script src='../jquery.min.js'></script>
	<script>

		var user_account = localStorage.getItem('userID') || '';


//$('#debug').html( 'userID=' + user_account );

		var path = "http://172.25.120.17/vspn/game/res/";
		// var path = "http://www.oneh5.com/iptv/res/";

		// 访问日志
		fnlog(1,'')

		fontSize();

		var index = sessionStorage.getItem('actIdx')||0;
		var gmLen = 0;  //游戏数量
		var lystaus = 0;  //是否弹窗
		var lmove = true;
		var telstatus = 0;  

		function fontSize()
		{
			$('.fs2').css('fontSize',$('body').height()*0.00111111+'rem');
			$('.fs3').css('fontSize',$('body').height()*0.00125+'rem')
			$('.fs4').css('fontSize',$('body').height()*0.001527778+'rem')
			$('.fs5').css('fontSize',$('body').height()*0.001666667+'rem')
			$('.fs6').css('fontSize',$('body').height()*0.0025+'rem')
			$('.fs7').css('fontSize',$('body').height()*0.003+'rem')

			$('.group-desc').css('lineHeight',$('body').height()*0.0025+'rem')
		}

		// $('.dh').html('user_account = ' + user_account)

		$.ajax({
			url : path+"activity.php",
			data:{
				action: 'list',
				user_account: user_account,
				from: 'epg'
			},
			type : "post",
			dataType : "jsonp",
			jsonp: "callback",
			jsonpCallback:"lj07",
			success : function(res){
				console.log(res);
				if( res.code == 1 )
				{
					var gms = '';
					gmLen = res.game_list.length;

					for( var i in res.game_list ){
						gms +=	"<li data-gid='"+ res.game_list[i].game_id +"' class='bt li"+ gmLen +"'>\
									<img class='img' src='"+ path + res.game_list[i].game_icon +"' alt=''>\
									<img class='img2 mm"+ res.game_list[i].played +"' src='./images/ok.png' alt=''>\
								</li>";
					}
					$('.act312-right-ul').html( gms )

					var trees = res.user.status;
					for( var i = 0; i < trees; i++ )
					{
						$('.act312-left-ul .al').eq(i).addClass('on')
					}
					if( trees < 2 ){
						$('.btn2').attr('src','./images/btn1a.png?v=1')
					}

					if( trees < 7 ){
						$('.btn7').attr('src','./images/btn2a.png?v=1')
					}

					if( res.user.get_bag == '1' ){
						$('.gf2').find('.img').attr('src','./images/vspn.png').attr('style','width: 80%;top:35%;')
						$('.gf2').find('.img2').addClass('mm1')
					}
					if( res.user.get_e == '1' ){
						$('.gf7').find('.img').attr('src','./images/e.png').attr('style','width: 80%;top:35%;')
						$('.gf7').find('.img2').addClass('mm1')
					}

					// 未领取vspn包
					if( trees >= 2  && res.user.get_bag == '0' ){
						index = gmLen;
						$('.gf2').addClass('get').find('.img').attr('src','./images/vspn.png').attr('style','width: 80%;top:35%;')
						$('.btn2').addClass('dou')
					}

					// 未领取vspn包
					if( trees >= 7  && res.user.get_e != '1' ){
						index = gmLen+1;
						$('.gf7').addClass('get').find('.img').attr('src','./images/e.png').attr('style','width: 80%;top:35%;')
						$('.btn7').addClass('dou')
					}

					addActive( 0,index )
				}
			},
			error:function(){
				console.log( 'request error' );
			}
		});


		function fngive(type,success)
		{
			$.ajax({
				url : path+"activity_log.php",
				data:{
					action: 'prize'+type,
					user_account: user_account,
				},
				type : "post",
				dataType : "jsonp",
				jsonp: "callback",
				jsonpCallback:"lj09",
				success : function(res){
					success(res)
				},
				error:function(){
					console.log( 'request error' );
				}
			});
		}

	
		//----------------------------------------------------------------------------------------
	    //返回按键
		window.onkeydown = function(event){

		   var val = (event.keyCode == undefined || event.keyCode == 0) ? event.which: event.keyCode;

		   //$('#debug').html( $('#debug').html() + "<br> window.onkeydown按键=" + val );

		   //返回
		   if( val == 8 )
		   {
		      var iptv_from = window.localStorage.getItem('iptv_from') || '';

		      if( iptv_from == 'act' )
		      {
		      		console.log('http: 1 csInterface.finish');

		      		csInterface.finish();
		      }
		      else
		      {
		      		console.log('http: 2 csInterface.goBack');

		      		csInterface.goBack();
		      }

	      	return true;
		   }
		}
		//----------------------------------------------------------------------------------------




		document.onkeydown = fnkey;
	    // document.onkeypress = fnkey;
	    


	    function fnkey(e)
	    {
			var val=0,e=e||event; 
			val=e.keyCode||e.which||e.charCode;

			switch(val) {

				case(13):  //OK
					
				break;

				case(37):  //左
					if( index > 0 )
					{
						index --;
					}
				break;

				case(38):  //上

					if( index > gmLen-1 )
					{
						index = gmLen-1
					}
				break;

				case(39):  //右
					if( index < gmLen + 2 )
					{
						index ++;
					}
				break;

				case(40):  //下
					if( index < gmLen )
					{
						index = gmLen
					}
				break;

				case(27): //返回
			
					return false;;
				break;

				case(8): //返回

					var iptv_from = window.localStorage.getItem('iptv_from') || '';

				      if( iptv_from == 'act' )
				      {
				      		console.log('http: 1exec csInterface.finish');

				      		csInterface.finish();
				      }
				      else
				      {
				      		console.log('http: 2exec csInterface.goBack');

				      		csInterface.goBack();
				      }

			      	

			      	return true;
			      	
				break;
			}

			if( lmove || val == 13 )
			{
				addActive( val,index )
			}
			
	    }


	    // window.addEventListener("popstate", function(){
	    //     alert('禁止返回')
	    // }, false);


	    function addActive( val, index )
	    {
	    	var idx = index;
	    	if( val == 13 )
	    	{	
				// 点击领取vspn
	    		if( $('body .bt').eq(idx).hasClass('btn2') && lystaus == 0 )
	    		{
	    			fngive(1,function(res){
	    				console.log('领vspn',res)
	    				var k = 0;
	    				// 不到领取条件
	    				/*if( res.code == 9031 )
	    				{
	    					k = 1;
	    					$('.layer-box').removeClass('layer-box1').addClass('layer-box2')
	    					$('.ltext').html('您需要种上2棵<img style="width:auto;height:2rem;margin:0 .2rem;" src="./images/tree.png" alt="">，即可领取vspn游戏视频包 <div style="position: relative;width:100%;height:100%;"><img class="zk" style="width:38%;height:auto;margin:0 .2rem;position: absolute;left:30%;margin-top:-2%;" src="./images/g.png" alt=""><img style="position: relative;z-index:9;width:auto;height:40%;margin:0 .2rem;margin-top: 8%;" src="./images/vspn.png" alt=""></div>')
	    				}
	    				// 成功领取
	    				else if( res.code == 1 )
	    				{
	    					k = 2;
	    					$('.layer-box').removeClass('layer-box2').addClass('layer-box1')
	    					$('.ltext').html('恭喜您成功获得vspn视频单月包，2019.03.31日活动结束后生效。<img style="display:block;z-index:9;width:auto;height:30%;margin:0 auto;margin-top: 2%;" src="./images/vspn.png" alt="">');
	    				}
	    				// 已经领过了
	    				else if( res.code == 9032 )
	    				{
	    					k = 3;
	    					$('.layer-box').removeClass('layer-box1').addClass('layer-box2')
	    					$('.ltext').html("<p style='margin-top:20%;'>您已经领取过vspn连续包了，2019年4月1日生效，首月免费次月自动续费。</p>");
	    				}
	    				// 奖品已经被领完
	    				else if( res.code == 9003 )
	    				{
	    					k = 4;
	    					$('.layer-box').removeClass('layer-box1').addClass('layer-box2')
	    					$('.ltext').html("<p style='margin-top:20%;'>很遗憾，vspn单月视频包已被领取完了，感谢您的参与！</p>");
	    				}*/

	    				sessionStorage.setItem('actIdx',index)

	    				window.location.href = './312a.php?types=1&code='+res.code

	    			})
					$('.layer').removeClass('none');
					idx = $('body .bt').length - 1;
					lmove = false;
					lystaus = 1;
				}
				// 点击领取京东e卡
	    		else if( $('body .bt').eq(idx).hasClass('btn7') && lystaus == 0 )
	    		{
	    			fngive(2,function(res){

	    				console.log('领e卡',res)
	    				// 不到领取条件
		    			/*if( res.code == 9031 )
	    				{
	    					$('.layer-box').removeClass('layer-box1').addClass('layer-box2')
	    					$('.ltext').html('您需要种上7棵<img style="width:auto;height:2rem;margin:0 .2rem;" src="./images/tree.png" alt="">，即可领取200元京东e卡 <div style="position: relative;width:100%;height:100%;"><img class="zk" style="width:38%;height:auto;margin:0 .2rem;position: absolute;left:30%;margin-top:-2%;" src="./images/g.png" alt=""><img style="position: relative;z-index:9;width:auto;height:40%;margin:0 .2rem;margin-top: 8%;" src="./images/e.png" alt=""></div>')
	    				}
	    				// 成功领取
	    				else if( res.code == 1 || res.code == 9999 )
	    				{
	    					$('.layer-box').removeClass('layer-box2').addClass('layer-box1')
	    					$('.ltext').html("恭喜您成功获得200元京东e卡，请留下您的联系电话，我们工作人员会尽快联系您发奖。<input class='fs5 tel' type='tel' value='' placeholder='输入联系电话'>");
	    					telstatus = 1;
	    					$('.ltext input').focus();
	    				}
	    				// 已经领过了
	    				else if( res.code == 9032 )
	    				{
	    					$('.layer-box').removeClass('layer-box1').addClass('layer-box2')
	    					$('.ltext').html("<p style='margin-top:20%;'>您已经领取过京东e卡了哦</p>");
	    				}
	    				// 奖品已经被领完
	    				else if( res.code == 9003 )
	    				{
	    					$('.layer-box').removeClass('layer-box1').addClass('layer-box2')
	    					$('.ltext').html("<p style='margin-top:20%;'>很遗憾，京东e卡已被领取完了，感谢您的参与！</p>");
	    				}*/

	    				sessionStorage.setItem('actIdx',index)

	    				window.location.href = './312a.php?types=2&code='+res.code
	    			})
					$('.layer').removeClass('none');
					idx = $('body .bt').length - 1;
					lmove = false;
					lystaus = 1;
				}
				else if( $('body .bt').eq(idx).hasClass('btn0') && lystaus == 0 ){
					window.location.href = '../main.php';
				}
				// 点击弹窗确定
	    		else if( lystaus == 1 )
	    		{
	    			if( telstatus == 1 )
	    			{
	    				var tel = $('body .tel').val();
	    				if( !/^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/.test(tel) ){

	    					return;
	    				}
	    				else
	    				{
	    					telstatus = 0;
	    					fne( tel )
	    					$('.layer').addClass('none');
		    				lystaus = 0;
							lmove = true;
	    				}
	    			}
	    			else
	    			{
	    				$('.layer').addClass('none');
	    				lystaus = 0;
						lmove = true;
	    			}
				}
				else
				{
					var gid = $('body .bt').eq(idx).attr('data-gid');
					// 游戏日志
					fnlog(2,gid)
					localStorage.setItem('iptvGID',gid)
					sessionStorage.setItem('actIdx',index)
					window.location.href = '../details.php';
					lystaus = 0;
					lmove = true;
				}
	    	}
	    	else
	    	{
	    		lystaus = 0;
	    		lmove = true;
	    	}

	    	$('body .bt').removeClass('active').eq(idx).addClass('active')
	    }


	    // 电话号码领取e卡
	    function fne( tel )
	    {
	    	$.ajax({
				url : path+"activity_log.php",
				data:{
					action: 'tel',
					user_account: user_account,
					tel: tel
				},
				type : "post",
				dataType : "jsonp",
				jsonp: "callback",
				jsonpCallback:"lj09",
				success : function(res){
					console.log('输入手机号领取e卡',res)
				},
				error:function(){
					console.log( 'fne error' );
				}
			});
	    }


	    // 日志接口
	    function fnlog(type,game_id)
	    {
	    	$.ajax({
				url : path+"activity_log.php",
				data:{
					action: 'play',
					user_account: user_account,
					type: type,
					game_id: game_id
				},
				type : "post",
				dataType : "jsonp",
				jsonp: "callback",
				jsonpCallback:"lj09",
				success : function(res){
					console.log('日志'+type,res)
				},
				error:function(){
					console.log( 'fnlog error' );
				}
			});
	    }
	</script>
</body>
</html>
