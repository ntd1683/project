document.getElementById('input_name').onkeydown = function (a){
    if (a.keyCode==13){
        push_button_submit();
    }
};
document.getElementById('input_phone').onkeydown = function (c){
    if (c.keyCode==13){
        push_button_submit();
    }
};
document.getElementById('input_adress').onkeydown = function (d){
    if (d.keyCode==13){
        push_button_submit();
    }
};
document.getElementById('input_note').onkeydown = function (e){
    if (e.keyCode==13){
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
        let regex_name=/^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*$/;
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
    // phone
    let input_phone=document.getElementById('input_phone').value;
    if(input_phone.length===0){
        document.getElementById('error-phone').innerHTML='*Bắt buộc - không được để trống';
        document.getElementById('span-error-phone').style.color= "red";
        document.getElementById('error-phone').style.borderColor= "red";
        document.getElementById('error-phone').style.backgroundColor= "white";
        document.getElementById('error-phone').style.color= "red";
        check_error=true;
    }
    else{
        let regex_phone=/^\d{10,15}$/;
        if(regex_phone.test(input_phone)==false){
            document.getElementById('error-phone').innerHTML='*Tên không hợp lệ';
            document.getElementById('span-error-phone').style.color= "red";
            document.getElementById('error-phone').style.borderColor= "red";
            document.getElementById('error-phone').style.backgroundColor= "white";
            document.getElementById('error-phone').style.color= "red";
            check_error=true;
        }
        else{
            document.getElementById('icon-phone').classList.remove("ti-info-alt");
            document.getElementById('icon-phone').classList.add("ti-check");
            document.getElementById('span-error-phone').style.color= "green";
            if(document.getElementById('error-phone')){
                document.getElementById('error-phone').remove();
                check ++;
                console.log(check);
            }
        }
    }
    // adress
    let input_adress=document.getElementById('input_adress').value;
    if(input_adress.length===0){
        document.getElementById('error-adress').innerHTML='*Bắt buộc - không được để trống';
        document.getElementById('span-error-adress').style.color= "red";
        document.getElementById('error-adress').style.borderColor= "red";
        document.getElementById('error-adress').style.backgroundColor= "white";
        document.getElementById('error-adress').style.color= "red";
        check_error=true;
    }
    else{
        let regex_adress=/^(?:\d+|[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+|[A-Z]\d+)+(?:[ ,.\*][AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz,.\*]+)*$/;
        if(regex_adress.test(input_adress)==false){
            document.getElementById('error-adress').innerHTML='*Địa chỉ không hợp lệ';
            document.getElementById('span-error-adress').style.color= "red";
            document.getElementById('error-adress').style.borderColor= "red";
            document.getElementById('error-adress').style.backgroundColor= "white";
            document.getElementById('error-adress').style.color= "red";
            check_error=true;
        }
        else{
            document.getElementById('icon-adress').classList.remove("ti-info-alt");
            document.getElementById('icon-adress').classList.add("ti-check");
            document.getElementById('span-error-adress').style.color= "green";
            if(document.getElementById('error-adress')){
                document.getElementById('error-adress').remove();
                check ++;
                console.log(check);
            }
        }
    }
    // note
    let input_note=document.getElementById('input_note').value;
        let regex_note=/^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵzaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz\d]+(?:(?:[ \.\-\'\+\@\,\.\:\(\)\"])|[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵzaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz\d]*)*$/;
        if(regex_note.test(input_note)==false){
        document.getElementById('error-note').innerHTML='*Tên không hợp lệ';
        document.getElementById('span-error-note').style.color= "red";
        document.getElementById('error-note').style.borderColor= "red";
        document.getElementById('error-note').style.backgroundColor= "white";
        document.getElementById('error-note').style.color= "red";
        check_error=true;
    }
    else{
        document.getElementById('icon-note').classList.remove("ti-info-alt");
        document.getElementById('icon-note').classList.add("ti-check");
        document.getElementById('span-error-note').style.color= "green";
        if(document.getElementById('error-note')){
            document.getElementById('error-note').remove();
            check ++;
            console.log(check);
        }
    }

    if(check===4){
        document.getElementsByTagName("form")[0].setAttribute("onsubmit","return true");
    }

    if(check_error==true){
        return false;
    }
}