<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_nav.php"; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="col-lg-12">
        <h1 class=" main-header">
            Users
        </h1>
        <br>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <th>User_id</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Email</th>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM user";
                $showAlluser = mysqli_query($myconnect, $query);
                while ($row = mysqli_fetch_assoc($showAlluser)) {
                    $user_id = $row['id'];
                    $user_name = $row['userName'];
                    $user_Fname = $row['Full_name'];
                    $user_email = $row['email'];
                ?>
                    <tr>
                        <td><?php echo $user_id; ?></td>
                        <td><?php echo $user_name; ?></td>
                        <td><?php echo $user_Fname; ?></td>
                        <td><?php echo $user_email; ?></td>
                        <td><a href='users.php?delete=<?php echo $user_id; ?>'onclick="return confirm('Are you sure?');">Delete</a></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <?php

        if (isset($_GET['delete'])) {
            $the_user_id = $_GET['delete'];
            $query = "DELETE FROM user WHERE id = $the_user_id";
            $delete_user = mysqli_query($myconnect, $query);
            header("Location: users.php");
        }

        ?>
    </div>
</main>

<?php include "includes/admin_footer.php"; ?>