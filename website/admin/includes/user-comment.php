<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Comment</th>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM contact";
            $showAllcomment = mysqli_query($myconnect, $query);
            while ($row = mysqli_fetch_assoc($showAllcomment)) {
                $contact_id = $row['cuser_id'];
                $contact_username = $row['user_name'];
                $contact_content = $row['content'];
                $contact_email = $row['user_email'];
            ?>
                <tr>
                    <td><?php echo $contact_id; ?></td>
                    <td><?php echo $contact_username; ?></td>
                    <td><?php echo $contact_email; ?></td>
                    <td><?php echo substr($contact_content, 0, 50); ?></td>
                    <td><a href='comments.php?source=user&delete=<?php echo $contact_id; ?>'>Delete</a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
    <?php

    if (isset($_GET['delete'])) {
        $the_comm_id = $_GET['delete'];

        $query = "DELETE FROM contact WHERE cuser_id = $the_comm_id";
        $delete_commentt = mysqli_query($myconnect, $query);

        header("Location: comments.php?source=user-comment");
    }

    ?>