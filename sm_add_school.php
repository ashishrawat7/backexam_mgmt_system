<?php 
require('inc/sm_add_school.inc.php');
require_once('common/head.php'); ?>
    <body>
        <div id="wapper">
            <?php require_once('common/header.php');             //header ?>
            <div class="container-fluid main-container">
                <?php require_once('common/left_menu.php');           //navigation ?>
                    <div class="col-md-10 content">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo $heading; ?></div>
                                <div class="panel-body content-body">
                                    <form class="form-horizontal" method="post" action="sm_add_school.php">
                                        <?php if($error){
                                                    echo "<div class='alert alert-danger'>";
                                                    echo $error;
                                                    echo "</div>";
                                                }if($ack == 1){
                                                    echo "<div class='alert alert-success'>School added successfully!</div>";
                                                }else if($ack ==2){  echo "<div class='alert alert-warning'>Faild to add new book!</div>";}
                                        ?>
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">
                                            <label for="school_code" class="col-sm-5 control-label">School Code</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="school_code" placeholder="School Code" name="school_code" value="<?php echo $school_code;?>">
                                                    <span><font color="red"><?php if(isset($school_code_err)) {echo $school_code_err;} ?></font></span>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="school_name" class="col-sm-5 control-label">School Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="school_name" placeholder="School Name" name="school_name" value="<?php echo $school_name;?>">
                                                    <span><font color="red"><?php if(isset($school_name_err)) {echo $school_name_err;} ?></font></span>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <br/>

                                        <!-- <div class="row ">
                                            <div class="col-md-4 col-md-offset-2">                                                
                                                <label for="book_name" class="col-sm-4 control-label">Publication</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="publication_id" name="publication_id">
                                                        <option value="0">select publication</option>
                                                        <?php                                
                                                        /* foreach($publications as $publication){
                                                            echo "<option value='".$publication['publication_id']."'";
                                                            if($publication['publication_id'] == $publication_id){
                                                                echo "selected";
                                                            }
                                                            echo ">".$publication['publication_name']."</option>\n";
                                                        } */
                                                        ?>
                                                    </select>
                                                    <span><font color="red"><?php /* echo $publication_err; */ ?></font></span>
                                                </div>                                                
                                            </div>
                                            <div class="col-md-4">                                                
                                                <label for="book_name" class="col-sm-4 control-label">Quantity</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="quantity" value="<?php echo $quantity;?>" placeholder="Quantity" name="quantity">
                                                    <span><font color="red"><?php echo $quantity_err; ?></font></span>
                                                </div>                                                
                                            </div>
                                        </div> -->                                        
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-12 text-center">                                                
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success">Add Book</button>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <!-- row -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php require_once('common/footer.php')?>
        </div>
    </body>
</html>
