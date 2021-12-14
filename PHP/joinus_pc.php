<?php
header('Content-type: text/html; charset=utf-8');

include_once("./connect_db.php");

$pwdHashed = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

$sql = "select user_id from info where user_id = '{$_POST['id']}'";
$result = mysqli_query($db, $sql);
$isDuplicate = mysqli_num_rows($result);

if ($isDuplicate > 0) {
?>
<script>
alert("회원가입 실패, 아이디 중복.");
location.href = "../joinus.php"
</script>
<?php
    echo mysqli_error($db);
}

$sql = "
    INSERT INTO info 
    (user_id, user_pwd, email, tel)
    VALUES('{$_POST['id']}', '{$pwdHashed}', 
    '{$_POST['email']}', '{$_POST['tel']}')";
$result = mysqli_query($db, $sql);

if ($result === false) {
?>
<script>
alert("회원가입 실패, 관리자에게 문의하세요.");
location.href = "../login.php"
</script>
<?php
    echo mysqli_error($db);
} else {
?>
<script>
alert("회원가입 성공, 로그인하세요.");
location.href = "../login.php"
</script>
<?php
}