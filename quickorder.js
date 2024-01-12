function quickorder_page(tensach, gia,tenchude,anh){
    var page = document.getElementById('quick_order_page');
    var name = document.getElementById('quick_name');
    var price = document.getElementById('quick_price');
    var category = document.getElementById('quick_category');
    var image = document.getElementById('img_product');
    name.innerHTML = tensach;
    price.innerHTML = gia+"đ";
    category.innerHTML = tenchude;
    image.src = anh;
    var bd = document.body;
    bd.style.overflowY = "hidden";
    page.style.display = 'block';
}
function cancel_page(){
    var page = document.getElementById('quick_order_page');
    var bd = document.body;
    bd.style.overflowY = "auto";
    page.style.display = 'none';
    
}
