<?php
session_start();
session_destroy();

echo "
<script>
    alert('로그아웃 성공!');
    location.href='index.php';
</script>";
exit;

?>