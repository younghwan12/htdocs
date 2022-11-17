<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $blogID = $_GET['blogID'];
    

    $blogSql = "SELECT * FROM myBlog WHERE blogID = {$blogID}";
    $blogResult = $connect -> query($blogSql);
    $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);

    $commentSql = "SELECT * FROM mycomment WHERE BlogID = {$blogID} ORDER BY commentID DESC";
    $commentResult = $connect -> query($commentSql);
    $commentInfo = $commentResult -> fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 사이트 만들기</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->
    <?php include "../include/header.php" ?>

    <main id="main">
        <section id="blog" class="container">
            <div class="blog__inner">
                <div class="blog__title" style="background-image:url(../assets/blog/<?=$blogInfo['blogImgSrc']?>">
                    <span class="blog__title__cate"><?=$blogInfo['blogCategory']?></span>
                    <h2 class="blog__title__h1">
                        <?=$blogInfo['blogTitle']?>
                    </h2>
                    <div class="blog__title__info">
                        <div>
                            <span class="author"><?=$blogInfo['blogAuthor']?></span>
                            <span class="date"><?=date('Y-m-d', $blogInfo['blogRegTime'])?></span>                            
                        </div>
                        <div>
                            <a href="" class="modify">수정</a>
                            <a href="" class="delete">삭제</a>
                        </div>
                    </div>
                </div>
                <div class="blog__contents">
                    <div class="blog__contents__ad">
                        <div></div>
                    </div>
                    <!-- blog__contents__ad -->

                    <div class="blog__contents__cont">
                        <?=$blogInfo['blogContents']?>
                    </div>
                    <!-- blog__contents__cont -->
                    <div class="blog__contents__comment">
                        <h3>댓글 쓰기</h3>
                        <?php
                            foreach($commentResult as $comment){ ?>
                                <div class="comment" id="Comment<?=$comment['commentID']?>">
                                    <div class="comment__view">
                                        <div class="comment__view__img">
                                            <img src="../assets/img/icon_256.png" alt="dd">
                                        </div>
                                        <div class="comment__view__date">
                                            <span class="name"><?=$comment['commentName']?></span>
                                            <span class="date"><?=date('Y-m-d', $comment['regTime'])?></span>
                                        </div>
                                        <div class="comment__view__msg">
                                            <?=$comment['commentMsg']?>    
                                        </div>

                                    </div>
                                    <div class="comment__del">
                                        <a href="#" class="comment__del__del">댓글 삭제</a>
                                        <a href="#" class="comment__del__mod">댓글 수정</a>
                                    </div>
                                </div>
                        <?php }

                        ?>
                        <div class="comment__delete" style="display: none">
                            <label for="commentDeletePass">비밀번호</label>
                            <input type="text" id="commentDeletePass" name="commentDeletePass">
                            <button id="commentDeleteCancel">취소</button>
                            <button id="commentDeleteButton">삭제</button>
                        </div>
                        <div class="comment__modify" style="display: none">
                            <label for="commentModify">수정 내용</label>
                            <input type="text" id="commentModify" name="commentModify">
                            <label for="commentModifyPass">비밀번호</label>
                            <input type="text" id="commentModifyPass" name="commentModifyPass">
                            <button id="commentModifyCancel">취소</button>
                            <button id="commentModifyButton">수정</button>
                        </div>
                        <!-- <div class="comment">
                            <div class="comment__view">
                                <div class="comment__view__img">
                                    <img src="../assets/img/icon_256.png" alt="dd">
                                </div>
                                <div class="comment__view__date">
                                    <span class="name">이영환</span>
                                    <span class="date">2022-02-05</span>
                                </div>
                                <div class="comment__view__msg">
                                    더 뛰어난 반응성, 더 빠른 탐색 및 더 우수한 UI 애니메이션을 제공한다. GPU 성능은 이제 이전 세대 대비 최대 30% 향상된 속도를 구현해 더욱 실감 나는 게임플레이를 즐길 수 있다.
                                </div>
                            </div>
                            <div class="comment__del">
                                <a href="#" class="comment__del__del">댓글 삭제</a>
                                <a href="#" class="comment__del__mod">댓글 수정</a>
                            </div>
                        </div> -->
                        <div class="comment__write">
                            <div class="comment__write__info">
                                <label for="commentName">이름</label>
                                <input type="text" id="commentName" name="commentName" placeholder="이름">
                                <label for="commentPass">비밀번호</label>
                                <input type="text" id="commentPass" name="commentPass" placeholder="비밀번호">
                                <button type="submit" id="commentBtn">댓글쓰기</button>
                            </div>
                            <div class="comment__write__msg">
                                <label for="commentWrite">댓글 쓰기</label>
                                <input type="text" id="commentWrite" name="commentWrite" placeholder="댓글을 써주세요">
                            </div>
                        </div>
                    </div>
                    <!-- blog__contents__comment -->
                </div>
                <!-- blog__contents -->
                <div class="blog__aside">
                    <div class="blog__aside__intro">
                        <div class="img">
                            <img src="../assets/img/banner_bg01.jpg" alt="나">
                        </div>
                        <p class="intro">
                            어떤 일이라도 노력하고 즐기면 그 결과는 빛을 바란다고 생각합니다.
                        </p>
                    </div>
                    <!-- blog__aside__intro -->
                    <div class="blog__aside__cate">
                        <h3>카테고리</h3>
                        <?php include "../include/category.php" ?>
                    </div>
                    <div class="blog__aside__new">
                        <h3>최신글</h3>
                        <?php include "../include/blogNew.php" ?>
                    </div>
                    <div class="blog__aside__pop">
                        <h3>인기글</h3>
                        <?php include "../include/blogNew.php" ?>
                    </div>
                    <div class="blog__aside__comment">
                        <h3>최신댓글</h3>
                        <ul>
                            <li><a href="#">혁명적인 성능을 자랑하는 m2 칩</a></li>
                            <li><a href="#">혁명적인 성능을 자랑하는 m2 칩</a></li>
                            <li><a href="#">혁명적인 성능을 자랑하는 m2 칩</a></li>
                        </ul>                        
                    </div>
                </div>
                <div class="blog__relation"></div>
            </div>
        </section>

    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>

        const commentName = $("#commentName");    // 댓글 이름
        const commentPass = $("#commentPass");    // 댓글 비밀번호
        const commentWrite = $("#commentWrite");  // 댓글 비밀번호


        let commentID = "";


        // 댓글 삭제 버튼 클릭시
        $(".comment__del__del").click(function(e){
            e.preventDefault();
            // alert("댓글 삭제 버튼 클릭시");
            $(".comment__delete").show();
            
            // 클릭한 ID값 가져오기
            commentID = $(this).parent().parent().attr('id');
        })
        // 댓글 삭제 버튼 --> 취소 버튼 클릭
        $("#commentDeleteCancel").click(function(){
            $(".comment__delete").hide();
        })

        console.log(commentID)
        // 댓글 삭제 버튼 --> 삭제 버튼 클릭
        $("#commentDeleteButton").click(function(){

            let number = commentID.replace(/[^0-9]/g, "");

            if($("#commentDeletePass").val() == ''){
                alert("댓글 작성시 비밀번호를 적어주세요!");
                $("#commentDeletePass").focus();
            } else {
                $.ajax({
                    url: "blogCommentDelete.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "pass": $("#commentDeletePass").val(),
                        "commentID": number
                    },
                    success: function(data){
                        console.log(data);
                        location.reload();              //데이터 받아오고 깜빡이면서 바로 받기
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }

        })

        // 댓글 수정 버튼 클릭시
        $(".comment__del__mod").click(function(e){
            e.preventDefault();
            // alert("댓글 수정 버튼 클릭시");
            $(".comment__modify").show();

            commentID = $(this).parent().parent().attr('id');
        })

        // 댓글 수정 버튼 --> 취소 버튼 클릭
        $("#commentModifyCancel").click(function(){
            $(".comment__modify").hide();
        })

        // 댓글 수정 버튼 --> 수정 버튼 클릭
        $("#commentModifyButton").click(function(){

            let number = commentID.replace(/[^0-9]/g, "");

            if($("#commentModify").val() == '' || $("#commentModifyPass").val() == ''){
                alert("수정 내용 및 비밀번호를 입력해주세요!");
                $("#commentModifyPass").focus();
            } else {
                $.ajax({
                    url: "blogCommentModify.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "pass": $("#commentModifyPass").val(),
                        "commentID": number,
                        "commentmsg": $("#commentModify").val()
                    },
                    success: function(data){
                        console.log(data);
                        location.reload();              //데이터 받아오고 깜빡이면서 바로 받기
                    },
                    error: function(request, status, error){
                        console.log("request" , request);
                        console.log("status" , status);
                        console.log("error" , error);
                    }
                })
            }
        })

        // 댓글 쓰기 버튼
        $("#commentBtn").click(function(){
            if($("#commentWrite").val() == ""){
                alert("댓글을 써주세요!!");
                $("#commentWrite").focus();
            } else {
                $.ajax({
                    url: "blogCommentWrite.php",
                    method: "POST",
                    dataType : "json",
                    data: {
                        "blogID": <?=$blogID?>,
                        "name": commentName.val(),
                        "pass": commentPass.val(),
                        "msg": commentWrite.val()
                    },
                    success: function(data){
                        console.log(data);
                        location.reload();              //데이터 받아오고 깜빡이면서 바로 받기
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        })
    </script>
</body>
</html>