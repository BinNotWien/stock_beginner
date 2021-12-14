<?php
header('Content-type: text/html; charset=utf-8');

session_start();
include_once("./connect_db.php");


$sql = "DELETE FROM info WHERE info.index = {$_SESSION['index']}";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

$sql = "DELETE FROM notice WHERE author = {$_SESSION['user_id']}";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

$sql = "DELETE FROM archive WHERE author = {$_SESSION['user_id']}";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

if ($result === false) {
?>
<script>
alert("회원탈퇴 실패, 관리자에게 문의하세요.");
location.href = "../index.php"
</script>
<?php
    echo mysqli_error($db);
} else {
    session_destroy()
?>
<script>
alert("회원탈퇴 성공");
location.href = "../index.php"
</script>
<?php
}