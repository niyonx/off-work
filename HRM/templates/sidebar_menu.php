<ul class="sidebar-menu" >
    <li <?php echo activate_treeview('LMS');?>>
        <a href="<?php echo root_url(); ?>index.php">
            <i class="fa fa-dashboard" style="color:#ff6666;"></i> <span>Dashboard</span>
        </a>
    </li>
    <li <?php echo activate_li('calendar');?>>
        <a href="<?php echo root_url(); ?>pages/calendar/index.php">
            <i class="fa fa-calendar" style="color:rgb(255, 255, 102);"></i> <span>Calendar</span>
        </a>
    </li>
    <?php if($_SESSION["is_admin"]){ ?>
    <li <?php echo activate_li('departments');?>>
        <a href="<?php echo root_url(); ?>pages/departments/index.php">
            <i class="fa fa-sitemap" style="color:rgb(102, 255, 102);"></i> <span>Departments</span>
            
        </a>
    </li>
    <?php } ?>
    <li <?php echo activate_li('holidays');?>>
        <a href="<?php echo root_url(); ?>pages/holidays/index.php">
            <i class="fa fa-calendar-o" style="color:rgb(255, 75, 188);"></i> <span>Holidays</span>
        </a>
    </li>
    
    <li class="treeview <?php echo activate_treeview(leave_application);?>">
        <a href="#">
            <i class="fa fa-edit" style="color:orange;"></i> <span>Leave Application</span>
            <i class="fa fa-angle-left pull-right"></i>
            <?php if(no_pending()->count !=0 && $_SESSION["is_admin"]){ ?>

<small class="badge bg-red" style="margin-left: 10px;"><?php echo no_pending()->count; ?></small>

              <?php   }else if(no_pending_u($_SESSION["emp_id"])->num != 0){

                ?>

<small class="badge bg-red" style="margin-left: 10px;"><?php echo no_pending_u($_SESSION["emp_id"])->num; ?></small>

              <?php


                }else{} ?>
            
        </a>
        <ul class="treeview-menu">
            <li <?php echo activate_li(apply_leave);?>><a href="<?php echo root_url(); ?>pages/leave_application/apply_leave/index.php"><i class="fa fa-angle-double-right" style="color:#66c2ff;"></i>Apply Leave</a></li>
            
            <li <?php echo activate_li(leave_balance);?>><a href="<?php echo root_url(); ?>pages/leave_application/leave_balance/index.php"><i class="fa fa-angle-double-right" style="color:#66c2ff;"></i>Leave Balance</a></li>
            <li <?php echo activate_li(leave_types);?>><a href="<?php echo root_url(); ?>pages/leave_application/leave_types/index.php"><i class="fa fa-angle-double-right" style="color:#66c2ff;"></i>Leave Types</a></li>
            <li <?php echo activate_li(pending_leave_applications);?>><a href="<?php echo root_url(); ?>pages/leave_application/pending_leave_applications/index.php">



                <?php if(no_pending()->count !=0 && $_SESSION["is_admin"]){ ?>

<small class="badge pull-right bg-red" style="margin-right: 45px;"><?php echo no_pending()->count; ?></small>

              <?php   }else if (no_pending_u($_SESSION["emp_id"])->num != 0){

                ?>

<small class="badge pull-right bg-red" style="margin-right: 45px;"><?php echo no_pending_u($_SESSION["emp_id"])->num; ?></small>

              <?php


                }else{} ?>

            <i class="fa fa-angle-double-right" style="color:#66c2ff;"></i>Pending leaves</a>

            </li>

            <li <?php echo activate_li(approved_leave_applications);?>><a href="<?php echo root_url(); ?>pages/leave_application/approved_leave_applications/index.php"><i class="fa fa-angle-double-right" style="color:#66c2ff;"></i>Approved Leaves</a></li>

            <li <?php echo activate_li(team_leave_status);  echo activate_li(leave_history);?>><a href="<?php echo root_url(); ?>pages/leave_application/team_leave_status/index.php"><i class="fa fa-angle-double-right" style="color:#66c2ff;"></i>Team Leave Status</a></li>


        </ul>
    </li>
    
    <li class="treeview <?php echo activate_treeview(users);?>">
        <a href="#">
            <i class="fa  fa-users" style="color:#66c2ff;"></i> <span>Users</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <?php if($_SESSION["is_admin"]){ ?> 
            <li <?php echo activate_li(add_user);?>><a href="<?php echo root_url(); ?>pages/users/add_user/index.php"><i class="fa fa-angle-double-right" style="color:#ff6666;"></i> Add User</a></li>
            <?php } ?>
            
            <li <?php echo activate_li(user_details);  echo activate_li(more_user_details);?>><a href="<?php echo root_url(); ?>pages/users/user_details/index.php"><i class="fa fa-angle-double-right" style="color:#ff6666;"></i> User Details</a></li>
            
            <?php if($_SESSION["is_admin"]){ ?>
            <li <?php echo activate_li(edit_leaves);?>><a href="<?php echo root_url(); ?>pages/users/edit_leaves/index.php"><i class="fa fa-angle-double-right" style="color:#ff6666;"></i> User Leaves</a></li>
        </ul>
    </li>
    <?php } ?>
</ul>