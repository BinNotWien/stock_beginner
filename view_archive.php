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
    <title>주린이</title>
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

                <?php
                include_once("./PHP/connect_db.php");

                $id = $_GET['id'];

                $sql = "select * from archive where id = {$id}";
                $result = mysqli_query($db, $sql);
                $rows = mysqli_fetch_array($result);

                $content = nl2br($rows['content']);

                echo "
                <div class='article-md-8-h'>
                    <h2>{$rows['title']}</h2>
                </div>

                <div class='btn-box-view'>
                    <a href='./nav_archive.php' class='btn-back btn-v1 btn-primary-2'>
                        <<<
                    </a>
                    <a href='./modify.php?id={$id}&where=archive' class='btn-modify-view btn-v1 btn-primary-submit'>
                        Modify
                    </a>
                    <a href='./PHP/delete_pc.php?id={$id}&where=archive' class='btn-delete-view btn-v1 btn-primary-reset'>
                        Delete
                    </a>
                </div>
                <article class='article-blog-post'>";

                if ($rows['file'] != "") {
                    echo "
                <p class='p-file'>
                    <a href='./upload/{$rows['file']}' download>
                    {$rows['file']}
                    </a>
                </p>
                <hr>";
                }

                echo "<p class='p-view'>{$content}</p>";
                echo "
                </article>";

                $sql = "update archive set views = views + 1 where id = {$id}";
                mysqli_query($db, $sql);
                ?>
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