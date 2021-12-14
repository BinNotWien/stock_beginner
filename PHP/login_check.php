<?php
if (!isset($_SESSION['user_id'])) {
?>
<script charset="utf-8">
alert('로그인 후에 이용해 주세요.');
location.href = './login.php';
</script>"
<?php
}
?>