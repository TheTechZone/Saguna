<?php include "../includes/db.php"; ?>
<?php include("/includes/header.php"); ?>

    <div id="wrapper">

<?php include("/includes/navigation.php"); ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome,
                            <small>User</small>
                        </h1>
                        
                        <?php 

                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else {
                            $source = '';
                        }

                        switch ($source) {
                            case 'add_post':
                                include "add_post.php";
                                break;
                            
                            case 'edit_post':
                                include "edit_post.php";
                                break;

                            default:
                                include "view_all_posts.php";
                                # cookie...
                                break;
                        } 
                        ?> 
            

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("includes/footer.php") ?>