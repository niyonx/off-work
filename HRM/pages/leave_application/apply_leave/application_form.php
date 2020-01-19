<section class="content invoice">                    
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Apply Leave
                <small class="pull-right">Date: <?php 
        echo date("l d/m/Y", time());
        ?></small>
            </h2>                            
        </div><!-- /.col -->
    </div>
<form method="post" role="form" name="frm_apply_leave" enctype="multipart/form-data" id="frm" action="index.php">
                   
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Select Employee<span class="text-danger">*</span></label>
                                
                                
                                    <?php

                                    if($_SESSION["is_admin"]){
                                        echo ("<select class='form-control' id='admin_select' name='employee_id'>");
                                        echo ("<option disabled selected value> -- select an option -- </option>");
                                    $_SESSION["all_employee_names_a"] = get_all_employee_names_a();
                            foreach ($_SESSION["all_employee_names_a"] as $key => $value) {

                                echo ("<option value=".get_id($_SESSION["all_employee_names_a"][$key]['firstname'],$_SESSION["all_employee_names_a"][$key]['surname'],$_SESSION["all_employee_names_a"][$key]['email'])->id.">".$_SESSION["all_employee_names_a"][$key]['firstname']." ".$_SESSION["all_employee_names_a"][$key]['surname']."</option>"); }

                            }else{
                                echo ("<select class='form-control' name='employee_id'>");
                                echo ("<option value=".get_id($_SESSION["all_employee_names_a"][$key]['firstname'],$_SESSION["all_employee_names_a"][$key]['surname'],$_SESSION["all_employee_names_a"][$key]['email'])->id.">".$_SESSION["firstname"]." ".$_SESSION["surname"]."</option>");


                                }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Leave Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="leave_type_id" id="ajax">
                                    <?php if ($_SESSION["is_admin"]) {

                                        $_SESSION["employee_leave_balance"] = get_employee_leave_balance($_SESSION["emp_id"]);
                                    $_SESSION["all_leave_type_names"] = get_all_leave_type_names();

                            foreach ($_SESSION["all_leave_type_names"] as $key => $value) {

                                echo ("<option value='".($key+1)."'>".$_SESSION["all_leave_type_names"][$key]['name']."</option>");}

                                    }else{

                                    $_SESSION["employee_leave_balance"] = get_employee_leave_balance($_SESSION["emp_id"]);

                                    $_SESSION["all_leave_type_names"] = get_all_leave_type_names();
                            foreach ($_SESSION["all_leave_type_names"] as $key => $value) {
                                echo ("<option value='".($key+1)."'>".$_SESSION["all_leave_type_names"][$key]['name']." (".$_SESSION["employee_leave_balance"][$key][days_left]." left)"."</option>");}
                                }?>
                                </select>
                            </div>
                            <div class="form-group" >
                                <label for="exampleInputFile">Attachment</label><small> (Image format only)</small>
                                <input type="file" id="exampleInputFile" name="file">
                            </div>
                        </div><!-- /.box-body -->
                   
                </div><!-- /.box -->

            </div><!--/.col (left) -->
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-body">
                        <!-- <form method="post" role="form" action="index.php"> -->
                            <div class="form-group">
                                <label>Date range<span class="text-danger" options="dateRangeOptions">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="calendar" type="text" class="form-control pull-right" id="reservation"/>
                                </div>
                            </div>    
                            <div class="form-group">

                                    <!-- <div class="radio" id="radiobtn">
                                       
                                            <input type="radio" name="all" id="allItems" value="option1"> All Items

                                            <input type="radio" name="wom" id="women" value="option1"> Women
                                        
                                            <input type="radio" name="men" id="men" value="option1"> Men
                                          
                                    </div>   -->
                               
                                    <div class="radio" id="radiobtn">
                                        <label class="halfradio">
                                            <input type="radio" name="optionsRadios" id="optionsRadios1"  value="option1">
                                            Morning half day
                                        </label>
                                        <label class="halfradio">
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" >
                                            Afternoon half day
                                        </label>
                                        
                                        <label class="fullradio">
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" checked >
                                            Full day <small>(Default)</small>
                                        </label>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Duration</label>
                                <input name="dur" type="text" id="ajaxdur" class="form-control" value="" readonly/>
                            </div>                                    
                            <div class="form-group">
                                <label>Reason<span class="text-danger">*</span></label>
                                <input id="reason" name="reason" class="form-control" rows="3" placeholder="Enter ..." maxlength="150" />
                            </div>
                        <!-- </form>  -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <!-- <form method="post" role="form" action="index.php"> -->
                    <div class="form-group">
                        <button type="Submit" class="btn btn-success btn-block btn-sm">Apply leave</button>
                    </div>
                    
                <!-- </form> -->
            </div><!-- /.col -->
        </div>                
    </section><!-- /.content -->
</form>
</section>
