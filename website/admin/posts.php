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
        case 'add-post':
    ?>
            <div class="col-lg-12">
                <h1 class=" main-header">
                    Add Post
                </h1>
                <br>
            </div>
        <?php
            include "includes/postadd.php";
            break;
        case 'edit_post':
        ?>
            <div class="col-lg-12">
                <h1 class=" main-header">
                    Edit Post
                </h1>
                <br>
            </div>
        <?php
            include "includes/editpost.php";
            break;
        default: ?>
            <div class="col-lg-12">
                <h1 class=" main-header">
                    Posts
                </h1>
                <br>
            </div>
            <div class="table-responsive">
                <?php
                include "includes/view-post.php";
                ?>
            </div>
    <?php } ?>
</main>

<?php include "includes/admin_footer.php"; ?>