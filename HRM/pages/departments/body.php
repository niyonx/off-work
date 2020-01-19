    
    <aside class="right-side">                
        <!-- Content Header (Page header) -->
        <section class="content-header" style="margin-bottom: 30px;">
        
            <ol class="breadcrumb">

                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Departments</li>
            </ol>
        </section>

        <?php if($_SESSION["is_admin"]){ ?>
        
        <div class="pad margin no-print">
            <div class="alert alert-warning" style="margin-bottom: 0!important;">
                <i class="fa fa-info"></i>
                <b>Note:</b> Employees' details will change when department names or department heads are edited. Please double check on <a href="../users/user_details/index.php">User Details</a>.
            </div>
        </div>

        

        <!-- Main content -->
        <section class="content invoice">                    
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-sitemap"></i> Departments
                        <small class="pull-right">Date: <?php 
                        echo date("d/m/Y", time());
                        ?></small>
                    </h2>                            
                </div><!-- /.col -->
            </div>
                                
                <!-- title row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <!-- <div class="box-header">
                            <h3 class="box-title">Departments table</h3>
                            <div class="box-tools">
                                
                                <div class="input-group"> -->

                                    <!-- <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div> -->
                               <!--  </div>
                            </div>
                        </div> -->
                        <div class="box-body table-responsive no-padding" style="overflow-y: hidden !important; overflow-x: auto !important; ">
                            <table class="table table-hover" data-toggle="table" data-pagination="true" data-show-export="true">
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Department</th>
                                    <th>Department code</th>
                                    <th>Department head</th>
                                </tr>
                                <?php
                                    $_SESSION["tbl_department"] = get_tbl_department();
                                    foreach ($_SESSION["tbl_department"] as $key => $value) {
                                              echo ("<tr>
                                        <td><a id='dname' data-name='dept_name' data-pk='".get_id_from_dcode($_SESSION["tbl_department"][$key][dept_code])->id."' data-type='text' data-url='update.php'>".$_SESSION["tbl_department"][$key][dept_name]."</a></td>

                                        <td><a id='dcode' data-name='dept_code' data-pk='".get_id_from_dcode($_SESSION["tbl_department"][$key][dept_code])->id."' data-type='text' data-url='update.php'>".$_SESSION["tbl_department"][$key][dept_code]."</a></td>

                                        <td><a id='dhead' data-name='dept_head' data-pk='".get_id_from_dcode($_SESSION["tbl_department"][$key][dept_code])->id."' data-source='../users/user_details/get_employees_json.php' data-type='select' data-url='update.php'>".get_emp_name($_SESSION["tbl_department"][$key][dept_head])->firstname." ".get_emp_name($_SESSION["tbl_department"][$key][dept_head])->surname."</a></td>
                                        </tr>");                  
                                    }
                                ?>
                            </table>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <div class="container">
                      <!-- Trigger the modal with a button -->
                        <button class="btn btn-flat btn-success" id="myBtn">Add department</button>

                      <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" style="margin-top:14%;">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body" style="padding:40px 50px;">
                                        <form method="post" role="form">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter new department" name="new_department" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter new department code" name="new_department_code" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <!-- <input type="text" class="form-control" placeholder="Enter department head" name="new_department_head"> -->
                                               <?php echo ("<select class='form-control' id='admin_select' name='new_department_head'>");
                                        echo ("<option disabled selected value> -- Select head of department -- </option>");
                                    $_SESSION["all_employee_names_a"] = get_all_employee_names_a();
                            foreach ($_SESSION["all_employee_names_a"] as $key => $value) {

                                echo ("<option value=".get_id($_SESSION["all_employee_names_a"][$key]['firstname'],$_SESSION["all_employee_names_a"][$key]['surname'],$_SESSION["all_employee_names_a"][$key]['email'])->id.">".$_SESSION["all_employee_names_a"][$key]['firstname']." ".$_SESSION["all_employee_names_a"][$key]['surname']."</option>"); }?>
                                </select>
                                            </div>
                                                <button type="Submit" class="btn btn-success btn-block ">Submit</button>
                                              <?php
                                                if (isset($_POST[new_department]) && !empty($_POST[new_department]) && isset($_POST[new_department_code]) && !empty($_POST[new_department]) && isset($_POST[new_department_head]) && !empty($_POST[new_department])){
                                                    set_department($_POST[new_department],$_POST[new_department_code], $_POST[new_department_head]);
                                                    // header("Refresh:3");
                                                    echo "<meta http-equiv='refresh' content='0'>";
                                            }?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <button class="btn btn-flat btn-danger" id="myBtn2">Delete department</button>

                      <!-- Modal -->
                        <div class="modal fade" id="myModal2" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" style="margin-top:14%;">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body" style="padding:40px 50px;">
                                        <form method="post" role="form">
                                        <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Enter department code to be deleted" name="delete_name" autofocus />
                                        </div>
                                          <button type="Submit" class="btn btn-success btn-block ">Delete</button>
                                          <?php
                                            if (isset($_POST['delete_name'])){
                                                delete_department($_POST['delete_name']);
                                                echo "<meta http-equiv='refresh' content='0'>";
                                        }?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>
                </div>
            </div><!-- /.row -->
        </section>
        <?php }else{

            ?>
            <row>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation"></i> You are not allowed to access this webpage.                   
                    </div>

                   
                </div>
            </row>

            
            <?php

            } ?>
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->





