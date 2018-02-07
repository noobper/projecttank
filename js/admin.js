$(document).ready(function() {
        /*
        // check php version
        if (typeof jQuery != 'undefined') {  
            
            alert(jQuery.fn.jquery);
        }
        */
        var pathname = window.location.pathname;        
        var urlsplit = pathname.split("/").slice(-1)[0];
        $('div.list-black > a[href="'+urlsplit+'"]').addClass('active');
        if (urlsplit == 'add_product.php'|| urlsplit == 'edit_product.php') {
            $('div.list-black > a[href="product_view.php"]').addClass('active');
        }
        if (urlsplit == 'order_detail.php'){
            $('div.list-black > a[href="index.php"]').addClass('active');
        }
        if (urlsplit == 'member_detail.php') {
            $('div.list-black > a[href="member_view.php"]').addClass('active');
        }
        if (urlsplit == 'member_install.php') {
            $('div.list-black > a[href="installer_view.php"]').addClass('active');
        }
        if (urlsplit == 'add_blog.php' || urlsplit == 'blog_detail.php') {
            $('div.list-black > a[href="blog_view.php"]').addClass('active');
        }
    });
$('#product_type').change(function () {
    var type = $('#product_type').val();
    if($('#product_type').val()=='05'){
        $('.hidden').removeClass('hidden');
        $('#pump').addClass('hidden');
        $('[name=need_pump]').prop("checked", false);
    }
     else
    {
        
        if (!$('[name=price]').hasClass('hidden')) {
            $('[name=price]').addClass('hidden');
            $('input[name=price]').val('');
            $('#pump').removeClass('hidden');
        }
    } 
       
});
// image preview:
function imagePreview(fileInput) {
    var files = fileInput.files;
    for (var i = 0; i < files.length; i++) {           
        var file = files[i];
        var imageType = /image.*/;     
        if (!file.type.match(imageType)) {
            $('#blog_pic').val('');
            $('#preview').attr("src","../img/pic/no_preview.jpg");
            continue;
        }           
        var img=document.getElementById("preview");            
        img.file = file;    
        var reader = new FileReader();
        reader.onload = (function(aImg) { 
            return function(e) { 
                aImg.src = e.target.result; 
            }; 
        })(img);
        reader.readAsDataURL(file);
    }    
}

function clearImg() {
    var img = $('#img').val();
    $('#blog_pic').val('');    
    $('#preview').attr("src","../img/blog/"+img);
}