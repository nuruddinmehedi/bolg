<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <?php
 if(isset($_GET['msgid'])){
                $did=$_GET['msgid'];
     $dq="select * from tab_user where id=$did";
        $didq=$db->select($dq);
     if(!empty($didq)){
        $sresult=$didq->fetch_assoc();
         if(session::get('role')==0){
                if(!empty($did)){
$dq="delete from tab_user where id=$did";
                 $didq=$db->delete($dq);
                if(!empty($didq)){
$msg ="<span style='color:green; font-size:20px;'>deleted user </span>";
                }
                
                }
         }else{
             $msg ="<span style='color:green; font-size:20px;'>you have no right to delete user </span>";
         }

     }}?>


        <div class="grid_10"><div class="box round first grid">
                <h2>User List</h2><?php if(!empty($msg)){
    echo $msg;
} ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="10%">Name</th>
							<th width="10%">User Name</th>
							<th width="15%">Email</th>
							<th width="20%">Image</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
                        
                        $qur= "select * from tab_user order by id desc ";
            
           $dmsg= $db->select($qur);
            
            if(!empty($dmsg)) {
                $i=0;
                
         while($result= $dmsg->fetch_assoc()){
                 $i++        
        
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['username'];?></td>
							<td><?php echo $result['email'];?></td>
                           <td> <img src="upload/<?php echo $result['pic']/*.'?id='.rand(10,100)*/?>" alt="" width="100px" height="100px"></td>
							<td><a href="viewuser.php?userid=<?php echo $result['id'];?>">view</a> <?php if(session::get('role')==0){ ?>
                            
                            
                            
                        || <a href="?msgid=<?php echo $result['id'];?>">Delete</a><?php }?></td>
						</tr>
						<?php }}?>
					</tbody>
				</table>
               </div>
            </div>
           
            </div> 
       <?php include "inc/footer.php"; ?>