<?php include "includes/header.php"; ?>
<?php
if (isset($_POST["contact_submit"])) {
	$user = $_SESSION['user'];
	$query = "SELECT * FROM user WHERE userName = '{$user}'";
	$selectUser = mysqli_query($myconnect, $query);
	$rows = mysqli_fetch_assoc($selectUser);
	$user_name = $rows['userName'];
	$user_email = $rows['email'];
	// $user_id=$_POST[""];
	// $user_name = $_POST["username"];
	// $user_email = $_POST["email"];
	$content = $_POST["content"];
	// $to = "abdulsemedabdelila65@gmail.com";
	// $from = "from: '{$user_email}'";

	// mail($to, substr($content, 0, 20), $content, $from);
	$checker = "SELECT * FROM user WHERE userName =?";
	// $checker_qurey=mysqli_query($myconnect,$checker);
	$stmt = mysqli_stmt_init($myconnect);
	if (!mysqli_stmt_prepare($stmt, $checker)) {
		header("location: contact.php?error=sqlerror");
		exit();
	} else {
		mysqli_stmt_bind_param($stmt, "s", $user_name);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$dbrows = mysqli_stmt_num_rows($stmt);
		$dbrows = mysqli_stmt_num_rows($stmt);
		if ($dbrows > 0) {
			if (empty($user_email) || empty($content)) {
				header("location: contact.php?error=empty Fields");
			} else {
				$qurey = "INSERT INTO contact (user_name,user_email,content)
			value('{$user_name}','{$user_email}','{$content}')";
				$insert_contact = mysqli_query($myconnect, $qurey);
				// close();
			}
		}
	}
}
if (isset($_SESSION['access']) != 'user') {
	header("location: landing_page.php?accessForbidden");
	exit();
} else {

	$user = $_SESSION['user'];
	$query = "SELECT * FROM user WHERE userName = '{$user}'";
	$selectUser = mysqli_query($myconnect, $query);
	$rows = mysqli_fetch_assoc($selectUser);
	$username = $rows['userName'];
	$email = $rows['email'];

?>
	<form action="" method="post">
		<div class="container contact">
			<div class="row">
				<div class="col-md-3">
					<div class="contact-info">
						<img src="https://image.ibb.co/kUASdV/contact-image.jpg" alt="image" />
						<h2>Contact Us</h2>
						<h4>We would love to hear from you !</h4>
					</div>
				</div>
				<div class="col-md-9">
					<div class="contact-form">
						<!-- <div class="form-group">
							<label class="control-label col-sm-2" for="lname">User Name:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="username" placeholder="Enter User Name" value="<?php echo $username; ?>" name="username">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Email:</label>
							<div class="col-sm-10">
								<input type="email" value="<?php echo $email; ?>" class="form-control" id="email" placeholder="Enter email" name="email">
							</div>
						</div> -->
						<div class="form-group">
							<label class="control-label col-sm-2" for="comment">Message:</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="content" rows="5" id="comment"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" name="contact_submit" class="btn" onclick="submitBtn()">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php } ?>



<?php include "includes/footer.php"; ?>