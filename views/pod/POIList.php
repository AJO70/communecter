
	<div class="panel panel-white user-list">
		<div class="panel-heading border-light bg-azure">
			<h4 class="panel-title"><i class="fa fa-map-marker"></i> Points d'intérêt</h4>		
		</div> 
		<div class="panel-tools">
			<a  href="javascript:;" onclick="openForm('poi','subPoi')" 
				class="btn btn-xs btn-default tooltips" data-placement="bottom" 
				data-original-title="<?php echo Yii::t("common","Add") ?>" >
					<i class="fa fa-plus"></i> <?php echo Yii::t("common","Add") ?>
			</a>
		</div>
		<div class="panel-scroll height-230 ps-container">
			<div class="padding-10">
			
				<?php 
				$pois = PHDB::find(Poi::COLLECTION,array("parentId"=>$parentId,"parentType"=>$parentType));
				if(empty($pois)){ ?>
				<div class="padding-10">
					<blockquote class="no-margin">
					<?php echo Yii::t("common","Ajouter des points d'interets à cet élément");  ?>
					</blockquote>
				</div>
			<?php }
			else{
				foreach ($pois as $p) { 
				?>
					<div style="border-bottom:1px solid #ccc">
						<?php 
						
						echo '<a href="javascript:toggle(\'.poi'.InflectorHelper::slugify($p["name"]).'\', \'.poiPanel\')">'.$p["name"].'</a>';
						
						if(@$p["geo"]){?>
						<a href="javascript:showMap(true);"><i class="fa fa-map-marker"></i></a>
						<?php }?>
						
						<div class="padding-10 poiPanel poi<?php echo InflectorHelper::slugify($p["name"])?> hide">

							<?php 
							if(@$p["description"]){ ?>
							<div class=""><?php echo $p["description"] ?></div>
							<?php  }?>

							<?php 
							if(@$p["medias"]){
								echo '<div class="space10"></div>';
							foreach ($p["medias"] as $m) { ?>
								<div class="col-xs-12">
									<div class="col-xs-4">
										<?php if(@$m["content"]["image"]){?>
											<img src="<?php echo @$m["content"]["image"] ?>" class="img-responsive">
										<?php } ?>
									</div>
									<div class="col-xs-8">
										<a class="text-bold" href="<?php echo @$m["content"]["url"] ?>" target="_blank"><?php echo @$m["name"] ?></a><br/>
										<?php echo @$m["description"] ?>
									</div>
								</div>
							<?php } }?>

							<?php 
							if(@$p["tags"]){
								echo '<div class="space10"></div>';
							foreach ($p["tags"] as $t) {  ?>
								<a href="<?php echo $t?>" class="label label-inverse"><?php echo $t?></a> 
							<?php } } ?>
							<div class="space1"></div>
						</div>

					</div>
			<?php
				}
			}?>
			</div>
		</div>
	</div>