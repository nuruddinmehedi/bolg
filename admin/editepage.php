<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
          
          
          
          <?php
             if(isset($_GET['delete'])){
               $pageid= $_GET['pageid'];
                echo "line 10";
                 if(!empty($pageid)){
$qurd="delete from tab_page where id=$pageid";
$resultd= $db->delete($qurd);
if(!empty($resultd)){
  $msg ="<span style='color:green; font-size:20px;'>delleted sucessfill</span>";

                 
            }}}
            if(isset($_GET['pageid'])){
               $pageid= $_GET['pageid'];
            }else{
               echo "page not found";
            }
           if($_SERVER['REQUEST_METHOD']=='POST'){
               $name=$_POST['name'];
               $body=$_POST['body'];
               if($name==''||$body==''){
               $msg ="<span style='color:red; font-size:20px;'>filed must not be empty</span>";
               }else{
     $qur="update tab_page set name='$name', body='$body' where id=$pageid";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully page competed</span>";
    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to insert</span>";
    }
         }       }
            
            ?>
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php if(!empty($msg)){
    echo $msg;
} ?>
                <div class="block">               
                 <form action="" method="post" >
                    <table class="form">
                       <?php if(!empty($pageid)){
$qur="select * from tab_page where id=$pageid";
$result= $db->select($qur);
if(!empty($result)){
   $results=$result->fetch_assoc();

?>
                        <tr>
                            <td>
                                <label>name</label>
                            </td>
                            <td>
                                <input value="<?php echo $results['name'] ?>" name="name" type="text" placeholder="Enter page name..." class="medium" />
                            </td>
                        </tr>
                     
                       
                   
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"><?php echo $results['body'] ?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                                <a onclick="return confirm('do you want to delete the page')" href="editepage.php?delete&pageid=<?php echo $results['id'] ?>"><input type="button" name="delete" Value="Delete" /></a>
                                <?php }}?>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
         &copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
<?php include "inc/footer.php"; ?>