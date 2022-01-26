var check_announcement = 0;
function btn_announcement(){
    check_announcement ++;
    if(check_announcement%2!=0){
        document.getElementById('icon_announcement').style.color="rgb(124, 248, 207)";
    }
    else{
        document.getElementById('icon_announcement').style.color="black";
    }
}