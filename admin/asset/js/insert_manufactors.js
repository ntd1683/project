document.getElementById('input_name').onkeydown = function (a){
    if (a.keyCode==13){
        push_button_submit();
    }
};
let check=0;
function push_button_submit(){
    let check_error=false;
    //name
    let input_name=document.getElementById('input_name').value;
    if(input_name.length===0){
        document.getElementById('error-name').innerHTML='*Bắt buộc - không được để trống';
        document.getElementById('span-error-name').style.color= "red";
        document.getElementById('error-name').style.borderColor= "red";
        document.getElementById('error-name').style.backgroundColor= "white";
        document.getElementById('error-name').style.color= "red";
        check_error=true;
    }
    else{
        let regex_name=/^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz](?:(?: |\w|\.|\-)*[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz])*$/;
        if(regex_name.test(input_name)==false){
            document.getElementById('error-name').innerHTML='*Tên không hợp lệ';
            document.getElementById('span-error-name').style.color= "red";
            document.getElementById('error-name').style.borderColor= "red";
            document.getElementById('error-name').style.backgroundColor= "white";
            document.getElementById('error-name').style.color= "red";
            check_error=true;
        }
        else{
            document.getElementById('icon-name').classList.remove("ti-info-alt");
            document.getElementById('icon-name').classList.add("ti-check");
            document.getElementById('span-error-name').style.color= "green";
            if(document.getElementById('error-name')){
                document.getElementById('error-name').remove();
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