<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>get_json_of_spreadsheet</title>
<link rel="stylesheet" href="./resources/css/import.css">
<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro' rel='stylesheet' type='text/css'>
<script src="./resources/js/loader.js"></script>
</head>

<body>
<div id="document">

<div class="header">
	<h1>get_json_of_spreadsheet</h1>
	<div>
		<p>[Code]<br />
			<a href="https://github.com/rin316/get_json_of_spreadsheet">https://github.com/rin316/get_json_of_spreadsheet</a>
		</p>
		<p>[Spreadsheet]<br />
			<a href="https://docs.google.com/spreadsheet/ccc?key=0Ag9EQtMQAWAkdGZWR2J3NGVBR1NtSGpHVWE5WEkzLXc">https://docs.google.com/spreadsheet/ccc?key=0Ag9EQtMQAWAkdGZWR2J3NGVBR1NtSGpHVWE5WEkzLXc</a>
		</p>
		<!--<p>[Download]<br />
			<a href=""></a>
		-->
		<p>[author]<br />
			<a href="http://5am.jp/">rin316</a>(Yuta Hayashi)
		</p>
	</div>
</div>

<hr>


{foreach from=$category item=item key=key}
<div class="faqCategoryUnit">
	<h3>{$key}<span class="openCloseIcon"><img src="/images/parts/faqcategoryunit_ico_01.png" alt="+" width="35" height="35" /></span></h3>
	
	<div class="faqArticles">
{section name=i loop=$item}
		<div class="faqUnit" id="{$item[i]['faq_id']}">
			<dl class="faqUnitInner">
				<dt>{$item[i]['question']}</dt>
				<dd>{$item[i]['answer']}</dd>
			</dl>
		<!-- /.faqUnit --></div>
		
{/section}
		
		<p class="closeIcon"><img src="/images/parts/faqcategoryunit_ico_03.png" alt="ï¬Ç∂ÇÈ" width="23" height="23" /></p>
		<p class="pageTop"><a href="#document">ÉyÅ[ÉWÇÃêÊì™Ç÷ñﬂÇÈ</a></p>
	<!-- /.faqfaqArticles --></div>
<!-- /.faqCategoryUnit --></div>

{/foreach}

<hr>

<!-- /#document --></div>
</body>
</html>
