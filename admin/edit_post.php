<?php 
	if(isset($_GET['p_id'])){
		$p_id = $_GET['p_id'];
	}

    $query ="SELECT * FROM posts WHERE post_id = $p_id ";
    $select_posts_by_id = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
    } 

    if(isset($_POST['update_post'])){
    	$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];
		$post_image = $_FILES['image']['name'];
		$post_image_tmp = $_FILES['image']['tmp_name'];
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];

		move_uploaded_file($post_image_tmp, "../img/$post_image");

		if(empty($post_image)){
			$query = "SELECT * FROM posts WHERE post_id = $p_id";
			$select_image  = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_array($select_image) ) {
				$post_image = $row['post_image'];
			}
		}


		$query = "UPDATE posts SET ";
		$query.= "post_title = '{$post_title}', ";
		$query.= "post_category_id = '{$post_category_id}', ";
		$query.= "post_date = now(), ";
		$query.= "post_author = '{$post_author}', ";
		$query.= "post_status = '{$post_status}', ";
		$query.= "post_tags = '{$post_tags}', "; 
		$query.= "post_content = '{$post_content}', ";
		$query.= "post_image = '{$post_image}' ";
		$query.= "WHERE post_id = '{$p_id}' ";

		$update_post = mysqli_query( $connection, $query);

	    if(!$update_post){
	        die("QUERY Failed ". mysqli_error($connection));
	    }

	    echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a><strong>Success!</strong> Post updated  <a href='../post.php?p_id={$p_id}'>View post</a></div>";
    }
?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="title">Post Title</label>
			<input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
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
			<input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
		</div>

		<div class="form-group">
			<label for="post_status">Post Status</label><br>
			<select name="post_status" id="">
				<option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
				<?php
					if($post_status	===	 'draft')
						echo "<option value='published'>published</option>";
					else 
						echo "<option value='draft'>draft</option>";
				 ?>
			</select>
		</div>

		<div class="form-group">
			<img width="150" src="../img/<?php  echo $post_image; ?>" >
			<input type="file" name="image">
		</div>	

		<div class="form-group">
			<label for="post_tags">Post Tags</label>
			<input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
		</div>

		<div class="form-group">
			<label for="post_content">Post Content</label>
			<textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
		</div>			
			
		<div class="form_group">
			<input type="submit" class="btn btn-primary" name="update_post" value="Update Post"> 
		</div>
	</form>