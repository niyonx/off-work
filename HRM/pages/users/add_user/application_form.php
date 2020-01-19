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
<form method="post" role="form" action="index.php" enctype="multipart/form-data">
    <section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
            
                <div class="box-body">
                    <!-- Date range -->
                    
                        <div class="form-group">
                        
                            <label>First Name<span class="text-danger">*</span></label>
                            <input name="fname" type="text" class="form-control" placeholder="Enter ..."/>
                        
                        </div><!-- /.form group -->  
                    
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->                          
        </div><!-- /.col -->
        <div class="col-md-6">
            <div class="box box-warning">
            
                <div class="box-body">
                    <!-- Date range -->
                     <div class="form-group">
                            <label>Last Name<span class="text-danger">*</span></label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter ..."/>
                        </div>
                    
                     
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->                          
        </div><!-- /.col -->
    </div>
    <div class="row">
        <!-- left column -->
       
            

        <!-- right column -->
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">Contact Details</h3>
                </div>
                <div class="box-body">
                    <!-- Date range -->
                    <div class="form-group">
                    
                        <label>Email Address<span class="text-danger">*</span></label>
                        <div class="input-group">
                           <span class="input-group-addon">@</span>
                        <input type="email" name="email" class="form-control" placeholder="Enter ..."/>
                        </div>
                    
                    </div><!-- /.form group -->                                         <!-- textarea -->
                    <div class="form-group">
                        <label>Phone Number<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                        <input type="number" name="phone" class="form-control" placeholder="Enter ..."/>
                    </div>
                    </div>
                    
                 </div><!-- /.box-body -->
            </div><!-- /.box -->

             
            <div class="box box-dark">
                    <div class="box-header">
                    <h3 class="box-title">Employee Details</h3>
                </div>
            <div class="box-body">
                
                <!-- form start -->
                
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        
                        <input type="text" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" id="dob-mask" name="dob" placeholder="Enter..." data-mask/>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        
                        <input type="text" name="address" class="form-control" placeholder="Enter ..."/>
                    </div>

                    
                       <div class="form-group">
                        <label>National Identity Card Number</label>
                        
                        <input type="text" name="nic" class="form-control" placeholder="Enter ..."/>
                    </div>
                    
                    <div class="form-group">
                        <label>Passport</label>
                        
                        <input type="text" name="passport" class="form-control" placeholder="Enter ..."/>
                    </div>

                    <div class="form-group" >
                        <label for="exampleInputFile">Attachments</label><!-- <small> (Image format only)</small> -->
                        <input type="file" id="exampleInputFile" name="file[]" multiple>
                    </div>


                    </div><!-- /.box-body -->
                
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    
    
        <!-- left column -->
        
         <div class="col-md-6">
            <!-- general form elements -->


                    <div class="box box-info">
            <div class="box-header">
                    <h3 class="box-title">Emergency Contact Details (Kin)</h3>
                </div>
            <div class="box-body">
                
                <!-- form start -->
                
                    <div class="form-group">
                        <label>Firstname</label>
                        
                        <input type="text" name="fnkin" class="form-control" placeholder="Enter ..."/>
                    </div>

                    <div class="form-group">
                        <label>Surname</label>
                        
                        <input type="text" name="snkin" class="form-control" placeholder="Enter ..."/>
                    </div>

                    
                       <div class="form-group">
                        <label>Phone Number</label>
                        
                        <input autocomplete="tel" type="number" name="pnkin" class="form-control" placeholder="Enter ..."/>
                    </div>


                    
                    

                    </div><!-- /.box-body -->
                
            </div><!-- /.box -->
                    
            <div class="box box-primary">
                
                <!-- form start -->
                <div class="box-header">
                    <h3 class="box-title">Employment Details</h3>
                </div>
                    <div class="box-body">
                       <div class="form-group">
                            <label>Select Department<span class="text-danger">*</span></label>
                            <select class="form-control" name="dept_id">
                               <?php 
                               $_SESSION["tbl_department"] = get_tbl_department();
                        foreach ($_SESSION["tbl_department"] as $key => $value) {
                            echo ("<option value='".get_did($_SESSION["tbl_department"][$key][dept_name])->id."'>".$_SESSION["tbl_department"][$key][dept_name]."</option>");
                        }?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>Designation<span class="text-danger">*</span></label>
                            <input type="text" name="job_name" class="form-control" placeholder="E.g software engineer"/>
                        </div>
                        <div class="form-group">
                            <label>Date of Entry</label>
                            <input type="text" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" id="doe-mask" name="doe" placeholder="Enter..." data-mask/>

                        </div>

                        <div class="form-group">
                            <label>Admin permissions</label><br>
                            
                                <input type="checkbox" name="admin" value="1"/>  Check to enable admin permissions for new user 
                            
                        </div>
                        <!-- <div class="form-group">
                            <label>Admin permissions</label><br>
                            <input type="checkbox" name="admin" value="1"/>Check if yes 
                        </div> -->
                        <!-- <div class="form-group">
                            <label>Admin permissions</label><br>
                            
                                <input type="checkbox" name="admin" value="1"/>  Check to enable admin permissions for new user 
                            
                        </div> -->

                    </div><!-- /.box-body -->
                    </div>
                
            </div><!-- /.box -->
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