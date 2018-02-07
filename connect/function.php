<script type="text/javascript"> 
function autoTab(obj){ 

var pattern=new String("__-____-____"); 
var pattern_ex=new String("-"); 
var returnText=new String(""); 
var obj_l=obj.value.length; 
var obj_l2=obj_l-1; 
for(i=0;i<pattern.length;i++){ 
if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){ 
returnText+=obj.value+pattern_ex; 
obj.value=returnText; } 
} 
if(obj_l>=pattern.length){ 
obj.value=obj.value.substr(0,pattern.length); } 
} 

function check(){
	/*
	if (document.regform.regpass.value.length < 8) {
		alert("รหัสผ่านขั้นต่ำ 8 ตัวอักษร");
		document.regform.regpass.focus();
		return false;}
	if(document.regform.regpass.value!=document.regform.confirmpass.value){
		alert("กรุณกรอกรหัสผ่านให้ตรงกัน");
		document.regform.confirmpass.focus();
		return false;}
	var regExp = /^[0-9-]*$/;
	if(!regExp.test(document.regform.regtel.value)){
		alert('กรุณากรอกเบอร์โทรศัพท์เป็นตัวเลข'); 
		document.regform.regtel.value = "";
		document.regform.regtel.focus();
		return false;}*/
}

$(document).ready(function() { 
	$("#savereg").click(function(){
		$.ajax({
			type: "POST",
			url: "save_register.php",
			data: $("#regform").serialize(),
			success: function(result) {
				if (result.status == 'ok') {
					alert(result.message);
					window.location.href = "index.php";
				}
				else
				{
					alert(result.message);
					regname.focus();
				}
			}
		});
	});
});

$(document).ready(function() {
  
  $(window).scroll(function () {
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 319) {
      $('#nav_bar').addClass('navbar-fixed-top');
      $('#space_nav').removeClass('hidden');
    }
    if ($(window).scrollTop() < 320) {
      $('#nav_bar').removeClass('navbar-fixed-top');
      $('#space_nav').addClass('hidden');
    }
  });


	$("#loginfrm").submit(function(){ // เมื่อมีการ submit ฟอร์ม ล็อกอิน
        // ส่งข้อมูลไปตรวจสอบที่ไฟล์ check_login.php แบบ post ด้วย ajax
       	$.post("check_login.php",$("#loginfrm").serialize(),function(data){     
        	alert(data.message);   	
            if(data.status==1){ // ตรวจสอบผลลัพธ์
                // ถ้าล็อกอินผ่าน ให้ลิ้งค์ไปที่หน้า main_page.php                
                //window.location='index.php';
                window.location.reload();
            }
            else if (data.status==2) {
            	window.location='./admin/index.php';
            }
            else {
                /// คำสั่งหรือแจ้งเตือนกรณีล็อกอินไม่ผ่าน
                user_pass.focus();
                user_pass.value="";
                //$("#loginfrm")[0].reset();
            }
        });
        return false;
    });
});

function userlogout(){
	session_start();
	session_regenerate_id();
	session_destroy();
	alert('คุณได้ออกจากระบบแล้ว');
	window.location.reload();
}
  



</script> 