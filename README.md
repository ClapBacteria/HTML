<?php

$hostname = "localhost";
$username = "guitarlist";
$password = "1234";
$database = "Bedroom_Guitarlist";

$conn = new mysqli($hostname, $username, $password, $database);
$

// 로그인 폼에서 전송된 데이터
$id = $_POST['id'];
$password = $_POST['password'];

$sql = "SELECT id, password FROM userdata WHERE id='$id' AND password='$password'";
$result = $conn->query($sql);


if (!$result) {
    // 에러 메시지 출력
    echo "에러: " . $conn->error;
} else {
    // 로그인 성공 여부 확인
    if ($result->num_rows > 0) {
        // 사용자 정보가 일치하는 경우
        $_SESSION['id'] = $id; // 세션에 사용자 정보 저장
        echo "로그인 성공! play the rock";
    } else {
        // 사용자 정보가 일치하지 않는 경우
        echo "로그인 실패, 아이디 또는 비밀번호를 확인해주세요.";
    }
}

$conn->close();
?>
