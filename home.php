<?php 
// require '/inc/home.inc.php';
// require '/inc/header.inc.php';
?>

<div class="col-md-10 content">
<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $title; ?>
    </div>    
    <div class="clearfix"></div>
    <div class="panel-body">
    <form class="form-horizontal" method="post" action="home.php">
    <?php if($book_name_err){
                echo "<div class='alert alert-danger'>";
                echo $book_name_err;
                echo "</div>";
        }?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="book_name" class="col-sm-12 control-label">Book Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="book_name" placeholder="Book Name" name="book_name" value="<?php echo $book_name;?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="book_name" class="col-sm-12 control-label">Authore</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="author_id" name="author_id">
                                <option value="0">All</option>
                                <?php                                
                                foreach($authors as $author){
                                    echo "<option value='".$author['author_id']."'"; 
                                    if($author['author_id'] == $author_id){
                                        echo "selected";
                                    }
                                    echo ">".$author['author_name']."</option>\n";
                                }                               
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="book_name" class="col-sm-12 control-label">Category</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="0">All</option>
                                <?php                                
                                foreach($categories as $category){
                                    echo "<option value='".$category['category_id']."'";
                                    if($category['category_id'] == $category_id){
                                        echo "selected";
                                    }
                                    echo ">".$category['category_name']."</option>\n";
                                }                               
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="book_name" class="col-sm-12 control-label">Subject</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="subject_id" name="subject_id">
                                <option value="0">All</option>
                                <?php                                
                                foreach($subjects as $subject){
                                    echo "<option value='".$subject['subject_id']."'";
                                    if($subject['subject_id'] == $subject_id){
                                        echo "selected";
                                    }
                                    echo ">".$subject['subject_name']."</option>\n";
                                }                                
                                ?>
                            </select>                         
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="book_name" class="col-sm-12 control-label">Publication</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="publication" name="publication_id">
                                <option value="0">All</option>
                                <?php                                
                                foreach($publications as $publication){
                                    echo "<option value='".$publication['publication_id']."'";
                                    if($publication['publication_id'] == $publication_id){
                                        echo "selected";
                                    }
                                    echo ">".$publication['publication_name']."</option>\n";
                                }                              
                                ?>
                            </select>                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-center">
                    <label for="book_name" class="col-sm-4 control-label"></label>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">Search Book</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </form>
    </div>
    
    <?php 
    if(!empty($books)){
    if(isset($books)){?>
    <hr/>
        <div class="panel-body">
            <table class="table table-bordered table-text1">
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Publication</th>
                    <th>Subject</th>
                    <th>year</th>
                    <th>Action</th>
                </tr>
                <?php
                $last_id = '';
                $status = '';
                foreach($books AS $book){
                    $status = $sqlo->isAvailable($book['book_id']);
                    if($last_id == $book['book_id']){
                        continue;
                    }                    
                    $last_id = $book['book_id'];                    
                    ?>
                    <tr>
                        <td><?php echo $book['book_name'];?></td>
                        <td><?php echo $book['author_name'];?></td>
                        <td><?php echo $book['publication_name'];?></td>
                        <td><?php echo $book['subject_name'];?></td>
                        <td><?php echo $book['publish_year'];?></td>
                        <td><?php if($status){
                                echo "<a href='book_issue.php?bookid=".$book['book_entity_id']."' class='btn btn-primary'>Issue</a></td>"; 
                            }else{
                                echo "<strong class='red'>Unavailable</strong>";
                            }?>
                    </tr>
                <?php } ?>
                
            </table>
        </div>
    <?php }
    } ?>
    <!-- --->
</div>
</div>

<?php 
require '/inc/footer.inc.php';
?>