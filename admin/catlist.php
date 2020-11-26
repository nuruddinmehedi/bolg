<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
       
       <?php if(isset($_GET['id'])){
          $catid=$_GET['id'];
$qur="delete from tab_catagory where id=$catid";
    $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully delete catagory</span>";

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to delete</span>";
    }}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2><?php if(!empty($msg)){
        echo  $msg ;
        
    } ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $qur= "select * from  tab_catagory ";
            
           $cat= $db->select($qur);
            
            if(!empty($cat)) {
                
                $i=0;
         while($result= $cat->fetch_assoc()){
                       $i++;  
        
            
            
            ?>
					
						<tr class="odd gradeX">
							<td><?php echo $i ;?></td>
							<td><?php echo $result['name'] ;?></td>
							<td><a href="edite.php?id=<?php echo $result['id'] ;?>">Edit</a> || <a onclick="return confirm('do you want to delete this catagory??')" href="catlist.php?id=<?php echo $result['id'] ;?>">Delete</a></td>
						</tr>
					<?php } }?>	
					</tbody>
				</table>
               </div>
            </div>
        </div>
       <?php include "inc/footer.php"; ?>