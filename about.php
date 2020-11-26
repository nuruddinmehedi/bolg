<?php 
include("inc/header.php");
 if($_GET['pageid']){
               $pageid= $_GET['pageid'];}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php
$qur="select * from tab_page where id=$pageid";
$result= $db->select($qur);
if(!empty($result)){
   $results=$result->fetch_assoc();
}
?>
				<h2><?php echo $results['name'] ?></h2>
	
				<p><?php echo $results['body'] ?></p>
	</div>

		</div>
		
		
				<?php 
include("inc/sidebar.php");




?>
		
		
		
		
		
		
	</div>
			<?php 
include("inc/footer.php");




?>
	