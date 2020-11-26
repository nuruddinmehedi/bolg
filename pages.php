<?php 
include("inc/header.php");
?>
<!-- pagination... -->
    <?php
 
if(isset($_GET['catid'])){
    
    $catid=$_GET['catid'];
    
}
else{
    
 header("Location: 404.php");
}
$per_page=3;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    header("Location: 404.php");
}
$offent=($page-1)*$per_page;

?>
<!-- pagination... -->    		

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		
		<?php $qur= "select * from tab_post where cat='$catid' limit $offent, $per_page";
            
           $post= $db->select($qur);
            
            if(!empty($post)) {
                
                
         while($result= $post->fetch_assoc()){
                         
        
            
            
            ?>
		
		
		
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></h2>
                <h4><?php echo $fm->date($result['date']) ?> <b><a href="#"><?php echo $result['author'] ?></a></b></h4>
				 <a href="#"><img src="admin/upload/<?php echo $result['img'] ?>"></a>
				<?php echo $fm->readmore($result['body']) ?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'] ?>">Read More</a>
				</div>
			</div>
			<?php }?><!--while loop end...-->
			<!-- pagination... -->
			<?php
                $qur="select * from tab_post where cat=$catid";
                 $result= $db->select($qur);
                 $total_row= mysqli_num_rows($result);
                $total_page= ceil($total_row/$per_page);
              echo "<span class='pagenation'><a href='pages.php?page=1&catid=$catid'>frist page </a>"?>
			
			<?php 
            for($i=1;$i<=$total_page;$i++){
               echo "<a href='pages.php?page=$i&catid=$catid'>$i</a>";
                
            }
            
            ?>
			
			<?php echo "<a href='pages.php?page=$total_page&catid=$catid'>last page </a></span>"?>
			<!-- pagination... -->
			
			<?php } else{
                
                header("Location:404.php");
                
            }
            ?>

		</div>
	<?php 
include("inc/sidebar.php");




?>
			
		</div>
	</div>
	<?php 
include("inc/footer.php");




?>