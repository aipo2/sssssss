<?php
ob_start();
define('API_KEY','280031343:AAGXJEfA76X932ZsjKOComyPhnppg-QNrg0'); //bot api
function httpt($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
// Fetching UPDATE
$update = json_decode(file_get_contents('php://input'));

if($update->message->text == '/start'){
  var_dump(httpt('sendMessage',[
    'chat_id'=>$update->message->chat->id,
    'text'=>"??ÓáÇã \n<b>íÇã </b> ??ÎæÏÊæäæ ÈİÑÓÊíä",
    'parse_mode'=>'HTML',
    'reply_markup'=>json_encode([
        'inline_keyboard'=>[
          [
            ['text'=>'??Channel??',url=>'https://telegram.me/mama_land']
          ],
          
      ]
  ])
 ]));
}
if($update->message->text == '/contact'){
  var_dump(httpt('sendContact',[
    'chat_id'=>$update->message->chat->id,
    'username'=>'#not user',
    'first_name'=>'Neagtive'
  ]));
}

file_put_contents('log',ob_get_clean());