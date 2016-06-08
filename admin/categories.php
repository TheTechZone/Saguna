<?php ob_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "/includes/header.php"; ?>
<?php include  "/includes/navigation.php"; ?>
    <div id="wrapper">

        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome,
                            <small>User</small>
                        </h1>
                        
                        <div class="col-xs-6">

                            <?php 

                            if(isset($_POST['submit'])){
                                //echo "<h1>string</h1>";
                                $cat_title = $_POST['cat_title'];
                                
                                if($cat_title == "" || empty($cat_title) ){
                                    echo "<h2>Error! This Should not be empty</h2>";
                                }else {
                                    $query = "INSERT INTO categories(cat_title) ";
                                    $query .="VALUE('{$cat_title}')";

                                    $create_category_query =  mysqli_query($connection, $query);

                                    if(!$create_category_query){
                                        die('QUERY FAILED'. mysqli_error($connection));
                                    }
                                }

                            }

                            ?>



                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
    
                            <br>
                    
                            <?php 
                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];

                                    include "update_category.php";
                                }
                            ?>


                        </div>
                        
                        <div class="col-xs-6">


                        <table class="table table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Category Title</td>
                                </tr>
                            </thead>
                            <tbody>
                        
                        <?php 
                        $query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection,$query);

                        while ($row = mysqli_fetch_assoc($select_categories) ) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<tr>";
                            echo "<td>{$cat_id}</td>";    
                            echo "<td>{$cat_title}</td>";
                            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";        
                            echo "</tr>";
                        }
                        ?>

                        <?php 
                        if(isset($_GET['delete'])){
                            $delete_cat_id = $_GET['delete'];
                            $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id} ";
                            $delete = mysqli_query($connection,$query);
                            header("Location: categories.php"); 
                        }
                        ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include("includes/footer.php") ?>