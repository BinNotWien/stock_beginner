<?php
header('Content-type: text/html; charset=utf-8');

include_once "./PHP/connect_db.php";

$id = $_GET['id'];
$loc = $_GET['where'];

$sql = "select author from {$loc} where id = {$id}";
$result = mysqli_query($db, $sql);
$rows = mysqli_fetch_array($result);

if ($rows['author'] != $_SESSION['user_id']) {
?>
<script>
alert("작성자만 수정 가능합니다.")
location.href = "./nav_<?php echo $loc; ?>.php";
</script>
<?php
}