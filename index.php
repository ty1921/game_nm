<?php

error_reporting( E_ALL && ~E_NOTICE );

$datas = json_encode( $_REQUEST );


?>

<!DOCTYPE html>
    <html lang='zh-CN'>
    <head>
      <meta charset='utf-8' />
      <!-- <meta http-equiv='Content-Security-Policy' content='upgrade-insecure-requests'> -->
      <title>test</title>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <meta name='renderer' content='webkit'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no' />   

     <meta HTTP-EQUIV="pragma" CONTENT="no-cache">     
     <meta HTTP-EQUIV="Cache-Control" CONTENT="no-store, must-revalidate">      
     <meta HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:21:57 GMT">      
     <meta HTTP-EQUIV="expires" CONTENT="0">     
    </head>
<body>

<style type="text/css">
	html,body{
	    background: #000000;
	}
</style>



<div id='debug' style="display:none;position: absolute;width: 1200px;height:680px;top:10px;left: 2px;padding:10px;border:2px solid yellow;font-size: 20px;background-color: #cccccc;">
	<h3>正在鉴权，请稍候...</h3>
</div>



<!-- 
<div style="position: absolute;top: 1%;right: 1%;font-size: 25px;color: yellow">  测试<?php echo time(); ?> </div>

<pre id='debug' style="position: absolute;width: 50%;height:100vh;top:0;right: 0;font-size: 23px;border:0px solid yellow;color:yellow;"> <a href="./index.php" >刷新</a> </pre> -->


<!-- -------------------------------------------------------------------------------- -->



<script src="./jquery.min.js"></script>

<script src="./comm.js?v=<?php echo time();?>"></script>



<script type="text/javascript">

//$('#debug').html( $('#debug').html() + '<br>- getToken开始' );

//获取用户itv机顶盒账号（如itv99999）,并上传该账号入库，返回user表的id（数字）
getToken();

//$('#debug').html( $('#debug').html() + '<br>- getToken结束' );
    


var backUrl = '<?php echo $_GET['backUrl'] ? $_GET['backUrl'] : './main.php'; ?>';

var iptv_from = 'epg';


//如果game_id存在，则鉴权结束后直接进入二级页
var game_id = '<?php echo $_REQUEST['game_id']; ?>';

if( game_id > 0 )
{
	fnEPGLog( window.localStorage.getItem('iptvUid'), game_id, 'epg' )

	$('#debug').html( $('#debug').html() + '<br>- 进入游戏' + game_id );

    window.localStorage.setItem( 'iptvGID' , game_id );

    iptv_from = 'act_game';

    console.log('iptv_from  1111111111 ' );

    backUrl = './details.php';
}
else
{
    //ADD BY THQ @2019-3-19 11:45:50 gameid不为空时才执行活动页的逻辑，优先保证单个游戏推荐位进入正确。
    //活动字段存在，直接进入活动页
    var froms = '<?php echo $_REQUEST['from']; ?>';

    if( froms == 'act' )
    {
    	fnEPGLog( window.localStorage.getItem('iptvUid'), game_id, 'act' )

    	$('#debug').html( $('#debug').html() + '<br>- 进入活动' );

        iptv_from = 'act';

        console.log('iptv_from  22222222 ' );

        backUrl = './act/312.php';
    }


    //未完成任务，但实际是大厅的来源
    var iptvAct = window.localStorage.getItem('iptvAct') || 0;

    if( iptvAct > 0 )
    {
    	$('#debug').html( $('#debug').html() + '--进入植树节' );

        console.log('iptv_from  333333333 ' );

        backUrl = './act/312.php';
    }
}

var datas = '<?php echo $datas; ?>';

console.log('REQUEST=' + datas);

console.log('setItem iptv_from=' + iptv_from);


//转存来源标志位
window.localStorage.setItem( 'iptv_from' , iptv_from );



var user_uid = window.localStorage.getItem('iptvUid') || '';



if( user_uid == '' || !user_uid || user_uid == null || user_uid == undefined )
{
    getToken();
    
    /*$.ajax({
        url: './res/res.php',
        data:{
            'action':'login',
            'user_account':localStorage.getItem('userID') || ''
        },
        type: 'post',
        dataType : "json",
        success: function(res)
        {
            window.localStorage.setItem('iptvUid',res.users.user_id);

            fnGo()
        },
        error:function(){}
    })*/

    fnGo()
}
else
{
    fnGo()
}



function fnGo()
{

    //user_uid == '11627' 中兴
    //user_uid == '25140'  itv9990000000055
    //if( user_uid == '25137' || user_uid == '11627' || user_uid == '11045' )
    if( user_uid == '24972' ) 
    {
    	console.log(  '内测用户 ' + log_userID );

        //测试订购-----------------------------------------------
        if (typeof csInterface !== "undefined") 
        {
            //开始鉴权的参数拼接
            var paramsJson = JSON.stringify({
                "contentID": '04710001000000010000000018947314',
                "productID": '00000000000010010000000000000396',
                "aidlToken": log_aidlToken,
            });

            //$('#debug').html( $('#debug').html() + '<hr>| 鉴权开始，' + paramsJson  );

            var res = csInterface.invokeCMD("programAuth", paramsJson);

            $('#debug').html( $('#debug').html() + '<hr> 鉴权返回=' + res + '<hr>' );

        }

        //-------------------------------------------------------

    	$('#debug').show();

    	$('#debug').html( $('#debug').html() + "<hr><span style='color:red'>[" + log_userID + "]您好，本页面仅内测用户可见！</span>" );

    	var ver = '<?php echo time();?>';

    	// $('#debug').html( $('#debug').html() + "<hr><a href='test.php?v="+ver+"'> 测试返回方法 </a>" );

    	$('#debug').html( $('#debug').html() + "<hr><a href='"+backUrl+"'> 默认入口 </a>" );

        $('#debug').html( $('#debug').html() + "<hr><a href='./main.php'> 强制到大厅 </a>" );

        $('#debug').html( $('#debug').html() + "&nbsp;&nbsp;|&nbsp;&nbsp;<a href='./act/312.php'> 强制到植树节 </a>" );

    	return false;
    }

    //3 跳转
    window.location.href = backUrl;
    
    //$('#debug').html( $('#debug').html() + "<a href='"+backUrl+"'> 点击进入 </a>" );
}




/*//系统错误捕捉并打印到特定div
window.onerror = function ( msg, url, lineNo, columnNo, error) {

    $('#debug').html( $('#debug').html() + '<hr>Error: ' + msg + ' Script: ' + url + '\nPosition: ' + lineNo + ' / ' + columnNo + '\nStackTrace: ' +  error  + "<br><br><br><a href='./main.php'>继续访问</a>" );

    //3 跳转
    //window.location.href = backUrl;

    return false;
};

*/

 
</script>

</body>

</html>