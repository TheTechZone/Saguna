<?php
    if(isset($_POST['checkBoxArray'])){
        foreach ($_POST['checkBoxArray'] as $checkBoxValue) {
            # code...
           $options = $_POST['options'];
           switch ($options) {
               case 'published':
                   $query ="UPDATE posts SET post_status = '{$options}' WHERE post_id = '{$checkBoxValue}' ";
                   $update_publish = mysqli_query($connection,$query);
                   break;

               case 'draft':
                   $query ="UPDATE posts SET post_status = '{$options}' WHERE post_id = '{$checkBoxValue}' ";
                   $update_publish = mysqli_query($connection,$query);
                   break;

               case 'delete':
                   $query ="DELETE FROM posts WHERE post_id = '{$checkBoxValue}' ";
                   $delete = mysqli_query($connection,$query);
                   break;

               default:
                   # code...
                   break;
           }
        }
    }
?>
    <form action="" method="post">

    <div class="table-responsive">
    <table class="table table-hover table-bordered">

        <div id="options" class="col-xs-5">

            <select class="form-control" name="options">
                <option value="" disabled selected>Select option</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
            </select>


        <br>

        </div>

        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add new</a>
        </div>

        <thead>
            <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Date</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query ="SELECT * FROM posts";
                $select_posts = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_posts)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];

                        echo "<tr>";
                    ?>
                        <td><input class="checkBox" type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                    <?php
                        echo "<td>$post_id</td>";
                        echo "<td>$post_author</td>";
                        echo "<td>$post_title</td>";


                        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                        $select_categories_id = mysqli_query($connection, $query);
                        while ($row= mysqli_fetch_assoc($select_categories_id)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];

                        echo "<td>{$cat_title}</td>";
                    }



                        echo "<td>$post_status</td>";
                        echo "<td><img class='img-responsive img-post' src='../img/$post_image' alt='images'width='200' height='200'></td>";
                        echo "<td>$post_tags</td>";
                        echo "<td>$post_date</td>";
                        echo "<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
                        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                        echo "<td><a id='popup'  href='posts.php?delete={$post_id}'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

</form>

    <?php
        if(isset($_GET['delete'])){
            $the_post_id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
            $delete_query = mysqli_query($connection,$query);
            header("Location: posts.php");
        }
    ?>
