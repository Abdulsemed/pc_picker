<!-- use like in the databse query-->
<?php
require("includes/header.php");

?>
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_REQUEST['search'])) {
                    require('database/dataconnect.php');
                    $searchKey = $_REQUEST['search'];
                    $searchSql = "SELECT * FROM posts WHERE post_tags LIKE '%$searchKey%'";
                    $stmt = mysqli_stmt_init($myconnect);

                    if (!mysqli_stmt_prepare($stmt, $searchSql)) {
                        header("location: landing_page.php?error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_execute($stmt);
                        $searchResults =  mysqli_stmt_get_result($stmt);

                ?>

                        <!-- <nav class="images" id="it"> -->
                        <?php
                        $searchCount = 0;
                        while ($searchRows = mysqli_fetch_assoc($searchResults)) {
                            $post_id = $searchRows['post_id'];
                            $postName = $searchRows['post_name'];
                            $postPrice = $searchRows['post_price'];
                            $postImage = $searchRows['post_image'];
                            $postBrand = $searchRows['post_brand'];
                            $postCategory = $searchRows['post_category'];
                            $searchCount++;
                        ?>
                            <div class="col-md-3">
                                <div class="card mb-4 box-shadow">
                                    <a href="product.php?p_id=<?php echo $post_id; ?>">
                                        <img class="card-img-top" src="laptops/<?php echo $postBrand . "/" . $postCategory . "/" . $postImage ?>?" style="padding: 15px 10px; margin-top: 15px;" height="200">
                                        <div class="card-body text-center">

                                            <p><?php echo $postName; ?></p>
                                            <p>Price: <?php echo $postPrice; ?>$</p>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>


            </div>
        </div>
    </div>
</main>

<?php
                    }
                    if ($searchCount == 0) {
                        echo "<div class='text-center'><h5>No results try another keyword</h5></div>";
                    } else {
                        echo "<div class='text-center'><h5>Found $searchCount result(s)</h5></div>";
                    }
                }
                mysqli_stmt_close($stmt);
                mysqli_close($myconnect);

                require("includes/footer.php");
?>