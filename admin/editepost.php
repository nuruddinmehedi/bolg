<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10"><?php
            
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $q="select * from tab_post where id=$id";
                 $idq=$db->insert($q);
                if(!empty($idq)){
                    $idr= $idq->fetch_assoc();
                }
           if($_SERVER['REQUEST_METHOD']=='POST'){
               $title=$_POST['title'];
               $cat=$_POST['cat'];
               $author=$_POST['author'];
               $tags=$_POST['tags'];
               $body=$_POST['body'];
               if($title==''||$cat==''||$author==''||$tags==''||$body==''){
               $msg ="<span style='color:red; font-size:20px;'>filed must not be empty</span>";
               
               }else{
                   
    $permited= array('jpg','png','gif','jepng');
   $file_name=$_FILES['image']['name'];
   $file_size=$_FILES['image']['size'];
   $tmp_name=$_FILES['image']['tmp_name'];
   
    $file_explpd= explode('.',$file_name);
    $file_ext= strtolower(end($file_explpd));
    $unicName= substr(md5(time()),0,10).'.'.$file_ext;
     $uploadfile= "upload/".$unicName;
                   
    if(!empty($file_name)){
    if (empty($file_name)) {
     $msg= "<span style='color:red; font-size:20px;'>Please Select any Image !</span>";
    }elseif ($file_size >1048567000) {
     $msg= "<span style='color:red; font-size:20px;'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     $msg= "<span style='color:red; font-size:20px;'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } else{
  
     $qur="update tab_post set  
     cat='$cat',
     title='$title',
     body='$body',
     img='$unicName',
     author='$author',
     tags='$tags'
     where id=$id
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>";
          move_uploaded_file($tmp_name,$uploadfile);
        $delete= "upload/".$idr['img'];
        unlink($delete);

    }else{
   $msg ="<span style='color:red; font-size:20px;'>failed to delete</span>";
    }
         } } else{
        
        
        $qur="update tab_post set  
     cat='$cat',
     title='$title',
     body='$body',
     author='$author',
     tags='$tags'
     where id=$id
     ";
        $resu=$db->insert($qur);
    if(!empty($resu)){
          $msg ="<span style='color:green; font-size:20px;'> congratulation!you successfully post competed</span>";
        
        
        
    }
    
    
    
    }
           }}}
            
            ?>
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php if(!empty($msg)){
    echo $msg;
} ?>
                <div class="block">  
                 <?php if(isset($_GET['id'])){
                $id=$_GET['id'];
                $q="select * from tab_post where id=$id";
                 $idq=$db->insert($q);
                if(!empty($idq)){
                    $idr= $idq->fetch_assoc();
                } } ?>           
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input value="<?php echo $idr['title']?>" name="title" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                   
                                   <?php
                                    $query="select * from tab_catagory";     
                     $resu=$db->insert($query);
                        if(!empty($resu)){
                            while ($result=$resu->fetch_assoc()){
                        
                                    ?>
                                    <option 
                                    <?php if($idr['cat']==$result['id']){
                                        
                                        echo "selected";
                                    } ?>
                                     
                                       value="<?php echo $result['id']?>"><?php echo $result['name']?></option>
                                    <?php }}?>
                                </select>
                            </td>
                        </tr>
                   
                    
                    
                        
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input value="<?php echo $idr['author']?>" name="author" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <tr>
                            <td>
                                <label>tags</label>
                            </td>
                            <td>
                                <input  value="<?php echo $idr['tags']?>" name="tags" type="text"  />
                            </td>
                        </tr>  
                           <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input name="image" type="file" />
                                
                            </td>
                        </tr>
                           <tr>
                           <td></td>
                           <td> <img src="upload/<?php echo $idr['img']/*.'?id='.rand(10,100)*/?>" alt="" width="500px" height="100px"></td>
                           </tr>
                           
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea type="text" name="body" class="tinymce bodytx">
                                    <?php echo $idr['body']?>
                                </textarea>
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