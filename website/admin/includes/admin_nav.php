<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
        <h1>Admin</h1>
    </a>
    <ul class="nav-item dropdown" style="margin-bottom: 0px; margin-right: 15px; padding-top: 15px;">
        <a class="nav-link text-white" href="#" id="profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
            <?php echo $_SESSION['user']; ?><i class=" fa fa-fw fa-caret-down"></i></a>
        <div class="dropdown-menu" aria-labelledby="profile-dropdown">
            <a href="#" class=" dropdown-item"><i class="fa fa-user-circle" aria-hidden="true"></i>
                Profile</a>
            <hr>
            <a href="../logout.php" class=" dropdown-item  text-danger"><i class="fa fa-sign-out" aria-hidden="true"></i>
                Sign out</a>
        </div>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="padding-bottom: 15px;">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">
                            <span data-feather="home"></span>
                            <i class="fa fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminlogin.php">
                            <span data-feather="home"></span>
                            <i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-file-text" aria-hidden="true"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            <a href="posts.php">View All Posts</a><br>
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <a href="posts.php?source=add-post">Add Post</a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#comment_dropdown"><i class="fa fa-comments" aria-hidden="true"></i> Comments <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="comment_dropdown" class="collapse">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <a href="comments.php?source=post-comment">Post</a><br>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <a href="comments.php?source=user-comment">User</a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link" href="users.php">
                            <i class=" fa fa-users" aria-hidden="true"></i>
                            Users</a>
                    </li>
                </ul>
            </div>
        </nav>