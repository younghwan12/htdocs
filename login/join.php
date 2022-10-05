<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

    <!-- link -->
    <?php include "../include/link.php"?>


    <!-- header -->
    <?php include "../include/header.php"?>

</head>
<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->
    
    <main id="main">
        <section id="banner">
            <h2>회원가입 페이지 입니다.</h2>
            <div class="banner__inner2 container">
                <div class="img">
                    <img src="../assets/img/banner_img01.svg" alt="배너 이미지">
                </div>
                <div class="desc">
                    어떤 일이라도 <em>노력</em>하고 즐기면 그 결과는 <em>빛</em>을 바란다고 생각합니다.<br>
                    회원가입을 축하드립니다.
                </div>
            </div>
        </section>
        <!-- //banner -->

        <section id="joinAgree" class="container">
            <h2>회원 가입</h2>
            <div class="join__inner">
                <form action="joinSave.php" name="join" method="post">
                    <fieldset>
                        <legend>회원가입</legend>
                    </fieldset>
                    <div class="join__box">
                        <div>
                            <label for="youEmail">이메일</label>
                            <input type="email" id="youEmail" name="youEmail" placeholder="이메일을 적어주세요!" required>
                        </div>
                        <div>
                            <label for="youName">이름</label>
                            <input type="text" id="youName" name="youName" placeholder="이름을 적어주세요!" required>
                        </div>
                        <div>
                            <label for="youNickName">닉네임</label>
                            <input type="text" id="youNickName" name="youNickName" placeholder="닉네임을 적어주세요!" required>
                        </div>
                        <div>
                            <label for="youPass">비밀번호</label>
                            <input type="password" id="youPass" name="youPass" placeholder="비밀번호를 적어주세요!" required>
                        </div>
                        <div>
                            <label for="youPassC">비밀번호 확인</label>
                            <input type="password" id="youPassC" name="youPassC" placeholder="확인 비밀번호를 적어주세요!" required>
                        </div>
                        <div>
                            <label for="youPhone">휴대폰번호</label>
                            <input type="text" id="youPhone" name="youPhone" placeholder="휴대폰번호를 적어주세요!" required>
                        </div>
                    </div>                                  
                    <button class="join__btn" type="sibmit">회원가입 완료</button>
                </form>
            </div>
            
        </section>
    </main>
    <!-- //main -->

    <footer id="footer">
        <h2>푸터 영역입니다.</h2>
        <div class="footer__inner container">
            <address>Copyright @2022 YoungHwan</address>
            <div>blog by YoungHwan</div>
        </div>
    </footer>
    <!-- //footer -->
</body>
</html>