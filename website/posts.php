<!-- make the post here and require it in another files -->
<div class="row">
    <div class="col col-md-2 filter-pane">
        <?php require_once("admin/filter.php"); ?>
    </div>
    <main role="main" class="col-md-10 poster">
        <div class="posts-grid">
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
                        <?php
                        $currentpage = 1;
                        $num_rows = 0;
                        if (isset($_GET['query'])) {
                            require_once('database/dataconnect.php');
                            if ($_GET['id'] == 1) {
                                $field = "post_category";
                            } else if ($_GET['id'] == 2) {
                                $field = "post_brand";
                            } else if ($_GET['id'] == 3) {
                                $field = "post_OS";
                            }
                            $query = ($_GET['query']);
                            $mypost = "SELECT * from posts WHERE $field =?";
                            $query_stmt = mysqli_stmt_init($myconnect);

                            if (!mysqli_stmt_prepare($query_stmt, $mypost)) {
                                header("location: landing_page.php?error=sqlError");
                                exit();
                            } else {
                                mysqli_stmt_bind_param($query_stmt, "s", $query);
                                mysqli_stmt_execute($query_stmt);
                                $post_result = mysqli_stmt_get_result($query_stmt);
                            }
                        } else if (isset($_GET['price']) || isset($_GET['RAM'])) {
                            if (!isset($_GET['price'])) {
                                $ram = $_GET['RAM'];
                                $mypost = "SELECT * FROM posts WHERE post_ram = $ram";
                            } elseif (!isset($_GET['RAM'])) {
                                $price = $_GET['price'];
                                if ($price > 2500) {
                                    $price--;
                                    $mypost = "SELECT * FROM posts WHERE post_price > $price";
                                } else {
                                    $mypost = "SELECT * FROM posts WHERE post_price BETWEEN ($price-500) AND $price";
                                }
                            } else {
                                $price = $_GET['price'];
                                $ram = $_GET['RAM'];
                                if ($price > 2500) {
                                    $price--;
                                    $mypost = "SELECT * FROM posts WHERE post_price > $price AND post_ram = $ram";
                                } else {
                                    $mypost = "SELECT * FROM posts WHERE post_price BETWEEN ($price-500) AND $price AND post_ram = $ram";
                                }
                            }

                            $post_result = mysqli_query($myconnect, $mypost);
                            $num_rows = mysqli_num_rows($post_result);
                            $num_rows = ceil($num_rows / 10);
                        } else {
                            $mypost = "SELECT * from posts";
                            $post_result = mysqli_query($myconnect, $mypost);
                            $num_rows = mysqli_num_rows($post_result);
                            $num_rows = ceil($num_rows / 10);
                            // $currentpage = 1;
                            if (isset($_GET['row'])) {
                                $currentpage = $_GET['row'];
                                if ($_GET['row'] > 1) {
                                    $row = $_GET['row'] + 8;
                                } else {
                                    $row = 0;
                                }

                                $mypost = "SELECT * from posts limit $row,10";
                            } else {
                                $mypost = "SELECT * from posts limit 0,10";
                            }
                            $post_result = mysqli_query($myconnect, $mypost);
                        }
                        while ($postRow = mysqli_fetch_assoc($post_result)) {
                            $post_id = $postRow['post_id'];
                            $postName = $postRow['post_name'];
                            $postPrice = $postRow['post_price'];
                            $postImage = $postRow['post_image'];
                            $postBrand = $postRow['post_brand'];
                            $postcategory = ($postRow['post_category']);

                        ?>

                            <div class="col-md-3">
                                <div class="card post_cards box-shadow">
                                    <a href="product.php?p_id=<?php echo $post_id; ?>">
                                        <img class="card-img-top" src="laptops/<?php echo $postBrand . "/" . $postcategory . "/" . $postImage ?>?" style="padding: 15px 10px; margin-top: 10px; height:200px;">
                                        <div class="card-body text-center">

                                            <p><?php echo $postName; ?></p>
                                            <p>Price: <?php echo $postPrice; ?>$</p>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<div class='page-links'>
    <?php
    if ($currentpage != 1) {
        $prev_page = $currentpage - 1;
        echo "<a href='landing_page.php?row=$prev_page' class='numberLink'>Prev</a>";
    }
    if (!isset($_GET['query'])) {
        if ($num_rows >= 1) {
            for ($i = 1; $i <= $num_rows; $i++) {
    ?>
                <a href="landing_page.php?row=<?php echo $i ?>" class="numberLink"><?php echo $i; ?></a>

    <?php
            }
        }
    }
    if ($currentpage < $num_rows) {
        $currentpage++;
        echo "<a href='landing_page.php?row=$currentpage' class='numberLink'>Next</a>";
    }

    mysqli_close($myconnect);

    ?>

</div>