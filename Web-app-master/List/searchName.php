<?php
	require "controller/search.php";
	$ctl = new search();
	echo $ctl->search_by_fullname();
?>