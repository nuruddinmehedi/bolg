<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10"><?php
            
            
            
            if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $tomail=$fm->datavaliedation($_POST['tomail']);
    $Subject=$fm->datavaliedation($_POST['Subject']);
    $from=$fm->datavaliedation($_POST['from']);
    $Message=$fm->datavaliedation($_POST['body']);
    if($tomail==''){
        $msg ="<span style='color:red; font-size:20px;'>
        TO filled must not be empty</span>";
    }elseif($from==''){
         $msg ="<span style='color:red; font-size:20px;'>
        From filled must not be empty</span>";
    }elseif(!filter_var($from, FILTER_VALIDATE_EMAIL)){
          $msg ="<span style='color:red; font-size:20px;'>"
        .$from." is not a valied email</span>";
    }elseif($Subject==''){
         $msg ="<span style='color:red; font-size:20px;'>
        subject must not be empty</span>";
    }elseif($Message==''){
         $msg ="<span style='color:red; font-size:20px;'>
        message filled must not be empty</span>";
    }else{
         $header="from:$from";
        $sentmail= mail($tomail, $Subject, $Message, $header);
        if($sentmail){
            $msg ="<span style='color:green; font-size:20px;'>
       sucessfully sent the mail</span>";
        }else{
            $msg ="<span style='color:red; font-size:20px;'>
        failed to sent </span>";
        }
    }
            }
                
            if(isset($_GET['msgid'])){
                $id=$_GET['msgid'];
                $q="select * from tab_contact where id=$id";
                 $idq=$db->insert($q);
                if(!empty($idq)){
                    $idr= $idq->fetch_assoc();
                }
            }
            
            ?>
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php if(!empty($msg)){
    echo $msg;
} ?>
                <div class="block">  
                        
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>TO</label>
                            </td>
                            <td>
                                <input readonly value="<?php echo $idr['email']?>" name="tomail" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                         <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input name="from" type="text" placeholder="Enter email..." class="medium" />
                            </td>
                        </tr>
                     
                   
                    
                    
                        
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input class="medium" placeholder="your email subject" name="Subject" type="text" />
                            </td>
                        </tr>
                         
                          
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea style="width:700px;height:300px;"  type="text" name="body"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Sent" />
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