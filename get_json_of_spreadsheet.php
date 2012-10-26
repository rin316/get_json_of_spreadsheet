<?php
function get_json_of_spreadsheet($url) {
	//data取得
	$url = 'http://spreadsheets.google.com/feeds/cells/' . $url . '/od6/public/basic?alt=json';
	$get_data = @file_get_contents($url);
	
	$output = new stdClass;
	//ファイルの取得に成功すれば
	if ($get_data !== false){	
		//取得jsonをobjectに変換
		$get_data = json_decode($get_data);
		
		//取得object内にentryがあれば
		if (isset($get_data -> feed -> entry)){
			$output -> status = "success";
			$get_data = $get_data -> feed -> entry;
			
			//idの末尾からrowとcolを判別し連想配列にset
			for ($i = 0; $i < count($get_data); $i++){
				$cell_url = $get_data[$i] -> id -> {'$t'};
				preg_match('/\/R(\d+)C(\d+)$/', $cell_url, $match[$i]);
				
				$row = $match[$i][1] - 1;
				$col = $match[$i][2] - 1;
				
				$cell[$row][$col] = $get_data[$i] -> content -> {'$t'};
			}
			
			for ($i = 0; $i < count($cell); $i++){
				//spreeadsheetの最初の1行目をkeyとしてset
				if( $i < 1 ){
					for ($j = 0; $j < count($cell[$i]); $j++){
						$output -> results -> key[$j] = $cell[$i][$j];
					}
				//1行目以降をvalueとしてset
				} else {
					for ($j = 0; $j < count($output -> results -> key); $j++){
						$output -> results -> value[$i - 1][$output -> results -> key[$j]] = (isset($cell[$i][$j])) ? $cell[$i][$j] : '' ;
					}
				}
			}
		} else {
			$output -> {status} = "error";
			$output -> {results} = '\'$get_data -> feed -> entry\' not set';
		}
	} else {
		$output -> {status} = "error";
		$output -> {results} = ($http_response_header[0] != "") ? $http_response_header[0] : "not response";
	}
	
	return $output;
}