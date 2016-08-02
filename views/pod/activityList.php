<?php
/* Author @Bouboule (CDA)
* ActivityList is a view to show each activity realized on an entity by someone
* Modification in x-editable, or creation of the entity, added an image
* Improvement: permits a versioning of each modification
*/
$arrayLabel=array(
	"name" => Yii::t("common","the name"),
	"description" => Yii::t("common","the description"),
	"tags" => Yii::t("common","the tags"),
	"type" => Yii::t("common","the type"),
	"address" => Yii::t("common","the city"),
	"address.streetAddress" => Yii::t("common","the street"),
	"address.addressCountry" => Yii::t("common","the country"),
	"geo" => Yii::t("common","the position"),
	"geoPosition" => Yii::t("common","the position"),
	"allDay" => Yii::t("common", "the duration of the event to all day"),
	"startDate" => Yii::t("common", "the start"),
	"endDate" => Yii::t("common", "the end"),
	"event" => Yii::t("common", "the event"),
	"organization" => Yii::t("common", "the organization"),
	"project" => Yii::t("common", "the project"),
	"shortDescription" => Yii::t("common", "the short description"),
	"telephone.fax" => Yii::t("common", "the fax"),
	"telephone.mobile" => Yii::t("common", "the mobile"),
	"telephone.fixe" => Yii::t("common", "the fix"),
	"email" => Yii::t("common", "the email"),
	"url" => Yii::t("common", "the website"),
	"licence" => Yii::t("common", "the licence"),
	"properties.avancement" => Yii::t("common", "the maturity"),
	"isOpenData" => Yii::t("common", "open data"),
	"isOpenEdition" => Yii::t("common", "open edition")
);
if ($contextType == Organization::COLLECTION)
	$contextTypeLabel=Yii::t("common","of the organization");
else if ($contextType == Event::COLLECTION)
	$contextTypeLabel=Yii::t("common","of the event");
else	
	$contextTypeLabel=Yii::t("common","of the project");
$countries= OpenData::getCountriesList();
?>
<div class="col-md-12 col-sm-12 col-xs-12">
	<?php 
		if(count($activities)==0){ ?>
			<div id="infoPodOrga" class="padding-10 info-no-need">
					<blockquote> 
						<?php echo Yii::t("activityList","There is no activity for the moment.<br/>Edit...<br/>To improve the commons informations<br/>To give a better overview of territories' actors and activities<br/>And to liberate your knowledge"); ?>
					</blockquote>
				</div>
	<?php } else{
			foreach($activities as $key => $value){ 
				if($value["verb"]==ActStr::VERB_UPDATE)
					$action = Yii::t("common", "has updated");
				else if($value["verb"]==ActStr::VERB_ADD )
					$action = Yii::t("common", "has added");
				else if($value["verb"]==ActStr::VERB_CREATE)
					$action = Yii::t("common", "has created");
			?>
				<div class='col-md-12 col-sm-12 col-xs-12 padding-10' style="border-bottom: 1px solid lightgrey;">
					<?php echo "<i class='fa fa-clock-o'></i> ".date("d/m/y H:i",$value["date"]->sec)."<br/>".
						"<a href='javascript:;' onclick='loadByHash(\'#person.detail.id.".$value["author"]["id"]."\')>".
							$value["author"]["name"].
						"</a> ".$action.
						" <span style='font-weight:bold;'>".$arrayLabel[$value["object"]["displayName"]]."</span>"." ";
						if ($value["verb"]!=ActStr::VERB_CREATE)
							echo $contextTypeLabel;
						echo ": <span style='color: #21b384;'>";
						if($value["object"]["displayName"]=="address")
							echo $value["object"]["displayValue"]["postalCode"]." ".$value["object"]["displayValue"]["addressLocality"];
						else if($value["object"]["displayName"]=="address.addressCountry"){
							foreach($countries as $country){
								if($country["value"]==$value["object"]["displayValue"])
									echo $country["text"];
							}
						}else if($value["object"]["displayName"]=="telephone.fax" 
									|| $value["object"]["displayName"]=="telephone.mobile" 
										|| $value["object"]["displayName"]=="telephone.fixe"
											|| $value["object"]["displayName"]=="tags"){
							foreach ($value["object"]["displayValue"] as $key => $tel) {
								if($key > 0)
									echo ", ";
								echo $tel;
							}
						}else
							echo Yii::t("common",$value["object"]["displayValue"]);
						
							
						echo "</span>"
					?>
				</div>
			<?php	
			}

		}
	?>
</div>

