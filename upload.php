<?php
session_start();

// 세션에 사용자 정보가 있는지 확인
if (!isset($_SESSION['username'])) {
    // 로그인이 되어있지 않은 경우 로그인 페이지로 이동
    header("Location: login.html");
    exit();
}

// 영상을 저장할 디렉토리 설정 (웹 루트 디렉토리 내부)
$upload_dir = "uploads/";

// 업로드된 파일의 경로
$upload_file = $upload_dir . basename($_FILES["video"]["name"]);

// 영상 업로드
if (move_uploaded_file($_FILES["video"]["tmp_name"], $upload_file)) {
    echo "Video uploaded successfully!";
} else {
    echo "Error uploading video.";
}
?>
