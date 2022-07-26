<?php
session_start();
if(!isset($_SESSION['u_email'])){
	echo"<font color='red'><h3><b>unauthorised access to this page</b></h3></font>";
	echo"<script>
function goto(){
	window.location='index.php';
}setInterval(goto,1500);
	</script>";
exit();
}

?>