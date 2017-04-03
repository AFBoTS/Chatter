<?php
define('API_KEY','348023655:AAE027rccKejuW951GyvHw7_6dmWYM9JkQE');
//----######------

function makereq($method,$datas=[]){
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

//-----------------------------------------------------------------------------------------
//فانکشن هات
function apiRequest($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }

  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }

  foreach ($parameters as $key => &$val) {
    // encoding to JSON array parameters, for example reply_markup
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);

  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);

  return exec_curl_request($handle);
}
function sendAction($chat_id, $action){
MrPHPBot('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action]);
}

//----######------
//---------
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
//-----------------------------------------------------------------------------------------
//ای پی ای هات
$banall = file_get_contents("https://metti.ir/bots/banall.txt");
$from_id = $update->message->from->id;
$chat_id = $update->message->chat->id;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$text = $update->message->text;
$message_id = $update->callback_query->message->message_id;
$message_id_feed = $update->message->message_id;
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$reply = $update->message->reply_to_message->forward_from->id;
$stickerid = $update->message->reply_to_message->sticker->file_id;
$photo = $update->message->photo;
$video = $update->message->video;
$sticker = $update->message->sticker;
$file = $update->message->document;
$music = $update->message->audio;
$voice = $update->message->voice;
$forward = $update->message->forward_from;
$members = file_get_contents('users.txt');
$membersUsername = file_get_contents('users_id.txt');
$membersNews = file_get_contents('users.txt');
$step = file_get_contents("data/".$from_id."/step.txt");
$admin = 294665580;
$rand = array($mard1,$mard2,$mard3,$mard4,mard5);
$mard = $rand[rand(0,count($rand))];
$randz = array($zan1,$zan2,$zan3,$zan4,zan5);
$zan = $randz[rand(0,count($randz))];
$blocklist = file_get_contents('blocklist.txt');
$filters = file_get_contents('data/filterlist.txt');
$botstuts = file_get_contents('data/botstep.txt');
$tt = "'";
//-----------------------------------------------------------------------------------------
//فانکشن هات 2
function SendMessage($ChatId, $TextMsg)
{
 makereq('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"MarkDown"
]);
}
function SendSticker($ChatId, $sticker_ID)
{
 makereq('sendSticker',[
'chat_id'=>$ChatId,
'sticker'=>$sticker_ID
]);
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
makereq('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
function sendphoto($chat_id, $photo)
{
 cli('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$photo 
]);
}
function save($filename,$TXTdata)
	{
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
//-----------------------------------------------------------------------------------------
// دستوراتت
$inch = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@NeroTeam&user_id=".$from_id);
  
  if (strpos($banall , "$from_id") !== false  ) {
  SendMessage($chat_id,"❌ شما بلاک هستید !");
 }

 elseif (strpos($inch , '"status":"left"') !== false ) {
SendMessage($chat_id,"❗️شما در کانال ما عضو نیستید❗️
روی لینک زیر کلیک کنید
@NeroTeam
و سپس به ربات بازگردید و /start را بزنید!");
}
elseif (strpos($blocklist , "$from_id") !== false  ) {
SendMessage($chat_id,"☠️ شما بلاک هستید ,
      💀 لطفا پیام ندهید !");
}

elseif ($textmessage == '/start') {

sendMessage($chat_id, " 👤 سلام ,  
 ✉️ به ربات چتر خوش اومدی ,  
 😔 من هنوز چیز زیادی بلد نیستم ,  
😍 ولی میتونی هرچیزی رو که بلد نیستم یادم بدی ,
 😒 ولی به شرط اینکه بی جنبه بازی در نیاری ,   
😕 بی جنبه بازی در بیاری از همه ربات های الکتروتیم بلاک میشی ,
@NeroTeam
برنامه نویس :
@MettiDev", $message_id);
    $txxt = file_get_contents('data/users.txt');
$pmembersid= explode("\n",$txxt);
    $txxt2 = file_get_contents('data/users_id.txt');
$pmembersid2= explode(",",$txxt2);
	if (!in_array($chat_id,$pmembersid)) {
		$aaddd = file_get_contents('data/users.txt');
		$aaddd .= $chat_id."\n";
    	file_put_contents('data/users.txt',$aaddd);
    	mkdir("data/$from_id");
    	file_put_contents("data/$from_id/step.txt","none");
}
	if (!in_array($username,$pmembersid2)) {
		$aadd = file_get_contents('data/users_id.txt');
		$aadd .= $username.",";
    	file_put_contents('data/users_id.txt',$aadd);
}
}elseif($textmessage == '/cancel')
 if ($step == "none") {
sendMessage($chat_id, "😐  داداچ کاری نمیکنی که میخوای لغو بشه , برو از خدا بترس ", $message_id);
}
 else{
save("data/$from_id/step.txt","none");
sendMessage($chat_id, "✅ با موفقیت لغو شد !", $message_id);
}elseif ($textmessage == '/add') {
save("data/$from_id/step.txt","add");

sendMessage($chat_id, "🙌🏻 متن سوال را ارسال کنید :
مثال : سلام
😓 اگه میخوای عملیات رو لغو کنی /cancel رو ارسال کن :", $message_id);

}elseif ($step == 'add') {
if (strpos($filters , "$textmessage") !== false  ) {
sendMessage($chat_id, "📵این کلمه فیلتر میباشد !", $message_id);
return;
}
if(preg_match('/^(/)(.*)/s',$textmessage)){
sendMessage($chat_id, "نوچ", $message_id);
return;
}
save("data/$from_id/step.txt","add2");
save("data/$from_id/last_word.txt",$textmessage);
sendMessage($chat_id, "📩 پاسخ آن را ارسال کنید : 
مانند : سلام عزیزم , تو خوبی ؟
😓 اگه میخوای عملیات رو لغو کنی /cancel رو ارسال کن :", $message_id);
 save("data/words/$textmessaage.txt","Tarif Nashode !");

}elseif ($step == 'add2') {
if (strpos($filters , "$textmessage") !== false  ) {
sendMessage($chat_id, "📵این کلمه فیلتر میباشد !", $message_id);
return;
}
$lasts = file_get_contents("data/$from_id/last_word.txt");
save("data/$from_id/step.txt","none");
sendMessage($chat_id, "🙂❤️ مرسی عزیزم که یک کلمه جدید یادم دادی , 
😋 از این به بعد با این چیزایی که گفتی من جواب مردم رو میدم .", $message_id);
sendMessage($admin, "😋 بابایی یه نفر یچیزی بهم یاد داد , 
🙂 اسمش : 
$name
🙃 آیدیش : 
@$username
🤑 آیدی عددیش : 
$from_id

🤗 سوالی که بهم یاد داد :
$lasts
😜 جوابش : 
$textmessage

😥 اگه حرف بد یادم داده از دستورای زیر استفاده کن و پدرشو در بیار :
/del$lasts
/warn$from_id
/ban$from_id", $message_id);
$last = file_get_contents("data/$from_id/last_word.txt");
$myfile2 = fopen("data/wordlist.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$last\n");
fclose($myfile2);
save("data/words/$last.txt","$textmessage");

}elseif (file_exists("data/words/$textmessage.txt")) {
SendMessage($chat_id,file_get_contents("data/words/$textmessage.txt"));

}
//پنل مدیریت ربات--------------------------------------------------------------------------
elseif (strpos($textmessage, "/del") !== false && $chat_id == $admin) {
$end = str_replace("/del","",$textmessage);
sendMessage($chat_id, "❌ کلمه $end با موفقیت پاک شد !", $message_id);
unlink("data/words/$end.txt");
}
elseif (strpos($textmessage, "/ban") !== false && $chat_id == $admin) {
$ban = str_replace("/ban","",$textmessage);
save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"❌ کاربر _".$ban."_ از مجموعه ربات های الکتروتیم مسدود شد !",
		'parse_mode'=>'MarkDown'
    		]));
			var_dump(makereq('sendMessage',[
        	'chat_id'=>$ban,
        	'text'=>"❌ شما از مجموعه ربات های الکتروتیم بلاک شدید !",
		'parse_mode'=>'MarkDown'
    		]));

$myfile2 = fopen("../banall.txt", "a") or die("Unable to open file!");	
fwrite($myfile2, "$ban\n");
fclose($myfile2);

}
elseif (strpos($textmessage, "/warn") !== false && $chat_id == $admin) {
$ban = str_replace("/warn","",$textmessage);
$warns = file_get_contents("data/".$ban."/warn.txt");
 if ($warns == "1") {
SendMessage($ban,"⚠️ شما قبلا یک بار اخطار دریافت کرده اید , و هم اکنون برای دومین بار اخطار دریافت کرید !
‼️ همانطور که قبلا گفته شده بود با دریافت اخطار دوم به صورت خودکار از تمامی ربات های الکتروتیم مسدود خواهید شد , 
📛 هم اکنون شما از تمامی ربات های الکتروتیم مسدود شدید ,
📵 لطفا پیام ندهید !");
SendMessage($admin,"⚫️ $ban به دلیل داشتن دو اخطار , به طور خودکار مسدود شد !");
$myfile2 = fopen("../banall.txt", "a") or die("Unable to open file!");	
fwrite($myfile2, "$ban\n");
fclose($myfile2);
return;
}
save("data/$from_id/step.txt","none");
save("data/$ban/warn.txt","1");
var_dump(makereq('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"✅ با موفقیت برای کاربر _".$ban."_ اخطاری ارسال شد !",
		'parse_mode'=>'MarkDown'
    		]));
			var_dump(makereq('sendMessage',[
        	'chat_id'=>$ban,
        	'text'=>"❌ شما از سوی پشتیبانان تیم اخطاری دریافت کردید !
📮 قوانین را رعایت کنید !
❌ در غیر این صورت ...
⚠️ (با اخطار دوم شما به طور خودکار از تمامی ربات های الکتروتیم مسدود خواهید شد ! )",
		'parse_mode'=>'MarkDown'
    		]));

}
elseif (strpos($textmessage , "/unban") !== false && $chat_id == $admin) {
$result = str_replace("/unban","",$textmessage);
$blist = str_replace($result,"",$ban);
save("../banall.txt",$blist);
unlink("data/$result/warn.txt");
SendMessage($chat_id,"$result از مجموعه ربات های شما رفع مسدودیت شد !");
SendMessage($result,"📬 شما از مجموعه ربات های الکتروتیم رفع مسدودیت شدید !");
}
elseif (strpos($textmessage , "/filter") !== false && $chat_id == $admin) {
save("data/$from_id/step.txt","filter");

sendMessage($chat_id, "😎 کلمه ای که میخوای فیلتر بشه رو ارسال کن :
😓 اگه میخوای عملیات رو لغو کنی /cancel رو ارسال کن :", $message_id);

}elseif ($step == 'filter') {
if (strpos($filters , "$textmessage") !== false  ) {
sendMessage($chat_id, "⚠️ این کلمه از قبل فیلتر میباشد !", $message_id);
return;
}
save("data/$from_id/step.txt","none");
sendMessage($chat_id, "✅ $tt $textmessage $tt با موفقیت فیلتر شد !", $message_id);
$myfile2 = fopen("data/filterlist.txt", "a") or die("Unable to open file!");	
fwrite($myfile2, "$textmessage\n");
fclose($myfile2);

}
elseif ($textmessage == '/leave' && $from_id == $admin) {
sendMessage($chat_id, "😐 من به دستور والا حضرت $name از گپ خارج میشوم !", $message_id);
sendMessage($chat_id, "😋 بای بای عشقولیا , 
😭 دلتون تنگ شد بیایید پیوی ", $message_id);
makereq('leaveChat',[
'chat_id'=>$chat_id
]);
}


//-----------------------------------------------------------------------------------------
else {
sendMessage($chat_id, "جنده نمیفهمم چی میگی
 /add رو بزن تا یادم بدی 😔");
}

?>
