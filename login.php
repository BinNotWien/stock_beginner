<!doctype html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="school project - sign-in">
    <meta name="author" content="Ta3">
    <title>로그인</title>
    <link rel="shortcut icon" type="image⁄x-icon" href="./img/pabicon.ico">
    <link rel="stylesheet" href="css/login.css">

</head>

<body class="login-body">

    <main class="login-form">

        <form method="post" action="./PHP/login_pc.php">
            <a href="index.php">
                <img class="margin-b-4" src="img/mainIcon.png" width="72" height="68">
            </a>

            <div class="form-flot">
                <input type="text" class="form-ctrl" placeholder="ID" name="id" required>
            </div>

            <div class="form-flot">
                <input type="password" class="form-ctrl" placeholder="Password" name="pwd" required>
            </div>

            <div class="check-a-box margin-b-3">
                <!--
                <label>
                    <input type="checkbox" value="remember-me"> Remember ID
                </label>
                -->
                <a class="join-us" href="joinus.php">Sign-up</a>
            </div>

            <button class="btn-login" type="submit">Sign-in</button>

            <p class="margin-t-5 margin-b-3 color-gray">Copyright 2021. 김현빈. <br>All rights reserved.</p>
        </form>

    </main>

</body>

</html>