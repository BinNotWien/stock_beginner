function logout() {
    console.log("bye");
    const data = confirm("로그아웃 하시겠습니까?");
    if (data) {
        location.href = "./PHP/logout.php";
    }
}


function setClock() {
    const time = new Date();
    const hour = modifyNumber(time.getHours());
    const minutes = modifyNumber(time.getMinutes());
    const seconds = modifyNumber(time.getSeconds());
    document.getElementById("h3-clock").innerHTML = hour + ":" + minutes + ":" + seconds;
}
function modifyNumber(_time) {
    if (parseInt(_time) < 10) {
        return "0" + _time;
    }
    else
        return _time;
}
window.onload = function () {
    setClock();
    setInterval(setClock, 1000); //1초마다 setClock 함수 실행
}