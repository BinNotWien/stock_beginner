<?php
header('Content-type: text/html; charset=utf-8');
ini_set('display_errors', '0');

include_once("./connect_db.php");

$id = $_POST['id'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM info WHERE user_id = '{$id}'";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

$row = mysqli_fetch_array($result);
$pwdHashed = $row['user_pwd'];
$row['user_id'];

$pwdResult = password_verify($pwd, $pwdHashed);

if ($pwdResult === true) {
    // 로그인 성공
    // 세선에 ID 저장
    session_start();
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['index'] = $row['index'];
    // print_r($_SESSION);
    // echo $_SESSION['userid'];
?>
<script charset="utf-8">
alert("로그인 성공")
location.href = "../index.php";
</script>
<?php
} else { // 아이디나 비밀번호가 틀림
?>
<script charset="utf-8">
alert("아이디나 비밀번호를 확인하세요.")
location.href = "../login.php";
</script>
<?php
}