    <aside class="right-side">                
        <!-- Content Header (Page header) -->
        <section class="content-header" style="margin-bottom: 30px;">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Users</a></li>
                <li class="active">Edit User Leaves</li>
            </ol>
        </section>

        
        <?php if($_SESSION["is_admin"]){ ?>
        <!-- Main content -->
        <section class="content invoice box box-success">                    
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa  fa-pencil-square"></i> Edit User Leaves (Default annual leaves entitled)
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
                                <h3 class="box-title">User Leaves Table <small>(Default annual leaves entitled)</small></h3>
                                <div class="box-tools">
                                    
                                    <div class="input-group"> -->

                                        <!-- <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search by employee"/> -->
                                        <!-- <div class="input-group-btn">
                                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                        </div> -->
                                    <!-- </div>
                                </div>
                            </div> -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover editable-table" id="editableTable">
                                    <tr>
                                    <th>ID</th>
                                    <th>Full name</th>
                                        <?php 
                                        $_SESSION["all_leave_type_names"] = get_all_leave_type_names();
                                foreach ($_SESSION["all_leave_type_names"] as $key => $value) {
                                echo ("<th><center>".$_SESSION["all_leave_type_names"][$key]['name']."</center></th>");}?>
                                    </tr>
                                    <tr>
                                        <?php 
                                        $p=0;
                                        $y = 0;
                                        $z = 1;
                                        $leave_types = get_leave_types();
                                        $_SESSION["edit_user_leave_table"] = get_edit_user_leave_table();
                                        $_SESSION["max_emp"] = get_max_emp()->max_emp;
                                        $_SESSION["max_lt"] = get_max_lt()->max_lt;
                                for ($x = 0; $x < $_SESSION['max_emp'] * $z; $x++) {
                                    echo ("<tr><td><center>"

                                        .$_SESSION["edit_user_leave_table"][$x * $_SESSION['max_lt']]['id'].

                                        "</center></td>".

                                         "<td>"

                                         .$_SESSION["edit_user_leave_table"][$x * $_SESSION['max_lt']]['full_name'].

                                         "</td>");

                                    for ($i= $x * $_SESSION['max_lt']; $i < ($x * $_SESSION['max_lt']) + $_SESSION['max_lt']; $i++) { 
                                        
                                        if ($p==$_SESSION['max_lt']){
                                            $p = 0;
                                        }

                                        echo ("
                                            <td><center><a href='#' id='tdata' data-name='".$leave_types[$p][id]."' data-type='number' data-pk='".$_SESSION["edit_user_leave_table"][$x * $_SESSION['max_lt']]['id']."' data-url='update.php' data-title='Leave Type'>".$_SESSION["edit_user_leave_table"][$i]['days_entitled']."</a></center></td>");
                                        $p=$p+1;
                                    }
                                    echo "</tr>";
                                } ?>

                                <?php /*
                                        $p=0;
                                        $y = 0;
                                        $z = 1;
                                        $leave_types = get_leave_types();
                                        $_SESSION["edit_user_leave_table"] = get_edit_user_leave_table();
                                        $_SESSION["max_emp"] = get_max_emp()->max_emp;
                                        $_SESSION["max_lt"] = get_max_lt()->max_lt;
                                for ($x = 0; $x < $_SESSION['max_emp'] * $z; $x++) {
                                    echo ("<tr><td><center>"

                                        .$_SESSION["edit_user_leave_table"][$x * $_SESSION['max_lt']]['id'].

                                        "</center></td>".

                                         "<td>"

                                         .$_SESSION["edit_user_leave_table"][$x * $_SESSION['max_lt']]['full_name'].

                                         "</td>");

                                    for ($i= $x * $_SESSION['max_lt']; $i < ($x * $_SESSION['max_lt']) + $_SESSION['max_lt']; $i++) { 
                                        
                                        echo ("<td><center><a href='#' id='tdata' data-name='".$leave_types[$p][id]."' data-type='text' data-pk='".$_SESSION["edit_user_leave_table"][$x * $_SESSION['max_lt']]['id']."' data-url='update.php' data-title='Leave Type'>".$_SESSION["edit_user_leave_table"][$i]['days_left']."/ ".$_SESSION["edit_user_leave_table"][$i]['days_entitled']."</a></center></td>");
                                        $p=$p+1;
                                    }
                                    echo "</tr>";
                                } 
                                    </tr> */?>
                                </table>

                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        
                    </div>
                </div><!-- /.row -->
                    <div class="container">
                    <form action="#">
                        <button class="btn btn-flat btn-success" id="myBtn" type="submit">New year, new leaves!</button>
                    </form>
                    </div>
        </section>

        <?php }else{

            ?>
           
            <div class="pad margin no-print">
                    <div class="alert alert-danger" style="margin-bottom: 0!important;">
                        <i class="fa fa-exclamation"></i>
                        <b>Note:</b> You are not allowed to access this webpage.                   
                    </div>
            </div>
            
            <?php

            } ?>


    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->