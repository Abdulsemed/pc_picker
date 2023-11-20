<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM comment";
            $showAllcomment = mysqli_query($myconnect, $query);
            while ($row = mysqli_fetch_assoc($showAllcomment)) {
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_email = $row['comment_email'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];
            ?>
                <tr>
                    <td><?php echo $comment_id; ?></td>
                    <td><?php echo $comment_author; ?></td>
                    <td><?php echo substr($comment_content, 0, 20); ?></td>
                    <td><?php echo $comment_email; ?></td>
                    <td><?php echo $comment_status; ?></td>
                    <?php
                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                    $select_post_query = mysqli_query($myconnect, $query);
                    while ($row = mysqli_fetch_assoc($select_post_query)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_name'];
                        echo "<td><a href='../product.php?p_id=$post_id'>$post_title</a></td>";
                    }
                    ?>
                    <td><?php echo $comment_date; ?></td>
                    <td><a href='comments.php?source=post&approve=<?php echo $comment_id; ?>'>Approve</a></td>
                    <td><a href='comments.php?source=post&unapprove=<?php echo $comment_id; ?>'>Unapprove</a></td>
                    <td><a href='comments.php?source=post&delete=<?php echo $comment_id; ?>'>Delete</a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>

    <?php

    if (isset($_GET['approve'])) {
        $approve = $_GET['approve'];

        $query = "UPDATE comment SET comment_status = 'Approved' WHERE comment_id = $approve";
        $approve_commentt = mysqli_query($myconnect, $query);

        header("Location: comments.php?source=post-comment");
    }

    if (isset($_GET['unapprove'])) {
        $unapprove = $_GET['unapprove'];

        $query = "UPDATE comment SET comment_status = 'Unapproved' WHERE comment_id = $unapprove";
        $unapprove_commentt = mysqli_query($myconnect, $query);

        header("Location: comments.php?source=post-comment");
    }

    if (isset($_GET['delete'])) {
        $the_comm_id = $_GET['delete'];

        $query = "DELETE FROM comment WHERE comment_id = $the_comm_id";
        $delete_commentt = mysqli_query($myconnect, $query);

        header("Location: comments.php?source=post-comment");
    }

    ?>
</div>