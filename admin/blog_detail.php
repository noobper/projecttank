<?php
require_once('../connect/connect.php');
require_once('layouts/top.php');
$sql = 'select * from tb_blog where blog_id = "'.$_GET['id'].'"';
$q = $objCon -> query($sql);
if ($r = $q->fetch_assoc()) {
?>
<h3>&emsp;บทความในระบบ</h3>
<form action="save_blog.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="update" value="<?=$r['blog_id']; ?>">
    <dl class="dl-horizontal col-md-10 text-middle">
        <dt>หัวข้อ</dt>
        <dd><input type="text" name="blog_title" class="form-control width-100" value="<?=$r['blog_title'];?>"></dd>
        <dt>รูป</dt>
        <dd>
            <input type="file" name="blog_pic" id="blog_pic" class="form-control" accept="image/*" onchange="imagePreview(this)">
            <a class="btn btn-info" onclick="clearImg()">ยกเลิก</a>
            <br>
            <img id="preview" src="../img/blog/<?=$r['blog_pic']; ?>" class="img-width" alt="image"/>
            <input type="hidden" name="img" id="img" value="<?=$r['blog_pic']; ?>">
        <dt>เนื้อหา</dt>
        <dd>
            <textarea name="blog_body" class="form-control width-100 height-50"><?=$r['blog_body']; ?></textarea>
        </dd>
        <dd>
            &emsp;
            <input type="submit" value="บันทึก" class="btn btn-primary btn-lg"> | 
            <a href="javascript:history.back()" class="btn btn-danger btn-lg">ย้อนกลับ</a>
        </dd>
    </dl>
</form>
<?php
}

require_once('layouts/buttom.php');
?>