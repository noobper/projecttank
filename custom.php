<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");
                window.history.back();
             </script>';
    }
    require_once('connect/connect.php');
    require_once('head.php');
    require_once('header_bar.php');
    $sql='select * from tb_producttype';
    $q=$objCon->query($sql);
?>
    <div class="container bg-white">
        <h3>สั่งทำขนาดพิเศษ</h3>
        <div class="col-md-7">
            <b>วิธีที่ 1 สั่งทำผ่านเว็บไซต์</b>
            <table class="unstriped">
               <tr>
                   <td>เลือกประเภท</td>
                   <td>
                       <select name="product_type">
                           <?php while ($r=$q->fetch_assoc()) { ?>
                            <option value="<?=$r['product_type'] ?>"><?=$r['type_name']; ?></option>
                           <?php } ?>
                       </select>
                   </td>
               </tr>
               <tr>
                   <td style="width:200px">
                       <select name="size_type" style="width:auto">
                           <option value="1">เส้นผ่านสูญกลาง (เมตร)</option>
                           <option value="2">ความสูง (เมตร)</option>
                       </select>
                   </td>
                   <td><input type="number" class="text-right"></td>
               </tr>
               <tr>
                   <td>ความจุ (ลิตร)</td>
                   <td><input type="number" class="text-right"></td>
               </tr>
               <tr>
                   <td>รายละเอียด</td>
                   <td><textarea name="detail" rows="6"></textarea></td>
               </tr>
               <tr>
                   <td>เบอร์ติดต่อ</td>
                   <td>
                       <?php 
                            $sql = "select tel from tb_user where user_id = '".$_SESSION['user_id']."' ";
                            $q = $objCon -> query($sql);
                            $r = $q->fetch_assoc();
                        ?>
                        <input type="text" value="<?=$r['tel']; ?>" onkeypress="autoTab(this)" maxlength="12">
                   </td>
               </tr>
               <tr>
                   <td class="text-center" colspan="2"><input type="submit" value="บันทึก" class="button"></td>
               </tr>
           </table>
        </div>
        <div class="col-md-5">
            <label>
                <b>วิธีที่ 2 สั่งทำผ่านเฟสบุ๊ค</b>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FDangthongpool%2F%3Fmodal%3Dadmin_todo_tour&tabs=messages&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </label>
        </div>
    </div>
<?php
    require_once('script.php');
?>
</body>
</html>