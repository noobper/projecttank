<?php  
  session_start();
  require_once('./connect/connect.php');
  require_once('head.php');
  require_once('header_bar.php');
?>

<?php
  require_once('script.php');
  $objCon->close();
?>
</body>
</html>
