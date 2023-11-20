<?php
require('includes/admin_header.php');
require('includes/admin_nav.php');
// if ($_SESSION['access'] !== 'Admin') {
//     header("location: ../landing_page.php?error=noAccess");
//     exit();
// }
?>
<div class="col-md-10">
    <div class="row">
        <div class="col-md-3 py-3">
            <div class="card bg-light text-dark h-100">
                <div class="card-body">
                    <div class="rotate">
                        <i class="fa fa-user fa-4x py-sm-1"></i>
                    </div>
                    <h6 class="text-uppercase">Users</h6>
                    <?php
                    $query = "SELECT * FROM user";
                    $all_user = mysqli_query($myconnect, $query);
                    $user_counter = mysqli_num_rows($all_user);
                    echo "<h1 class='display-4'>$user_counter</h1>";
                    ?>
                </div>
                <a href="users.php" class="card-footer">
                    <div>
                        <span class=" pull-left">
                            Details</span> <span class="pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 py-3">
            <div class="card text-dark bg-light h-100">
                <div class="card-body">
                    <div class="rotate">
                        <i class="fa fa-list fa-4x py-sm-1"></i>
                    </div>
                    <h6 class="text-uppercase">Posts</h6>
                    <?php
                    $query = "SELECT * FROM posts";
                    $allpost = mysqli_query($myconnect, $query);
                    $post_counter = mysqli_num_rows($allpost);
                    echo "<div class='display-4'>$post_counter</div>";
                    ?>
                </div>
                <a href="posts.php" class="card-footer">
                    <div>
                        <span class=" pull-left">
                            Details</span> <span class="pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 py-3">
            <div class="card text-dark bg-light h-100">
                <div class="card-body">
                    <div class="rotate">
                        <i class="fa fa-comment fa-4x py-sm-1"></i>
                    </div>
                    <h6 class="text-uppercase">Comments</h6>
                    <?php
                    $query = "SELECT * FROM comment";
                    $allcomment = mysqli_query($myconnect, $query);
                    $com_counter = mysqli_num_rows($allcomment);
                    echo "<h1 class='display-4'>$com_counter</h1>";
                    ?>
                </div>
                <a href="comments.php?source=post-comment" class="card-footer">
                    <div>
                        <span class=" pull-left">
                            Details</span> <span class="pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 py-3">
            <div class="card text-dark bg-light h-100">
                <div class="card-body">
                    <div class="rotate">
                        <i class="fa fa-comment-o fa-4x py-sm-1"></i>
                    </div>
                    <h6 class="text-uppercase">Feedbacks</h6>
                    <?php
                    $query = "SELECT * FROM contact";
                    $allfeddbacks = mysqli_query($myconnect, $query);
                    $feedback_counter = mysqli_num_rows($allfeddbacks);
                    echo "<h1 class='display-4'>$feedback_counter</h1>";
                    ?>
                </div>
                <a href="comments.php?source=user-comment" class="card-footer">
                    <div>
                        <span class=" pull-left">
                            Details</span> <span class="pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
                    </div>
                </a>
            </div>
        </div>

        <form action="pdf.php" method="post">
            <input type="text" name="users" hidden value="<?php echo $user_counter ?>">
            <input type="text" name="posts" hidden value="<?php echo $post_counter ?>">
            <input type="text" name="comments" hidden value="<?php echo $com_counter ?>">
            <input type="text" name="feedbacks" hidden value="<?php echo $feedback_counter ?>">
            <input type="submit" value="Stat PDF" name="pdf" class="btn-secondary ">
        </form>

        <form action="pdf.php" method="post">
            <input class="btn-primary pull-right" type="submit" value="Database PDF" name="pdfDB">
        </form>

    </div>
</div>
<!-- </div> -->
<?php
require('includes/admin_footer.php');
?>