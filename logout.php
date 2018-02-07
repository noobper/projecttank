<?php
	session_start();
	session_regenerate_id();
	session_destroy();
	echo "<script>
			alert('คุณได้ออกจากระบบแล้ว');
			window.history.back();
		</script>";
	
?>