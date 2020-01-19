<style type="text/css">
    
/*    input[type="file"] {
    display: none;
    position: absolute; left: -99999rem
}*/

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

/*button[type="submit"] {
    display: none;
   position: absolute; left: -99999rem
}*/

ul,li {
    margin:0;
    padding:0;
}
    
td {
    width: 30%
}


</style>

<?php 

    if(isset($_POST[submit]) && !(empty($_POST[submit]))){


        if(isset($_FILES) && !(empty($_FILES))){
           
            foreach ($_FILES['file']['name'] as $key => $value) {

                
                
                $name = $_FILES['file']['name'][$key];
                $tmp_name = $_FILES['file']['tmp_name'][$key];

            if (isset($name) && !empty($name)) {
                $location = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
                $extension = strtolower(end(explode('.', $name)));
                $type = $_FILES['file']['type'][$key];
                $size = $_FILES['file']['size'][$key];
                $max_size = 1024*1024;

              

                if ($size <= $max_size){
                    if(move_uploaded_file ($tmp_name, $location.$name)){


                        $location = ''.$_SESSION[root_url].'uploads/'.$name;
                        set_attachment($location,$_POST[submit],$_SESSION[emp_id]);
                       
                    
                    }
                }
            }
            }
        }
    }else if(isset($_POST[delete]) && !(empty($_POST[delete]))){
        delete_att($_POST[delete]);
    }


 ?>


<aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-bottom: 30px;">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard" ></i> Home</a></li>
                        <li><a href="#">Users</a></li>
                        <li>User Details</li>
                        <li class="active">Additional User Details</li>
                    </ol>
                </section>
                <?php if($_SESSION["is_admin"]){ ?>
                <!-- Main content -->
                <section class="content invoice box box-danger">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> Additional User Details
                                <?php if($_SESSION["is_admin"]){ ?>

                           <!--      (<button onclick="location.href='../more_user_details/index.php'" class="btn btn-default btn-xs">More User Details</button>) -->

                                <?php } ?>
                                <small class="pull-right">Date: <?php 
                        echo date("d/m/Y", time());
                        ?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
<?php if($_SESSION["is_admin"]){ ?>


                    <?php 

                //     if (isset($_POST[seemore]) && !empty($_POST[seemore])) {
                //         $_SESSION["tbl_employee"]= get_tbl_employee()[$_POST[seemore]]; 
                //         pprint(get_tbl_employee()[$_POST[seemore]]);
                    
                //     }else{

                //     $_SESSION["tbl_employee"]= get_tbl_employee(); 
                //     $_SESSION['tbl_emp_no_dep']= get_tbl_emp_no_dep();

                // }

                $_SESSION["tbl_employee"]= get_tbl_employee(); 
                    $_SESSION['tbl_emp_no_dep']= get_tbl_emp_no_dep();

                    foreach ($_SESSION['tbl_employee'] as $key => $value){

                        if (isset($_POST[seemore]) && !empty($_POST[seemore])) {
                            $_SESSION[seemore]= $_POST[seemore]-1;
                            $key = $_SESSION[seemore];
                        }


                        if (empty($_SESSION['tbl_employee'][$key]['date_of_exit'])) {
                           $DOEx="";
                        }else{
                            $DOEx=date('d-m-Y', strtotime($_SESSION['tbl_employee'][$key]['date_of_exit']));
                        }

                        if (empty($_SESSION['tbl_employee'][$key]['DOB'])) {
                           $DOB="";
                        }else{
                            $DOB=date('d-m-Y', strtotime($_SESSION['tbl_employee'][$key]['DOB']));
                        }

                        if (empty($_SESSION['tbl_employee'][$key]['date_of_entry'])) {
                           $DOEn="";
                        }else{
                            $DOEn=date('d-m-Y', strtotime($_SESSION['tbl_employee'][$key]['date_of_entry']));
                        }
                        
                        
                       

                        echo("  <form method='post' role='form' action='index.php' enctype='multipart/form-data'>
                            <div class='box box-primary'>
    
        <div class='box-body'>
        <div class='box-header'>
            <h3 class='box-title'>".$_SESSION['tbl_employee'][$key]['firstname']." ".$_SESSION['tbl_employee'][$key]['surname']."</h3>
        </div>
                            <div class='row'>
        <div class='col-xs-12 table-responsive'>

                            <table class='table'>
                            <tbody>
                            <tr><th>First Name</th><td ><a href='#' data-name='firstname' data-title='First name' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['firstname']."</a></td>".

                            "
                            <th>Last Name</th><td ><a href='#' data-name='surname' data-title='Surname' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['surname']."</a></td></tr>".


                            "
                            <tr><th>Department</th><td ><a href='#' data-name='dept' data-title='Department name' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='select' data-source='get_departments_json.php'  data-url='update.php' id='tdept' >".$_SESSION['tbl_employee'][$key]['dept_name']."</a></td>".


                            "
                            <th>Designation</th><td ><a href='#' data-name='designation' data-title='Designation' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['designation']."</a></td></tr>".


                            "
                            <tr><th>Head</th><td ><a href='#' data-name='head' data-title='Department Head' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-source='get_employees_json.php' data-type='select' data-url='update.php' id='thead' >".get_emp_name($_SESSION['tbl_employee'][$key]['head'])->firstname." ".get_emp_name($_SESSION['tbl_employee'][$key]['head'])->surname."</a></td>".


                            "
                            <th>Phone</th><td ><a href='#' data-name='phone' data-title='Phone' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text'  data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['phone']."</a></td></tr>".


                            "
                            <tr><th>Email</th><td ><a href='#' data-name='email' data-title='Email' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='email' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['email']."</a></td>".


                            "
                            <th>Date of Birth</th><td><a href='#' id='dates' data-name='DOB' data-url='update.php' data-title='Choose birth date.' data-type='date' data-format='yyyy-mm-dd' data-viewformat='dd-mm-yyyy' data-placement='right' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."'>".$DOB."</a></td></tr>".


                            "
                            <tr><th>Date of Entry</th><td><a href='#' id='dates' data-name='date_of_entry' data-url='update.php' data-title='Choose date of entry.' data-type='date' data-format='yyyy-mm-dd' data-viewformat='dd-mm-yyyy' data-placement='right' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."'>".$DOEn."</a></td>".


                            "
                            <th>Date of Exit</th><td><a href='#' id='dates' data-name='date_of_exit' data-url='update.php' data-title='Choose date of exit.' data-type='date' data-format='yyyy-mm-dd' data-viewformat='dd-mm-yyyy' data-placement='right' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."'>".$DOEx."</a></td></tr>".


                            "
                            <tr><th>Passport</th><td ><a href='#' data-name='passport' data-title='passport' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['passport']."</a></td>".


                            "
                            <th>NIC</th><td ><a href='#' data-name='NIC' data-title='NIC' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['NIC']."</a></td></tr>".


                            "
                            <tr><th>Address</th><td ><a href='#' data-name='address' data-title='address' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['address']."</a></td>".


                            "
                            <th>Kin Name</th><td><a href='#' data-name='kin_name' data-title='kin_name' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['kin_name']."</a></td></tr>".


                            "
                            <tr><th>Kin Phone No</th><td ><a href='#' data-name='kin_phone' data-title='kin_phone' data-pk='".get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id."' data-type='text' data-url='update.php' id='tdata' >".$_SESSION['tbl_employee'][$key]['kin_phone']."</a></td>"); 

                        if ($_SESSION['tbl_employee'][$key]['cascade_approval']== 1){
                            echo "<th>Alt Head</th><td ><span class='label label-success'><a style='color: white;' href='#' data-name='cascade_approval' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='talthead' >yes</a></span></td></tr>";

                        }else if ($_SESSION['tbl_employee'][$key]['cascade_approval']== 0){
                            echo "<th>Alt Head</th><td ><span class='label label-danger'><a style='color: white;' href='#' data-name='cascade_approval' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='talthead' >no</a></span></td></tr>";
                        };

                        if ($_SESSION['tbl_employee'][$key]['admin']== 1){
                            echo "<tr><th>Admin</th><td><span class='label label-success'><a style='color: white;' href='#' data-name='admin' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='tadmin' >yes</a></span></td>";

                        }else if ($_SESSION['tbl_employee'][$key]['admin']== 0){
                            echo "<tr><th>Admin</th><td><span class='label label-danger'><a style='color: white;' href='#' data-name='admin' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='tadmin' >no</a></span></td>";
                        };

                        if ($_SESSION['tbl_employee'][$key]['active']== 1){
                            echo "<th>Active</th><td ><span class='label label-success'><a style='color: white;' href='#' data-name='active' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='tactive' >active</a></span></td></tr>";

                        }else if ($_SESSION['tbl_employee'][$key]['active']== 0){
                            echo "<th>Active</th><td ><span class='label label-danger'><a style='color: white;' href='#' data-name='active' data-title='Active' data-pk='".(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id)."' data-type='select' data-url='update.php' id='tactive' >inactive</a></span></td></tr>";
                        };

                        $pk= get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id;

                        echo "<tr><th>Attachment(s)</th> <td><ul>";

                        if (!empty(get_emp_attachments(get_id($_SESSION['tbl_employee'][$key]['firstname'],$_SESSION['tbl_employee'][$key]['surname'],$_SESSION['tbl_employee'][$key]['email'])->id))) {
                            

                            foreach (get_emp_attachments($pk) as $key => $value) {

                                $link=explode("/", get_emp_attachments($pk)[$key][attachment]);

                                $att_id=get_att_id($pk,

                                    get_emp_attachments($pk)[$key][attachment],

                                    get_emp_attachments($pk)[$key][date_created])->id;

                                echo("<li><a href='".get_emp_attachments($pk)[$key][attachment]."'>".$link[5]."</a>&nbsp

                                    <button name='delete' class='btn btn-xs btn-warning' type='submit' value='".$att_id."'>X</button>


                                    </li>");

                                // pprint($pk);
                            }

                            echo "</ul></td>";
                        }

                        echo '<th>Actions</th><td>

                       

                        <!--<label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-upload"></i> Upload File
                        </label> -->

                        <input style="display: inline-block;" class="btn btn-xs btn-default" size="30px" id="file-upload" type="file" name="file[]" multiple/>

                         <!-- <label for="submit" class="custom-file-upload">
                            <i class="fa fa-thumbs-o-up"></i> Submit
                        </label> -->

                        <button style=" border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;" id="submit" class="btn btn-xs btn-default" name="submit" type="submit" value="'.$pk.'">Submit</button>

                        <!-- <button style=" border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;" id="submit" class="btn btn-xs btn-default" name="submit" type="submit" value="'.$pk.'">Delete</button> -->

                        
                        


                        </td></tr>';
                     
                        echo ("</tbody> </table> </div> </div> </div> </div></form>");

                        if (isset($_POST[seemore]) && !empty($_POST[seemore])) {
                            break;
                        }


                    }}
                    ?>
                                    
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
                        
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->