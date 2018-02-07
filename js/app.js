$('#droplogin').click(function () {
    setTimeout(function () {
        $('#user_name').focus(); 
    },1);
});

$(document).ready(function() {
    var pathname = window.location.pathname;        
    var urlsplit = pathname.split("/").slice(-1)[0];
    $('a[href="'+urlsplit+'"]').addClass('active');
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