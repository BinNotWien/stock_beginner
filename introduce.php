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
    <title>소개</title>
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
                    <h2>Introduce</h2>
                </div>
                <article class="article-blog-post">

                    <h3 class="article-blog-post-title-2">Main Topic</h3>
                    <hr>
                    <p class="article-blog-post-desc" style="margin-top: 0; font-size: 1.25rem;">
                        주식에 대한 관심을 계기로 만든 블로그로 주로 혼자 주식 공부하며 배웠던 내용을 정리해봤습니다. <br>
                        - 주식의 정의<br>
                        - 주식의 종류<br>
                        - 거시 경제 (인플레이션, 디플레이션, 스태그플레이션)<br>
                        - 주목할 만한 지표 (실업률, 고용지수, 소비자물가지수)<br>
                        <br>
                        사이드 메뉴에 있는 컨텐츠 링크는 상단 메뉴에 있는 아카이브
                        게시판의 내용으로 이어집니다. <br>
                        - 재무제표 지표 (EPS, PER, BPS, PBR) <br>
                        - 파생상품 (선물, 옵션, 스왑) <br>
                        - 포지션 관련 (숏 포지션, 롱 포지션) <br>
                    </p>

                    <h3 class="article-blog-post-title-2">Tech Stack</h3>
                    <hr>
                    <p>
                        <img src="./img/html_icon.png" alt="">
                        <img src="./img/css_icon.png" alt="">
                        <img src="./img/js_icon.png" alt="">
                        <img src="./img/php_icon_130857.png" alt="">
                        <img src="./img/mariadb_icon.png" alt="">
                        <img src="./img/apache_icon.png" alt="">
                        <img src="./img/bitnami_icon.png" alt="">
                        <img src="./img/highcharts_icon.png" alt="">
                        <br>
                    </p>

                    <h3 class="article-blog-post-title-2">PHP</h3>
                    <hr>
                    <p class="article-blog-post-desc" style="font-size: 1.25rem;">
                        - 1995년 라스무스 러도프가 처음 만든 <strong>서버 사이드 스크립트 언어</strong>로 불린다.
                        <br>
                        - <strong>P</strong>ersonal <strong>H</strong>ome <strong>P</strong>age Tools의 약자에서
                        <strong>P</strong>HP:<strong>H</strong>ypertext <strong>P</strong>reprocessor로 의미가 변경되었다.
                        <br>
                        - C언어를 기반으로 개발되었으며 웹상에서 서버를 연동해 실행하는 대표적인 언어이며,
                        인터프리터 방식으로 편리하게 사용 가능한 언어이다.
                        <br>
                        - 주요 OS에서 모두 지원한다 (유닉스/리눅스, 윈도우, macOS)
                        <br>
                        - PHP는 서버에 배포하는게 간편하다. 또한 개인이 간단하게 웹 개발에 필요한 관련 함수들이 내장되어 있어 편리하다.
                        <br>
                        - 2021년 12월 기준 가장 최신 버전은 <strong>PHP 8.1</strong>이다.
                        <br>
                        - 주요 프레임워크로는 라라벨, 심포니가 주로쓰인다.
                    </p>
                    <br>

                    <h3 class="article-blog-post-title-2">MariaDB</h3>
                    <hr>
                    <p class="article-blog-post-desc" style="font-size: 1.25rem;">
                        - 2009년 MySQL의 창업자 중 한 명이자 핵심 개발자였던 <strong>몬티 와이드니어스</strong>가
                        동료들과 함께 회사를 떠나 만든 오픈 소스의 관계형 데이터베이스 관리 시스템(RDBMS)이다.
                        <br>
                        - MariaDB의 Maria는 몬티 와이드니어스의 둘째 딸의 이름을 딴 것이다.
                        <br>
                        - 구현 언어는 <strong>C, C++, Perl, bash</strong>이다.
                        <br>
                        - <strong>GPL v2 라이선스</strong>이며, 독립 실행형 프로그램 및 소프트웨어에 쓸 수 있는
                        컴포넌트는 LGPL 라이선스이다.
                        <br>
                        - 기존의 MySQL을 완벽히 호환되며 모든 클라이언트 API, 프로토콜, 구조가 동일하다.
                        <br>
                        - 당사에서는 MySQL에 비해서 최고 70%의 성능 향상을 보인다고 주장한다.
                        <br>
                        - 2021년 12월 기준 가장 최신 버전은 <strong>MariaDB 10.7.1</strong>이다
                        <br>
                        - 주요 사용자로는 <strong> 위키백과, 구글, 카카오톡, 삼성전자</strong>등이 있다.
                    </p>
                    <br>

                    <h3 class="article-blog-post-title-2">Apache</h3>
                    <hr>
                    <p class="article-blog-post-desc" style="font-size: 1.25rem;">
                        - 아파치 HTTP 서버는 1995년 <strong>아파치 소프트웨어 재단</strong>에서 개발/관리하는 오픈 소스,
                        크로스 플랫폼 HTTP 웹 서버 소프트웨어이다.
                        <br>
                        - 리눅스 + 아파치 + MySQL(MariaDB) + PHP를 사용하여 서버를 운영하는 것을 각각의
                        머릿글자를 따서 <strong>LAMP</strong>라고 부르기도 한다.
                        <br>
                        - 실질적으로 작동하는 웹 사이트들에서 쓰이는 웹 서버 소프트웨어 순위는
                        <strong>아파치(23.92%), NGiNX(20.45%), GWS(9.58%), 클라우드 플레어(9.25%)</strong>
                        순으로 아파치가 가장 많이 쓰인다.
                        <br>
                        - 2021년 12월 기준 가장 최신 버전은 <strong>Apache 2.4.51</strong>이다.
                        <br>
                    </p>
                    <br>

                </article>

            </div>

            <div class="article-md-4">
                <div class="article-sticky-index">
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