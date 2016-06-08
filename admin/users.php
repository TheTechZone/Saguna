<?php include "../includes/db.php"; ?>
<?php include("includes/header.php"); ?>
	<div id="wrapper">
 	<?php include("includes/navigation.php"); ?>
 	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome, user
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
				<?php
				 if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else {
                            $source = '';
                        }

                        switch ($source) {
                            case 'add_user':
                                include "add_user.php";
                                break;
                            
                            case 'edit_user':
                                include "edit_user.php";
                                break;

                            default:
                                include "view_all_users.php";
                                # cookie...
                                break;
                        } 

                     ?>                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include("includes/footer.php") ?>