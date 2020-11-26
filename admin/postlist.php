<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
       
       <?php
if(isset($_GET['delete'])&& isset($_GET['id'])){
    
                $deleteid=$_GET['id'];
                 $qur="delete from tab_post where id=$deleteid";
                 $delete= $db->delete($qur);
            
            if(!empty($delete)) {
                 $msg ="<span style='color:green; font-size:20px;'>sucessfully deleted</span>";
            }
            }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2><?php if(!empty($msg)){
    echo $msg;
} ?>		
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th style="width:5%">serial</th>
							<th style="width:12%">Post Title</th>
							<th style="width:12%">img</th>
							<th style="width:10%">author</th>
							<th style="width:15%">date</th>
							<th style="width:20%">Description</th>
							<th style="width:8%">Category</th>
							<th style="width:5%">Image</th>
							<th style="width:12%">Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?php $qur= "select * from tab_post ";
            
           $post= $db->select($qur);
            
            if(!empty($post)) {
                $i=0;
                
         while($result= $post->fetch_assoc()){
                 $i++        
        
            
            
            ?>
					
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['title']?></td>
							<td><img width="100px" height="100px" src="upload/<?php echo $result['img']?>" alt=""></td>
								<td><?php echo $result['author']?></td>
									<td><?php echo $fm->date($result['date'])?></td>
							<td><?php echo $fm->readmore($result['body'],100) ?></td>
							<td><?php echo $result['cat']?></td>
							<td class="center"><?php echo $result['img']?></td>
							
							<td><a href="editepost.php?id=<?php echo $result['id'] ;?>">Edit</a> || <a onclick="return confirm('do you want to delete the post')" href="?delete&id=<?php echo $result['id'] ;?>">Delete</a></td>
						</tr>
						<?php }}?>
						
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
       <?php include "inc/footer.php"; ?>