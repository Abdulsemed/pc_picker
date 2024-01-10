<?php include "includes/header.php"; ?>

<main class="body_content">
  <?php
  if (isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
  }
  $query = "SELECT * FROM posts where post_id = '{$post_id}'";
  $view_product = mysqli_query($myconnect, $query);
  while ($row = mysqli_fetch_assoc($view_product)) {
    $post_name = $row['post_name'];
    $post_price = $row['post_price'];
    $post_image = $row['post_image'];
    $post_brand = $row['post_brand'];
    $post_category = $row['post_category'];
    $post_graphicscard = $row['post_graphicscard'];
    $post_processor = $row['post_processor'];
    $post_ram = $row['post_ram'];
    $post_screen = $row['post_screen'];
    $post_harddisk = $row['post_harddisk'];
    $post_OS = $row['post_OS'];
    $post_date = $row['post_date'];
  ?>

    <div class="album py-5 bg-light">
      <div class="container" style="max-width: 95%;">
        <div class="row">
          <div class="col-4">
            <img class="laptop" width="400px" src="laptops/<?php echo $post_brand; ?>/<?php echo $post_category; ?>/<?php echo $post_image; ?>" alt="Acer Predator Helios 300
          Gaming Laptop" />
          </div>
          <div class="col-4" style="padding: 20px 60px 20px 70px;">
            <h2>
              <?php
              echo strtoupper($post_brand) . " " . $post_name . ", " . $post_category . " " . substr($post_date, 0, 4) . ": " . $post_processor . ", " . $post_graphicscard . ", " . $post_screen . ", " . $post_ram . " GB RAM , " . $post_harddisk . " GB SSD, " . $post_OS;
              ?>
            </h2>
          </div>
          <div class="card mb-4 box-shadow" style="width:300px;">
            <!-- <div class="col-4 card form-signin"> -->
            <div class="card-header">
              <h4 class=" my-0 font-weight-normal">Price</h4>
            </div>
            <div class="card-body">
              <h2>
                <div>
                  <span id="item-price"><?php echo $post_price; ?></span>$
                </div>
              </h2>
              <p>Customize</p>
              <label for="ram">RAM</label>
              <select name="RAM" class="form-control ram calculate" style="width:150px;">
                <?php
                if ($post_ram == 4) { ?>
                  <option class="Ram" value="20" selected>4GB</option>
                <?php } else { ?>
                  <option class="Ram" value="20">4GB</option>
                <?php }
                if ($post_ram == 8) { ?>
                  <option class="Ram" value="40" selected>8GB</option>
                <?php } else { ?>
                  <option class="Ram" value="40">8GB</option>
                <?php }
                if ($post_ram == 16) { ?>
                  <option class="Ram" value="60" selected>16GB</option>
                <?php } else { ?>
                  <option class="Ram" value="60">16GB</option>
                <?php }
                if ($post_ram == 32) { ?>
                  <option class="Ram" value="80" selected>32GB</option>
                <?php } else { ?>
                  <option class="Ram" value="80">32GB</option>
                <?php } ?>

              </select>
              <label for="storage">Storage</label>
              <select name="Storage" class="form-control storage calculate" style="width:150px;">
                <?php
                if ($post_harddisk == "64") { ?>
                  <option class="Storage" value="20" selected>64GB</option>
                <?php } else { ?>
                  <option class="Storage" value="20">64GB</option>
                <?php }
                if ($post_harddisk == "128") { ?>
                  <option class="Storage" value="40" selected>128GB</option>
                <?php } else { ?>
                  <option class="Storage" value="40">128GB</option>
                <?php }
                if ($post_harddisk == "256") { ?>
                  <option class="Storage" value="60" selected>256GB</option>
                <?php } else { ?>
                  <option class="Storage" value="60">256GB</option>
                <?php }
                if ($post_harddisk == "512") { ?>
                  <option class="Storage" value="80" selected>512GB</option>
                <?php } else { ?>
                  <option class="Storage" value="80">512GB</option>
                <?php }
                if ($post_harddisk == "1024") { ?>
                  <option class="Storage" value="100" selected>1TB</option>
                <?php } else { ?>
                  <option class="Storage" value="100">1TB</option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <br>
        <br>

        <div>
          <hr class="hr" color="#001133">
          <details>
            <summary>
              Product specification
            </summary>
            <hr>
            <br>
            <table class="table table-bordered " style="width: 60%;">
              <colgroup>
                <col span="1" style="background-color: #bbbbbb; width:35%;" />
              </colgroup>

              <tr>
                <td> Standing screen display size:</td>
                <td><?php echo $post_screen; ?></td>
              </tr>
              <tr>
                <td>Processor:</td>
                <td><?php echo $post_processor; ?></td>
              </tr>
              <tr>
                <td>RAM:</td>
                <td id="de_ram"><?php echo $post_ram; ?></td>
              </tr>
              <tr>
                <td>Hard Drive:</td>
                <td id="de_storage"><?php echo $post_harddisk; ?></td>
              </tr>
              <tr>
                <td>Graphics Coprocessor:</td>
                <td><?php echo $post_graphicscard; ?></td>
              </tr>
              <tr>
                <td>Brand:</td>
                <td><?php echo $post_brand; ?></td>
              </tr>
              <tr>
                <td>Operating System:</td>
                <td><?php echo $post_OS; ?></td>
              </tr>
              <tr>
                <td>Date First Available:</td>
                <td><?php echo $post_date; ?></td>
              </tr>

            </table>
            <br>
          </details>
          <hr class="hr" color="#001133">
        </div>
      <?php } ?>

      <?php
      if (isset($_POST['create_comment'])) {
        $post_id = $_GET['p_id'];
        $user = $_SESSION['user'];
        $query = "SELECT * FROM user WHERE userName = '{$user}'";
        $selectUser = mysqli_query($myconnect, $query);
        $rows = mysqli_fetch_assoc($selectUser);
        // $user_name = 
        // $user_email = 
        $comment_author = $rows['userName'];
        $comment_content = $_POST['comment_content'];
        $comment_email = $rows['email'];
        // $_POST['comment_email'];

        $query = "INSERT INTO comment (comment_post_id, comment_author, comment_email, comment_content,
        comment_status, comment_date) VALUES ('{$post_id}', '{$comment_author}', '{$comment_email}', '{$comment_content}','Unapproved', now())";
        $insert_comment = mysqli_query($myconnect, $query);
        close();
      }
      ?>
      <br><br>

      <div class="blog-post" style="width: 80%;">
        <h2 class="blog-post-title">Top Comments</h2>
        <br>
        <?php
        $query = "SELECT * FROM comment WHERE comment_post_id = {$post_id} ";
        $query .= "AND comment_status = 'Approved' ORDER BY comment_id DESC";
        $comm_display = mysqli_query($myconnect, $query);
        while ($row = mysqli_fetch_assoc($comm_display)) {
          $comment_id = $row['comment_id'];
          $comment_post_id = $row['comment_post_id'];
          $comment_author = $row['comment_author'];
          $comment_content = $row['comment_content'];
          $comment_email = $row['comment_email'];
          $comment_status = $row['comment_status'];
          $comment_date = $row['comment_date'];
        ?>
          <h5 class="blog-post-meta"><?php echo $comment_date; ?> by
            <small><i><?php echo $comment_author; ?></i></small>
          </h5>
          <p><?php echo $comment_content; ?></p>
          <hr>

        <?php } ?>
        <br>
      </div>
      <div class="row">
        <div class="weller col-5">
          <h4>Leave a Comment:</h4>
          <form action="" method="POST" role="form">
            <!-- <label for="author">Author</label>
            <div class="form-group">
              <input type="text" class="form-control" name="comment_author">
            </div>
            <label for="email">Email</label>
            <div class="form-group">
              <input type="email" class="form-control" name="comment_email" id="">
            </div> -->
            <label for="comment">Your comment</label>
            <div class="form-group">
              <textarea name="comment_content" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      </div>
    </div>
</main>
<?php
include "includes/footer.php";
?>