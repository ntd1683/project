document.getElementById('input_name').onkeydown = function (a){
    if (a.keyCode==13){
        push_button_submit();
    }
};
document.getElementById('input_description').onkeydown = function (b){
    if (b.keyCode==13){
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
    // description
    let input_description=document.getElementById('input_description').value;
    if(input_description.length===0){
        document.getElementById('error-description').innerHTML='*Bắt buộc - không được để trống';
        document.getElementById('span-error-description').style.color= "red";
        document.getElementById('error-description').style.borderColor= "red";
        document.getElementById('error-description').style.backgroundColor= "white";
        document.getElementById('error-description').style.color= "red";
        check_error=true;
    }
    else{
        let regex_description=/^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵzaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?:(?: |\-|\.)[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵzaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+)+$/;
        if(regex_description.test(input_description)==false){
            document.getElementById('error-description').innerHTML='*description không hợp lệ';
            document.getElementById('span-error-description').style.color= "red";
            document.getElementById('error-description').style.borderColor= "red";
            document.getElementById('error-description').style.backgroundColor= "white";
            document.getElementById('error-description').style.color= "red";
            check_error=true;
        }
        else{
            document.getElementById('icon-description').classList.remove("ti-info-alt");
            document.getElementById('icon-description').classList.add("ti-check");
            document.getElementById('span-error-description').style.color= "green";
            if(document.getElementById('error-description')){
                document.getElementById('error-description').remove();
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