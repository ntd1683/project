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
function signin(){
        document.getElementById('input_email-error').remove();
        document.getElementById('input_password-error').remove();
}