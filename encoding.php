<?php
$str = $_REQUEST['test'];
if(!empty($str)){
	echo $str."<br />";
	echo mb_detect_encoding($str);
	die();
}
