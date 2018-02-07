<?php
    require_once('../connect/connect.php');
    require_once('layouts/top.php');
?> 
    <h3>&emsp;เพิ่มบทความ</h3>
    <hr>
    <form action="save_blog.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="new">
        <dl class="dl-horizontal col-md-10 text-middle">
            <dt>หัวข้อ</dt>
            <dd><input type="text" name="blog_title" class="form-control width-100" autofocus></dd>
            <dt>รูป</dt>
            <dd>
                <input type="file" name="blog_pic" id="blog_pic" class="form-control" accept="image/*" onchange="imagePreview(this)" required><br>
                <img id="preview" src="../img/pic/no_preview.jpg" class="img-width" alt="image"/>
            <dt>เนื้อหา</dt>
            <dd>
                <textarea name="blog_body" class="form-control width-100 height-50"></textarea>
            </dd>
            <dd>
                &emsp;
                <input type="submit" value="บันทึก" class="btn btn-primary btn-lg"> | 
                <a href="javascript:history.back()" class="btn btn-danger btn-lg">ย้อนกลับ</a>
            </dd>
        </dl>
    </form>
  

<?php
    require_once('layouts/buttom.php');
?>