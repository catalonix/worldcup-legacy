<?php 
    $admin_id = $_POST['userId'];
    $admin_pw = $_POST['password'];
    
    session_start();
    
    if($admin_id=='admin' && $admin_pw=='2222'){
        $_SESSION['admin'] = 'admin';
        header("Location:../index.html");
    }else{
        echo '<script>alert("아이디 또는 비밀번호가 정확하지 않습니다.");location.href="../intro.html";</script>';
    }

?>