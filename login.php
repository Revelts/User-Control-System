<?php 
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.4
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************// 
require_once("include/features.php");

secure_url();

if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['login'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		site_login_notfound_done();
	}
	else
	{	
		session_start();
		$username = xss_cleaner(trim(htmlspecialchars($_POST['username'])));
		$username = mysqli_real_escape_string($conn,$username); 
		$password = xss_cleaner(trim(htmlspecialchars($_POST['password'])));
		$password = mysqli_real_escape_string($conn,$password);
		$securecode = $row["id"];

		// CHECK USERNAME FROM KEY
		if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
			site_login_username_not_valid();
		}

		// CHECK MAX CARRACTERS LONG
		if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
			site_login_max_pass_long();
		}

		// Get the client ip address
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];	
		$_SESSION["secure"] = sitehash($securecode);	
		$sql = "select * from users where username = '".$username."' LIMIT 1";
		$rs = mysqli_query($conn,$sql);
		$numRows = mysqli_num_rows($rs);
	
		if($numRows  == 1){
			$row = mysqli_fetch_assoc($rs);
			if(password_verify($password,$row['password'])){
				$_SESSION['secure_first'] = $row["id"];
				$_SESSION['secure_granted'] = "granted";
				$_SESSION['secure_staff'] = $row["adminLevel"];
				if($result)
				{
				// Platzhalter: redir to dashboard.php
				}
				header("Location:dashboard.php");
			}else{
				site_login_password_none_correct();
			}
		}else{
			site_login_user_notfound();
		}
		mysqli_close($conn);
	}	
}

site_header();
site_navi_nologged();
site_content_nologged();

echo "
      <div class='content'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>".WELCOMETO." ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | ".LOGIN."</p>
              </div>
              <div class='card-body'>
			<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' autocomplete='off'>
			<div class='form-row'>
				<div class='form-group col-md-6'>
					<label for='exampleFormControlInput1'><i id='email-icon' class='now-ui-icons users_single-02'></i> ".SOCIALCLUBNAME."</label>
					<input required aria-label='Social Club Name' type='text' name='username' class='form-control' placeholder='".SOCIALCLUBNAME." *' value='' maxlength='30' id='exampleInputEmail1' autocomplete='off'/>
				</div>
				<div class='form-group col-md-4'>
					<label for='exampleFormControlInput1'><i id='message-icon' class='now-ui-icons ui-1_lock-circle-open'></i> ".PASSWORD."</label>
					<input required aria-label='Password' type='password' name='password' class='form-control' placeholder='".PASSWORD." *' value='' maxlength='30' id='exampleInputPassword1' autocomplete='off'/>
				</div>				
			</div>				
			<button type='submit' class='btn btn-primary' name='login'>".LOGIN."</submit>					
			</form>				
              </div>
            </div>
          </div>
        </div>
      </div>";
site_footer();	  
?>