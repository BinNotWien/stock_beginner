<!DOCTYPE html>
<?php
session_start();
?>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="school project - index">
    <meta name="author" content="Ta3">
    <title>주린이</title>
    <link rel="shortcut icon" type="image⁄x-icon" href="./img/pabicon.ico">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
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

        <div class="main-p-1">
            <div class="main-h">
                <!--
                <h1 class="main-display-h">For all stock beginners</h1>
                <p class="main-lead-1">
                    The worst thing you can do is invest in companies you know nothing about.
                    Unfortunately, buying stocks on ignorance is still a popular American pastime.
                    <br>
                    <strong>- Peter Lynch</strong>
                    <br>
                    <br>
                    Rule No. 1 is never lose money. <br> Rule No. 2 is never forget Rule No. 1.
                    <br>
                    <strong>- Warren Buffett</strong>
                    <br>
                    <br>
                    Time is your friend, Impulse is your enemy.
                    <br>
                    <strong>- John C. Bogle</strong>

                </p>
                -->
                <div id="container" style="height: 500px;"></div>
                <script>
                Highcharts.chart('container', {

                    title: {
                        text: 'KOSPI / KOSDAQ / NASDAQ / S&P500'
                    },

                    yAxis: {
                        title: {
                            text: 'Annual Average'
                        }
                    },

                    xAxis: {
                        accessibility: {
                            rangeDescription: 'Range: 1990 to 2021'
                        }
                    },

                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            pointStart: 1990
                        }
                    },

                    series: [{
                            name: 'KOSPI',
                            data: [696, 610, 678, 866, 1027, 882, 651, 376, 562, 1028, 504, 693, 627, 810,
                                895, 1379, 1434, 1897, 1124, 1682, 2051, 1826, 1997, 2011, 1915, 1961,
                                2026, 2467, 2041, 2197, 2873, 3050
                            ]
                        }, {
                            name: 'KOSDAQ',
                            data: [0, 0, 0, 0, 0, 0, 0, 972, 751, 2561, 525, 722, 443, 448, 380, 701, 606,
                                704, 332, 513, 511, 500, 496, 499, 542, 682, 631, 798, 675, 669, 968,
                                992
                            ]
                        }, {
                            name: 'NASDAQ',
                            data: [409, 491, 599, 715, 751, 925, 1164, 1469, 1794, 2728, 3783, 2029, 1539,
                                1647, 1986, 2099, 2263, 2578, 2161, 1845, 2349, 2677, 2965, 3541, 4375,
                                4945, 4987, 6235, 7425, 7940, 10201, 14270
                            ]
                        }, {
                            name: 'S&P500',
                            data: [334, 376, 415, 451, 460, 541, 670, 873, 1085, 1327, 1427, 1192, 993, 965,
                                1130, 1207, 1310, 1477, 1220, 948, 1139, 1267, 1379, 1643, 1931, 2061,
                                2094, 2449, 2746, 2913, 3217, 4236
                            ]
                        }
                        /* 
                        {
                            name: 'DJIA',
                            data: [2679, 2929, 3284, 3524, 3794, 4494, 5739, 7447, 8630, 10481, 10729,
                                10199, 9214, 9006, 10315, 10546, 11409, 13178, 11244, 8885, 10668,
                                11957, 12966, 15009, 16777, 17587, 17927, 21750, 25046, 26379, 26890,
                                33907
                            ]
                    }*/
                    ],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });
                </script>

                <p class="main-lead-0">
                    <a href="#target" class="text-white-bold">Continue reading...</a>
                </p>
            </div>
        </div>



        <div class="article" id="target">

            <div class="article-md-8">

                <div class="article-md-8-h"></div>

                <article>
                    <h2 class="article-blog-post-title">What is a stock?</h2>
                    <hr>
                    <p>
                        주식이란 사원인 주주가 주식회사에 출자한 일정한 지분 또는 이를 나타내는 유가증권을 말한다.
                        또한 기업의 자본금에 대한 증서이다. 투자자는 기업에 투자 합으로써 기업에 대한 권리를 부여받는다.
                    </p>
                    <ul>
                        <li>이익배당청구권 <br>- 기업의 이익을 나누어 가질 권리</li>
                        <li>신주인수권<br>- 기존 주주에게 주식 청약할 권리</li>
                        <li>잔여재산분배청구권 <br>- 기업이 청산할 경우 잔여재산을 받을 권리</li>
                        <li>의결권 <br>- 자신의 지분만큼 영향력을 행사할 권리</li>
                    </ul>
                    <p>
                        기업이 증권을 발행하는 가장 큰 이유는 자금 조달이다. <br>
                        지속적인 경영을 위해 투자 활동을 해야 하지만 막대한 투자금을 혼자 부담하기 힘들기에 증권을 발행한다.
                    </p>



                    <h2 class="article-blog-post-title">Types of Stocks</h2>
                    <hr>

                    <h2>보통주 vs 우선주</h2>
                    <p>
                        일반적으로 말하는 주식은 보통주(common stock)를 뜻한다. 주주 평등의 원칙(1주 1의결권)에 따라 의결권이 있으며, 보유한 주식만큼 수익을 배당받습니다. <br>
                        우선주(preferred stock)는 이익배당, 잔여재산 분배에 있어서 우선권을 가지는 주식으로 경영 참가권에는 제한이 있다. <br>
                        <br>
                        우선주는 이익배당우선주가 대표적이며, 보통주보다 1% 정도 높은 배당을 받습니다. <br>
                        일반적으로는 유상증자는 최대 주주의 지분율이 낮아질까 봐 못하는 재무 상태가 부정적인 기업이 우선주를 발행하게 되므로 보통 부정적으로 봐야 한다는 것이 중론이다. <br>
                        또한 보통주보다 우선주는 거래량이 적어 단기적 매매대상으로 적합하지 않다.
                    </p>

                    <h2>액면주 vs 무액면주</h2>
                    <p>
                        액면주는 발행 당시 액면가가 적힌 주식이고, 무액면주는 액면가가 적히지 않은 주식입니다. <br>
                        <br>
                        같은 회사에서 발행된 액면주식의 금액은 같아야 상법상 최소 100원으로 규정하고 있다. <br>
                        <strong>[ 액면가 * 발행주식 수 = 발행주식의 총액 ]</strong> 이라는 공식이 나오게 된다. <br>
                        하지만 주식시세가 액면가보다 떨어지는 경우 주식 추가 발행하기가 어려워진다. <br>
                        <br>
                        그래서 나온 것이 무액면주로 비례주 혹은 부분주라고도 합니다. <br>
                        무액면주는 주식 발행 때 단가를 적지 않고, 전체 자본금의 몇 %에 해당하는지를 지분율 또는 주식 수 형태로만 표시해서 발행합니다. <br>
                        단가가 없으니 시세가 액면가 밑으로 떨어질 일이 없어서, 덕분에 추가 발행을 통해 자본금 늘리기가 편리합니다. <br>
                        <br>
                        무액면주 제도는 2011년 4월 15일부로 도입되었으나 국내에서는 활용하는 기업은 몇 없다. <br>
                        외국에서는 기업이 거금을 마련하거나, 기업 간 합병/분할 때 발행하는 용도로 쓰인 게 시초가 되었다. <br>
                        <br>
                        국내에는 무액면주를 발행하는데 드는 절차가 번거롭기에 활용하는 기업이 많지 않지만, 반대로 말하면 절차적 번거로움까지 감수해가며 무액면주를 발행하려 하는 기업은 무리해서
                        투자금을 유치하려는 의도로 해석 되 부정적으로 본다.
                    </p>

                    <h2>신주 vs 구주</h2>
                    <p>
                        구주는 이미 발행된 주식이며, 신주는 회사가 증자나 합병 등으로 새로이 주식을 발행하여 최초의 결산기가 지나지 않은 주식을 말하는 것이다. <br>
                        수권자본 중에서 아직 발행되지 않은 주식의 범위 내에서는 정관을 변경하지 않고 또 주주총회의 결의 없이 이사회의 결의만으로 언제든지 필요한 수의 신주를 발행할 수 있다.
                        <br>
                        <br>
                        구주는 이미 발행된 주식이고 신주는 회사가 증자나 합병으로 새롭게 발행한 주식입니다.
                        또한, 회사 정관으로 신주의 배당 기산일을 직전 영업연도 말로 소급할 수 있어 신주발행연도의 배당금을 지급할 수 있습니다.
                    </p>

                    <h2>의결권주 vs 무의결권주</h2>
                    <p>
                        의결권주는 주주총회에서 의사결정권을 가지게 되는 주식이다. <br>
                        무의결권주는 회사의 의사결정에 참여할 수 없지만, 보통주보다 배당을 먼저 받거나 많이 받는 주식으로 대표적으로는 이익배당우선주가 있다.
                        <br><br>
                        우리나라의 경우, 보통주는 모두 의결권주가 됩니다. 즉, 1주에 대해 1표의 권리를 누릴 수 있습니다. <br>
                        그러나 무의결권주는 회사경영에 관심이 없으며, 오로지 이익을 받는 데에만 관심이 있는 주식입니다.
                    </p>


                    <h2 class="article-blog-post-title">Inflation? Deflation?</h2>
                    <hr>

                    <h2>인플레이션(Inflation)이란?</h2>
                    <p>
                        일정 기간 물가가 지속적이고 비례적으로 오르는 현상 혹은 통화가치가 지속적이고 비례적으로 떨어지는 현상.
                        간단하게 표현하면 <strong>물가상승과 통화가치 하락</strong>이다.
                        <br>
                        인플레이션의 원인은 무수히 많지만 크게 2가지 경우가 있다.
                    </p>
                    <ul>
                        <li>수요견인 인플레이션 - 늘어난 수요를 공급이 충족하지 못할 때<br>ex) 일본 버블 경제</li>
                        <li>비용인상 인플레이션 - 원자재 혹은 임금 상승으로 최종 재화 가격이 높아질 때<br>ex) 오일 쇼크</li>
                    </ul>
                    <p>
                        인플레이션은 어디까지나 화폐적 현상이기에 화폐 가치가 인플레이션을 판단하는 가장 중요한 지표 중 하나이다. <br>
                        더불어 금리, 소비자물가지수, 환율 등이 대표적인 인플레이션 측정하는 지표들이다. <br>
                        대한민국 기준 인플레이션이 발생하면 일어나는 현상들을 몇 가지 나열해보면
                    </p>
                    <ul>
                        <li>원화 가치의 하락 -> 달러 가격의 상승 / 실물자산의 선호도 증가 -> 금, 부동산 가격 상승 <br> = 부의 양극화는 심해지고 화폐 가치 하락으로 실질 소득이
                            감소한다. </li>
                        <li>국내 상품 가격 상승 -> 수출 감소 / 수입 증가 -> 국제 수지 악화</li>
                        <li>금리의 하락 -> 위험자산 선호도 증가(주식, 비트코인) -> 투자 과열 -> 거품 형성 </li>
                    </ul>
                    <p>
                        2%~3% 정도의 크리핑 인플레이션은 오히려 경기를 좋아지게 만드는 현상도 있다. 주로 제2차 세계대전 이후 선진국에서 일어났다. <br>
                        이유로는 경제적 관점에서 대부분의 사람은 구매자이면서 판매자이기에 물가상승과 소득상승이 같이 일어난다. <br>
                        따라서 실질적인 구매력이 감소하지 않음으로 경기에 좋은 영향을 끼친다.
                        <br> <br>
                        인플레이션 측정에 참고하면 좋은 지표는 다음과 같다.
                    </p>
                    <ul>
                        <li>미국 10년물 국채 금리</li>
                        <li>미국/국내 소비자물가지수(CPI)</li>
                        <li>원자재가격, 국제 유가, 원/달러 환율</li>
                        <li>Fed 의장 연설 & FOMC</li>
                    </ul>

                    <h2>디플레이션(Deflation)이란?</h2>
                    <p>
                        인플레이션과 반대로 물가가 지속해서 하락 혹은 통화가치가 상승하는 현상이다. 간단하게 표현하면 장기적인 수요 감소 및 공급 증가로 인한 불균형이다. <br>
                        디플레이션은 인플레이션보다 발생 빈도가 낮지만, 그 폐해는 파멸적이다. <br>
                        전 세계 경제 관련 인사들이 디플레이션을 최악으로 상정하고 정책을 결정하듯이 중대한 사안이다. <br>
                        극단적인 디플레이션의 예로는 <strong>일본의 잃어버린 20년, 서브프라임 모기지 사태</strong> 등이 있다.
                        <br> <br>
                        인플레이션과 마찬가지로 디플레이션의 원인은 많고 특정 짓기 어렵지만 몇 가지만 짚어 보고자 한다.
                    </p>
                    <ul>
                        <li>정부의 통화정책 실패 - 기준금리 조절, 미국의 금리 인상</li>
                        <li>버블의 붕괴 - 부동산 가격 폭락</li>
                        <li>소비심리 위축 - 전쟁 발발 가능성, 무역전쟁 등 무수히 많다.</li>
                        <li>기술 발전으로 인한 공급증가 - 반도체, 인터넷의 발전</li>
                    </ul>
                    <p>
                        디플레이션은 예측도 어렵고 영향력을 측정도 불가능하며, 동시에 천재지변같이 완전히 예방할 수 없는 현상으로도 본다. <br>
                        따라서 디플레이션의 영향과 작용은 다음과 같다.
                    </p>
                    <ul>
                        <li>소비 침체 -> 기업의 투자감소 -> 고용감소 -> 소득감소 -> 소비 침체 가속화 <br>= 상품의 가격이 지속적으로 떨어진다면 그 누구도 섣불리 사지 않는다.
                        </li>
                        <li>실질 금리 상승 -> 채무 상환 부담 증가 -> 자산 매각 증가 -> 재산 가격 하락 -> 채무 상환 부담 증가 <br>= 임금이 줄어 소득은 감소하지만,
                            <strong>부채는 그대로다.</strong>
                        </li>
                    </ul>
                    <p>
                        이처럼 디플레이션이 발생하면 국가 경제가 전반적으로 침체한다. <br>
                        경제는 혈액순환과 같아 돈의 순환이 원활해야 하는데 디플레이션은 통화가치가 오르니 소비의 매력이 떨어져 침체가 발생한다. <br>
                        <br>
                        옆 나라 일본의 경우 1980년대 일어난 버블 붕괴가 2021년 현재까지도 디플레이션을 겪고 있다. <br>
                        추가적으로는 코로나 사태로 인한 시중에 돈이 많이 풀린 지금 Fed에서 가장 경계하는 것이 디플레이션이다.
                    </p>



                    <h2>스태그플레이션(Stagflation)이란?</h2>
                    <p>
                        불경기(Stagnation)와 인플레이션(Inflation)의 합성어로 인플레이션이나 디플레이션과는 다른 개념이다. <br>
                        경기가 침체하고 있음에도 불구하고 물가가 상승하는 상태를 의미하며, 디플레이션과 더불어 최대 경계 대상이다. <br>
                        <br>
                        일반적인 때 경기상승은 물가하락을 경기하락은 물가안정의 관계지만 스태그플레이션은 <strong>경기하락과 물가상승이 동시에 일어나는 현상</strong>이다. <br>
                        요약하면 <strong>인플레이션 + 경기침체/경제불황 + 물가상승</strong>이라는 복합적인 현상이다. 대표적으로는 오일쇼크와 IMF가 있다. <br>
                        또한, 단기적으로 필립스 곡선에 따르면 실업률과 물가상승은 반비례 관계지만 스태그플레이션은 동시에 증가하기에 무의미했다. <br>
                        <br>
                        그렇다면 스태그플레이션이 일어나는 원인은 무엇일까? 경제학자들은 크게 2가지를 설명했다. <br>
                    </p>
                    <ul>
                        <li>급격한 유가/환율 변동<br>= 생산성은 하락하고 생산은 더 비싸지기에 경제성장을 둔화시킴과 동시에 물가상승</li>
                        <li>확장적 통화정책 + 기대 인플레이션 <br>= 확장적 통화 정책 -> 기대 인플레이션 -> 단기 필립스 곡선의 상향 이동 -> 실업률은 그대로</li>
                    </ul>
                    <p>
                        스태그플레이션이 무서운 이유는 단순히 복합적인 영향이 아닌 해결책이 마땅히 없기 때문이다. <br>
                    </p>
                    <ul>
                        <li>경기 침체 해결을 위한 경기부양책(금리 인하) -> 물가 상승 -> 인플레이션 심화 -> 악순환</li>
                        <li>물가 하락을 위한 통화긴축 정책(금리 상승) -> 대출금리 상승 -> 기업의 원가 비용 상승 -> 소비심리 위축 -> 경기 침체, 물가 상승 -> 악순환</li>
                    </ul>
                    <p>
                        이렇듯 스태그플레이션은 경제 정책에 딜레마를 야기하여 상당한 피해를 준다. 섣불리 경제 정책을 적용하기에도 어렵다.<br>
                        오일쇼크 당시 미국은 21%의 금리를 유지할 정도로 심각한 위기였으며 우리나라 또한 1980년 당시 물가 상승률이 28%, 경제성장률은 -1.7%를 보였다.
                        <br> <br>
                        국내외 정치 상황, 외국가의 금리와 환율 조정, 원윳값 변동 등 여러 요인이 복합적으로 작용하는 스태그플레이션이 나타나면 일반적인 해결책은 사실상 없다. <br>
                        추가로 스태그플레이션이 발생하면 달러 가치의 하락에 따라 금 가격이 상승한다.
                    </p>

                </article>


                <article class="article-blog-post">
                    <h2 class="article-blog-post-title">Economic Indicators</h2>
                    <hr>

                    <h2>소비자물가지수 : CPI(Consumer Price Index)</h2>
                    <p>
                        근원 소비자물가지수라고도 하며 식품 및 에너지를 제외한 상품 및 서비스의 판매가 변동을 측정한 값이다. <br>
                        소비자 시각에서 물가 변동을 측정하며, 구매 동향 및 인플레이션의 변동을 측정하는 중요한 수단이다. <br>

                    </p>

                    <h2>실업률 : Unemployment Rate</h2>
                    <p>
                        실업률은 지난달 실업 상태에 있으며 적극적으로 구직 활동하는 총노동력의 비율을 측정한 값이다. <br>

                    </p>

                    <h2>비농업 고용지수 : Nonfarm Payrolls</h2>
                    <p>
                        비농업 고용지수는 농축산업을 제외한 전월 고용인구 수 변화를 측정한 값이다. <br>
                        일자리 창출은 경제활동의 대부분을 차지하는 소비자지출의 가장 중요한 지표이다.
                    </p>

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