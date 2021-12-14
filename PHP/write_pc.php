<?php
header('Content-type: text/html; charset=utf-8');
session_start();

include_once("./connect_db.php");

function GetUniqFileName($FN, $PN)
{
        $FileCnt = 0;
        $FileExt = substr(strrchr($FN, "."), 1);
        $FileName = substr($FN, 0, strlen($FN) - strlen($FileExt) - 1);

        $ret = "$FileName.$FileExt";
        while (file_exists($PN . $ret)) {
                $FileCnt++;
                $ret = $FileName . "_" . $FileCnt . "." . $FileExt;
        }

        return ($ret);
}

$upload_dir = '../upload/';
$fname = $_FILES['uploadfile']['name'];

$author = $_SESSION['user_id'];
$title = $_POST['title'];
$content = $_POST['content'];
$creatDate = date('Y-m-d');

if ($fname != "") {
        $fname_checked = GetUniqFileName($fname, $upload_dir);

        $target_file = $upload_dir . basename($fname_checked);
        move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_file);

        $sql = "INSERT INTO notice (title, content, author, date, views, file) 
        VALUES ('$title', '$content', '$author', '$creatDate', 1, '$fname_checked')";
        $result = mysqli_query($db, $sql);
} else {
        $sql = "INSERT INTO notice (title, content, author, date, views) 
        VALUES ('$title', '$content', '$author', '$creatDate', 1)";
        $result = mysqli_query($db, $sql);
}


if ($result) {
?>
<script>
alert("글쓰기 성공");
location.href = "../nav_notice.php";
</script>
<?php
} else {
?>
<script>
alert("글쓰기 실패");
location.href = "../nav_notice.php";
</script>
<?php
}