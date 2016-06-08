<?php include "/includes/db.php"; ?>
<?php include "/includes/header.php"; ?>
<?php include "/includes/navigation.php" ?>
    <!-- Page Content -->
    <div class="container posts">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php 

                    if(isset($_POST['submit'])){
                        $search = $_POST['search'];
                        echo $search;

                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                        $search_query = mysqli_query($connection,$query);

                        if(!$search_query){
                            die("QUERY FAILED ".mysqli_error($connection));
                        }

                        $count = mysqli_num_rows($search_query);

                        if($count == 0 ){
                            echo "<h2>NO RESULTS</h2>";
                        }else {
                            //echo "Gasit-am cheva bo$$";
                            //$query = "SELECT * FROM posts";
                            //$select_all_posts_query = mysqli_query($connection,$query);

                            while ($row = mysqli_fetch_assoc($search_query) ) {
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = substr($row['post_content'],0,100);
                                $post_tags = $row['post_tags'];
                                $post_id = $row['post_id'];
                                //echo "{$post_title}";
                            ?>

                            <!-- First Blog Post -->
                            <h2>
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo "{$post_title}"; ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author; ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                            <a href="post.php?p_id=<?php echo $post_id; ?>">
                                <img class="img-responsive" src="img/<?php echo $post_image; ?>" alt="">
                            </a>
                            <hr>
                            <p><?php echo $post_content; ?></p>
                            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        
                            <?php } 

                        }

                    } ?>
            


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">


                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>





                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
<?php include("/includes/footer.php") ?>