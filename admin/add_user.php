<?php 
	if(isset($_POST['create_user'])){
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
		// 	$query = "SELECT ALL FROM posts WHERE post_id= $p_id";
		// 	$select_image = mysqli_query($connection, $query);

		// 	while ($row = mysqli_fetch_array($select_image)) {
		// 		$post_image = $row['post_image'];
		// 	}
		// }

		$query = "INSERT INTO users(user_name,user_password,user_firstname,user_lastname,user_email,user_role) ";
		$query .="VALUES('{$user_name}', '{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}')";

		$create_user_query = mysqli_query($connection,$query);

		if(!$create_user_query){
			die("ERROR ".mysqli_error($connection));
		}
	}
?>
	<form action="" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label for="user_firstname">Firstname</label>
			<input type="text" class="form-control" name="user_firstname">
		</div>

		<div class="form-group">
			<label for="user_lastname">Lastname</label>
			<input type="text" class="form-control" name="user_lastname">
		</div>	

		<div class="form-group">
			<label for="user_role"> User Role</label> <br>
			<select name="user_role" id="">
				<option value="admin">Admin</option>
				<option value="profesor">Profesor</option>
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
			<input type="text" class="form-control" name="user_name">
		</div>

		<div class="form-group">
			<label for="user_email">Email</label>
			<input type="email" class="form-control" name="user_email" />
		</div>			
		
		<div class="form-group">
			<label for="user_password">Password</label>
			<input type="password" class="form-control" name="user_password" />
		</div>

		<div class="form_group">
			<input type="submit" class="btn btn-primary" name="create_user" value="Add user"> 
		</div>
	</form>