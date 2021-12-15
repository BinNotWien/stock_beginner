<!DOCTYPE html>
<?php
session_start();
?>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="school project - author">
    <meta name="author" content="Ta3">
    <title>제작자</title>
    <link rel="shortcut icon" type="image⁄x-icon" href="./img/pabicon.ico">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="nav-container">
                <a class="nav-bar-icon" href="index.php">
                    <img src="img/mainIcon.png">
                </a>
                <div class="nav-bar-elemant" id="navbarsExample02">
                    <ul class="nav-bar-nav">
                        <li class="nav-item">
                            <a class="nav-bar-link" href="introduce.php">Introduce</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-bar-link" href="nav_notice.php">Notice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-bar-link" href="nav_archive.php">Archive</a>
                        </li>
                        <?php
                        if (!isset($_SESSION['user_id'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-bar-link" href="login.php">Sign-in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-bar-link" href="joinus.php">Sign-up</a>
                        </li>
                        <?php
                        } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-bar-link" href="profile.php">Profile</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
                if (isset($_SESSION['user_id'])) {
                ?>
                <img src="./img/logout_nav_icon.png" onclick="logout()">
                <?php
                }
                ?>
                <a href="author.php">
                    <img src="img/author.png">
                </a>
            </div>
        </nav>
    </header>

    <main class="main-container">

        <div class="article">
            <div class="article-md-8">
                <div class="article-md-8-h">
                    <h2>Developer</h2>
                </div>
                <article class="article-blog-post">
                    <h3 class="article-blog-post-title ">김현빈</h3>
                    <p class="article-blog-post-meta">정보통신공학과 2학년</p>
                    <br>

                    <h3 class="article-blog-post-title-2">RoadMap</h3>
                    <hr>
                    <p class="article-blog-post-desc" style="margin-top: 0; font-size: 1.25rem;">
                        <img src="./img/vue-js_icon.png">
                        <img src="./img/postgresql_icon.png">
                        <img src="./img/spring_icon.png">
                        <img src="./img/typescript_icon.png">
                        <img src="./img/java_icon.png">
                        <img src="./img/sass_icon.png">
                    </p>

                    <h3 class="article-blog-post-title-2">More Info.</h3>
                    <hr>
                    <a href="mailto:2089021@pcu.ac.kr">
                        <img src="./img/email_icon.jpeg" alt="">
                    </a>
                    <a href="https://github.com/BinNotWien/stock_beginner" target="_blank">
                        <img src="./img/gihub_icon.png" alt="">
                    </a>
                    <br>
                </article>

            </div>

            <div class="article-md-4">
                <div class="article-sticky">
                    <div class="article-sticky-about">

                        <h3 id="h3-clock" style="margin: 0; font-size: 2.2rem; 
                            font-family: 맑은고딕, Malgun Gothic, 
                            dotum, gulim, sans-serif;">
                        </h3>
                        <p class="margin-0">
                            A site for all stock beginners in the world.
                        </p>
                    </div>

                    <div class="padding-4">
                        <h4 style="margin-top: 0;">Serch</h4>
                        <form action="srch.php" method="post">
                            <div class="form-group">
                                <select class="form-select form-select-sm" name="srch_type" id="">
                                    <option value="author">Author</option>
                                    <option value="title">Title</option>
                                </select>
                                <input class="form-ctrl-srch" type="text" name="srch">
                            </div>
                        </form>
                    </div>

                    <div class="padding-4">
                        <h4 class="p-italic">Tags</h4>
                        <ol class="list-sty">
                            <?php
                            include_once("./PHP/connect_db.php");

                            $tags = ['STOCK', 'ETF', 'BS', 'SHORT', 'LONG', 'INDEX', 'IPO'];
                            $n = 1;
                            $color = array(1, 2, 3, 4);

                            shuffle($color);
                            shuffle($tags);

                            for ($i = 0; $i < 3; $i++) {
                                echo "
                                <li class='list-color-{$color[$n]} list-btn' style='display: inline; font-size: 1.25rem;'>
                                        #{$tags[$i]}
                                </li>";
                                $n++;
                            }
                            ?>
                        </ol>
                    </div>

                    <div class="padding-4">
                        <h4 class="p-italic">Content</h4>
                        <ol class="list-sty">
                            <?php

                            $sql = "select id, title from archive order by id limit 0, 3";
                            $result = mysqli_query($db, $sql);

                            while ($rows = mysqli_fetch_array($result)) {
                                echo "
                                <li>
                                    <a href='view_archive.php?id={$rows['id']}&where=archive' target='_self'>
                                        {$rows['title']}
                                    </a>
                                </li>";
                            }
                            ?>
                        </ol>
                    </div>

                    <div class="padding-4">
                        <h4 class="p-italic">Refer</h4>
                        <ol class="list-sty">
                            <li><a href="https://www.investing.com/" target="_blank">www.investing.com</a></li>
                            <li><a href="https://www.wsj.com/" target="_blank">www.wsj.com</a></li>
                            <li><a href="https://www.bloomberg.com/asia" target="_blank">www.bloomberg.com</a></li>
                        </ol>
                    </div>

                    <div class="padding-4">
                        <nav class="article-blog-post">
                            <a class="btn-v1 btn-primary-1" href="#">Up</a>
                            <a class="btn-v1 btn-primary-2" href="#below-zero">Down</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <div id="below-zero">
    </div>

    <!--
    <footer class="blog-footer-notice" id="below-zero">
        <p>
            Copyright 2021. 김현빈. All rights reserved.
        </p>
    </footer>
    -->

    <script src="./js/index.js"></script>
</body>

</html>