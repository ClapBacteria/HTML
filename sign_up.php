<?php

$hostname = "localhost";
$username = "Guitarlist";
$password = "1234";
$database = "Bedroom_Guitarlist";

$conn = new mysqli($hostname, $username, $password, $database);

//회원가입 html 에서 건너온 데이터
$entered_username = $_POST['id'];
$entered_password = $_POST['password'];

// 중복된 사용자명 체크
$check_duplicate_sql = "SELECT * FROM userdata WHERE id='$entered_username'";
$duplicate_result = $conn->query($check_duplicate_sql);

if ($duplicate_result->num_rows > 0) {
    echo "이미 존재하는 아이디 입니다.";
} else {
    // 회원가입 정보 데이터베이스에 저장
    $insert_user_sql = "INSERT INTO userdata (id, password) VALUES ('$entered_username', '$entered_password')";

    if ($conn->query($insert_user_sql) === TRUE) {
        echo "회원가입 성공! 환영합니다.";
    } else {
        echo "Error: 알수없는 오류!" . $insert_user_sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
