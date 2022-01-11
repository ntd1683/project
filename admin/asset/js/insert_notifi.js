document.getElementById('input_detail').onkeydown = function (a){
    if (a.keyCode==13){
        push_button_submit();
    }
};
let check=0;
function push_button_submit(){
    let check_error=false;
    //detail
    let input_detail=document.getElementById('input_detail').value;
    if(input_detail.length===0){
        document.getElementById('error-detail').innerHTML='*Bắt buộc - không được để trống';
        document.getElementById('span-error-detail').style.color= "red";
        document.getElementById('error-detail').style.borderColor= "red";
        document.getElementById('error-detail').style.backgroundColor= "white";
        document.getElementById('error-detail').style.color= "red";
        check_error=true;
    }
    else{
        let regex_detail=/^(?:[ AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz\.\\\-\+\*\?\,\'\;\:\"\|\~\`\!\@\$\%\^\&\*\()\_\=\d\/])+$/;
        if(regex_detail.test(input_detail)==false){
            document.getElementById('error-detail').innerHTML='*Có thể tồn tại kí tự < or >';
            document.getElementById('span-error-detail').style.color= "red";
            document.getElementById('error-detail').style.borderColor= "red";
            document.getElementById('error-detail').style.backgroundColor= "white";
            document.getElementById('error-detail').style.color= "red";
            check_error=true;
        }
        else{
            document.getElementById('icon-detail').classList.remove("ti-info-alt");
            document.getElementById('icon-detail').classList.add("ti-check");
            document.getElementById('span-error-detail').style.color= "green";
            if(document.getElementById('error-detail')){
                document.getElementById('error-detail').remove();
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