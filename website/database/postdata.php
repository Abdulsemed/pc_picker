<?php
    require 'dataconnect.php';
?>

<h1>POST ADDING FORM</h1>

<?php
    if(isset($_POST['submit'])){
        $laptopName=$_POST['laptopName'];
        $laptopBrand=$_POST['laptopBrand'];
        $laptopCategory=$_POST['laptopCategory'];
        $laptopTag=$_POST['laptopTag'];
        $laptopPrice=$_POST['laptopPrice'];
        $laptopImage=$_FILES['laptopImage']['name'];
        $extension=strtolower(strstr($laptopImage,"."));
        if(empty($laptopName)||empty($laptopCategory)||empty($laptopTag)||empty($laptopPrice)||empty($laptopImage)||empty($laptopBrand)){
            header("location: ../postadd.php?error=emptyField(s)");
            exit();
        }else if(!preg_match("/^[a-zA-Z0-9]*/",$laptopName)){
            header("location: ../postadd.php?error=invalidLaptopName");
            exit();
        }
        else{
            $postsql="SELECT post_name FROM posts WHERE post_name =? ";
            $stmt=mysqli_stmt_init($myconnect);
            if(!mysqli_stmt_prepare($stmt,$postsql)){
                header("location: ../postadd.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"s",$laptopName);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $postrows=mysqli_stmt_num_rows($stmt);
                if($postrows>0){
                    header("location: ../postadd.php?error=laptopExists");
                    exit();
                }else{
                        $brand=strtoupper($laptopBrand);
                        $category=strtoupper($laptopCategory);
                    if($extension==".jpg"||$extension==".jpeg"||$extension==".png"||$extension==".gif"){
                        if(!file_exists("../laptops/$brand/$category")){
                            mkdir("../laptops/$brand/$category");
                        }
                        move_uploaded_file($_FILES['laptopImage']['tmp_name'],"../laptops/$brand/$category/$laptopImage");
                    }else{
                             header("location: ../postadd.php?error=unsupportedFile $extension");
                             exit();
                     }
                    $postSql="INSERT INTO posts(post_name,post_brand,post_price,post_image,post_category,post_tags) VALUES(?,?,?,?,?,?)";
                    $stmt=mysqli_stmt_init($myconnect);
                    mysqli_stmt_prepare($stmt,$postSql);
                    mysqli_stmt_bind_param($stmt,"ssssss",$laptopName,$laptopBrand,$laptopPrice,$laptopImage,$laptopCategory,$laptopTag);
                    mysqli_stmt_execute($stmt);
                    header("location: ../postadd.php?success=postAdded");
                    exit();
                }
            }
            
        }
        mysqli_stmt_close($stmt);
        mysqli_close($myconnect);
    }else{
        header("location: ../postadd.php?error=sqlError");
        exit();
    }
   
?>