<?php
	if(isset($_POST['create_post'])){
		$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['image']['name'];
		$post_image_tmp = $_FILES['image']['tmp_name'];

		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');

		move_uploaded_file($post_image_tmp, "../img/$post_image");

		if(empty($post_image)){
			$query = "SELECT ALL FROM posts WHERE post_id= $p_id";
			$select_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_image)) {
				$post_image = $row['post_image'];
			}
		}

		$query = "INSERT INTO posts(post_category_id, post_title,post_date,post_author,post_image,post_content,post_tags,post_status) ";
		$query .="VALUES({$post_category_id},'{$post_title}', now() ,'{$post_author}','{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

		$create_post_query = mysqli_query($connection,$query);

		if(!$create_post_query){
			die("ERROR ".mysqli_error($connection));
		}

		$p_id = mysqli_insert_id($connection);
		echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a><strong>Success!</strong> Post Created. <a href='../post.php?p_id={$p_id}'>View post</a></div>";
	}
?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="title">Post Title</label>
			<input type="text" class="form-control" name="title">
		</div>

		<div class="form-group">
			<label> Post Category</label> <br>
			<select name="post_category" id="">
				<?php

				$query = "SELECT * FROM categories " ;
	            $select_categories = mysqli_query($connection,$query);

	            if(!$select_categories){
	                die("QUERY Failed". mysqli_error($connection));
	            }

	            while ($row = mysqli_fetch_assoc($select_categories) ) {
	                $cat_id = $row['cat_id'];
	                $cat_title = $row['cat_title'];

					echo "<option value='$cat_id'>{$cat_title}</option>";
				}
	            ?>
			</select>
		</div>

		<div class="form-group">
			<label for="author">Post Author</label>
			<input type="text" class="form-control" name="author">
		</div>

		<div class="form-group">
			<label for="post_status">Post Status</label>
			<select name="post_status" class="form-control">
				<option value="draft">Draft</option>
				<option value="published">Published</option>
			</select>
		</div>

		<div class="form-group">
			<label for="post_image">Post Image</label>
			<input type="file" name="image">
		</div>

		<div class="form-group">
			<label for="post_tags">Post Tags</label>
			<input type="text" class="form-control" name="post_tags">
		</div>

		<div class="form-group">
			<label for="post_content">Post Content</label>
			<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
		</div>

		<div class="form_group">
			<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
		</div>
	</form>
