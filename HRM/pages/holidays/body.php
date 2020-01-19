    
    <aside class="right-side">                
        <!-- Content Header (Page header) -->
        <section class="content-header" style="margin-bottom: 30px;">
        
            <ol class="breadcrumb">

                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Holidays</li>
            </ol>
        </section>

        
        
        <!-- <div class="pad margin no-print">
            <div class="alert alert-warning" style="margin-bottom: 0!important;">
                <i class="fa fa-info"></i>
                <b>Note:</b> Deleting a leave type will cancel all pending leave applications with it.
            </div>
        </div> -->

        

        <!-- Main content -->
        <section class="content invoice">                    
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-calendar-o"></i> Holidays
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
                            <h3 class="box-title">Holidays table</h3>
                            <div class="box-tools">
                                
                                <div class="input-group"> -->

                                    <!-- <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div> -->
                                <!-- </div>
                            </div>
                        </div>/.box-header --> 
                        <div class="box-body table-responsive no-padding" style="overflow-y: hidden !important; overflow-x: auto !important; ">
                            <table class="table table-hover" data-toggle="table" data-pagination="true" data-show-export="true">
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <!-- <th>ID</th> -->
                                    <th>Name of holiday</th>
                                    <th>Date of holiday</th>
                                </tr>

                                <!-- <td>".$_SESSION["tbl_holidays"][$key]['id']."</td> -->
                                <?php
                                    $_SESSION["tbl_holidays"] = get_tbl_holidays();
                                    if($_SESSION["is_admin"]){ 
                                    foreach ($_SESSION["tbl_holidays"] as $key => $value) {
                                              echo ("<tr>
                                        


                                        <td><a href='#' id='holiname' data-name='holiday_name' data-url='update.php' data-pk='".get_holiden($_SESSION["tbl_holidays"][$key]['holiday_name'])->id."' data-type='text'>".$_SESSION["tbl_holidays"][$key]['holiday_name']."</a></td>


                                        <td><a href='#' id='holidate' data-name='holiday' data-url='update.php' data-title='Choose holiday?' data-type='date' data-format='yyyy-mm-dd' data-viewformat='dd-mm-yyyy' data-placement='right' data-pk='".get_holiden($_SESSION["tbl_holidays"][$key]['holiday_name'])->id."'>".date("d-m-Y", strtotime($_SESSION["tbl_holidays"][$key]['holiday']))."</a></td>
                                        </tr>");                  
                                    } }else{
                                        foreach ($_SESSION["tbl_holidays"] as $key => $value) {

                                        echo ("<tr>
                                        


                                        <td>".$_SESSION["tbl_holidays"][$key]['holiday_name']."</td>


                                        <td>".date("l jS M Y", strtotime($_SESSION["tbl_holidays"][$key]['holiday']))."</td>
                                        </tr>");  

                                        }      



                                    }
                                ?>

                                <!-- <td>
                        
                        <a href="#" id="vacation" data-type="date" data-viewformat="dd.mm.yyyy" data-pk="1" data-placement="right" data-title="When you want vacation to start?">25.02.2013</a>                        
                        
                        </td> -->

                            </table>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <?php if($_SESSION["is_admin"]){ ?>

                    <div class="container">
                      <!-- Trigger the modal with a button -->
                        <button class="btn btn-flat btn-success" id="myBtn">Add holiday</button>

                      <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" style="margin-top:14%;">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body" style="padding:40px 50px;">
                                        <form method="post" role="form">
                                         <label>Name of holiday:</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter holiday's name" name="holiname" autofocus>
                                            </div>
                                            <!-- <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter holiday's date (YYYY-MM-DD)" name="holidate" autofocus>

                                            </div> -->
                                            <div class="form-group">
                                        <label>Date of holiday:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" id="date-mask" name="holidate" data-mask/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                            <!-- <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter department head" name="new_department_head">
                                            </div> -->
                                                <button type="Submit" class="btn btn-success btn-block ">Submit</button>
                                              <?php
                                                if (isset($_POST[holiname]) && !empty($_POST[holiname]) && isset($_POST[holidate]) && !empty($_POST[holidate])){
                                                    set_holiday($_POST[holiname],date("Y-m-d",strtotime($_POST[holidate])));
                                                    // header("Refresh:3");
                                                    echo "<meta http-equiv='refresh' content='0'>";
                                            }?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <button class="btn btn-flat btn-danger" id="myBtn2">Delete holiday</button>

                      <!-- Modal -->
                        <div class="modal fade" id="myModal2" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" style="margin-top:14%;">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body" style="padding:40px 50px;">
                                        <form method="post" role="form">
                                        <div class="form-group">
                                         <!--  <input type="text" class="form-control" placeholder="Enter holiday's date to be deleted (YYYY-MM-DD)" name="delete_name" autofocus /> -->
                                        
                                        <select class="form-control" name="delete_name" >
                                    <?php 

                                        $_SESSION["holidays"] = get_tbl_holidays();
                                    

                            foreach ($_SESSION["holidays"] as $key => $value) {

                                echo ("<option value='".$_SESSION["holidays"][$key]['holiday']."'>".$_SESSION["holidays"][$key]['holiday_name']."</option>");}

                                    
                                ?>
                                </select>
                                </div>
                                          <button type="Submit" class="btn btn-success btn-block ">Delete</button>
                                          <?php
                                            if (isset($_POST['delete_name'])){
                                                delete_holiday($_POST['delete_name']);
                                                echo "<meta http-equiv='refresh' content='0'>";
                                        }?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>
                    <?php } ?>
                </div>
            </div><!-- /.row -->
        </section>
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->





