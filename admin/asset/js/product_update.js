document.getElementById('input_name').onkeydown = function (a){
    if (a.keyCode==13){
        push_button_submit();
    }
};
document.getElementById('input_price').onkeydown = function (c){
    if (c.keyCode==13){
        push_button_submit();
    }
};
document.getElementById('input_discount').onkeydown = function (d){
    if (d.keyCode==13){
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
        let regex_name=/^(?:[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]|[\-\(\) \w\+\%\.])+/;
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
        let include_regex_description=/^[<](?:[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz\w]|[.]|>)*/;
        if(include_regex_description.test(input_description)==false){
            document.getElementById('icon-description').classList.remove("ti-info-alt");
            document.getElementById('icon-description').classList.add("ti-check");
            document.getElementById('span-error-description').style.color= "green";
            if(document.getElementById('error-description')){
                document.getElementById('error-description').remove();
                check ++;
                console.log(check);
            }
        }
        else{
            document.getElementById('error-description').innerHTML='*bạn có xuất hiện kí tự < or >';
            document.getElementById('span-error-description').style.color= "red";
            document.getElementById('error-description').style.borderColor= "red";
            document.getElementById('error-description').style.backgroundColor= "white";
            document.getElementById('error-description').style.color= "red";
            check_error=true;
        }
    }
    // specifications
    let input_specifications=document.getElementById('input_specifications').value;
    if(input_specifications.length===0){
        document.getElementById('error-specifications').innerHTML='*Bắt buộc - không được để trống';
        document.getElementById('span-error-specifications').style.color= "red";
        document.getElementById('error-specifications').style.borderColor= "red";
        document.getElementById('error-specifications').style.backgroundColor= "white";
        document.getElementById('error-specifications').style.color= "red";
        check_error=true;
    }
    else{
        let include_regex_specifications=/^[<](?:[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz\w]|[.]|>)*/;
        if(include_regex_specifications.test(input_specifications)==false){
            document.getElementById('icon-specifications').classList.remove("ti-info-alt");
            document.getElementById('icon-specifications').classList.add("ti-check");
            document.getElementById('span-error-specifications').style.color= "green";
            if(document.getElementById('error-specifications')){
                document.getElementById('error-specifications').remove();
                check ++;
                console.log(check);
            }
        }
        else{
            document.getElementById('error-specifications').innerHTML='*bạn có xuất hiện kí tự < or >';
            document.getElementById('span-error-specifications').style.color= "red";
            document.getElementById('error-specifications').style.borderColor= "red";
            document.getElementById('error-specifications').style.backgroundColor= "white";
            document.getElementById('error-specifications').style.color= "red";
            check_error=true;
        }
    }
    // price
    let input_price=document.getElementById('input_price').value;
    if(input_price.length===0){
        document.getElementById('error-price').innerHTML='*Giá sản phẩm không được để trống';
        document.getElementById('span-error-price').style.color= "red";
        document.getElementById('error-price').style.borderColor= "red";
        document.getElementById('error-price').style.backgroundColor= "white";
        document.getElementById('error-price').style.color= "red";
        check_error=true;
    }
    else{
        document.getElementById('icon-price').classList.remove("ti-info-alt");
        document.getElementById('icon-price').classList.add("ti-check");
        document.getElementById('span-error-price').style.color= "green";
        if(document.getElementById('error-price')){
            document.getElementById('error-price').remove();
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