<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10"><?php
           if($_SERVER['REQUEST_METHOD']=='POST'){
               $name=$_POST['name'];
               $body=$_POST['body'];
               if($name==''||$body==''){
               $msg ="<span style='color:red; font-size:20px;'>filed must not be empty</span>";
               
               }else{
   
     $qur="insert into tab_page(name,body) values('$name','$body')";
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
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>name</label>
                            </td>
                            <td>
                                <input name="name" type="text" placeholder="Enter page name..." class="medium" />
                            </td>
                        </tr>
                     
                       
                   
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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