<?php 
include("inc/header.php");

?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $firstname=$fm->datavaliedation($_POST['firstname']);
    $lastname=$fm->datavaliedation($_POST['lastname']);
    $email=$fm->datavaliedation($_POST['email']);
    $Message=$fm->datavaliedation($_POST['Message']);
    
    if($firstname==''){
        $msg ="<span style='color:red; font-size:20px;'>
        Fristname must not be empty</span>";
    }elseif($lastname==''){
         $msg ="<span style='color:red; font-size:20px;'>
        Lastname must not be empty</span>";
    }elseif($email==''){
        $msg ="<span style='color:red; font-size:20px;'>
        Email must not be empty</span>";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $msg ="<span style='color:red; font-size:20px;'>"
        .$email." is not a valied email</span>";
    }elseif($Message==''){
     $msg ="<span style='color:red; font-size:20px;'>
        Message must not be empty</span>";  
    }else{
        $query="insert into tab_contact(fn,ln,email,msg) values('$firstname','$lastname','$email','$Message')";
        $result= $db->insert($query);
if(!empty($result)){
  $msg ="<span style='color:green; font-size:20px;'>
        Message sent sucessfullly</span>";  
}else{
      $msg ="<span style='color:green; font-size:20px;'>
        Message failed to sent</span>";  
}
    }
}

?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2><?php if(!empty($msg)){
    echo $msg;
} ?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="Message"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
		
		
		
		
		<?php 
include("inc/sidebar.php");




?>
		
		
		
		
		
	</div>

			<?php 
include("inc/footer.php");




?>