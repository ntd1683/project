function open_menu_sidebar(){
    document.getElementById('menu-sidebar').style.visibility = "visible";
    document.getElementById('nav').style.left = "16%";
    let container = document.getElementById('container');
    container.style.marginLeft='20%';
    container.style.width='70%';
}
function close_menu_sidebar(){
    document.getElementById('menu-sidebar').style.visibility = "hidden";
    document.getElementById('nav').style.left = "0";
    let container = document.getElementById('container');
    container.style.marginLeft='0';
    container.style.width=''; 
}