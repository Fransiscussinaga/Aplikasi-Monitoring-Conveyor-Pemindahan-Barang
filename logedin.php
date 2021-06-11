<?php
	ini_set("display_errors", 0);
	session_start();
	include '3rdparty/engine.php';
	
	function login($user, $password, $hsl_pwd, $nama, $role) {
		if ($hsl_pwd == $password) {
			$_SESSION['userid'] = $user;
			$_SESSION['nama'] = $nama;
			$_SESSION['role'] = $role;
			return 2;
		}
		else return 1;
	}

	if(isset($_POST["username"])){$username=$_POST["username"];}else{$username="";}
	if(isset($_POST["password"])){$password=$_POST["password"];}else{$password="";}
	
	$data = $db->query("SELECT * FROM user WHERE username LIKE '%".$username."%' AND password LIKE '%".md5($password)."%'", 0);

	//$log = $db->query("insert into tbl_log_user (userid,keterangan) values ('".$data[0]['userid']."', 'Login Aplikasi')", 0);

	$loginArea = login($data[0]['id'], md5($password), $data[0]['password'], $data[0]['nama'], $data[0]['role']);

	//print_r($data);
	if ($loginArea == 1) {
		//echo '<div class="response-msg error ui-corner-all"><span>Error message</span>Invalid Username/Password</div>';
		echo '<script language="javascript">window.location.href = "r?m=login";</script>';
	}
	elseif ($loginArea == 2) {
		//$update = $db->query("update tbl_user set lastlogin='".date("Y-m-d h:i:s")."' where userid='".$username."' and sandi='".md5($password)."'", 0);
		echo '<script language="javascript">window.location.href = "r";</script>';
	}

?>	