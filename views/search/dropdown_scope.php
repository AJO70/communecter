<div class="dropdown dropdown-scope tooltips" data-toggle="tooltip" data-placement="left" title="Sélectionner une commune" alt="Sélectionner une commune">
  <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <!-- <li><a href="#">Action</a></li> -->
    <?php 
		if(isset( Yii::app()->request->cookies['cityName'] )){
			echo '<li>'.
					'<a href="javascript:" class="btn-scope-list text-red homestead" val="'.Yii::app()->request->cookies['cityName'].'">'.
					'<i class="fa fa-angle-down"></i></br>'.
					Yii::app()->request->cookies['cityName'].'</a>'.
				 '</li>';
		}
		if(isset( Yii::app()->request->cookies['HTML5CityName'] )){
			echo '<li>'.
					'<a href="javascript:" class="btn-scope-list text-red homestead" val="'.Yii::app()->request->cookies['HTML5CityName'].'">'.
					'<i class="fa fa-angle-down"></i></br>'.
					Yii::app()->request->cookies['HTML5CityName'].'</a>'.
				 '</li>';
		}
	?>
  </ul>
</div>