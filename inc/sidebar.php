	<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php $qur= "select * from  tab_catagory limit 5";
            
           $cat= $db->select($qur);
            
            if(!empty($cat)) {
                
                
         while($result= $cat->fetch_assoc()){
                         
        
            
            
            ?>
		
						<li><a href="pages.php?page=1&catid=<?php echo $result['id'] ?>"><?php echo $result['name'] ?></a></li>
						
				<?php }}else{
                
                echo "no cotagory abalable";
            }?>					
			
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					
					
					<?php 
                
                
                $lqur= "select * from  tab_post order by date desc limit 4";
            
           $letast= $db->select($lqur);
            
            if(!empty($letast)) {
                
                
         while($lresult= $letast->fetch_assoc()){
                         
        
            
            
            ?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $lresult['id'] ?>"><?php echo $lresult['title'] ?></a></h3>
						<a href="post.php?id=<?php echo $lresult['id'] ?>"><img src="admin/upload/<?php echo $lresult['img'] ?>"></a>
						<?php echo $fm->readmore($lresult['body'], 100) ?>	
					</div>
					
					<?php } }?>
					
					
					
	
			</div>