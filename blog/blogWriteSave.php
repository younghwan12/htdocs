<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그 글쓰기</title>
</head>
<body>
    <?php

        $myMemberID = $_SESSION['myMemberID'];
        $blogAuthor = $_SESSION['youName'];
        $blogCate = $_POST['blogCate'];
        $blogTitle = $_POST['blogTitle'];
        $blogContents = nl2br($_POST['blogContents']);
        $blogView = 1;
        $blogLike = 0;
        $regTime = time();

        $blogImgFile = $_FILES['blogFile'];
        $blogImgSize = $_FILES['blogFile']['size'];
        $blogImgType = $_FILES['blogFile']['type'];
        $blogImgName = $_FILES['blogFile']['name'];
        $blogImgTmp = $_FILES['blogFile']['tmp_name'];

        echo "<pre>";
        var_dump($blogImgFile);
        echo "</pre>";

        // array(5) {
        //     ["name"]=>
        //     string(15) "mouseEffect.jpg"
        //     ["type"]=>
        //     string(10) "image/jpeg"
        //     ["tmp_name"]=>
        //     string(44) "C:\Users\LINE\AppData\Local\Temp\php314C.tmp"
        //     ["error"]=>
        //     int(0)
        //     ["size"]=>
        //     int(833029)
        //   }

        // 이미지 파일명 확인
        $fileTypeExtension = explode("/", $blogImgType);
        $fileType = $fileTypeExtension[0];  //image
        $fileExtension = $fileTypeExtension[1];  //jpeg

        

        // 이미지 사이즈 확인
        if($blogImgSize > 1000000){
            echo "<script>('이미지 용량이 1메가를 초과했습니다.'); history.back(1)</script>";
            exit;
        }


        // history.back(1) << 뒤로가기

        // 이미지 타입 확인
        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $blogImgDir = "../assets/img/blog/";
                $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                echo "이미지 파일이 맞네요!";
                
            } else {
                echo "<script>alert('지원하는 이미지 파일이 아닙니다.'); history.back(1)</script>";
            }
        } else if ($fileType == "" || $fileType == null ){
            echo "이미지를 첨부하지 않았습니다.";
        }

    ?>
</body>
</html>
