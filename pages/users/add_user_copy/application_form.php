<section class="content invoice">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> Add New User Details
                                <small class="pull-right">Date: <?php 
                        echo date("d/m/Y", time());
                        ?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
<form method="post" role="form" action="index.php">
                    <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-success">
                            
                                <div class="box-body">
                                    <!-- Date range -->
                                    
                                        <div class="form-group">
                                        
                                            <label>First Name</label>
                                            <input name="fname" type="text" class="form-control" placeholder="Enter ..."/>
                                        
                                        </div><!-- /.form group -->  
                                    
                                </div><!-- /.box-body -->
                                
                            </div><!-- /.box -->                          
                        </div><!-- /.col -->
                        <div class="col-md-6">
                            <div class="box box-warning">
                            
                                <div class="box-body">
                                    <!-- Date range -->
                                    
                                                                      <!-- textarea -->
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" class="form-control" placeholder="Enter ..."/>
                                        </div>
                                    
                                     
                                </div><!-- /.box-body -->
                                
                            </div><!-- /.box -->                          
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                
                                <!-- form start -->
                                
                                    <div class="box-body">
                                       <div class="form-group">
                                            <label>Select Department</label>
                                            <select class="form-control" name="dept_id">
                                               <?php 
                                               $_SESSION["tbl_department"] = get_tbl_department();
                                        foreach ($_SESSION["tbl_department"] as $key => $value) {
                                            echo ("<option value='".get_did($_SESSION["tbl_department"][$key][dept_name])->id."'>".$_SESSION["tbl_department"][$key][dept_name]."</option>");
                                        }?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" name="job_name" class="form-control" placeholder="E.g software engineer"/>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Admin permissions</label><br>
                                            <input type="checkbox" name="admin" value="1"/>Check if yes 
                                        </div> -->
                                        <div class="form-group">
                                            <label>Admin permissions</label><br>
                                            
                                                <input type="checkbox" name="admin" value="1"/>  Check to enable admin permissions for new user 
                                            
                                        </div>

                                    </div><!-- /.box-body -->
                                
                            </div><!-- /.box -->

                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-danger">
                                <div class="box-body">
                                    <!-- Date range -->
                                    <div class="form-group">
                                    
                                        <label>Email Address</label>
                                        <div class="input-group">
                                           <span class="input-group-addon">@</span>
                                        <input type="email" name="email" class="form-control" placeholder="Enter ..."/>
                                        </div>
                                    
                                    </div><!-- /.form group -->                                         <!-- textarea -->
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        <input type="number" name="phone" class="form-control" placeholder="Enter ..."/>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                    <div class="row">
                    
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="Submit" class="btn btn-success btn-block btn-sm" style="justify-content: center; display: block;">Create user</button>
                            </div>
                          
                        </div><!-- /.col -->
                    </div>
                </section><!-- /.content -->
                </form>
</section>