<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Data;
use app\models\Mydirectory;
use app\models\UploadForm;
use yii\web\UploadedFile;
  class IndexController extends Controller
  {
   public function actionIndex()
	{
	 $data=Data::find()->all();
     $mydirectory=Mydirectory::find()->all();
	 $count_car=Data::find()->count();
	 $diagram=[];
	  foreach($mydirectory as $my)
	   {     
            $diagram[$my->id]['percent']=round(Data::find()->where(['id_car' => $my->id])->count()/$count_car*100,2);
     	    $diagram[$my->id]['type']=$my->name;
	   } 
	
	 return $this->render('index',['data'=>$data,
	                               'mydirectory'=>$mydirectory,
								   'diagram'=>$diagram,
								   ]);
	}
      public function actionUpdate(){
       $id=isset($_POST['id'])? $_POST['id'] : NULL;   
       $num=isset($_POST['num'])? $_POST['num'] : NULL;
       $type=isset($_POST['type'])? $_POST['type'] : NULL;
       $date=isset($_POST['date'])? $_POST['date'] : NULL;
       $url=isset($_POST['url'])? $_POST['url'] : NULL;  
          
       $data=Data::findOne($id);
       $data->num=$num;
       $data->id_car=$type;
       $data->date=$date;
       $data->url=$url;
          
       if($data->save()){
          $res['id']=$data->id;
          $res['num']=$data->num;
          $res['type']=$data->id_car;
          $res['date']=$data->date;
          $res['url']=$data->url;
           
          $res['code']=1;
          $res['message']='Данные успешно обновлены'; 
       }else{
          $res['code']=0;
          $res['message']='Во время обновления данных произошла ошибка';  
       }
       echo json_encode($res);     
      }
      
      public function actionAdd(){       
       $num=isset($_POST['num'])? $_POST['num'] : NULL;
       $type=isset($_POST['type'])? $_POST['type'] : NULL;
       $date=isset($_POST['date'])? $_POST['date'] : NULL;
       $url=isset($_POST['url'])? $_POST['url'] : NULL;
         
          if($num!=NULL && $type!=NULL && $date!=NULL && $url !=NULL){
              $data = new Data();
              
              $data->num=$num;
              $data->id_car=$type;
              $data->date=$date;
              $data->url=$url;
              
              if($data->save()){
                $res['id']=$data->id;
                $res['num']=$data->num;
                $res['type']=$data->id_car;
                $res['date']=$data->date;
                $res['url']=$data->url; 
                    
                    $res['code']=1;
                    $res['message']='Данные успешно добавлены'; 
               }else{
                    $res['code']=0;
                    $res['message']='Во время добавления данных произошла ошибка';  
               }
                   
          }else{
                    $res['code']=0;
                    $res['message']='Введите все данные';  
          }
          echo json_encode($res);
      }
      
      public function actionDell(){
       $url=isset($_POST['url'])? $_POST['url'] : NULL;
       $id=isset($_POST['id'])? $_POST['id'] : NULL;    
       $data=Data::findOne($id); 
       if($data->delete()){
                    $res['id']=$id;
                    $res['code']=1;
                    $res['message']='Запись успешно удалена'; 
       }else{
                    $res['code']=0;
                    $res['message']='Во время удаления произошла ошибка'; 
       }   
          echo json_encode($res);
      }
      
      public function actionImagesave(){
      /* $file=isset($_FILES['userfile']) ? $_FILES['userfile'] : NULL;*/
      /* $puth="../images";
       //если нет папки с логином то создаем   
       if(!file_exists($puth)){
        mkdir($puth,0700);
       }
      //проверяем пришел ли файл   
      if(!empty($file)){
	     $type=getExtension($_FILES["userfile"]["name"]);
	     $fileName=MD5($_FILES["userfile"]["name"]);
	     $puth.="/".$fileName.".".$type; 
	      if(!file_exists($puth)){
	         move_uploaded_file($_FILES["userfile"]["tmp_name"], "{$puth}");
	         $resData['message']=$_FILES["userfile"]["name"];
	      }else{
	         $resData['message']='Image with name exists';
	      }
	  }else{
	     $resDara['message']='Error upload image';
	  }  */   
   }  
  }
?>