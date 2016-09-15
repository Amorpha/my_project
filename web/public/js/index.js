//Сообщение пользователю ошибка/успех
function error_success(type,message){
    var line='<div class="alert alert-'+type+'"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i></button>'+message+'</div>';
    $('.error-success').append(line);
}
//добавление новых записей 
function addNewField(element,data){
    data['type']=$('.form-group').find(".form-type [value="+data['type']+"]").text();
    var str='<div class="row block-content block-content-'+data['id']+'"><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><div class="id">'+data['id']+'</div><div class="url">'+data['url']+'</div></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 num">'+data['num']+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 type">'+data['type']+'</div><div class="type-id">'+data['id_car']+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 date">'+data['date']+'</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><div class="block-edit"><span class="glyphicon glyphicon-pencil edit"  data-toggle="tooltip" data-placement="top" title="Редактировать"></span>  <span class="glyphicon glyphicon-trash dell"  data-toggle="tooltip" data-placement="top" title="Удалить"></span></div></div></div>';
    $(element).append(str);
}
//обновление существующих записей
function updateField(element,data){
    data['type']=$('.form-group').find(".form-type [value="+data['type']+"]").text();
    var blockContent=$(".block-content-"+data['id']);
    $(blockContent).find('.url').text(data['url']);
    $(blockContent).find('.num').text(data['num']);
    $(blockContent).find('.type').text(data['type']);
    $(blockContent).find('.date').text(data['date']);
    var date=$(blockContent).find('.date').text();
}
//удаление записи
function dellField(data){
    var blockContent=$(".block-content-"+data['id']);
    $(blockContent).remove();
}
//Заменяем изображение
function animateImage(image,url){
    $(image).animate({
        opacity:0,    
    },300,function(){
        $(this).attr('src',url);
        $(this).animate({
            opacity:1,
        },300);
    });
}
//Изменяем описание изображения
function changeDataImage(element,data){
    $(element).html('<p><span>Номер вагона : </span>'+data['num']+'<p><span>Вид вагона : </span>'+data['type']+'<p><span>Дата :  </span>'+data['date']);
}
//Редактируем данные формы
function changeDataForm(element,data){
    $(element).find(".form-id").val(data['id']);
    $(element).find(".form-num").val(data['num']);
    if(data['type']){
        $(element).find(".form-type [value="+data['type']+"]").prop('selected', true);
    }
    $(element).find(".form-date").val(data['date']);
    $(element).find(".form-url").val(data['url']);
    $(element).find(".title-label").text(data['message']);
    $(element).find(".command").val(data['command']);
}

/******************************AJAX запросы******************************/
function updateData(data){
   $.ajax({
       type: 'POST',
       url: "/index/update",
       data: data, 
       dataType: 'json',
       success:function (result){
        if(result['code']){
           error_success('success',result['message']);
           updateField('#list-information',result); 
        }else{
           error_success('danger',result['message']); 
        }
       },
   });    
}
function dellData(data){
   $.ajax({
       type: 'POST',
       url: "/index/dell",
       data: data, 
       dataType: 'json',
       success:function (result){
         if(result['code']){
            error_success('success',result['message']); 
            dellField(result);
         }else{
            error_success('danger',result['message']); 
         } 
       },
   });    
}
function addData(data){
   $.ajax({
       type: 'POST',
       url: "/index/add",
       data: data, 
       dataType: 'json',
       success:function (result){
        if(result['code']){
           error_success('success',result['message']); 
           addNewField('#list-information',result);
        }else{
           error_success('danger',result['message']); 
        }   
       },
   });    
}
function saveImage(){
    new AjaxUpload(savefile,{
    action : "/index/imagesave",
    onSubmit: function(file,ext){
                    console.log(file);
	           if(!(ext && /^(jpeg|jpg|JPEG|JPG|png|PNG)$/.test(ext))){
			     return false; 
			   }     
              },
    onComplete: function(file,response){
            		console.log(response);		
				}				 
    });
 } 
/************************************************************************/
//Обрабатываем нажатия на кнопки 
$(document).ready ( function(){
//При нажатии на элемент списка выводим изображение и изменяем описание   
    $('body').on("click",".block-content",function(){
        var url=$(this).find(".url").text();
        animateImage(".image",url);
        var data=[];
        data['num']=$(this).find(".num").text();
        data['type']=$(this).find(".type").text();
        data['date']=$(this).find(".date").text();
        changeDataImage(".data-img",data);
    });
//При нажатии на edit    
    $('body').on("click",".edit",function(){
        var element=$(this).closest(".block-content");
        var data=[];
        data['id']=element.find(".id").text();
        data['url']=element.find(".url").text();
        data['num']=element.find(".num").text();
        data['type']=element.find(".type-id").text();
        data['date']=element.find(".date").text();
        data['message']="Редактировать запись";
        data['command']="update";
        changeDataForm(".form-group",data);
    });
//При нажатии на add
    $('body').on("click",".add-field",function(){        
        var data=[];
        data['id']='';
        data['url']='';
        data['num']='';
        data['date']='';
        data['message']="Добавить новую запись";
        data['command']="add";
        changeDataForm(".form-group",data);
    });
//При нажатии на dell
    $('body').on("click",".dell",function(){
        var element=$(this).closest(".block-content");
        var data={};
        data['id']=element.find(".id").text();
        data['url']=element.find(".url").text();
        dellData(data);
    })
//При нажатии на send
    $('body').on("click",".save",function(){
        var element=$(this).closest(".form-group");
        var command=element.find(".command").val();
        var data={};
        data['id']=element.find(".form-id").val();
        data['num']=element.find(".form-num").val();
        data['type']=element.find(".form-type").val();
        data['date']=element.find(".form-date").val();
        data['url']=element.find("input[type=file]").attr('title');
        var uploadImage=false;
            if(data['url']!="Загрузить"){
               uploadImage=true; 
            }
//Проверки перед отправкой данных       
        if(data['num'][0]!='0'){
            if(data['num'].length==8){
                if(data['date']){
                    if(command=='add'){  
                        if(uploadImage){
                            addData(data);  
                        }else{
                          error_success("warning","Выберите фото"); 
                        }    
                    }else if(command=='update'){
                        updateData(data);    
                    }
                }else{
                    error_success("warning","Выберите дату");
                }
            }else{
                error_success("warning","Номер вагона должен состоять из 8 символов");
            }
        }else{
            error_success("warning","Номер вагона не должен начинаться с 0");
        }
    });
//Запрещаем ввод символов в поле num и date
    $(".form-num").keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
    });
    
    $(".form-date").keypress(function(key) {
        if(key.charCode < 46 || key.charCode > 57 || key.charCode == 47 ) return false;
    });
//Установим для виджета Date русскую локализацию    
  $(function () {
      $('#datetimepicker2').datetimepicker(
          {pickTime: false,language: 'ru'}
          );
  });
//Подключаем bootstrap загрузчик    
      $('input[type=file]').bootstrapFileInput();
      $('.file-inputs').bootstrapFileInput(); 
//Подсказки   
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
});