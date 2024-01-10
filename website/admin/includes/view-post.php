<table class="table table-bordered table-hover">
    <thead>
        <th>Name</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Processor</th>
        <th>RAM</th>
        <th>Graphics</th>
        <th>Price</th>
    </thead>

    <tbody>
        <?php
        $query = "SELECT * FROM posts";
        $showAllPost = mysqli_query($myconnect, $query);
        while ($row = mysqli_fetch_assoc($showAllPost)) {
            $post_id = $row['post_id'];
            $post_category = $row['post_category'];
            $post_name = $row['post_name'];
            $post_brand = $row['post_brand'];
            $post_graphicscard = $row['post_graphicscard'];
            $post_processor = $row['post_processor'];
            $post_ram = $row['post_ram'];
            $post_price = $row['post_price'];
        ?>
            <tr>

                <td><?php echo $post_name; ?></td>
                <td><?php echo $post_brand; ?></td>
                <td><?php echo $post_category; ?></td>
                <td><?php echo $post_processor; ?></td>
                <td><?php echo $post_ram; ?></td>
                <td><?php echo $post_graphicscard; ?></td>
                <td><?php echo $post_price; ?></td>
                <td><a href='posts.php?source=edit_post&p_id=<?php echo $post_id; ?>'>Edit</a></td>
                <td><a href='posts.php?delete=<?php echo $post_id; ?>' onclick="return confirm('Are you sure you want to delete this post?')">Delete</a></td>
            </tr>
        <?php }
        ?>

    </tbody>
</table>

<?php

if (isset($_GET['delete'])) {
    $the_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_id}";
    $delete_post = mysqli_query($myconnect, $query);

    header("Location: posts.php");
}

?>