<?php

if (isset($_GET['p_id'])) {
    $id = $_GET['p_id'];
    $query = "SELECT * FROM posts WHERE post_id = '{$id}'";
    $selectPost_by_id = mysqli_query($myconnect, $query);

    $row = mysqli_fetch_assoc($selectPost_by_id);

    $post_id = $row['post_id'];
    $post_category = $row['post_category'];
    $post_name = $row['post_name'];
    $post_brand = $row['post_brand'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_price = $row['post_price'];
    $post_graphicscard = $row['post_graphicscard'];
    $post_processor = $row['post_processor'];
    $post_ram = $row['post_ram'];
    $post_screen = $row['post_screen'];
    $post_harddisk = $row['post_harddisk'];
    $post_OS = $row['post_OS'];


    if (isset($_POST['edit'])) {
        $post_name = $_POST['post_name'];
        $post_category = $_POST['post_category'];
        $post_brand = $_POST['post_brand'];
        $post_tags = $_POST['post_tags'];
        $post_price = $_POST['post_price'];
        $post_graphicscard = $_POST['post_graphicscard'];
        $post_processor = $_POST['post_processor'];
        $post_ram = $_POST['post_ram'];
        $post_screen = $_POST['post_screen'];
        $post_harddisk = $_POST['post_harddisk'];
        $post_OS = $_POST['post_OS'];


        $post_image = $_FILES['post_image']['name'];
        $post_image_tmp = $_FILES['post_image']['tmp_name'];

        if (
            empty($post_name) || empty($post_category) || empty($post_tags) || empty($post_price) || empty($post_brand)
            || empty($post_processor) || empty($post_ram) || empty($post_screen) || empty($post_harddisk) || empty($post_OS) || empty($post_graphicscard)
        ) {
            header("location: adminlogin.php?error=emptyField(s)");
            exit();
        } else {

            $extension = strtolower(pathinfo($post_image, PATHINFO_EXTENSION));

            $brand = strtoupper($post_brand);
            $category = strtoupper($post_category);
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif") {
                if (!file_exists("../laptops/$brand") && !file_exists("../laptops/$brand/$category")) {
                    mkdir("../laptops/$brand");
                    mkdir("../laptops/$brand/$category");
                } else if (!file_exists("../laptops/$brand/$category")) {
                    mkdir("../laptops/$brand/$category");
                }

                move_uploaded_file($post_image_tmp, "../laptops/$brand/$category/$post_image");
            } else {
                header("location: adminlogin.php?error=unsupportedFile $extension");
                exit();
            }

            // move_uploaded_file($post_image_tmp, "../laptops/{$post_brand}/{$post_category}/{$post_image}");

            if (empty($post_image)) {
                $query = "SELECT * FROM posts WHERE post_id = $id";
                $image_post = mysqli_query($myconnect, $query);

                while ($row = mysqli_fetch_assoc($image_post)) {
                    $post_image = $row['post_image'];
                }
            }

            $query = "UPDATE posts SET post_category = '{$post_category}', ";
            $query .= "post_name = '{$post_name}', ";
            $query .= "post_brand = '{$post_brand}', ";
            $query .= "post_image = '{$post_image}', ";
            $query .= "post_price = '{$post_price}', ";
            $query .= "post_tags = '{$post_tags}', ";
            $query .= "post_graphicscard = '{$post_graphicscard}', ";
            $query .= "post_ram = '{$post_ram}', ";
            $query .= "post_OS = '{$post_OS}', ";
            $query .= "post_processor = '{$post_processor}', ";
            $query .= "post_screen = '{$post_screen}', ";
            $query .= "post_harddisk = '{$post_harddisk}' ";
            $query .= "WHERE post_id = '{$id}' ";

            $edit_post = mysqli_query($myconnect, $query);
            // confirm($edit_post);
        }
    }
?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="post_name">Product Name </label>
            <input type="text" class="form-control" name="post_name" value="<?php echo $post_name; ?>">
        </div>
        <div class="form-group">
            <label for="author">Product Brand</label>
            <input type="text" class="form-control" name="post_brand" value="<?php echo $post_brand; ?>">
        </div>
        <div class="form-group">
            <label for="post_name">Product Category</label>
            <input type="text" class="form-control" name="post_category" value="<?php echo $post_category; ?>">
        </div>
        <div class="form-group">
            <label for="author">Product processor</label>
            <input type="text" class="form-control" name="post_processor" value="<?php echo $post_processor; ?>">
        </div>
        <div class="form-group">
            <label for="author">Product RAM</label>
            <input type="text" class="form-control" name="post_ram" value="<?php echo $post_ram; ?>">
        </div>
        <div class="form-group">
            <label for="author">Product Graphics</label>
            <input type="text" class="form-control" name="post_graphicscard" value="<?php echo $post_graphicscard; ?>">
        </div>
        <div class="form-group">
            <label for="author">Product Harddisk size</label>
            <input type="text" class="form-control" name="post_harddisk" value="<?php echo $post_harddisk; ?>">
        </div>
        <div class="form-group">
            <label for="author">Product Screen size</label>
            <input type="text" class="form-control" name="post_screen" value="<?php echo $post_screen; ?>">
        </div>
        <div class="form-group">
            <label for="author">Product OS</label>
            <input type="text" class="form-control" name="post_OS" value="<?php echo $post_OS; ?>">
        </div>
        <div class="form-group">
            <label for="status">Product Price</label>
            <input type="text" class="form-control" name="post_price" value="<?php echo $post_price; ?>">
        </div>
        <div class="form-group">
            <label for="image">Prodcut Image</label><br>
            <img src="../laptops/<?php echo $post_brand; ?>/<?php echo $post_category; ?>/<?php echo $post_image; ?>" width="100" alt=""><br><br>
            <input type="file" class="form-control" name="post_image">
        </div>
        <div class="form-group">
            <label for="tag">Product Tags</label>
            <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update Product" name="edit">
        </div>
    </form>

<?php  }
?>