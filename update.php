<?php

/**
 * 容器自升级接口
 */

error_reporting(E_ALL && ~E_NOTICE);

header("Access-Control-Allow-Origin: *");   //后台解决跨域

header('Content-type:application/javascript;charset=utf-8');

date_default_timezone_set('PRC');


//================================================================
//当前apk包的文件名，包含后缀
$filename = 'gameluncherv1.6.7.apk';

//版本号和apk包有关联，在对方发包时需要确认清楚
$versioncode = 10;


//================================================================
//代码部分
$file =  __DIR__ . '/apk/' . $filename;

$url = 'http://' . $_SERVER['SERVER_NAME'] . '/vspn/game/res/' . $filename;

$md5 = md5_file( $file );

$size = filesize( $file );

if( empty($md5) )
{
	$md5 = md5('123');
}

if( empty($size) )
{
	$size = 99999;
}

$ver_arr = array(   'code' => 0,
                    'msg'  => 'success',
                    'versioncode' => $versioncode,
                    'url' => $url,
                    'size' => $size ,
                    'md5' => $md5,
                );

exit( json_encode($ver_arr) );