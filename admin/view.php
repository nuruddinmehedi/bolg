<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10"><?php
            
            if(isset($_GET['msgid'])){
                $id=$_GET['msgid'];
                $q="select * from tab_contact where id=$id";
                 $idq=$db->insert($q);
                if(!empty($idq)){
                    $idr= $idq->fetch_assoc();
                }$sq="update tab_contact set status='1' where id=$id";
                 $sidq=$db->insert($sq);
            }
            
            ?>
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php if(!empty($msg)){
    echo $msg;
} ?>
                <div class="block">  
                        
                 <form action="inbox.php">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Frist name</label>
                            </td>
                            <td>
                                <input readonly value="<?php echo $idr['fn']?>" name="title" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        
                   
                    
                    
                        
                        <tr>
                            <td>
                                <label>Last name</label>
                            </td>
                            <td>
                                <input readonly value="<?php echo $idr['ln']?>" name="author" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input readonly  value="<?php echo $idr['email']?>" name="tags" type="text"  />
                            </td>
                        </tr>  
                          
                          
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea readonly type="text" name="body"><?php echo $idr['msg']?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="ok" />
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