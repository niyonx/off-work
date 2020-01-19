    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>

                            <?php if($_SESSION["is_admin"]){ 

                                $_SESSION["pending_leaves"] = get_pending_leaves();
                                echo $_SESSION["pending_leaves"]->pending; 
                            }else{
                                 echo no_pending_u($_SESSION["emp_id"])->num;
    
                } ?>

                                <?php 
                                
                                 ?>
                            </h3>
                            <p>
                                Pending Applications
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-load-a"></i>
                        </div>
                        <a href="<?php echo root_url(); ?>pages/leave_application/pending_leave_applications/" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php 

                            $_SESSION["user_leave_types"] = get_user_leave_types($_SESSION["emp_id"]);
                                      
                $_SESSION["casual_leave"] = get_casual_leave($_SESSION["emp_id"]);
                 $_SESSION["employee_leave_balance"] = get_employee_leave_balance($_SESSION["emp_id"]);
                
                            // echo $_SESSION["casual_leave"]->days_left;
                 echo $_SESSION["employee_leave_balance"][0][days_left];
                             ?><sup style="font-size: 20px"> out of <?php echo $_SESSION["employee_leave_balance"][0][days_entitled]; ?></sup>
                            </h3>
                            <p>
                                <?php echo get_leave_type_name($_SESSION[user_leave_types][0]['lt_id'])[0]['name']; ?> Left
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-code"></i>
                        </div>
                        <a href="<?php echo root_url(); ?>pages/leave_application/leave_balance/index.php" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php 

                $_SESSION["sick_leave"] = get_sick_leave($_SESSION["emp_id"]);
                            // echo $_SESSION["sick_leave"]->days_left;
                echo $_SESSION["employee_leave_balance"][1][days_left];
                             ?><sup style="font-size: 20px"> out of <?php echo $_SESSION["employee_leave_balance"][1][days_entitled]; ?></sup>
                            </h3>
                            <p>
                                 <?php echo get_leave_type_name($_SESSION[user_leave_types][1]['lt_id'])[0]['name']; ?> Left
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <a href="<?php echo root_url(); ?>pages/leave_application/leave_balance/index.php" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?php 
                                          
                $_SESSION["study_leave"] = get_study_leave($_SESSION["emp_id"]);
              
                            // echo $_SESSION["study_leave"]->days_left;
                echo $_SESSION["employee_leave_balance"][2][days_left];
                             ?><sup style="font-size: 20px"> out of <?php echo $_SESSION["employee_leave_balance"][2][days_entitled];?></sup>
                            </h3>
                            <p>
                                 <?php echo get_leave_type_name($_SESSION[user_leave_types][2]['lt_id'])[0]['name']; ?> Left
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-smile-o"></i>
                        </div>
                        <a href="<?php echo root_url(); ?>pages/leave_application/leave_balance/index.php" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->

            <!-- top row -->
            <div class="row">
                <div class="col-xs-12 connectedSortable">
                    
                </div><!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                
                <?php /* ?>
                <section class="col-lg-6 connectedSortable">  
                            
                            <!-- TO DO List -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">To Do List</h3>
                                    <div class="box-tools pull-right">
                                        <ul class="pagination pagination-sm inline">
                                            <li><a href="#">&laquo;</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="todo-list">
                                        <li>
                                            <!-- drag handle -->
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>  
                                            <!-- checkbox -->
                                            <input type="checkbox" value="" name=""/>                                            
                                            <!-- todo text -->
                                            <span class="text">Design a nice theme</span>
                                            <!-- Emphasis label -->
                                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                                            <!-- General tools such as edit or delete-->
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>                                            
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Make the theme responsive</span>
                                            <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name="" checked/>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Check your messages and notifications</span>
                                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix no-border">
                                    <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                                </div>
                            </div><!-- /.box -->

                                                       

                        </section><!-- /.Left col --> <?php */ ?>
                   

                                               

                <section class="col-lg-12 connectedSortable"> 
                   

                    <!-- Calendar -->
                    <div class="box box-warning">
                        <div class="box-header">
                            <i class="fa fa-calendar"></i>
                            <div class="box-title">Calendar</div>
                            
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        
                                        <li><a href="pages/calendar/index.php">View calendar</a></li>
                                    </ul>
                                </div>
                            </div><!-- /. tools -->                                    
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                            <!--The calendar -->
                            <div id="calendar"></div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </section><!-- right col -->
            </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->