<aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-bottom: 30px;">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard" ></i> Home</a></li>
                        <li><a href="#">Users</a></li>
                        <li class="active">User Details</li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content invoice box box-danger">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> User Details
                                <?php if($_SESSION["is_admin"]){ ?>

                                (<button onclick="location.href='../more_user_details/index.php'" class="btn btn-info btn-xs">More User Details</button>)

                                <?php } ?>
                                <small class="pull-right">Date: <?php 
                        echo date("d/m/Y", time());
                        ?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
<?php if($_SESSION["is_admin"]){ ?>

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped bg" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Head</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Alt Head</th>
                                        <th>Admin</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>                                    
                                </thead>
                                <tbody>


                                    <?php $_SESSION["tbl_employee"]= get_tbl_employee(); 
                                    $_SESSION['tbl_emp_no_dep']= get_tbl_emp_no_dep();
                                    foreach ($_SESSION['tbl_employee'] as $key => $value){
                                        echo("<tr><td><a href='#' data-name='firstname' data-title='First name' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['firstname']."</a></td>".

                                            "
                                            <td><a href='#' data-name='surname' data-title='Surname' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['surname']."</a></td>".


                                            "
                                            <td><a href='#' data-name='dept' data-title='Department name' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='select' data-source='get_departments_json.php'  data-url='update.php' id='tdept' >".$_SESSION['tbl_employee'][$key]['dept_name']."</a></td>".


                                            "
                                            <td><a href='#' data-name='designation' data-title='Designation' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['designation']."</a></td>".


                                            "
                                            <td><a href='#' data-name='head' data-title='Department Head' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-source='get_employees_json.php' data-type='select' data-url='update.php' id='thead' >".get_emp_name($_SESSION['tbl_employee'][$key]['head'])->firstname." ".get_emp_name($_SESSION['tbl_employee'][$key]['head'])->surname."</a></td>".


                                            "
                                            <td><a href='#' data-name='phone' data-title='Phone' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text'  data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['phone']."</a></td>".


                                            "
                                            <td><a href='#' data-name='email' data-title='Email' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='email' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['email']."</a></td>"); 

                                        if ($_SESSION['tbl_employee'][$key]['cascade_approval']== 1){
                                            echo "<td><span class='label label-success'><a style='color: white;' href='#' data-name='cascade_approval' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='talthead' >yes</a></span></td>";

                                        }else if ($_SESSION['tbl_employee'][$key]['cascade_approval']== 0){
                                            echo "<td><span class='label label-danger'><a style='color: white;' href='#' data-name='cascade_approval' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='talthead' >no</a></span></td>";
                                        };

                                        if ($_SESSION['tbl_employee'][$key]['admin']== 1){
                                            echo "<td><span class='label label-success'><a style='color: white;' href='#' data-name='admin' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='tadmin' >yes</a></span></td>";

                                        }else if ($_SESSION['tbl_employee'][$key]['admin']== 0){
                                            echo "<td><span class='label label-danger'><a style='color: white;' href='#' data-name='admin' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='tadmin' >no</a></span></td>";
                                        };

                                        if ($_SESSION['tbl_employee'][$key]['active']== 1){
                                            echo "<td><span class='label label-success'><a style='color: white;' href='#' data-name='active' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='tactive' >active</a></span></td>";

                                        }else if ($_SESSION['tbl_employee'][$key]['active']== 0){
                                            echo "<td><span class='label label-danger'><a style='color: white;' href='#' data-name='active' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='tactive' >inactive</a></span></td>";
                                        };
                                        ?> 

                                        <form method="post" action="../more_user_details/index.php">
                                            
                                            <td><button name="seemore" value="<?php echo get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id; ?>" class="btn btn-warning btn-xs">See more</button></td></tr>    
                                        </form>
     

                                        <?php 
                                    }

                                    foreach ($_SESSION['tbl_emp_no_dep'] as $key => $value) {
                                        echo("<tr><td><a href='#' data-name='firstname' data-title='First name' data-pk='".get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_emp_no_dep'][$key]['firstname']."</a></td>".

                                            "
                                            <td><a href='#' data-name='surname' data-title='Surname' data-pk='".get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_emp_no_dep'][$key]['surname']."</a></td>".


                                            "
                                            <td><a href='#' data-name='dept' data-title='Department name' data-pk='".get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id."' data-type='select' data-source='get_departments_json.php'  data-url='update.php' id='tdept' >".$_SESSION['tbl_emp_no_dep'][$key]['dept_name']."</a></td>".


                                            "
                                            <td><a href='#' data-name='designation' data-title='Designation' data-pk='".get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_emp_no_dep'][$key]['designation']."</a></td>".


                                            "
                                            <td><a href='#' data-name='head' data-title='Department Head' data-pk='".get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id."' data-source='get_employees_json.php' data-type='select' data-url='update.php' id='thead' >".get_emp_name($_SESSION['tbl_emp_no_dep'][$key]['head'])->firstname." ".get_emp_name($_SESSION['tbl_emp_no_dep'][$key]['head'])->surname."</a></td>".


                                            "
                                            <td><a href='#' data-name='phone' data-title='Phone' data-pk='".get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id."' data-type='text'  data-url='update.php' id='tdata' >".$_SESSION['tbl_emp_no_dep'][$key]['phone']."</a></td>".


                                            "
                                            <td><a href='#' data-name='email' data-title='Email' data-pk='".get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id."' data-type='email' data-url='update.php' id='tdata' >".$_SESSION['tbl_emp_no_dep'][$key]['email']."</a></td>");

                                        if ($_SESSION['tbl_employee'][$key]['cascade_approval']== 1){
                                            echo "<td><span class='label label-success'><a style='color: white;' href='#' data-name='cascade_approval' data-title='Active' data-pk='".(get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='talthead' >true</a></span></td>";

                                        }else if ($_SESSION['tbl_employee'][$key]['cascade_approval']== 0){
                                            echo "<td><span class='label label-danger'><a style='color: white;' href='#' data-name='cascade_approval' data-title='Active' data-pk='".(get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='talthead' >false</a></span></td>";
                                        };

                                        if ($_SESSION['tbl_employee'][$key]['admin']== 1){
                                            echo "<td><span class='label label-success'><a style='color: white;' href='#' data-name='admin' data-title='Active' data-pk='".(get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='tadmin' >true</a></span></td>";

                                        }else if ($_SESSION['tbl_employee'][$key]['admin']== 0){
                                            echo "<td><span class='label label-danger'><a style='color: white;' href='#' data-name='admin' data-title='Active' data-pk='".(get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='tadmin' >false</a></span></td>";
                                        };


                                        if ($_SESSION['tbl_emp_no_dep'][$key]['active']== 1){
                                            echo "<td><span class='label label-success'><a style='color: white;' href='#' data-name='active' data-title='Active' data-pk='".get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id."' data-type='select' data-url='update.php' id='tactive' >active</a></span></td>";

                                        }else if ($_SESSION['tbl_emp_no_dep'][$key]['active']== 0){
                                            echo "<td><span class='label label-danger'><a style='color: white;' href='#' data-name='active' data-title='Active' data-pk='".get_id($_SESSION['tbl_emp_no_dep'][$key]['firstname'],$_SESSION['tbl_emp_no_dep'][$key]['surname'],$_SESSION['tbl_emp_no_dep'][$key]['email'])->id."' data-type='select' data-url='update.php' id='tactive' >inactive</a></span></td>";
                                        };

                                        echo '<button onclick="location.href="../more_user_details/index.php" class="btn btn-warning btn-xs">See more/button>'; 
                                    }
                                    
                                        echo ("</tr>"
                                            );
                                    ?>
                                    
                                </tbody>
                               <!--  <tbody>
                                    <?php /*$_SESSION["tbl_employee"]= get_tbl_employee(); 
                                    foreach ($_SESSION['tbl_employee'] as $key => $value){
                                        echo("<tr><td>".$_SESSION['tbl_employee'][$key]['firstname']." ".$_SESSION['tbl_employee'][$key]['surname']."</td>".
                                            "<td>".$_SESSION['tbl_employee'][$key]['dept_name']."</td>".
                                            "<td>".$_SESSION['tbl_employee'][$key]['designation']."</td>".
                                            "<td>".get_emp_name($_SESSION['tbl_employee'][$key]['dept_head'])->firstname." ".get_emp_name($_SESSION['tbl_employee'][$key]['dept_head'])->surname."</td>".
                                            "<td>".$_SESSION['tbl_employee'][$key]['phone']."</td>".
                                            "<td>".$_SESSION['tbl_employee'][$key]['email']."</td>".
                                            "<td>");
                                        if ($_SESSION['tbl_employee'][$key]['active']== 1){
                                            echo '<span class="label label-success">active</span>';
                                        }else if ($_SESSION['tbl_employee'][$key]['active']== 0){
                                            echo '<span class="label label-danger">inactive</span>';
                                        };

                                        echo ("</td></tr>"
                                            );
                                    }*/?>
                                    
                                </tbody> -->
                            

                <?php }else{ ?> 

                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped bg" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Head</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        
                                        <th>Active</th>
                                    </tr>                                    
                                </thead>
                                <tbody>

                <?php 

                                 $_SESSION["tbl_employee"]= get_tbl_employee(); 
                                    foreach ($_SESSION['tbl_employee'] as $key => $value){
                                        echo("<tr><td>".$_SESSION['tbl_employee'][$key]['firstname']." ".$_SESSION['tbl_employee'][$key]['surname']."</td>".
                                            "<td>".$_SESSION['tbl_employee'][$key]['dept_name']."</td>".
                                            "<td>".$_SESSION['tbl_employee'][$key]['designation']."</td>".
                                            "<td>".get_emp_name($_SESSION['tbl_employee'][$key]['head'])->firstname." ".get_emp_name($_SESSION['tbl_employee'][$key]['head'])->surname."</td>".
                                            "<td>".$_SESSION['tbl_employee'][$key]['phone']."</td>".
                                            "<td>".$_SESSION['tbl_employee'][$key]['email']."</td>".
                                            "<td>");
                                        if ($_SESSION['tbl_employee'][$key]['active']== 1){
                                            echo '<span class="label label-success">active</span>';
                                        }else if ($_SESSION['tbl_employee'][$key]['active']== 0){
                                            echo '<span class="label label-danger">inactive</span>';
                                        };

                                        echo ("</td></tr>");

            }} ?>

            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->