<?php 
// ************************************************************************************//
// * User Control Panel ( UCP ) >> PDO Edition <<
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.1
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: Creative Commons licenses
// ************************************************************************************//

function site_secure() {
	if(!isset($_SESSION['secure']) || !isset($_SESSION['secure_logged_in']) || !isset($_COOKIE["secure"])){
		site_header();
		site_navi_nologged();
		site_content_nologged();

		echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						<b>Sie sollten sich zuerst <a href='login.php'>einloggen</a>!</b>
					</div>				
				</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
		site_footer();
		exit;
	}  
}

function site_userchanged_done() {

echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Team Account Control System - Spieler bearbeiten</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						<b>Du hast den Account erfolgreich bearbeitet!</b><br><br><a href='staff_userchanged.php'>Zurück</a>
					</div>				
				</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
site_footer();
die();	  
}

// This function is not done
function site_team_secure() {	
	$username    = htmlentities(trim($row["username"]));
	$userid      = intval($row["id"]);
	// $isTeam    = $row["isTeam"];
	
	$isTeam = isset($_GET['isTeam']) ? $_GET['isTeam'] : 'N';

	$sql = "SELECT * FROM accounts WHERE isTeam = 'Y'";
	$result = $conn->query($sql);

	if($_GET['isTeam']=="N") 
	{
	site_header();
	site_navi_logged();
	site_content_logged();				
	echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						<b>Sie sollten sich zuerst <a href='login.php'>einloggen</a>!</b>
					</div>				
				</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
	site_footer();	  
	}
}

function site_myprofile_done_error() {
site_header();
site_navi_logged();
site_content_logged();

echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Mein Account bearbeiten</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						<b>Deine Änderungen konnten nicht gespeichert werden!</b>
						<br>
						" . mysqli_error($conn) . "
					</div>				
				</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
site_footer();
die();
}

function site_myprofile_done() {
site_header();
site_navi_logged();
site_content_logged();

echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Mein Account bearbeiten</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						<b>Du hast dein Account erfolgreich bearbeitet!</b>
					</div>				
				</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
site_footer();
die();
}

function site_register_done() {
site_header();
site_navi_nologged();
site_content_nologged();

echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						<b>Deine Registrierung ist abgeschlossen!</b>
					</div>				
				</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
site_footer();
}

function site_register_already_user() {
site_header();
site_navi_nologged();
site_content_nologged();

echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						<b>Den Benutzer gibt es schon!</b>
					</div>				
				</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
site_footer();
die();
}

function site_login_password_none_correct() {
site_header();
site_navi_nologged();
site_content_nologged();

echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						<b>Falsches Passwort!</b>
					</div>				
				</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
site_footer();
die();
}

function site_login_user_notfound() {
site_header();
site_navi_nologged();
site_content_nologged();

echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						<b>Kein Benutzer gefunden!</b>
					</div>				
				</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
site_footer();
die();
}

function site_logout() {
site_header();
setCookie("PHPSESSID", "", 0x7fffffff,  "/");
setCookie("secure", "", 0x7fffffff,  "/");
	
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000, $params["path"],
       $params["domain"], $params["secure"], $params["httponly"]
	);
} 	
session_unset();
session_destroy();
site_navi_nologged();
site_content_nologged();

echo "
        <div class='content'>
         <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Secure System</p>
              </div>
              <div class='card-body'>			  
				<div class='row'>			
					<div class='col-sm-8'>
						<b>Dein Logout war erfolgreich!</b>
					</div>				
				</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
site_footer();
header("Location: index.php");  
die();   
}

function site_header() {
echo "
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8' />
  <link rel='apple-touch-icon' sizes='76x76' href='themes/destiny-life/assets/img/apple-icon.png'>
  <link rel='icon' type='image/png' href='themes/destiny-life/assets/img/favicon.png'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
  <title>
    ".SITETITLE."
  </title>";
			$_SESSION['secure'] = $user['id'];
			$_SESSION['secure_logged_in'] = time()+2592000;
			setCookie("secure",$user['id'],time()+2592000);
	
echo "  
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700,200' rel='stylesheet' />
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>
  <link href='themes/destiny-life/assets/css/bootstrap.min.css' rel='stylesheet' />
  <link href='themes/destiny-life/assets/css/now-ui-dashboard.php?v=1.5.0' rel='stylesheet' />
  <link href='themes/destiny-life/assets/site/site.php' rel='stylesheet' />
</head>

<body class=''>
  <div class='wrapper '>";   
}

function site_header_logged() {
echo "
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8' />
  <link rel='apple-touch-icon' sizes='76x76' href='themes/destiny-life/assets/img/apple-icon.png'>
  <link rel='icon' type='image/png' href='themes/destiny-life/assets/img/favicon.png'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
  <title>
    ".SITETITLE."
  </title>";
			$_SESSION['secure'] = $user['id'];
			$_SESSION['secure_logged_in'] = time()+2592000;
			setCookie("secure",$user['id'],time()+2592000);
	
echo " 
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700,200' rel='stylesheet' />
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>
  <link href='themes/destiny-life/assets/css/bootstrap.min.css' rel='stylesheet' />
  <link href='themes/destiny-life/assets/css/now-ui-dashboard.php?v=1.5.0' rel='stylesheet' />
  <link href='themes/destiny-life/assets/site/site.php' rel='stylesheet' />
</head>

<body class=''>
  <div class='wrapper '>";   
}

function site_navi_logged() {
echo "
    <div class='sidebar' data-color='green'>
      <div class='logo'>
        <a href='dashboard.php' class='simple-text logo-normal'>
         <i class='now-ui-icons business_badge'></i> ".SITETITLE."
        </a>
      </div>
      <div class='sidebar-wrapper' id='sidebar-wrapper'>
        <ul class='nav'>
          <li>
            <a href='./dashboard.php'>
              <i class='now-ui-icons design_app'></i>
              <p>".DASHBOARD."</p>
            </a>
          </li>
          <li>
            <a href='./rules.php'>
              <i class='now-ui-icons business_badge'></i>
              <p>".RULES."</p>
            </a>
          </li>	
          <li>
            <a href='./user.php'>
              <i class='now-ui-icons users_single-02'></i>
              <p>".USERPROFILE."</p>
            </a>
          </li>
          <li>
            <a href='./myprofile.php'>
              <i class='now-ui-icons ui-2_settings-90'></i>
              <p>".USERPROFILECHANGE."</p>
            </a>
          </li>	  
        </ul>
      </div>
    </div>";   
}

function site_navi_nologged() {
echo "
    <div class='sidebar' data-color='blue'>
      <div class='logo'>
        <a href='index.php' class='simple-text logo-normal'>
          <i class='now-ui-icons business_badge'></i> ".SITETITLE."
        </a>
      </div>
      <div class='sidebar-wrapper' id='sidebar-wrapper'>
        <ul class='nav'>
          <li>
            <a href='./login.php'>
              <i class='now-ui-icons design_app'></i>
              <p>Login</p>
            </a>
          </li>
          <li>
            <a href='./register.php'>
              <i class='now-ui-icons education_atom'></i>
              <p>Register</p>
            </a>
          </li>
        </ul>
      </div>
    </div>";   
}

function site_content_nologged() {
echo "
    <div class='main-panel' id='main-panel'>
      <!-- Navbar -->
      <nav class='navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute'>
        <div class='container-fluid'>
          <div class='navbar-wrapper'>
            <div class='navbar-toggle'>
              <button type='button' class='navbar-toggler'>
                <span class='navbar-toggler-bar bar1'></span>
                <span class='navbar-toggler-bar bar2'></span>
                <span class='navbar-toggler-bar bar3'></span>
              </button>
            </div>
            <a class='navbar-brand' href='index.php'>Home</a>
          </div>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navigation' aria-controls='navigation-index' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-bar navbar-kebab'></span>
            <span class='navbar-toggler-bar navbar-kebab'></span>
            <span class='navbar-toggler-bar navbar-kebab'></span>
          </button>
          <div class='collapse navbar-collapse justify-content-end' id='navigation'>

          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class='panel-header panel-header-sm'>

      </div>";   
}

function site_content_logged() {
echo "
    <div class='main-panel' id='main-panel'>
      <!-- Navbar -->
      <nav class='navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute'>
        <div class='container-fluid'>
          <div class='navbar-wrapper'>
            <div class='navbar-toggle'>
              <button type='button' class='navbar-toggler'>
                <span class='navbar-toggler-bar bar1'></span>
                <span class='navbar-toggler-bar bar2'></span>
                <span class='navbar-toggler-bar bar3'></span>
              </button>
            </div>
            <a class='navbar-brand' href='dashboard.php'>Dashboard</a>
          </div>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navigation' aria-controls='navigation-index' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-bar navbar-kebab'></span>
            <span class='navbar-toggler-bar navbar-kebab'></span>
            <span class='navbar-toggler-bar navbar-kebab'></span>
          </button>
          <div class='collapse navbar-collapse justify-content-end' id='navigation'>
		  <form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
            <button class='btn btn-primary' type='logout' name='logout'>
              <i class='now-ui-icons ui-1_simple-remove'></i>
              <p>Logout</p>
            </submit>		  	
		  </form>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class='panel-header panel-header-sm'>

      </div>";     
}

function site_footer() {
echo "
      <footer class='footer'>
        <div class=' container-fluid '>
          <nav>
            <ul>
              <li>
                <a href='".DISCORD."'>
                  Join to Discord
                </a>
              </li>
              <li>
                <a href='".TEAMSPEAK."'>
                  Join to Teamspeak
                </a>
              </li>
              <li>
                <a href='".IMPRINT."'>
                  Impressum
                </a>
              </li>
            </ul>
          </nav>
          <div class='copyright' id='copyright'>
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script> ".PROJECTNAME.". All rights reserved. ".PROJECTNAME." is not associated in any way with Rockstar North.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src='themes/destiny-life/assets/js/core/jquery.min.js'></script>
  <script src='themes/destiny-life/assets/js/core/popper.min.js'></script>
  <script src='themes/destiny-life/assets/js/core/bootstrap.min.js'></script>
  <script src='themes/destiny-life/assets/js/plugins/perfect-scrollbar.jquery.min.js'></script>
  <script src='themes/destiny-life/assets/js/plugins/chartjs.min.js'></script>
  <script src='themes/destiny-life/assets/js/plugins/bootstrap-notify.js'></script>
  <script src='themes/destiny-life/assets/js/now-ui-dashboard.min.js?v=1.5.0' type='text/javascript'></script>
  <script src='themes/destiny-life/assets/site/site.js'></script>
</body>
</html>";   
}
?>