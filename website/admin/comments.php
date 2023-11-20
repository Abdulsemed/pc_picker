<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_nav.php"; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <?php
    if (isset($_GET['source'])) {
        $source = $_GET['source'];
    } else {
        $source = '';
    }
    switch ($source) {
        case 'post-comment':
    ?>
            <div class="col-lg-12">
                <h1 class=" main-header">
                    Post Comments
                </h1>
                <br>
            </div>
        <?php
            include "includes/post-comment.php";
            break;
        case 'user-comment':
        ?>
            <div class="col-lg-12">
                <h1 class=" main-header">
                    User Comments
                </h1>
                <br>
            </div>
        <?php
            include "includes/user-comment.php";
            break;
        case 'post':
        ?>
            <div class="col-lg-12">
                <h1 class=" main-header">
                    Post Comments
                </h1>
                <br>
            </div>
        <?php
            include "includes/post-comment.php";
            break;
        case 'user';
        ?>
            <div class="col-lg-12">
                <h1 class=" main-header">
                    User Comments
                </h1>
                <br>
            </div>
    <?php
            include "includes/user-comment.php";
            break;
    }
    ?>
</main>

<?php include "includes/admin_footer.php"; ?>