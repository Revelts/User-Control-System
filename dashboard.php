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
require_once("include/features.php");

session_start();

site_secure();

site_header_logged();
site_navi_logged();
site_content_logged();

echo "
      <div class='content'>
                <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | Dashboard</p>
              </div>
              <div class='card-body'>		  
			<div class='row'>			
				<div class='col-sm-12'>
					<b>Willkommen ";
					$sql = "SELECT username FROM accounts WHERE id = ".$_COOKIE["secure"]."";
					$stmt = $pdo->prepare($sql);
					$stmt->bindValue(':username', $username);
					$stmt->execute();
					$user = $stmt->fetch(PDO::FETCH_ASSOC);

					if($result){
						// output data of each row
						while($row = $stmt->fetch()) {
							echo"".$row["username"]."";
						}
					}		
echo "						
					 im Dashboard!
				</div>				
			</div>										
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>";
site_footer();	
?>