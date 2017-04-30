<?php 
						if(isset($_SESSION['c_userid']['userId'])){
							$fname=$_SESSION['c_userid']['userFName'];
							$lname=$_SESSION['c_userid']['userLName'];
							$id=$_SESSION['c_userid']['userId'];
							echo '<p align="right"> Name : '.$fname.' / Customer No : '.$id.'</p>';

							} else if(isset($_SESSION['admin_user'])){
								$name=$_SESSION['admin_user'];
							echo $name;
								}  else {
									echo '<p align="right"> Name : Guest </p>';
									
								}
							
							?>