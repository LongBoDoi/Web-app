<?php
	require 'model/connectDB.php';
	require 'model/pdoDB.php';
	class search {
		
		function __construct() {}
		
		function search_by_id() {
			if (isset($_GET['mssv']) && !is_null($_GET['mssv'])) {
				$pdo_model = new PDOModel('localhost','0001','uet123','cuusinhvien');
				$retsult2 = $pdo_model ->getMssv($_GET['mssv']);
				$rows=$retsult2->fetchAll();
				return json_encode($rows);	
			}
		}

		function search_by_fullname() {
			if (isset($_GET['fullname']) && !is_null($_GET['fullname'])) {
				$pdo_model = new PDOModel('localhost','0001','uet123','cuusinhvien');
				$retsult2 = $pdo_model ->getFullname($_GET['fullname']);
				$rows=$retsult2->fetchAll();
				return json_encode($rows);	
			}
		}

		function search_by_achievement() {
			if (isset($_GET['achievement']) && !is_null($_GET['achievement'])) {
				$pdo_model = new PDOModel('localhost','0001','uet123','cuusinhvien');
				$retsult2 = $pdo_model ->getMssv($_GET['achievement']);
				$rows=$retsult2->fetchAll();
				return json_encode($rows);	
			}
		}
	}
	
	/*foreach ($rows as $row) {
		echo "Ma giai thuong:".$row['magiaithuong']." Ten giai thuong: ".$row['tengiaithuong']." Ngay duoc nhan: ".$row['ngayduocnhan']."\n";
	}*/
?>