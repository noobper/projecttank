<?php
// If no month/year set, use current month/year
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "lend";
$objCon = new mysqli($serverName,$userName,$userPassword,$dbName);
if(mysqli_connect_errno()){
    echo mysqli_connect_errno();
    exit();
} else {
    mysqli_set_charset($objCon,"utf8");
    
    //echo "connect ok";
}
 $q = $objCon->query('select * from baskets inner join lends on lend_id = lends.id where hw_id = 2');
 while ($r=$q->fetch_assoc()) {
     $out = explode(' ',$r['hw_out']);
     $back = explode(' ',$r['hw_back']);
     $data[] =[
            'id'=> $r['id'],
            'title'=>$r['user_id'],
            'start'=>$out[0].'T'.$out[1],
            'end'=> $back[0].'T'.$back[1]
            
     ];
 }
 $objCon->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='1/fullcalendar.min.css' rel='stylesheet' />
<link href='1/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='1/lib/moment.min.js'></script>
<script src='1/lib/jquery.min.js'></script>
<script src='1/fullcalendar.min.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      defaultDate: '<?=date('Y-m-d'); ?>',
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: <?=json_encode($data); ?>,
      eventsClick: function (event) {
        $.fn.colorbox({href:event.url, iframe:true, width:"60%", height:"75%"});
	return false;
      } /*,
      loading: function(bool) {
          if (bool) $('#loading').show() ;
          else $('#loading').hide();
      }
*/
    });

  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar'></div>

</body>
</html>

