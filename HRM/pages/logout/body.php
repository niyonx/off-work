<?php 
    session_start();
    session_destroy();

    if ($_SESSION[from_change_pass]==1) {
        $_SESSION[from_change_pass]=0;
?>

        <row>
                <container>
                    <div class="col-md-12">
                        <div class="pad margin no-print">
                            <div class="alert alert-success" style="margin-top: 100px!important;">
                                <i class="fa fa-smile-o"></i>
                                <h2><b>Success!</b>   Password changed successfully!:D</h2>
                            </div>
                        </div>
                    </div>
                </container>
            </row>
    </body>
    </html>
            
            <?

            echo "<meta http-equiv='refresh' content='2;url=../login/index.php''>";

    }elseif($_SESSION[PR]==1){
        $_SESSION[PR]=0;

        ?>

             <row>
                <container>
                    <div class="col-md-12">
                        <div class="pad margin no-print">
                            <div class="alert alert-success" style="margin-top: 100px!important;">
                                <i class="fa fa-smile-o"></i>
                                <h2><b>Success!</b>   Check your email for new password!:D</h2>
                            </div>
                        </div>
                    </div>
                </container>
            </row>
    </body>
    </html>

            
            <?php 
            echo "<meta http-equiv='refresh' content='2;url=../login/index.php''>";
    }else{
?>

        <row>
                <container>
                    <div class="col-md-12">
                        <div class="pad margin no-print">
                            <div class="alert alert-success" style="margin-top: 100px!important;">
                                <i class="fa fa-smile-o"></i>
                                <h2><b>Success!</b>   You have been logged out.</h2>
                            </div>
                        </div>
                    </div>
                </container>
            </row>
    </body>
    </html>
            
            <?
            echo "<meta http-equiv='refresh' content='2;url=../login/index.php''>";
        }
            
             ?>