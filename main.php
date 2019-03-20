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
	<link rel="stylesheet" href="./main.css?v=<?php echo time();?>">
	
	<style>
		
	</style>
</head>
<body>
	
	<!-- 头部 -->
	<div class="clear header" style='text-align: center;'>

		<div class="left">
			<img class="user-header" src="./images/user-header.png" alt="">
			<div class="user-info">
				<p class="user-name" style='text-align: left;'>加载中...</p>
				<p class="user-id" style='text-align: left;'><span>ID：加载中...</span></p>
			</div>
		</div>
		

		<!-- 导航菜单 -->
		<ul class="tab" style='float: left;'>
			<li>
				<a href="javascript:;" class='tba1 tab-li active' data-id='1'>推荐</a>
			</li>
			<li><a href="javascript:;" class='tba2 tab-li' data-id='2'>竞技</a></li>
			<li><a href="javascript:;" class='tba3 tab-li' data-id='3'>动作冒险</a></li>
			<li><a href="javascript:;" class='tba4 tab-li' data-id='4'>休闲益智</a></li>
		</ul>

		
		<div class="right logo">
			<img class=" " src="./images/logo.png?v=12" alt="">
		</div>
	</div>
	

	
<!-- 
<div id='debug' style="position: absolute;background: #000;z-index:99999999;top:0;left: 0;width: 50%;height: 100vh;border:2px solid red;font-size: 1rem;padding-left:1rem; "></div> -->
	
	
	<!-- 菜单分类 -->
	<div class="menu"></div>
	
	
	<img class="loading" src="./images/loading.gif" alt="">
	
	<div id='yy' style="display: none;position: absolute;background: #000;z-index:99999999;top:0;right: 0;width: 30%;height: 100vh;border:2px solid yellow;font-size: 1rem;padding-left:1rem; ">
		<a href="./act/312.php">进入植树节</a>
	</div>

	<script src='./jquery.min.js'></script>
	<script src='./comm.js?v=3'></script>
	<script>
		<?php $v='?v=1';?>
		fontSize()


		//--------------------------------------------------------------
		//内蒙测试账号的隐藏入口
/*
		var user_account = localStorage.getItem('userID', -1 );

		if( user_account == 'itv999000000006' )
		{
			$('#yy').show();
		}
		//--------------------------------------------------------------
*/
		var DU = 0,
			TP = 1,	//键盘 上键
			BT = 0,	//键盘 下键	
			TA = 0,
			SH = 0;	

		window.onload = function(){ 
		    //300秒发送一次浏览日志
		    traceLogBrowse( '1000', '', 'index' );
		    
		    setInterval(function(){
		        traceLogBrowse( '1000', '', 'index' );
		    },300000);
		}


		var VI = window.sessionStorage.getItem('iptvVI') || 0;

		var iptvID = window.sessionStorage.getItem('iptvID') || '';

		// 默认推荐在
		if( !window.sessionStorage.getItem('iptvMenu4') )
		{
			window.sessionStorage.setItem('iptvMenu4',1);
		}
		

		// alert('iptvID = ' +iptvID);

		function fntab( status )
		{	
			var iptvMenu = window.sessionStorage.getItem('iptvMenu4');
			// alert('iptvMenu = ' +iptvMenu + ' ; D = ' +DU);

			$('.tab-li').removeClass('active').blur();
			$('.tba'+iptvMenu).addClass('active').focus();

			if( status == 'one' )
			{
				if( iptvMenu != 1 )
				{	
					info( iptvMenu, '333333');
				}
				else
				{
					info( 1, 'first' );
				}	
			}
		}


		fntab('one');

		// console.log('vi = ' + VI)


		window.document.onkeypress = function(event){
			keys(event);
		};

		window.document.onkeydown = function(event){
			keys(event);
		};


		function keys(event)
		{	
			DU = val == 38 ? 1 : 0;

		    var val = (event.keyCode == undefined || event.keyCode == 0) ? event.which: event.keyCode;
		    
		   	// 键盘“上”
		    if( val == 38 )
		    {
		    	SH ++;
		    	if( TP == 1 ){
		    		// 光标从内容页回顶部菜单 页面不刷新
		    		fntab('two');
		    	}
		    }

		    // 键盘“下”
		    else if( val == 40 && BT == 1)
		    {
		    	// $('.menu a').blur().gte(0).focus();
		    	// console.log( $('.menu a')[0] )
		    }

		    if( val == 8 )
		   {
		      csInterface.finish();

		      return true;
		   }
		};

		
		// 
		$('.tab li a').on('focus',function(){
			
			var id = $(this).attr('data-id');
			// alert(id+' ; '+window.sessionStorage.getItem('iptvMenu4'));
			if( DU == 0 && id != window.sessionStorage.getItem('iptvMenu4') )
			{
				$(this).addClass('active').parent('li').siblings('li').find('a').removeClass('active');
				window.sessionStorage.setItem('iptvMenu4',id);
				// console.log('tab li ');
				BT = 1;
				
				$('.loading').fadeIn(0);
				$('.menu').hide();

				setTimeout(function(){
					info( id, '' );
				},100)
			}
		})

		
		function info( type, desc )
		{	
			var user_id = window.localStorage.getItem('iptvUid') || '';
			if( DU == 0 )
			{ 
			$('.loading').fadeIn(0);
			$('.menu').hide();
			// console.log('id = ' +type)
			$.ajax({
				url: './res/res.php',
				data:{
					'action':'cover',
					'user_id':user_id,
					'type': type,
					'user_account': localStorage.getItem('userID') || ''
				},
				type: 'post',
				dataType : "json",
				success: function(res)
				{	
					// console.log(res)
					window.localStorage.setItem('iptvUid',res.users['user_id']);
					$('.user-header').attr('src',res.users['user_icon']);
					$('.user-name').text(res.users['user_name']);
					$('.user-id span').text('ID：'+res.users['user_id']);

					if( res.code == 1 )
					{
						var menu = '';
						
						// 推荐
						if( type == 1 )
						{	
							// data-t = 1 按上键 触发监听事件
							if( res.len == 4 ){
								menu = '<div class="menu-li cdr">\
											<a data-t="1" data-i="1" data-gid="'+res.data[0].game_id+'" href="javascript:;" tabindex="1" class="inlineB menu-li-1 frist-list fc cdr-1">\
												<img src="'+ res.data[0].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[0].name +'</p>\
												<img class="tips hot'+ res.data[0].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[0].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>\
											<a data-t="1" data-i="2" data-gid="'+res.data[1].game_id+'" href="javascript:;" class="inlineB menu-li-1 fc">\
												<img src="'+ res.data[1].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[1].name +'</p>\
												<img class="tips hot'+ res.data[1].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[1].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>\
										</div>\
										<div class="menu-li cdr">\
											<div class="menu-li-2-box">\
												<a data-t="1" data-i="3" data-gid="'+res.data[2].game_id+'" href="javascript:;" class="inlineB menu-li-2 fc">\
													<img src="'+ res.data[2].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[2].name +'</p>\
													<img class="tips hot'+ res.data[2].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[2].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="1"  data-i="4" data-gid="'+res.data[3].game_id+'" href="javascript:;" class="inlineB menu-li-2 fc">\
													<img src="'+ res.data[3].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[3].name +'</p>\
													<img class="tips hot'+ res.data[3].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[3].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
											</div>\
										</div>';
							}
							else if( res.len == 6 ){
								menu = '<div class="menu-li cdr">\
											<a data-t="1" data-i="1" data-gid="'+res.data[0].game_id+'" href="javascript:;" class="inlineB menu-li-1 frist-list fc cdr-1">\
												<img src="'+ res.data[0].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[0].name +'</p>\
												<img class="tips hot'+ res.data[0].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[0].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>\
											<a data-t="1" data-i="2" data-gid="'+res.data[1].game_id+'" href="javascript:;" class="inlineB menu-li-1 fc">\
												<img src="'+ res.data[1].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[1].name +'</p>\
												<img class="tips hot'+ res.data[1].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[1].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>\
										</div>\
										<div class="menu-li cdr">\
											<div class="menu-li-2-box">\
												<a data-t="1" data-i="3" data-gid="'+res.data[2].game_id+'" href="javascript:;" class="inlineB menu-li-2 fc">\
													<img src="'+ res.data[2].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[2].name +'</p>\
													<img class="tips hot'+ res.data[2].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[2].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="1" data-i="4" data-gid="'+res.data[3].game_id+'" href="javascript:;" class="inlineB menu-li-2 fc">\
													<img src="'+ res.data[3].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[3].name +'</p>\
													<img class="tips hot'+ res.data[3].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[3].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
											</div>\
											<div class="menu-li-3-box">\
												<a data-t="0" data-i="5" data-gid="'+res.data[4].game_id+'" href="javascript:;" class="inlineB menu-li-3 fc">\
													<img src="'+ res.data[4].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[4].name +'</p>\
													<img class="tips hot'+ res.data[4].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[4].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="0" data-i="6" data-gid="'+res.data[5].game_id+'" href="javascript:;" class="inlineB menu-li-3 fc">\
													<img src="'+ res.data[5].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[5].name +'</p>\
													<img class="tips hot'+ res.data[5].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[5].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
											</div>\
										</div>';
							}
							else if( res.len == 8 ){
								menu = '<div class="menu-li cdr">\
											<a data-t="1" data-i="1" data-gid="'+res.data[0].game_id+'" href="javascript:;" tabindex="1" class="inlineB menu-li-1 frist-list fc cdr-1">\
												<img src="'+ res.data[0].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[0].name +'</p>\
												<img class="tips hot'+ res.data[0].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[0].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>\
											<a data-t="1" data-i="2" data-gid="'+res.data[1].game_id+'" href="javascript:;" class="inlineB menu-li-1 fc">\
												<img src="'+ res.data[1].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[1].name +'</p>\
												<img class="tips hot'+ res.data[1].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[1].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>\
										</div>\
										<div class="menu-li cdr">\
											<div class="menu-li-2-box">\
												<a data-t="1" data-i="3" data-gid="'+res.data[2].game_id+'" href="javascript:;" class="inlineB menu-li-2 fc">\
													<img src="'+ res.data[2].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[2].name +'</p>\
													<img class="tips hot'+ res.data[2].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[2].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="1" data-i="4" data-gid="'+res.data[3].game_id+'" href="javascript:;" class="inlineB menu-li-2 fc">\
													<img src="'+ res.data[3].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[3].name +'</p>\
													<img class="tips hot'+ res.data[3].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[3].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
											</div>\
											<div class="menu-li-3-box">\
												<a data-t="0" data-i="5" data-gid="'+res.data[4].game_id+'" href="javascript:;" class="inlineB menu-li-3 fc">\
													<img src="'+ res.data[4].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[4].name +'</p>\
													<img class="tips hot'+ res.data[4].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[4].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="0" data-i="6" data-gid="'+res.data[5].game_id+'" href="javascript:;" class="inlineB menu-li-3 fc">\
													<img src="'+ res.data[5].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[5].name +'</p>\
													<img class="tips hot'+ res.data[5].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[5].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="0" data-i="7" data-gid="'+res.data[6].game_id+'" href="javascript:;" class="inlineB menu-li-3 fc">\
													<img src="'+ res.data[6].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[6].name +'</p>\
													<img class="tips hot'+ res.data[6].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[6].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="0" data-i="8" data-gid="'+res.data[7].game_id+'" href="javascript:;" class="inlineB menu-li-3 fc">\
													<img src="'+ res.data[7].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[7].name +'</p>\
													<img class="tips hot'+ res.data[7].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[7].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
											</div>\
										</div>';
							}
							else if( res.len == 10 ){
								menu = '<div class="menu-li cdr">\
											<a data-t="1" data-i="1" data-gid="'+res.data[0].game_id+'" href="javascript:;" tabindex="1" class="inlineB menu-li-1 frist-list fc cdr-1">\
												<img src="'+ res.data[0].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[0].name +'</p>\
												<img class="tips hot'+ res.data[0].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[0].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>\
											<a data-t="1" data-i="2" data-gid="'+res.data[1].game_id+'" href="javascript:;" class="inlineB menu-li-1 fc">\
												<img src="'+ res.data[1].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[1].name +'</p>\
												<img class="tips hot'+ res.data[1].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[1].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>\
										</div>\
										<div class="menu-li cdr">\
											<div class="menu-li-2-box">\
												<a data-t="1" data-i="3" data-gid="'+res.data[2].game_id+'" href="javascript:;" class="inlineB menu-li-2 fc">\
													<img src="'+ res.data[2].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[2].name +'</p>\
													<img class="tips hot'+ res.data[2].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[2].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="1" data-i="4" data-gid="'+res.data[3].game_id+'" href="javascript:;" class="inlineB menu-li-2 fc">\
													<img src="'+ res.data[3].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[3].name +'</p>\
													<img class="tips hot'+ res.data[3].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[3].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
											</div>\
											<div class="menu-li-3-box">\
												<a data-t="0" data-i="5" data-gid="'+res.data[4].game_id+'" href="javascript:;" class="inlineB menu-li-3 fc">\
													<img src="'+ res.data[4].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[4].name +'</p>\
													<img class="tips hot'+ res.data[4].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[4].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="0" data-i="6" data-gid="'+res.data[5].game_id+'" href="javascript:;" class="inlineB menu-li-3 fc">\
													<img src="'+ res.data[5].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[5].name +'</p>\
													<img class="tips hot'+ res.data[5].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[5].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="0" data-i="7" data-gid="'+res.data[6].game_id+'" href="javascript:;" class="inlineB menu-li-3 fc">\
													<img src="'+ res.data[6].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[6].name +'</p>\
													<img class="tips hot'+ res.data[6].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[6].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
												<a data-t="0" data-i="8" data-gid="'+res.data[7].game_id+'" href="javascript:;" class="inlineB menu-li-3 fc">\
													<img src="'+ res.data[7].game_cover +'" alt="">\
													<p class="menu-li-text num1">'+ res.data[7].name +'</p>\
													<img class="tips hot'+ res.data[7].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
													<img class="tips pay'+ res.data[7].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
												</a>\
											</div>\
										</div>\
										<div class="menu-li cdr" style="margin-right:1%;">\
											<a data-t="1" data-i="9" data-gid="'+res.data[8].game_id+'" href="javascript:;" class="inlineB menu-li-1 fc">\
												<img src="'+ res.data[8].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[8].name +'</p>\
												<img class="tips hot'+ res.data[8].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[8].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>\
											<a data-t="1" data-i="10" data-gid="'+res.data[9].game_id+'" href="javascript:;" class="inlineB menu-li-1 fc">\
												<img src="'+ res.data[9].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[9].name +'</p>\
												<img class="tips hot'+ res.data[9].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[9].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>\
										</div>';
							}		
						}
						// 其他类型
						else
						{	
							var a = '';

							for ( var i in res.data )
							{	
								if( res.data[i][1] )
								{
									a = '<a data-t="0" data-i="'+ parseFloat(res.data[i][1].i+1) +'" data-gid="'+res.data[i][1].game_id+'" href="javascript:;" class="inlineB menu-li-2 fc">\
												<img src="'+ res.data[i][1].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[i][1].name +'</p>\
												<img class="tips hot'+ res.data[i][1].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[i][1].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>';
								}
								else
								{
									a = '';
								}

								menu += '<div class="tab_li cdr"><a data-t="1" data-i="'+ parseFloat(res.data[i][0].i+1) +'" tabindex="'+(parseFloat(i)+1)+'" data-gid="'+res.data[i][0].game_id+'" href="javascript:;" class="inlineB menu-li-2 fc cdr-'+ (parseFloat(i)+1) +'">\
												<img src="'+ res.data[i][0].game_cover +'" alt="">\
												<p class="menu-li-text num1">'+ res.data[i][0].name +'</p>\
												<img class="tips hot'+ res.data[i][0].is_hot +'" src="./images/hot.png<?php echo $v;?>" alt="">\
												<img class="tips pay'+ res.data[i][0].is_pay +'" src="./images/pay.png<?php echo $v;?>" alt="">\
											</a>'+a+'</div>';
							}
						}

						$('.menu').html(menu).show();

						$('.menu-li-3-box img:first-child').height( $('.menu-li-3-box img').width() );

						// alert('vi = ' + VI+' type = '+type+' desc = ' + desc+' TA='+TA+' iptvID='+iptvID)
						// 保持第一次进入 默认光标在第一个图
						if( type == 1 && desc == 'first' && VI == 0 ){ $('.menu .frist-list').focus(); 
						// alert('进');
						}
						else
						{
							if( VI > 1 && TA == 0 && iptvID )
							{
								TA ++;
								$('.menu').find('a').eq( iptvID-1 ).focus();
								// alert('进000');
							}
						}

						VI ++;
						window.sessionStorage.setItem('iptvVI',VI);


						fontSize()
					}
					else if( res.code == 9014 ){
						$('.menu').html('<p style="width:100%;text-align:center;font-size:2rem;margin-top:15%;">'+res.msg+'</p>').show();
					}
					$('.loading').fadeOut();
				},
				error:function(jqXHR,textStatus, errorThrown){
					console.log('ajax fail');
					console.log(jqXHR);
					console.log(textStatus);
					console.log(errorThrown);

					// $('#debug').append(' main.php数据接口返回异常： <br/>')
					// $('#debug').append(jqXHR)
					// $('#debug').append('<br/>')
					// $('#debug').append(JSON.stringify(jqXHR))
					// $('#debug').append('<br/>')
					// $('#debug').append(textStatus+'<br/>')
					// $('#debug').append(errorThrown+'<br/>')
					// $('#debug').append('main.php数据接口返回异常结束 <br/>')
				}
			})
			}
		}
		


		$('body').on('click','a',function(){

			if( $(this).attr('data-gid') )
			{
				
                                var gid = $(this).attr('data-gid');

                                // 植树节
                                if( gid == 101 )
                                {
                                        window.location.href = "./act/312.php";
                                }
                                else
                                {
                                        window.localStorage.setItem('iptvGID',gid);
                                        window.location.href = "./details.php";
                                }
			}
			
		})


		$('body').on('focus','.fc',function(e){

			var iptvID = $(this).attr('data-i');
			window.sessionStorage.setItem('iptvID',iptvID);

			TP = $(this).attr('data-t');

			BT = 0;

			var W = $(this).width()/(1-0.05);

			if( $(this).offset().left + W	 > ($('.menu').width()-50) )
			{
				$('.menu').animate({'scrollLeft':'+=' + 	W	},500)
			}

			if( $(this).offset().left < 0 )
			{
				$('.menu').animate({'scrollLeft':'-=' + W},500)
			}			
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
			$('.menu-li-text,body .nav-img,body .rank-user,.rank-score,.tab li a,.btns a').css('fontSize',$('body').height()*0.001527778+'rem')
			$('.c-nav p,.c-title,.main .user-name,.c-footer>p,.c-footer>.left p,.img-screenshot span,.rank-icon,.quit>p').css('fontSize',$('body').height()*0.001666667+'rem')
		}

	</script>
</body>
</html>
