<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <?php
 if(isset($_GET['deletmsgid'])){
                $did=$_GET['deletmsgid'];
     if(!empty($did)){
$dq="update tab_contact set status='3' where id=$did";
                 $didq=$db->insert($dq);}}

if(isset($_GET['unsenmsgid'])){
                $did=$_GET['unsenmsgid'];
     if(!empty($did)){
$dq="update tab_contact set status='0' where id=$did";
                 $didq=$db->insert($dq);}}
if(isset($_GET['pdeletemsgid'])){
                $did=$_GET['pdeletemsgid'];
     if(!empty($did)){
$dq="delete from tab_contact where id=$did";
                 $didq=$db->insert($dq);}}
if(isset($_GET['Seenboxmsgid'])){
                $did=$_GET['Seenboxmsgid'];
     if(!empty($did)){
$dq="update tab_contact set status='1' where id=$did";
                 $didq=$db->insert($dq);}}

?>

        <div class="grid_10"><div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="10%">Frist name</th>
							<th width="10%">Last name</th>
							<th width="15%">Email</th>
							<th width="20%">Message</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
                        
                        $qur= "select * from tab_contact where status='0' order by id desc ";
            
           $dmsg= $db->select($qur);
            
            if(!empty($dmsg)) {
                $i=0;
                
         while($result= $dmsg->fetch_assoc()){
                 $i++        
        
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['fn'];?></td>
							<td><?php echo $result['ln'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->readmore($result['msg'],40);?></td>
							<td><a href="view.php?msgid=<?php echo $result['id'];?>">view</a> || <a href="reply.php?msgid=<?php echo $result['id'];?>">reply</a></td>
						</tr>
						<?php }}?>
					</tbody>
				</table>
               </div>
            </div>
            <div class="box round first grid">
                <h2>Seen Box</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="10%">Frist name</th>
							<th width="10%">Last name</th>
							<th width="15%">Email</th>
							<th width="20%">Message</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                        
                        $qur= "select * from tab_contact where status='1' order by id desc ";
            
           $dmsg= $db->select($qur);
            
            if(!empty($dmsg)) {
                $i=0;
                
         while($result= $dmsg->fetch_assoc()){
                 $i++        
        
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['fn'];?></td>
							<td><?php echo $result['ln'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->readmore($result['msg'],40);?></td>
							<td><a href="?deletmsgid=<?php echo $result['id'];?>">Drop box</a> || <a href="?unsenmsgid=<?php echo $result['id'];?>">Unsenn</a></td>
						</tr>
						<?php }}?>
					</tbody>
				</table>
               </div>
            </div> <div class="box round first grid">
                <h2>Recycle Bin</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="10%">Frist name</th>
							<th width="10%">Last name</th>
							<th width="15%">Email</th>
							<th width="20%">Message</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                        
                        $qur= "select * from tab_contact where status='3' order by id desc ";
            
           $dmsg= $db->select($qur);
            
            if(!empty($dmsg)) {
                $i=0;
                
         while($result= $dmsg->fetch_assoc()){
                 $i++        
        
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['fn'];?></td>
							<td><?php echo $result['ln'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->readmore($result['msg'],40);?></td>
							<td><a onclick="return confirm('do you dant to delete the message')" href="?pdeletemsgid=<?php echo $result['id'];?>">Delete</a> || <a href="?Seenboxmsgid=<?php echo $result['id'];?>">Seen box</a></td>
						</tr>
						<?php }}?>
					</tbody>
				</table>
               </div>
            </div> 
        </div>
       <?php include "inc/footer.php"; ?>