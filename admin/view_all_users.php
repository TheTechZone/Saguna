<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Role</th>
                <th colspan="4"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query ="SELECT * FROM users";
                $select_users = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_users)) {
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $user_role = $row['user_role'];

                    echo "<tr>";
                        echo "<td>$user_id</td>";
                        echo "<td>$user_name</td>";
                        echo "<td>$user_firstname</td>";
                        echo "<td>$user_lastname</td>";
                        echo "<td>$user_email</td>";
                        echo "<td>$user_role</td>";

                        echo "<td><a href='users.php?promote={$user_id}'>Promote</a></td>";
                        echo "<td><a href='users.php?demote={$user_id}'>Demote</a></td>";
                        echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
    <?php
        if(isset($_GET['promote'])){
            $the_user_id = $_GET['promote'];
            $query = "UPDATE users SET user_role='admin' WHERE user_id = {$the_user_id}";
            $promote_query = mysqli_query($connection,$query);
            header("Location: users.php");
        }

        if(isset($_GET['demote'])){
            $the_user_id = $_GET['demote'];
            $query = "UPDATE users SET user_role='profesor' WHERE user_id = {$the_user_id}";
            $demote_query = mysqli_query($connection,$query);
            header("Location: users.php");
        }        

        if(isset($_GET['delete'])){
            $the_user_id = $_GET['delete'];
            $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
            $delete_query = mysqli_query($connection,$query);
            header("Location: users.php");
        }
    ?>