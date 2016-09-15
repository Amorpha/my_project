<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
$this->title = 'Управление парком подвижного состава';
?>
<script>
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
    var data = google.visualization.arrayToDataTable([
     ['Тип', 'Количество'],
	 <?php foreach($diagram as $key):?>
	 ['<?=$key['type']?>',  <?=$key['percent']?>],
	 <?php endforeach; ?> 
    ]);
    var options = {
     title: 'Род вагонов',
     is3D: true,
     pieResidueSliceLabel: 'Остальное'
    };
    var chart = new google.visualization.PieChart(document.getElementById('car-race'));
     chart.draw(data, options);
   }
  </script>
      <div id="content" class="container">
          <div class="row">
		      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> 
			    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-lg-12 col-md-12 col-sm-10 col-xs-10"> 			  
	            <div class="row block-image">
	              <div class="text-img"><label>Фото вагона</label></div>
			      <img class="image img-responsive" src="" alt="">
			      <div class="data-img"><p><span>Номер вагона : </span><p><span>Род вагона : </span><p><span>Дата :  </span></div>
	            </div>	
			 <div class="row error-success"></div>
 			   <div class="row form">
                <div class="form-group">
				 <div class="row title-block-form">
				 <p><label class="title-label">Добавить новую запись</label></p>
				 </div>
				 <input type="text" class="form-control form-id">
                 <label for="usr">№ вагона:</label>
                 <input type="text" class="form-control form-num" id="usr">
                 <label for="usr">Род вагона:</label>
                 <select class="form-control form-type" id="usr">
				 <?php foreach ($mydirectory as $directoryblock): ?>
                   <option value="<?=$directoryblock->id?>"><?=$directoryblock->name?></option>
				 <?php endforeach; ?> 
                 </select>
                 <label for="usr">Дата поставки на учет:</label> 
                 <div class="input-group date" id="datetimepicker2" >
                  <input type="text" class="form-control form-date" id="usr" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                   </span>
                 </div>
				 <input type="text" class="form-url">
				 <input type="text" class="command" value="add">
                 <label  for="usr">Загрузить изображение:</label>
                 <input type="file" class="form-control" id="savefile" data-filename-placement="inside" title="Загрузить" id="usr">  
                 <button type="button" class="btn btn-default save">Сохранить</button>    
                </div>
               </div>
			  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
				</div>			 
            </div>
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			   <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			     <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" id="list-information">
				
				   	<div class="row" >
			           <div id="car-race"></div>		
		            </div>
			
                    <div class="row block-content-title">
                      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        № вагона
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        Род вагона
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        Дата 
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
				      <span class="glyphicon glyphicon-plus add-field"  data-toggle="tooltip" data-placement="top" title="Добавить новую запись"></span>          
                      </div>
                    </div>  
						<?php foreach ($data as $block): ?>	   
                         <div class="row block-content block-content-<?=$block->id?>">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                 <div class="id "><?=$block->id?></div>
								 <div class="url"><?=$block->url?></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 num"><?= $block->num?></div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 type">
								 <?php foreach ($mydirectory as $directoryblock): ?>	
								    <?php if($directoryblock->id==$block->id_car)
								        echo $directoryblock->name;
								    ?>
								 <?php endforeach; ?>  
								</div>
								<div class="type-id"><?=$block->id_car?></div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 date"><?= $block->date ?></div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><div class="block-edit"><span class="glyphicon glyphicon-pencil edit"  data-toggle="tooltip" data-placement="top" title="Редактировать"></span>  <span class="glyphicon glyphicon-trash dell"  data-toggle="tooltip" data-placement="top" title="Удалить"></span></div>
								</div>
						 </div>
						<?php endforeach;?>     
                </div>
			  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
           </div>
        </div>
      </div>
      <div class="navbar navbar-inverse footer">
          <div class="container">
              <div class="row copyright-block">
                <div class="copyright">© Kalinger Roman 2016 </div>
              </div>
          </div>
      </div>  