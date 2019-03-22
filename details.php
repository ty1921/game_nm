<?php

error_reporting(E_ALL && ~E_NOTICE); 

date_default_timezone_set('PRC');

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<title>details</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="baidu-site-verification" content="8X1bKAjuxm"/>
	<meta name="x5-fullscreen" content="true">
	<link rel="stylesheet" href="./main.css?v=<?php echo time();?>">
</head>
<body>
	<div class="main">
		
		<!-- 左 -->
		<div class="m-left inlineB" style="position: relative;left:-11%;">
			<a href="javascript:;" class="m-left-box">
				<p class="rank-icon">排行榜>></p>
				<ul id='rank-list'></ul>
				<div class="_my"></div>
			</a>
		</div>
		
		<!-- 中 -->
		<div class="center inlineB">
			
			<div class="c-header clear">
				<img class="img-user-header left" src="./images/user-header.png" alt="">
				<div class="user-info inlineB left">
					<p class="user-name">加载中...</p>
					<p class="user-rank">我的成绩：<span>加载中...</span></p>
					<p class="supplier">供应商：<span>加载中...</span></p>
					<p class="peoples">游戏人数：<span>加载中...</span></p>
				</div>
			</div>

			<div class="c-nav clear">
				<!-- <img class="left" src="./images/gm.png" alt=""> -->
				<div class="left">
					<div>
						<p>游戏</p>
						<p>模式</p>
					</div>
				</div>
				<div class="nav-img-box right clear"></div>
			</div>
			
			<div class="c-text-box ">
				<p class="c-title">游戏简介：</p>
				<p class="c-text">加载中...</p>
			</div>
			
			<div class="c-footer clear ">
				<div class="left">
					<div>
						<p>游</p>
						<p>戏</p>
						<p>推</p>
						<p>荐</p>
					</div>
				</div>
				<div class="c-menu right"></div>
			</div>

		</div>
		
		<!-- 右 -->
		<div class="m-right inlineB">
			<p class="img-screenshot">
				<span>游戏截图</span>
			</p>
			<div class="imgs"></div>
		</div>

	</div>

	<!-- 左侧排行榜 -->
	<a href="javascript:;" class="ranks none">
		<div class="rank-box">
			<ul class="rank"></ul>
			<div class="rank clear">
				<div>
					<span class="rank-num">0</span>
					<img class="rank-header" src="./images/user-header.png" alt="">
					<p class="rank-user num1">加载中...</p>
					<p class="rank-score num1">加载中...</p>
				</div>
			</div>
		</div>
	</a>
	
	<!-- 截图全屏 -->
	<a href="javascript:;" class="bigs none">
		<img id='bigImg' src="" alt="">
	</a>
	
	

	<img class="loading" src="./images/loading.gif" alt="">


<div id='debug' style="display:none;word-wrap: break-word; position: absolute;background: rgba(8, 8, 8, 0.78);width: 100%;
    height: 100vh; top: 0;left: 0;font-size: 23px;padding:5%;color: yellow;"> 
    <a id="debug_back" href="./main.php" style="font-weight: bold;font-size: 30px;">很抱歉，出现异常错误，请返回重试！ </a>
</div>


<!-------------------------------------------------------------------------------------------->
	
	<script src='./jquery.min.js'></script>

	<script src='./comm.js?v=<?php echo time();?>'></script>

	<script>
		$('.main').fadeOut(0);

		fontSize();
		
		var user_id = window.localStorage.getItem('iptvUid') || '';


		var game_id = window.localStorage.getItem('iptvGID');


		window.onload = function(){ 
		    //300秒发送一次浏览日志
		    traceLogBrowse( game_id, '', 'details' );
		    
		    setInterval(function(){
		        traceLogBrowse( '1001', '', 'details' );
		    },300000);
		}


		
		//返回按键
		/*window.document.onkeypress = function(event){
			fnBack(event)
		};
		window.document.onkeydwon = function(event){
			fnBack(event)
		};

		function fnBack()
		{
			var val = (event.keyCode == undefined || event.keyCode == 0) ? event.which: event.keyCode;
		    
		    if( val == 8 )
		    {
		      csInterface.goBack();

		      return true;
		    }
		}*/

		//返回按键
		window.onkeydown = function(event){

		   var val = (event.keyCode == undefined || event.keyCode == 0) ? event.which: event.keyCode;

		   //$('#debug').html( $('#debug').html() + "<br> window.onkeydown按键=" + val );

		   //返回
		   if( val == 8 )
		   {
		   		var iptv_from = window.localStorage.getItem('iptv_from') || '';

		      	//console.log('iptv_from=' + iptv_from);

				if( iptv_from == 'act_game' )
				{
						console.log('http: detail finish');

						csInterface.finish();
				}
				else
				{
						console.log('http: detail goBack');

						csInterface.goBack();
				}

				/*
		      //$('#debug').html( $('#debug').html() + "<br> <br>  成功拦截返回.window.onkeydown");
		      
		      csInterface.goBack();

		      //return true表示拦截自己处理了 return false表示自己不拦截处理
		      //window.history.back();
		      */

		      return true;
		   }
		}



		// 点击排行榜
		$('.m-left-box').click(function(){
			if( $(this).hasClass('open') )
			{
				$('.ranks').removeClass('none').focus();
				$('.rank-box').addClass('active');
			}
			else
			{
				alert('暂无排行数据');
			}
		})

		// 关闭排行榜
		$('.ranks').click(function(){
			$('.ranks').addClass('none');
			$('.rank-box').removeClass('active');

			$('.m-left-box').focus();
		})

		var imgWH = $('.img-game-li').width() / $('.img-game-li').height();
		var bodyWH = document.body.clientWidth / document.body.clientHeight;
		
		// 点击看大图
		$('.m-right').on('click','.img-game-li',function(){
			imgWH > bodyWH 
			? 
			$('.bigs').addClass('w active').attr('data-cl',$(this).attr('data-cl')).removeClass('none').focus() 
			: 
			$('.bigs').addClass('h active').attr('data-cl',$(this).attr('data-cl')).removeClass('none').focus()

			$('#bigImg').attr('src',$(this).attr('data-src'))
		})

		// 关闭大图
		$('.bigs').click(function(){
			imgWH > bodyWH 
			? 
			$('.bigs').addClass('w none').removeClass('active')
			: 
			$('.bigs').addClass('h none').removeClass('active')

			$('.'+$(this).attr('data-cl')).focus();
		})
		
		//var game_id = window.localStorage.getItem('iptvGID');
					/*var game_id = "<?php
						echo $game_id = isset($_REQUEST['game_id']) ? $_REQUEST['game_id'] : '';
					?>"*/;

		details( game_id );

		rank( game_id );

		function details(game_id)
		{
			$('.loading').fadeIn(0);
			$.ajax({
				url: './res/res.php?action=details',
				type: 'get',
				data: {
					'user_id': user_id,
					'game_id': game_id
				},
				dataType : "json",
				success: function(res)
				{	
					var forms = {1:'赛翁',2:'左卡游戏'};
					if( res.code == 1 )
					{
						$('.img-user-header').attr('src',res.data.details.icon)
						$('.user-name').text(res.data.details.name);
						$('.supplier span').text( forms[res.data.details.form] );
						$('.c-text').text(res.data.details.desc);

						$('div.rank .rank-header').attr('src',res.data.users.user_icon);
						$('div.rank .rank-user').text(res.data.users.user_name);

						var mRight = '';
						for (var i in res.data.details.imgs) 
						{
							mRight += '<a class="img-game-li img'+ i +'" data-cl="img'+ i +'" data-src="'+res.data.details.imgs[i]+'" href="javascript:;">\
											<img width="100%" height="100%" src="'+res.data.details.imgs[i]+'" alt="">\
										</a>';
						}
						$('.imgs').html(mRight);

						var cMenu = '';
						for (var i in res.data.recommend) 
						{
							cMenu += '<a href="javascript:;" data-id="'+res.data.recommend[i].game_id+'" class="inlineB menu-li-3">\
										<img style="height:68.13%" src="'+res.data.recommend[i].game_icon+'" alt="">\
										<p class="menu-li-text num1">'+res.data.recommend[i].name+'</p>\
									</a>;'
						}
						$('.c-menu').html(cMenu);

						var navImg = '';
						for (var i in res.data.details.mode) 
						{
							navImg += '<div class="nav-img-d"><a class="nav-img" data-mode="'+ res.data.details.mode[i].mode_status +'" href="javascript:void(0)" onclick="fnPlay(this,\''+res.data.details.mode[i].link+'\', '+ res.data.details.is_pay +');">'+res.data.details.mode[i].mode+'</a></div>';
						}
						$('.nav-img-box').html(navImg);
						fontSize()
					}
					else
					{
						window.location.href = './main.php';
						alert('操作错误！');
					}
					$('.loading').fadeOut(0);
					$('.main').fadeIn();
					$('.nav-img-box').find('.nav-img').eq(0).focus();
				},
				error:function()
				{
					console.log('res');
				}
			})
		}


		function rank(game_id)
		{
			$.ajax({
				url: './res/res.php?action=rank',
				type: 'get',
				data: {
					'user_id': user_id,
					'game_id': game_id
				},
				dataType : "json",
				success: function(res)
				{	
					console.log(res)
					$('._my').addClass('none');
					if( res.code == 1 )
					{	
						$('.user-rank span,div.rank .rank-num,div.rank .rank-score').text(0);

						var rank_4 = '',rank_6 = '',mH = '';

						if( res.data.rank.length > 0 )
						{
							$('.user-rank').css('opacity','1');

							$('.m-left,.main').css('left','0');
							$('.m-left-box').addClass('open');

							for (var i in res.data.rank) 
							{
								if( res.data.rank[i].is_me == '1' )
								{
									$('div.rank .rank-num').text( parseFloat(i)+1 );
									// 我的成绩
									$('div.rank .rank-score,.user-rank span').text(res.data.rank[i].score);

									$('._my').removeClass('none');
									mH = '<span class="img-num">'+(parseFloat(i)+1)+'</span>\
												<img class="img-header" src="'+ res.data.rank[i].avatar +'" alt="">\
											  <span class="my_mc" style="">我的名次</span>';
								}

								if( i < 3 )
								{
									rank_4 += '<li>\
													<span class="img-num">'+( parseFloat(i)+1 )+'</span>\
													<img class="img-header" src="'+ res.data.rank[i].avatar +'" alt="">\
												</li>';
								}

								rank_6 += '<li class="clear">\
												<div><span class="rank-num rank-num'+ ( parseFloat(i)+1 ) +'">'+( parseFloat(i)+1 )+'</span>\
												<img class="rank-header" src="'+ res.data.rank[i].avatar +'" alt="">\
												<p class="rank-user num1">'+ res.data.rank[i].nickname +'</p>\
												<p class="rank-score num1">'+ res.data.rank[i].score +'</p></div>\
											</li>';
							}
						}
						else
						{
							$('.m-left').css('left','-11%');
							$('.main').css('left','-7.5%');
							$('.m-left-box').removeClass('open');
							$('.user-rank').css('opacity','0');
						}
						$('.peoples span').text(res.data.sum);
						$('#rank-list').html(rank_4);
						$('ul.rank').html(rank_6);
						$('._my').html(mH);	

						fontSize()
						
					}
				},
				error:function(){}
			})
		}

		
		$('body').on('click','.c-menu .menu-li-3',function(){
			game_id = $(this).attr('data-id');
			details( game_id );
			rank( game_id );
			window.localStorage.setItem('iptvGID',game_id);
		})



		function fontSize()
		{
			$('.user-id,.rank-icon,\
			.img-screenshot,\
			.user-rank,\
			.supplier,\
			.peoples,\
			.rank-num,\
			.rank-header,\
			.img-num,\
			.my_mc,\
			.user-id span,.c-text').css('fontSize',$('body').height()*0.00111111+'rem');
			$('.user-name,.c-menu .menu-li-text').css('fontSize',$('body').height()*0.00125+'rem')
			$('.menu-li-text,body .nav-img,body .rank-user,.rank-score,.tab li a').css('fontSize',$('body').height()*0.001527778+'rem')
			$('.c-nav p,.c-title,.main .user-name,.c-footer>p,.c-footer>.left p,.img-screenshot span,.rank-icon').css('fontSize',$('body').height()*0.001666667+'rem')

			$('.rank-num').width( $('body').height()*0.003+'rem' )
						  .height( $('body').height()*0.003+'rem' )
						  .css('lineHeight',$('body').height()*0.003+'rem')
			$('.rank-num1,.rank-num2,.rank-num3').height( $('body').height()*0.006+'rem' );
		}




		function fnPlay( self, link, is_pay )
		{
			traceLogPlayer( 1001, game_id, 1000 );

			var mode = self.getAttribute('data-mode');

			var log_userID = localStorage.getItem('userID', -1 );

			var game_id =  localStorage.getItem('iptvGID', -1);

			//$('#debug').html( link );
			//
			// console.log(link);
			// 
			// console.log(is_pay);
			
			if( is_pay == 1 )
			{
				// 记录用户游戏模式日志
				fnGamemodeLog( user_id, log_userID, game_id, mode, 1 );

				//免费，直接游戏
				window.location.href = link;
			}
			else
			{
				//鉴权付费
				// programAuth( link );
				programAuth( user_id, game_id, mode, link );
			}
		}

	</script>

</body>
</html>
