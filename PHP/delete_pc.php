<?php
header('Content-type: text/html; charset=utf-8');

session_start();
include_once("./connect_db.php");

$id = $_GET['id'];
$loc = $_GET['where'];

$sql = "select * from {$loc} where id = {$id}";
$result = mysqli_query($db, $sql);
$rows = mysqli_fetch_array($result);

if ($rows['author'] == $_SESSION['user_id']) {

    if ($rows['file']) {
        unlink('../upload/' . $rows['file']);
    }

    $sql = "update {$loc} set is_deleted = 1 where id = {$id}";
    $result = mysqli_query($db, $sql);
    $isDelete = mysqli_affected_rows($db);

    if ($isDelete) {
?>
<script>
alert("삭제 성공");
location.href = "../nav_<?php echo $loc; ?>.php";
</script>
<?php
    } else {
    ?>
<script>
alert("삭제 실패");
location.href = "../nav_<?php echo $loc; ?>.php";
</script>
<?php
    }
} else {
    ?>
<script>
alert("작성자만 삭제 가능합니다.")
location.href = "../nav_<?php echo $loc; ?>.php";
</script>
<?php
}