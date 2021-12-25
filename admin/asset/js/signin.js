document.getElementById('input_email').onkeydown = function (b){
    if (b.keyCode==13){
        signin();
    }
};
document.getElementById('input_password').onkeydown = function (c){
    if (c.keyCode==13){
        signin();
    }
};

let check_hidden = 1;
function hidden_password(){
    console.log(2);
    let password = document.getElementById('input_password');
    if(check_hidden % 2 != 0){
        password.setAttribute("type","text");
    }
    else{
        password.setAttribute("type","password");
    }
    check_hidden++;
}

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
    // passsword
    let input_password=document.getElementById('input_password').value;
    if(input_password.length===0){
        document.getElementById('span-error-password').innerHTML='*Mật khẩu không được để trống';
        document.getElementById('span-error-password').style.color= "red";
        document.getElementById('icon-password').style.color= "red";
        document.getElementById('icon-password').style.visibility="visible";
        check_error=true;
    }
    else{
        let regex_password=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if(regex_password.test(input_password)==false){
            document.getElementById('span-error-password').innerHTML='*Mật khẩu yếu,mật khẩu sử dụng trên 8 kí tự có chữ cái in hoa, chữ thường và kí tự đặc biệt';
            document.getElementById('span-error-password').style.color= "red";
            document.getElementById('icon-password').style.color= "red";
            document.getElementById('icon-password').style.visibility="visible";
            check_error=true;
        }
        else{
            document.getElementById('icon-password').classList.remove("ti-info-alt");
            document.getElementById('icon-password').classList.add("ti-check");
            document.getElementById('icon-password').style.color= "green";
            if(document.getElementById('span-error-password')){
                document.getElementById('span-error-password').remove();
                check ++;
                console.log(check);
            }
        }
    }
    if(check===2){
        document.getElementsByTagName("form")[0].setAttribute("onsubmit","return true");
    }

    if(check_error==true){
        return false;
    }
}