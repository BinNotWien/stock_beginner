<?php
header('Content-type: text/html; charset=utf-8');

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

$loc = $_GET['where'];
$id = $_GET['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$modifyDate = date('Y-m-d');
$deleteFile = $_POST['deleteFile'];

$upload_dir = '../upload/';
$fname = $_FILES['uploadfile']['name'];


if ($fname != "") {
    $sql = "select * from {$loc} where id = {$id}";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    unlink('../upload/' . $row['file']);

    $fname_checked = GetUniqFileName($fname, $upload_dir);
    $target_file = $upload_dir . basename($fname_checked);
    move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_file);

    $sql = "update {$loc} set 
        title='{$title}', content='{$content}', date='{$modifyDate}', file='{$fname_checked}'
        where id = {$id} and is_deleted = 0";
    $result = mysqli_query($db, $sql);
} else {
    if ($deleteFile == '1') {
        $sql = "select * from {$loc} where id = {$id}";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
        unlink('../upload/' . $row['file']);

        $sql = "update {$loc} set 
        title='{$title}', content='{$content}', date='{$modifyDate}', file=NULL 
        where id = {$id} and is_deleted = 0";
        $result = mysqli_query($db, $sql);
    } else {
        $sql = "update {$loc} set 
        title='{$title}', content='{$content}', date='{$modifyDate}'
        where id = {$id} and is_deleted = 0";
        $result = mysqli_query($db, $sql);
    }
}


if ($result == false) {
?>
<script>
alert("수정 실패")
location.href = "../nav_<?php echo $loc; ?>.php";
</script>
<?php
    echo $sql . " " . $result;
} else {
?>
<script>
alert("수정 성공")
location.href = "../nav_<?php echo $loc; ?>.php";
</script>
<?php
}