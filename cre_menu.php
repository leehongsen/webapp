<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/2
 * Time: 21:18
 */
require_once "access_token.php";

define("TOKEN", "weixin");
$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";
$jsonmenu = '{
     "button":[
     {    
          "type":"click",
          "name":"儿童歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"网站建设",
           "sub_button":[
           {    
               "type":"view",
               "name":"微信开发",
               "url":"http://www.phpos.net/"
            },
            {
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"click",
               "name":"为我们点赞",
               "key":"V1001_GOOD"
            }]
       }]
 }';

function http_request($url,$data=null){
    //初始化
    $ch=curl_init();
    //设置变量
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
    if(!empty($data)){
        curl_setopt($ch,CURLOPT_PORT,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,1);
    }
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    //执行
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}

$result =http_request($url,$jsonmenu);
