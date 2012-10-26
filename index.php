<?php
/*--------------------------------------
 * Setting
--------------------------------------*/
include_once("./get_json_of_spreadsheet.php");
include_once("./resources/php/dBug.php");

//smarty template url
$template_url = 'index.tpl';

//smarty setting
define( 'SMARTY_DIR', './resources/php/smarty/libs/' );
require_once( SMARTY_DIR . 'Smarty.class.php' );
$smarty = new Smarty();
$smarty->template_dir = './';
$smarty->compile_dir  = './resources/php/smarty/templates_c/';
$smarty->config_dir   = './resources/php/smarty/configs/';
$smarty->cache_dir    = './resources/php/smarty/cache/';


/*--------------------------------------
 * Process
--------------------------------------*/
//spreadsheet url
$url = '0Ag9EQtMQAWAkdC15MTdtUTBKR3ZiVnRVd2RORjlFVUE';
$output = get_json_of_spreadsheet($url);

//categoryのみ抜き出し配列化
for ($i = 0; $i < count($output -> results -> value); $i++){
	$category_key[$i] = $output -> results -> value[$i]['category'];
}

//categoryの重複を削除しkeyを詰める
$temp = array();
foreach($category_key as $key => $val){
	if(! in_array($val, $temp)){
		$temp[] = $val;
	}
}
$category_key = $temp;

//category下にvalueを連想配列化
foreach($category_key as $key => $val){
	for ($i = 0; $i < count($output -> results -> value); $i++){
		if($val == $output -> results -> value[$i]['category']){
			$category_sort[$val][] = $output -> results -> value[$i];
		}
	}
}

/*--------------------------------------
 * View
--------------------------------------*/
//transmit data to smarty
$smarty->assign('category_key', $category_key);
$smarty->assign('category', $category_sort);
$smarty->display($template_url);

//echo debug
//new dBug($category_sort);
