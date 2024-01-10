<?php
    require_once("../database/dataconnect.php");
    use Mpdf\Mpdf;
    
    require_once __DIR__ . '/vendor/autoload.php';
    $mpdf = new Mpdf();

    if(isset($_POST['pdf'])){
        $stylesheet=file_get_contents("../css/bootstrap.min.css");
        $users=$_POST['users'];
        $posts=$_POST['posts'];
        $comments=$_POST['comments'];
        $feedbacks=$_POST['feedbacks'];
        
        
        $data="<h1><b>Dashboard Details</b></h1>";
        $data .= "<h6 class='text-uppercase'><strong>Number of Users</strong></h6>".$users."";
        $data.="<h6 class='text-uppercase'><strong>Number of Posts</strong></h6>".$posts."";
        $data.="<h6 class='text-uppercase'><strong>Number of Comments</strong></h6>".$comments."";
        $data.="<h6 class='text-uppercase'><strong>Number of Feedbacks</strong></h6>".$feedbacks."";
        $mpdf->WriteHTML($data);
        $mpdf->Output("dashboardS.pdf","D");

    }else if(isset($_POST['pdfDB'])){
        $sql1="Select * from user";
        $sql2="Select * from posts";
        $sql3="Select * from comment";
        $sql4="select * from contact";
        $stmt1=mysqli_query($myconnect,$sql1);
        $mpdf->AddPage();
        $mpdf->writeHTML("<h1 align='center'>Dashboard Stats</h1> <br>");
        $mpdf->writeHTML("<h3 align='center'>User Details </h3><br>");
        $mpdf->cell('15','10','User ID','1','0','C');
        $mpdf->cell('40','10',' Full Name','1','0','C');
        $mpdf->cell('45','10',' Username','1','0','C');
        $mpdf->cell('50','10',' Email','1','1','C');
        
        while($rowUser=mysqli_fetch_assoc($stmt1)){
            $mpdf->cell('15','10',$rowUser['id'],'1','0','C');
            $mpdf->cell('40','10',$rowUser['Full_name'],'1','0','C');
            $mpdf->cell('45','10',$rowUser['userName'],'1','0','C');
            $mpdf->cell('50','10',$rowUser['email'],'1','1','C');
           
        }
        $stmt2=mysqli_query($myconnect,$sql2);

        $mpdf->writeHTML("<h3 align='center'>Post Details </h3><br>");
        $mpdf->cell('15','10','Post ID','1','0','C');
        $mpdf->cell('40','10',' Post Name','1','0','C');
        $mpdf->cell('40','10',' Post Brand','1','0','C');
        $mpdf->cell('45','10',' Post Price','1','0','C');
        $mpdf->cell('50','10',' Post Category','1','1','C');
        
        while($rowPost=mysqli_fetch_assoc($stmt2)){
            $mpdf->cell('15','10',$rowPost['post_id'],'1','0','C');
            $mpdf->cell('40','10',$rowPost['post_name'],'1','0','C');
            $mpdf->cell('40','10',$rowPost['post_brand'],'1','0','C');
            $mpdf->cell('45','10',$rowPost['post_price'],'1','0','C');
            $mpdf->cell('50','10',$rowPost['post_category'],'1','1','C');
           
        }

        $stmt3=mysqli_query($myconnect,$sql3);

        $mpdf->writeHTML("<h3 align='center'>Comment Details </h3><br>");
        $mpdf->cell('10','10','ID','1','0','C');
        $mpdf->cell('30','10',' Author','1','0','C');
        $mpdf->cell('50','10',' Email','1','0','C');
        $mpdf->cell('100','10',' Comment Content','1','1','C');
       
        while($rowComment=mysqli_fetch_assoc($stmt3)){
            $cellwidth=100;
            $cellheight=10;

            if($mpdf->getStringWidth($rowComment['comment_content'])<$cellwidth){
                $line=1;
            }else{
                $textLength=strlen($rowComment['comment_content']);
                $errMargin=10;
                $startChar=0;
                $maxChar=0;
                $textArray=array();
                $tempString="";

                while($startChar<$textLength){
                    while($mpdf->GetStringWidth($tempString)<($cellwidth-$errMargin)&&($startChar+$maxChar)<$textLength){
                        $maxChar++;
                        $tempString=substr($rowComment['comment_content'],$startChar,$maxChar);
                    }
                    $startChar=$startChar+$maxChar;
                    array_push($textArray,$tempString);
                    $maxChar=0;
                    $tempString="";

                }
                $line=count($textArray);
            }   

            $mpdf->cell('10',$cellheight*$line,$rowComment['comment_id'],'1','0','C');
            $mpdf->cell('30',$cellheight*$line,$rowComment['comment_author'],'1','0','C');
            $mpdf->cell('50',$cellheight*$line,$rowComment['comment_email'],'1','0','C');
            $mpdf->multicell($cellwidth,$cellheight,$rowComment['comment_content'],'1','1','J');
        }

        $stmt4=mysqli_query($myconnect,$sql4);

        $mpdf->writeHTML("<h3 align='center'>Feedback Details </h3><br>");
        $mpdf->cell('10','10','ID','1','0','C');
        $mpdf->cell('40','10','  Username','1','0','C');
        $mpdf->cell('40','10',' Email','1','0','C');
        $mpdf->cell('100','10',' Feedback Content','1','1','C');

        while($rowFeedback=mysqli_fetch_assoc($stmt4)){

            $cellwidth=100;
            $cellheight=10;

            if($mpdf->getStringWidth($rowFeedback['content'])<$cellwidth){
                $line=1;
            }else{
                $textLength=strlen($rowFeedback['content']);
                $errMargin=10;
                $startChar=0;
                $maxChar=0;
                $textArray=array();
                $tempString="";

                while($startChar<$textLength){
                    while($mpdf->GetStringWidth($tempString)<($cellwidth-$errMargin)&&($startChar+$maxChar)<$textLength){
                        $maxChar++;
                        $tempString=substr($rowFeedback['content'],$startChar,$maxChar);
                    }
                    $startChar=$startChar+$maxChar;
                    array_push($textArray,$tempString);
                    $maxChar=0;
                    $tempString="";

                }
                $line=count($textArray);
            }
            $mpdf->cell('10',$line*$cellheight,$rowFeedback['cuser_id'],'1','0','C');
            $mpdf->cell('40',$line*$cellheight,$rowFeedback['user_name'],'1','0','C');
            $mpdf->cell('40',$line*$cellheight,$rowFeedback['user_email'],'1','0','C');
            $mpdf->multicell($cellwidth,$cellheight,$rowFeedback['content'],'1','1','C');
        }

        $mpdf->Output("dashboardD.pdf","D");
        
    }else{
        die("no file sent");
    }
    

?>


<!-- <div class='col-md-3 py-3'>
            <div class='card bg-light text-dark h-100'>
                <div class='card-body'>
                    <div class='rotate'>
                        <i class='fa fa-user fa-4x py-sm-1'></i>
                    </div>
                    <h6 class='text-uppercase'><strong>Number of Users</strong></h6>$users.
                    
                </div>
            </div>
</div> -->