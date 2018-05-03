<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?=CSS_URL?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?=CSS_URL?>/jquery-ui.min.css">
    <link rel="stylesheet" href="<?=CSS_URL?>/style.css">
    <script src="<?=JS_URL?>/jquery-3.3.1.min.js"></script>
    <script src="<?=JS_URL?>/bootstrap.min.js"></script>
    <script src="<?=JS_URL?>/jquery-ui.min.js"></script>
    <script src="<?=JS_URL?>/app.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">웹 하드</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mr-auto">
                <?php 

                    $idx = isset($_SESSION['idx']) ? $_SESSION['idx'] : "";
                    $admin = isset($_SESSION['admin']) ? 1 : "";
                    
                    echo $idx != '' ? '<a class="nav-item nav-link" href="/file/file">파일관리</a>' : '';

                    echo $admin != '' ? '<a class="nav-item nav-link" href="/member/admin">회원관리</a>':"";
                 ?>
                <!-- <a class="nav-item nav-link" href="/file/file">파일관리</a>
                <a class="nav-item nav-link" href="/share/in_share">내부공유 목록</a>
                <a class="nav-item nav-link" href="/share/out_share">외부공유 목록</a>
                <a class="nav-item nav-link" href="/member/admin">회원관리</a> -->
            </div>
            <div class="navbar-nav">
                <?php 

                echo $idx != '' ? '<a class="nav-item nav-link active" href="/member/logout">로그아웃</a>' : '<a class="nav-item nav-link active" href="/member/login">로그인</a><a class="nav-item nav-link active" href="/member/join">회원가입</a>';
                 ?>
                
            </div>
        </div>
    </div>
</nav>
