        <div class="clear">
        </div>
           <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <?php if(session::get('role')==0){ ?>
                            
                            <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>
                                <li><a href="copyright.php">Copyright</a></li>
                                
                            </ul>
                        </li>
                                 <li><a class="menuitem">Update Pages</a>
                            <ul class="submenu">
                                <li><a href="pageadd.php">Add page</a></li>
                                <?php
                                $quryforpageshow="select * from tab_page";
                                $resultforpageshow= $db->select($quryforpageshow);
                                if(isset($resultforpageshow)){
                                    while($resultshow=$resultforpageshow->fetch_assoc()){
                               
                                ?>
                                <li><a href="editepage.php?pageid=<?php echo $resultshow['id']?>"><?php echo $resultshow['name'] ?></a></li>
                                <?php }}?>
                            </ul>
                        </li>
                       <?php }?>
                       
                        
						
                    
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                               <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                 <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>