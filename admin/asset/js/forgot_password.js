document.getElementById('input_email').onkeydown = function (b){
    if (b.keyCode==13){
        signin();
    }
};
let check=0;
// validate
function signin(){
    let check_error=false;
    // email
    let input_email=document.getElementById('input_email').value;
    if(input_email.length===0){
        console.log(1);
        document.getElementById('span-error-email').innerHTML='*Bắt buộc - không được để trống';
        document.getElementById('span-error-email').style.color= "red";
        document.getElementById('icon-email').style.color= "red";
        document.getElementById('icon-email').style.visibility="visible";
        check_error=true;
    }
    else{
        let regex_email=/^[\w]{4,}(?:\_[\w])*\@\w{3,6}(?:\.\w{2,6})*$/;
        if(regex_email.test(input_email)==false){
            document.getElementById('span-error-email').innerHTML='*Email không hợp lệ';
            document.getElementById('span-error-email').style.color= "red";
            document.getElementById('icon-email').style.color= "red";
            document.getElementById('icon-email').style.visibility="visible";
            check_error=true;
        }
        else{
            document.getElementById('icon-email').classList.remove("ti-info-alt");
            document.getElementById('icon-email').classList.add("ti-check");
            document.getElementById('icon-email').style.color= "green";
            if(document.getElementById('span-error-email')){
                document.getElementById('span-error-email').remove();
                check ++;
                console.log(check);
            }
        }
    }
    if(check===1){
        document.getElementsByTagName("form")[0].setAttribute("onsubmit","return true");
    }

    if(check_error==true){
        return false;
    }
}