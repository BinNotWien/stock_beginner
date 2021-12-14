<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="school project - Join us">
    <meta name="author" content="Ta3">
    <title>회원가입</title>
    <link rel="shortcut icon" type="image⁄x-icon" href="./img/pabicon.ico">
    <link rel="stylesheet" href="css/joinus.css">

</head>

<body>
    <div class="form-cotainer">

        <div class="form-card">
            <article class="form-box" style="max-width: 400px;">

                <a href="index.php">
                    <img class="margin-b" src="img/mainIcon.png" width="72" height="68">
                </a>
                <h4 class="form-title">Create Account</h4>

                <form method="post" action="./PHP/joinus_pc.php" id="joinus-form">
                    <div class="form-group">
                        <div class="form-group-prepend">
                            <span class="form-group-text">
                                <img src="img/people_joinus.png">
                            </span>
                        </div>
                        <input class="form-ctrl" placeholder="ID" type="text" id="id" name="id" required>
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <div class="form-group-prepend">
                            <span class="form-group-text">
                                <img src="img/Email_joinus.png">
                            </span>
                        </div>
                        <input class="form-ctrl" placeholder="Email Address" type="email" id="email" name="email"
                            required>
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <div class="form-group-prepend">
                            <span class="form-group-text">
                                <img src="img/tell_joinus.png">
                            </span>
                        </div>
                        <input class="form-ctrl" placeholder="Phone Number" type="tel" id="tel" name="tel" required>
                        <!--
                        <select class="form-select" style="max-width: 90px;">
                            <option selected="">+82</option>
                            <option value="1">+1</option>
                            <option value="2">+81</option>
                        </select>
                        <input name="" class="form-ctrl" placeholder="Phone number" type="text" required>
                        -->
                    </div> <!-- form-group// -->

                    <!--
                    <div class="form-group">
                        <div class="form-group-prepend">
                            <span class="form-group-text">
                                <img src="img/company_joinus.png">
                            </span>
                        </div>
                        <select class="form-ctrl" required>
                            <option selected=""> Select job type</option>
                            <option>Student</option>
                            <option>Engineer</option>
                            <option></option>
                        </select>
                    </div>
                    -->

                    <div class="form-group">
                        <div class="form-group-prepend">
                            <span class="form-group-text">
                                <img src="img/lock_joinus.png">
                            </span>
                        </div>
                        <input class="form-ctrl" placeholder="Create Password" type="password" id="password" name="pwd"
                            required>
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <div class="form-group-prepend">
                            <span class="form-group-text">
                                <img src="img/lock_joinus.png">
                            </span>
                        </div>
                        <input class="form-ctrl" placeholder="Repeat Password" type="password" id="passwrodRepeat"
                            required>
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <button type="button" class="btn-submit" id="joinus-button"> Create Account </button>
                    </div> <!-- form-group// -->

                    <p class="footer-text">Have an account? <a href="login.php">Sign-in</a> </p>
                </form>
                <script>
                const joinusForm = document.querySelector("#joinus-form");
                const joinusButton = document.querySelector("#joinus-button");
                const password = document.querySelector("#password");
                const passwordCheck = document.querySelector("#passwrodRepeat");

                joinusButton.addEventListener("click", function(e) {
                    if (password.value && password.value === passwordCheck.value) {
                        joinusForm.submit();
                    } else {
                        alert("비밀번호가 일치하지 않습니다");
                    }
                });
                </script>
            </article>
        </div>

    </div>
    <!--container end.-->

    <div class="copyright">
        Copyright 2021. 김현빈. <br>
        All rights reserved.
    </div>
</body>