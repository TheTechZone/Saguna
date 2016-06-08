<?php include "../includes/db.php"; ?>
<?php include("includes/header.php"); ?>
<?php
    if(isset($_SESSION['username'])){
        $user_name = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE user_name ='{$user_name}' ";
        $select_user_profile = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($select_user_profile)){
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }

    if(isset($_POST['update_profile'])){
        $user_name = $_POST['user_name'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_password =$_POST['user_password'];
        $user_role =$_POST['user_role'];

        // $post_image = $_FILES['image']['name'];
        // $post_image_tmp = $_FILES['image']['tmp_name'];

        // move_uploaded_file($post_image_tmp, '../img/$post_image');

        // if(empty($post_image)){
        //  $query = "SELECT ALL FROM posts WHERE post_id= $p_id";
        //  $select_image = mysqli_query($connection, $query);

        //  while ($row = mysqli_fetch_array($select_image)) {
        //      $post_image = $row['post_image'];
        //  }
        // }

        $query = "UPDATE users SET ";
        $query.= "user_name = '{$user_name}', ";
        $query.= "user_password = '{$user_password}', ";
        $query.= "user_firstname = '{$user_firstname}', ";
        $query.= "user_lastname = '{$user_lastname}', ";
        $query.= "user_email = '{$user_email}', ";
        $query.= "user_role = '{$user_role}' ";
        //$query.= "post_image = '{$post_image}' ";
        $query.= "WHERE user_name = '{$user_name}' ";

        $update_user = mysqli_query( $connection, $query);

        if(!$update_user){
            die("QUERY Failed ". mysqli_error($connection));
        }
    }
 ?>
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
	           
               <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="user_firstname">Firstname</label>
                        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                    </div>

                    <div class="form-group">
                        <label for="user_lastname">Lastname</label>
                        <input type="text"  value="<?php echo $user_lastname;?>" class="form-control" name="user_lastname">
                    </div>  

                    <div class="form-group">
                        <label for="user_role"> User Role</label> <br>
                        <select name="user_role" id="">
                            <option value="<?php echo $user_role;?>"><?php echo $user_role; ?></option>
                            <?php 
                                if($user_role == 'admin'){
                                    echo "<option value='profesor'>profesor</option>";
                                }
                                else {
                                    echo "<option value='admin'>admin</option>";
                                }
                            ?>
                        </select>
                    </div>


            <!-- 
                    <div class="form-group">
                        <label for="post_image">Post Image</label>
                        <input type="file" name="image">
                    </div>  
             -->
                    <div class="form-group">
                        <label for="user_name">Username</label>
                        <input type="text" value="<?php echo $user_name;?>" class="form-control" name="user_name">
                    </div>

                    <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="email" value="<?php echo $user_email;?>" class="form-control" name="user_email" />
                    </div>          
                    
                    <div class="form-group">
                        <label for="user_password">Password</label>
                        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password" />
                    </div>

                    <div class="form_group">
                        <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
                    </div>
            </form>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include("includes/footer.php") ?>