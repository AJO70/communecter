<?php 
/*$cssAnsScriptFilesTheme = array(
//X-editable...
'/assets/plugins/x-editable/css/bootstrap-editable.css',
'/assets/plugins/x-editable/js/bootstrap-editable.js',

//DatePicker
'/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js' ,
'/assets/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.fr.js' ,
'/assets/plugins/bootstrap-datepicker/css/datepicker.css',

//DateTime Picker
'/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js' , 
'/assets/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.fr.js' , 
'/assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css',

//Wysihtml5
'/assets/plugins/wysihtml5/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css',
'/assets/plugins/wysihtml5/bootstrap3-wysihtml5/bootstrap3-wysihtml5-editor.css',
'/assets/plugins/wysihtml5/bootstrap3-wysihtml5/wysihtml5x-toolbar.min.js',
'/assets/plugins/wysihtml5/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.js',
'/assets/plugins/wysihtml5/wysihtml5.js',

'/assets/plugins/moment/min/moment.min.js' , 
'/assets/plugins/jquery.qrcode/jquery-qrcode.min.js'
);

HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFilesTheme);*/

/*$cssAnsScriptFilesModule = array(

	'/plugins/jquery.qrcode/jquery-qrcode.min.js'
);
HtmlHelper::registerCssAndScriptsFiles( $cssAnsScriptFilesModule ,Yii::app()->theme->baseUrl."/assets");*/

$cssAnsScriptFilesModule = array(
	'/js/dataHelpers.js',
	'/js/postalCode.js'
);
HtmlHelper::registerCssAndScriptsFiles( $cssAnsScriptFilesModule , $this->module->assetsUrl);
?>
<style>
	.fileupload, .fileupload-preview.thumbnail, 
	.fileupload-new .thumbnail, 
	.fileupload-new .thumbnail img, 
	.fileupload-preview.thumbnail img {
	    width: initial;
	}
	.panelDetails .row{
		margin:0px !important;
	}
	
	.info-shortDescription a{
		font-size:14px;
		font-weight: 300;
	}
	a#shortDescription{
		font-size: 15px !important;
		font-weight: 200;
		/*color: white;*/
	}
	#profil_imgPreview{
      max-height:400px;
      width:100%;
      border-radius: 5px;
      /*border:3px solid #93C020;*/
      /*border-radius:  4px 4px 0px 0px;*/
      margin-bottom:0px;
     

    }

    .titleField{
    	font-weight: 400;
    }

    .entityTitle{
      margin-bottom: 10px;
      border-radius: 0px 0px 4px 4px;
      margin-top: -10px;
      font-weight: 200;
      text-align: left;
    }
	/*.entityTitle{
      background-color: #FFF;
      margin-bottom: 10px;
      border-radius: 0px 0px 4px 4px;
      margin-top: -10px;
      font-weight: 200;
    }*/
    /*.entityTitle h2{
    	font-size: 30px;
    	font-weight: 200;
      	margin:0px !important;
      	text-align: left;
    }*/
    .entityDetails span{
      font-weight: 300;
      font-size:15px;

    }
    .entityDetails{
      padding-bottom:10px;
      margin-bottom:10px;
      border-bottom:0px solid #DDD;
      font-size: 15px;
	  font-weight: 300;
    }
    .entityDetails.bottom{
      /*border-top:1px solid #DDD;*/
      border-bottom:0px solid #DDD;
      padding: 5px;
      margin-top: 10px;
      margin-bottom: -13px;
    }
    .entityDetails i.fa-tag{
      margin-left:10px;
    }
    .entityDetails i.fa{
      margin-right:7px;
      font-size: 17px;
		margin-top: 5px;
    }

    #fileuploadContainer{
    	z-index:0 !important;
    }
    .tag_group{
    	font-size:14px;
    	font-weight: 300;
    }
    .info-coordonnees{
    	/*background-color: rgb(239, 239, 239);*/
    }
    .lbl-info-details{
    	font-weight: 600;
	    border-bottom: 1px solid lightgray;
	    padding-bottom: 7px;
	    margin-bottom: 5px;
	    width:100%;
	    float:left;
	}

    /*.panel-title{
    	font-weight: 200;
    	font-size: 21px;
    	font-family: "homestead";
    }*/

    #telegramAccount {
	    float: left;
		font-size: 13px;
		border-radius: 50px;
		background-color: rgb(43, 176, 198) !important;
		height: 26px;
		text-align: center;
		padding: 4px 10px 8px 7px;
		margin-top: 5px;
		color: white;
		font-weight: 200;
		cursor: pointer;
	}

	 blockquote {
	    margin: 0 0 10px;
	    font-size: 15px;
	    line-height: 1.2;
	}
    .panel-heading{
    	padding: 7px 10px 5px 10px;
		min-height: 25px;
    }
    .panel-title{
    	font-weight: 200;
    	font-size: 15px;
    	/*font-family: "homestead";*/
    }
    .panel-scroll {
	    height: unset !important;
	    min-height:25px;
	}

/*
@media screen and (max-width: 767px) {
	.wysihtml5-toolbar{
		display: none;
	}
}*/

</style>

<div class="panel panel-white">
	<div class="panel-heading border-light padding-15">
		<h4 class="panel-title text-dark"> 
			<i class="fa fa-info-circle"></i> <?php echo Yii::t("common","Account info") ?>
		</h4>
	</div>
	<div id="divBtnDetail" class="panel-tools" >
		<?php if(@Yii::app()->session["userId"]){ ?> 
			<?php if ($edit==true || ($openEdition == true )) { ?>
				<a href="javascript:;" id="editElementDetail" class="btn btn-sm btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title="<?php echo Yii::t(Element::getControlerByCollection($type), 'Edit your informations'); ?>" alt=""><i class="fa fa-pencil"></i><span class="hidden-sm hidden-xs editProfilLbl"> <?php echo Yii::t("common","Edit"); ?> </span></a>
			<?php } ?>

			<?php if($edit==true) { ?>
				<a href="javascript:;" id="editConfidentialityBtn" class="btn btn-sm btn-default tooltips <?php if(@$element['seePreferences'] && $element['seePreferences']==true && $type==Person::COLLECTION) echo 'btn-red'; ?>" data-toggle="tooltip" data-placement="bottom" title="Compléter ou corriger les informations de ce projet" alt=""><i class='fa fa-cog'></i><span class="hidden-xs"> <?php echo Yii::t("common","Paramètres de confidentialité"); ?></span></a>
			<?php } ?>
			
			<?php if ($openEdition==true) { ?>
				<a href="javascript:" id="getHistoryOfActivities" class="btn btn-sm btn-light-blue tooltips" onclick="getHistoryOfActivities('<?php echo $element["_id"] ?>','<?php echo $type ?>');" data-toggle="tooltip" data-placement="bottom" title="<?php echo Yii::t("activityList","See modifications"); ?>" alt=""><i class="fa fa-history"></i><span class="hidden-xs"> <?php echo Yii::t("common","History")?></span></a>
			<?php } ?>
	
			<?php if($type == Person::COLLECTION && $edit==true){ ?>
				<a href='javascript:' id="changePasswordBtn" class='btn btn-sm btn-red tooltips' data-toggle="tooltip" data-placement="bottom" title="Changer votre mot de passe" alt="">
					<i class='fa fa-key'></i> 
					<span class="hidden-sm hidden-xs">
					<?php echo Yii::t("common","Change password"); ?>
					</span>
				</a>
				<a href='javascript:' id="downloadProfil" class='btn btn-sm btn-default tooltips' data-toggle="tooltip" data-placement="bottom" title="Télécharger votre profil" alt="">
					<i class='fa fa-download'></i><span class="hidden-sm hidden-xs"></span>
				</a>
			<?php } ?>
		<?php } ?>
		<a class="btn btn-sm btn-default tooltips" href="javascript:;" onclick="showDefinition('qrCodeContainerCl',true)" data-toggle="tooltip" data-placement="bottom" title='<?php echo Yii::t("common","Show the QRCode for this ".Element::getControlerByCollection($type)); ?>'><i class="fa fa-qrcode"></i> <?php echo Yii::t("common","QR Code") ?></a>
	</div>
	<div id="activityContent" class="panel-body no-padding hide">
		<h2 class="homestead text-dark" style="padding:40px;">
			<i class="fa fa-spin fa-refresh"></i> Chargement des activités ...
		</h2>
	</div>
	<div id="divInformation" class="col-sm-12 col-md-12 padding-15">
		<div class="col-md-12 col-lg-12 col-xs-12 no-padding text-dark lbl-info-details">
			<i class="fa fa-map-marker"></i>  <?php echo Yii::t("common","Information") ?>
		</div>
		<div class="col-md-12">
			<div class="no-padding col-md-12">
				<div id="divName">
					<span class="titleField text-dark"><i class="fa fa-angle-right"></i> <?php echo Yii::t("common", "Name"); ?> :</span>
					<a href="#" id="name" data-type="text" data-original-title="<?php echo Yii::t("person","Enter your name"); ?>" data-emptytext="Enter your name" class="editable-context editable editable-click">
						<?php if(isset($element["name"])) echo $element["name"]; else echo ""; ?>
					</a>
				</div>

				<?php if($type==Person::COLLECTION){ ?>
				<div id="divUserName">
					<!-- <i class="fa fa-smile-o fa_name hidden"></i> -->
					<span class="titleField text-dark"><i class="fa fa-angle-right"></i> <?php echo Yii::t("common", "Username"); ?> :</span>
							
					<a href="#" id="username" data-type="text" data-emptytext="<?php echo Yii::t("person","Username"); ?>"  data-original-title="<?php echo Yii::t("person","Enter your user name"); ?>" class="editable-context editable editable-click">
						<?php if(isset($element["username"]) && ! isset($element["pending"])) echo $element["username"]; else echo "";?>
					</a>
				</div>
				<?php } ?>

				<?php if($type==Organization::COLLECTION || $type==Event::COLLECTION){ ?>
				<div id="divType">
					<!-- <i class="fa fa-smile-o fa_name hidden"></i> -->
					<span class="titleField text-dark"><i class="fa fa-angle-right"></i>  <?php echo Yii::t("common", "Type"); ?> :</span>
					<a href="#" id="type" data-type="select" data-title="Type" data-emptytext="Type" class="editable editable-click required">
						<?php if(isset($element["type"])) echo Yii::t("common", $element["type"]); else echo ""; ?>
					</a>
				</div>
				<?php } ?>


			</div>
		</div>

		<?php if($type==Person::COLLECTION){ ?>
				<div class="socialNetwork col-md-12">
					<div class="col-md-12 no-padding">
						<span class="titleField text-dark"><i class="fa fa-angle-right"></i> <?php echo Yii::t("common","Socials") ?> :</span>
						<a href="#" id="skypeAccount" data-emptytext='<i class="fa fa-skype"></i>' data-type="text" data-original-title="" class="editable editable-click socialIcon">
							<?php if (isset($element["socialNetwork"]["skype"])) echo $element["socialNetwork"]["skype"]; else echo ""; ?>
						</a>
						<?php $facebook =  (!empty($element["socialNetwork"]["facebook"])? $element["socialNetwork"]["facebook"]:"#") ;?>
						<a href="<?php echo $facebook ; ?>" target="_blank" id="facebookAccount" data-emptytext='<i class="fa fa-facebook"></i>' data-type="text" data-original-title="" class="editable editable-click socialIcon">
							<?php echo ($facebook=="#"?"":$facebook) ; ?>
						</a>
						<?php $twitter =  (!empty($element["socialNetwork"]["twitter"])? $element["socialNetwork"]["twitter"]:"#") ;?>
						<a href="<?php echo $twitter ;?>" target="_blank" id="twitterAccount" data-emptytext='<i class="fa fa-twitter"></i>' data-type="text" data-original-title="" class="editable editable-click socialIcon">
							<?php echo ($twitter=="#"?"":$twitter) ; ?>
						</a>
						<?php $googleplus =  (!empty($element["socialNetwork"]["googleplus"])? $element["socialNetwork"]["googleplus"]:"#") ;?>
						<a href="<?php echo $googleplus ;?>" target="_blank" id="gpplusAccount" data-emptytext='<i class="fa fa-google-plus"></i>' data-type="text" data-original-title="" class="editable editable-click socialIcon">
							<?php echo ($googleplus=="#"?"":$googleplus) ; ?>
						</a>
						<?php $github =  (!empty($element["socialNetwork"]["github"])? $element["socialNetwork"]["github"]:"#") ;?>
						<a href="<?php echo $github ;?>" target="_blank" id="gitHubAccount" data-emptytext='<i class="fa fa-github"></i>' data-type="text" data-original-title="" class="editable editable-click socialIcon">
							<?php echo ($github=="#"?"":$github) ; ?>
						</a>
					</div>

					<div class="col-md-12 no-padding">
						<?php if (  (isset($element["socialNetwork"]["telegram"]) && $element["socialNetwork"]["telegram"] != "")
								 || ((string)$element["_id"] == Yii::app()->session["userId"] ))
								 { ?>
							<span class="text-azure pull-left" style="margin:8px 5px 0px 0px;"><i class="fa fa-angle-right"></i> Discuter en privé via :</span>
							<a 	href="<?php if (isset($element["socialNetwork"]["telegram"]) && $element["socialNetwork"]["telegram"] != "") echo $element["socialNetwork"]["telegram"]; else echo ""; ?>" 
								id="telegramAccount" data-emptytext='<i class="fa fa-send"></i> Telegram' 
								data-type="text" 

								<?php if (isset($element["socialNetwork"]["telegram"]) && $element["socialNetwork"]["telegram"] != ""){ ?> 
									<?php if ((string)$element["_id"] == Yii::app()->session["userId"]){ ?> 
										data-original-title="aller sur Telegram" 
									<?php }else{ ?>
										data-original-title="contacter via Telegram" 
									<?php } ?>
								<?php }else{ ?>
										data-original-title="votre pseudo sur Telegram ?" 
									<?php } ?>
								
								data-emptytext='<i class="fa fa-send"></i> Telegram'
								class="editable editable-click socialIcon" 
								<?php if (isset($element["socialNetwork"]["telegram"]) && $element["socialNetwork"]["telegram"] != ""){ ?> 
									target="_blank" 
								<?php } ?>
								>
								<?php if (isset($element["socialNetwork"]["telegram"])) echo $element["socialNetwork"]["telegram"]; else echo ""; ?>
							</a> 
							<a href="javascript:" onclick="" class="pull-right badge-question-telegram tooltips" data-toggle="tooltip" data-placement="right" title="comment ça marche ?" >
							 		<i class="fa fa-question-circle text-dark" style="">
							 		</i>
							</a> 

						<?php }else{ ?>
							<!-- s<div class="badge text-azure pull-right" style="margin-top:5px; margin-right:5px;"><i class="fa fa-ban"></i> <i class="fa fa-send"></i> Telegram</div> -->
							<?php } ?>
					</div>

				</div>
			<?php } ?>
			<!-- class="form-group tag_group no-margin"-->
			<div id="divTags" class="col-md-12 no-padding" >
				<label class="control-label  text-red">
					<i class="fa fa-tags"></i> <?php echo Yii::t("common","Tags") ?> : 
				</label>
				
				<a href="#" id="tags" data-type="select2" data-original-title="Enter tagsList" class="editable editable-click text-red">
					<?php 
						if(isset($element["tags"])){
							$stringTags = "" ;
							foreach ($element["tags"] as $tag) {
								if($stringTags != "")
									$stringTags .= ", ";
								$stringTags .= $tag ;
							}
							echo $stringTags;
						} 
					?>
				</a>
			</div>
	</div>		
	<?php 
	//var_dump($admin);
	//if(!empty($admin) && $admin == true){
	//<!-- class=" col-lg-6 col-md-6 col-sm-6 col-xs-8"--> ?>
	<div class="panel-body border-light panelDetails" id="contentGeneralInfos">	
		<?php if($type==Project::COLLECTION){ ?>
			<div id="divAvancement" class="col-md-12 text-dark no-padding" style="margin-top:10px;">
				<a  href="#" id="avancement" data-type="select" data-title="avancement" 
					data-original-title="<?php echo Yii::t("project","Enter the project's maturity",null,Yii::app()->controller->module->id) ?>" data-emptytext="<?php echo Yii::t("project","Project maturity",null,Yii::app()->controller->module->id) ?>"
					class="entityDetails pull-left">
					<?php if(isset($element["properties"]["avancement"])){ 
						//idea => concept => Started => development => testing => mature
						if($element["properties"]["avancement"]=="idea")
							$val=5;
						else if($element["properties"]["avancement"]=="concept")
							$val=20;
						else if ($element["properties"]["avancement"]== "started")
							$val=40;
						else if ($element["properties"]["avancement"] == "development")
							$val=60;
						else if ($element["properties"]["avancement"] == "testing")
							$val=80;
						else 
							$val=100;
						echo Yii::t("project",$element["properties"]["avancement"],null,Yii::app()->controller->module->id);
					} ?>
				</a>
			</div>
			<?php } ?>
			<?php if($type==Person::COLLECTION && Yii::app()->session["userId"] == (string) $element["_id"]) { ?>
			<div id="divCommunecterMoi" class="col-md-12 text-dark no-padding" style="margin-left:30px;">
				<a href="javascript:;" class="cobtn hidden btn bg-red"><?php echo Yii::t("common", "Connect to your city"); ?></a> 
				<a href="javascript:;" class="whycobtn hidden btn btn-default explainLink" data-id="explainCommunectMe" ><?php echo Yii::t("common", "Why ?"); ?></a>
			</div>
		<?php } ?>

		<?php if($type==Event::COLLECTION || $type==Project::COLLECTION){ ?>
			<div class="col-md-12 col-lg-12 col-xs-12 no-padding" style="padding-right:10px !important;">
				<div class="col-md-12 col-lg-12 col-xs-12 no-padding text-dark lbl-info-details">
					<i class="fa fa-clock-o"></i>  <?php echo Yii::t("common","When") ?> ?
				</div>
				<div class="col-md-12 col-lg-12 col-xs-12 entityDetails no-padding">
					<?php if($type==Event::COLLECTION ) { ?>
					<div class="col-xs-12 no-padding">
						<span><?php echo Yii::t("common","All day") ?> : </span><a href="#" id="allDay" data-type="select" data-emptytext="<?php echo Yii::t("common","All day") ?> ?" class="editable editable-click" ></a>
					</div>
					<?php } ?>
					<div class="col-md-6 col-xs-12 no-padding">
						<span><?php echo Yii::t("common","From") ?> </span><a href="#" id="startDate" data-emptytext="Enter Start Date" class="editable editable-click" ></a>
					</div>
					<div class="col-md-6 col-xs-12 no-padding">
						<span><?php echo Yii::t("common","To") ?> </span><a href="#" id="endDate" data-emptytext="Enter End Date" class="editable editable-click"></a> 
					</div>
				</div>
			</div>
		<?php } ?>

		<div class="text-dark lbl-info-details margin-top-10 <?php if($type==Event::COLLECTION){ ?>no-padding<?php } ?>">
			<?php if($type==Event::COLLECTION){?>
				<i class="fa fa-map-marker"></i> <?php echo Yii::t("common","Where"); ?> ? 
			<?php }else{ ?>
				<i class="fa fa-angle-down"></i> <?php echo Yii::t("common","Contact information"); ?>
			<?php } ?>
		</div>
		<div class="row info-coordonnees entityDetails text-dark" style="margin-top: 10px !important;">
			<div class="col-md-6 col-sm-6  no-padding">
				<?php if( ($type == Person::COLLECTION && Preference::showPreference($element, $type, "locality", Yii::app()->session["userId"])) ||  $type!=Person::COLLECTION) { ?>
				
				
				<div class="col-xs-12 no-padding">
					<i class="fa fa-road fa_streetAddress"></i> 
					<span id="detailStreetAddress">
						<?php echo (isset( $element["address"]["streetAddress"])) ? $element["address"]["streetAddress"] : null; ?>
						<?php //echo Element::showField("address.streetAddress",$element, $isLinked);?>
					</span>
					<br/>
					<i class="fa fa-bullseye fa_postalCode"></i> 
					<span id="detailCity">	
						<?php echo (isset( $element["address"]["addressLocality"])) ? $element["address"]["addressLocality"] : null; ?>,
						<?php echo (isset( $element["address"]["postalCode"])) ? $element["address"]["postalCode"] : null; ?>
					</span>
					<br/>
					<i class="fa fa-globe fa_addressCountry"></i> 
					<span id="detailCountry">
						<?php echo (isset( $element["address"]["addressCountry"])) ? $element["address"]["addressCountry"] : null; ?>

					</span>
				</div>
				<div class="col-xs-12 no-padding">
					
				</div>
				<?php } ?>
				<br>
				<?php 
						$address = ( @$element["address"]["streetAddress"]) ? $element["address"]["streetAddress"] : "";
						$address2 = ( @$element["address"]["postalCode"]) ? $element["address"]["postalCode"] : "";
						$address2 .= ( @$element["address"]["addressCountry"]) ? ", ".OpenData::$phCountries[ $element["address"]["addressCountry"] ] : "";
						

						$tel = "";
						if( @$element["telephone"]["fixe"]){
							foreach ($element["telephone"]["fixe"] as $key => $num) {
								$tel .= ($tel != "") ? ", ".$num : $num;
							}
						}
						if( @$element["telephone"]["mobile"]){
							foreach ($element["telephone"]["mobile"] as $key => $num) {
								$tel .= ($tel != "") ? ", ".$num : $num;
							}
						}


						$this->renderPartial('../pod/qrcode',array(
																"type" => @$element['type'],
																"name" => @$element['name'],
																"address" => $address,
																"address2" => $address2,
																"email" => @$element['email'],
																"url" => @$element["url"],
																"tel" => $tel,
																"img"=>@$element['profilThumbImageUrl']));
				?>
				<a href="javascript:" id="btn-view-map" class="btn btn-primary btn-sm col-xs-6" style="margin: 10px 0px;">
					<i class="fa fa-map-marker" style="margin:0px !important;"></i> <?php echo Yii::t("common","Show map"); ?>
				</a>
				<a href="javascript:" id="btn-update-geopos" class="btn btn-danger btn-sm hidden col-xs-6" style="margin: 10px 0px;">
					<i class="fa fa-map-marker" style="margin:0px !important;"></i> <?php echo Yii::t("common","Update Locality"); ?>
				</a>
				<?php 
					$roles = Role::getRolesUserId(Yii::app()->session["userId"]);
					if(@$roles["superAdmin"] == true){
						?>
							<a href="javascript:" id="btn-update-geopos-admin" class="btn btn-danger btn-sm" style="margin: 10px 0px;">
								<i class="fa fa-map-marker" style="margin:0px !important;"></i> Repositionner Admin
							</a>
						<?php
					}
				?>
			</div>
			<?php if($type != Event::COLLECTION){ ?>
			<div class="col-md-6 col-sm-6">
				<?php if($type==Person::COLLECTION){
					if(Preference::showPreference($element, $type, "birthDate", Yii::app()->session["userId"])){ ?>
						<i class="fa fa-birthday-cake fa_birthDate hidden"></i> 
						<a href="#" id="birthDate" data-type="date" data-title="<?php echo Yii::t("person","Birth date"); ?>" data-emptytext="<?php echo Yii::t("person","Birth date"); ?>" class="">
							<?php echo (isset($element["birthDate"])) ? date("d/m/Y", strtotime($element["birthDate"]))  : null; ?>
						</a>
						<br>
					<?php } 
				} ?>
				<?php 
					//if ($type==Organization::COLLECTION || $type==Person::COLLECTION){ 
						if(($type==Person::COLLECTION && Preference::showPreference($element, $type, "email", Yii::app()->session["userId"])) || $type!=Person::COLLECTION){ ?>
							<i class="fa fa-envelope fa_email  hidden"></i> 
							<a href="#" id="email" data-type="text" data-title="Email" data-emptytext="Email" class="editable-context editable editable-click required">
								<?php echo (isset($element["email"])) ? $element["email"] : null; ?>
							</a>
							<br>
				<?php 	} 
					//} ?>

				<?php //If there is no http:// in the url
				$scheme = "";
				if(isset($element["url"])){
					if (!preg_match("~^(?:f|ht)tps?://~i", $element["url"])) $scheme = 'http://';
				}?>
				
				<i class="fa fa-desktop fa_url hidden"></i> 
				<a href="<?php echo (isset($element["url"])) ? $scheme.$element['url'] : '#'; ?>" target="_blank" id="url" data-type="text" data-title="<?php echo Yii::t("common","Website URL") ?>" 
					data-emptytext="<?php echo Yii::t("common","Website URL") ?>" style="cursor:pointer;" class="editable-context editable editable-click">
					<?php echo (isset($element["url"])) ? $element["url"] : null; ?>
				</a> 
				<br>
				<?php if($type==Project::COLLECTION){ ?>
				<i class="fa fa-file-text-o"></i>
				<a href="#" id="licence" data-type="text" data-original-title="<?php echo Yii::t("project","Enter the project's licence",null,Yii::app()->controller->module->id) ?>" data-emptytext="<?php echo Yii::t("common","Project licence") ?>" class="editable-context editable editable-click"><?php if(isset($element["licence"])) echo $element["licence"];?></a><br>
				<?php } ?>

				<?php  if($type==Organization::COLLECTION || $type==Person::COLLECTION){ ?>
					<i class="fa fa-phone fa_telephone hidden"></i>
					<a href="#" id="fixe" data-type="text" data-title="<?php echo Yii::t("person","Phone"); ?>" data-emptytext="<?php echo Yii::t("person","Phone"); ?>" class="telephone editable editable-click">
						<?php 
							if(isset($element["telephone"]["fixe"])){
								foreach ($element["telephone"]["fixe"] as $key => $tel) {
									if($key > 0)
										echo ", ";
									echo $tel;
								}
							}
						?>
					</a>
					<br>

					<i class="fa fa-mobile fa_telephone_mobile hidden"></i>
					<a href="#" id="mobile" data-type="text" data-emptytext="<?php echo Yii::t("person","Mobile"); ?>" data-title="<?php echo Yii::t("person","Enter your mobiles"); ?>" class="telephone editable editable-click">
						<?php if(isset($element["telephone"]["mobile"])){
							foreach ($element["telephone"]["mobile"] as $key => $tel) {
								if($key > 0)
									echo ", ";
								echo $tel;
							}
						} ?>
					</a>
					<br>

					<i class="fa fa-fax fa_telephone_fax hidden"></i> 
					<a href="#" id="fax" data-type="text" data-emptytext="<?php echo Yii::t("person","Fax"); ?>" data-title="<?php echo Yii::t("person","Enter your fax"); ?>" class="telephone editable editable-click">
						<?php if(isset($element["telephone"]["fax"])){
							foreach ($element["telephone"]["fax"] as $key => $tel) {
								if($key > 0)
									echo ", ";
								echo $tel;
							}
						} ?>
					</a>
					<br>
				<?php } ?>	
			</div>	
			<?php } ?>		
		</div>

		<?php if($type == Event::COLLECTION && @$organizer["type"]){ ?>
		
			<div class="col-sm-12 no-padding text-dark lbl-info-details">
				<i class="fa fa-angle-down"></i> <?php echo Yii::t("common","Organisateur") ?>
			</div>
			<div class="col-sm-12 entityDetails item_map_list">
				<?php
				if(@$organizer["type"]=="project"){ 
					 echo Yii::t("event","By the project",null,Yii::app()->controller->module->id);
					 $icon="fa-lightbulb-o";
				} else if(@$organizer["type"]=="organization"){
					 	$icon="fa-users";
				} else {
					 	$icon="fa-user";
				}

				$img = '';//'<i class="fa '.$icon.' fa-3x"></i> ';
				if ($organizer && !empty($organizer["profilThumbImageUrl"])){ 
					$img = '<img class="thumbnail-profil" width="50" height="50" alt="image" src="'.Yii::app()->createUrl('/'.$organizer['profilThumbImageUrl']).'">';
				}else{
					if(!empty($organizer["profilImageUrl"]))
						$img = '<img class="thumbnail-profil" width="75" height="75" alt="image" src="'.Yii::app()->createUrl('/communecter/document/resized/50x50'.$organizer['profilImageUrl']).'">';
					else
						$img = "<div class='thumbnail-profil'></div>";
				}
				$color = "";
				if($icon == "fa-users") $color = "green";
				if($icon == "fa-user") $color = "yellow";
				if($icon == "fa-lightbulb-o") $color = "purple";
				$flag = '<div class="ico-type-account"><i class="fa '.$icon.' fa-'.$color.'"></i></div>';
					echo '<div class="imgDiv left-col" style="padding-right: 10px;width: 75px;">'.$img.$flag.'</div>';
				 ?> <a href="javascript:;" onclick="loadByHash('#<?php echo @$organizer["type"]; ?>.detail.id.<?php echo @$organizer["id"]; ?>')"><?php echo @$organizer["name"]; ?></a><br/>
				<span><?php echo ucfirst(Yii::t("common", @$organizer["type"])); if (@$organizer["type"]=="organization") echo " - ".Yii::t("common", $organizer["typeOrga"]); ?></span>
			</div>
		<?php } ?>
		<div id="divShortDescription" class="col-xs-12 col-md-12 no-padding">
			<div class="text-dark lbl-info-details"><i class="fa fa-angle-down"></i> 
			<?php echo Yii::t("common","Short description",null,Yii::app()->controller->module->id); ?></div>
			<a href="#" id="shortDescription" data-type="wysihtml5" data-original-title="<?php echo Yii::t("project","Write the project's short description",null,Yii::app()->controller->module->id) ?>" data-emptytext="<?php echo Yii::t("common","Short description",null,Yii::app()->controller->module->id); ?>" class="editable editable-click">
				<?php echo (!empty($element["shortDescription"])) ? $element["shortDescription"] : ""; ?>
			</a>	
			
		</div>

		<div class="col-xs-12 col-md-12 no-padding margin-top-10">
			<div class="text-dark lbl-info-details"><i class="fa fa-angle-down"></i> Description</div>
				<a href="#" id="description" data-type="wysihtml5" data-original-title="<?php echo Yii::t("project","Enter the project's description",null,Yii::app()->controller->module->id) ?>" data-emptytext="<?php echo Yii::t("common","Description") ?>" class="editable editable-click">
					<?php  echo (!empty($element["description"])) ? $element["description"] : ""; ?>
				</a>	
		</div>
	</div>
</div>

<?php
$showOdesc = true ;
if(Person::COLLECTION == $type)
	$showOdesc = ((Preference::isOpenData($element["preferences"]) && Preference::isPublic($element, "streetAddress"))?true:false);
?>

<script type="text/javascript">

	var contextControler = <?php echo json_encode(Element::getControlerByCollection($type))?> ;
	var contextData = {
		name : "<?php echo $element["name"] ?>",
		id : "<?php echo (string)$element["_id"] ?>",
		type : "<?php echo $type ?>",
		otags : "<?php echo addslashes($element["name"]).",".$type.",communecter,".@$element["type"].",".@implode(",", $element["tags"]) ?>",
		geo : <?php echo json_encode(@$element["geo"]) ?>,
		geoPosition : <?php echo json_encode(@$element["geoPosition"]) ?>,
		address : <?php echo json_encode(@$element["address"]) ?>
	};	

	var showOdesc = "<?php echo $showOdesc ?>";
	if(showOdesc == "true"){
		if(contextData.type == "<?php echo Person::COLLECTION; ?>")
			contextData.odesc = contextControler+" : <?php echo addslashes( strip_tags(json_encode(@$element["shortDescription"]))).",".addslashes(json_encode(@$element["address"]["streetAddress"])).",".@$element["address"]["postalCode"].",".@$element["address"]["addressLocality"].",".@$element["address"]["addressCountry"] ?>";
		else if(contextData.type == "<?php echo Organization::COLLECTION; ?>")
			contextData.odesc = contextControler+" : <?php echo @$element["type"].", ".addslashes( strip_tags(json_encode(@$element["shortDescription"]))).",".addslashes(json_encode(@$element["address"]["streetAddress"])).",".@$element["address"]["postalCode"].",".@$element["address"]["addressLocality"].",".@$element["address"]["addressCountry"] ?>";
		else if(contextData.type == "<?php echo Event::COLLECTION; ?>")
			contextData.odesc = contextControler+ ": <?php echo @$element["startDate"] ?> <?php echo @$element["endDate"].",".@$element["address"]["streetAddress"] ?> <?php echo @$element["address"]["postalCode"].",". @$element["address"]["addressLocality"].",".@$element["address"]["addressCountry"].",".addslashes(strip_tags(json_encode(@$element["shortDescription"]))) ?>";
		else if(contextData.type == "<?php echo Project::COLLECTION; ?>")
			contextData.odesc = contextControler+" : <?php echo addslashes( strip_tags(json_encode(@$element["shortDescription"]))).",".addslashes(json_encode(@$element["address"]["streetAddress"])).",".@$element["address"]["postalCode"].",".@$element["address"]["addressLocality"].",".@$element["address"]["addressCountry"] ?>";
	}
		
	var emptyAddress = $.isEmptyObject(contextData.address);
	var mode = "view";
	var types = <?php echo json_encode($elementTypes) ?>;
	var countries = <?php echo json_encode($countries) ?>;
	var startDate = '<?php if(isset($element["startDate"])) echo $element["startDate"]; else echo ""; ?>';
	var endDate = '<?php if(isset($element["endDate"])) echo $element["endDate"]; else echo "" ?>';
	var allDay = '<?php echo (@$element["allDay"] == true) ? "true" : "false"; ?>';
	var edit = '<?php echo (@$edit == true) ? "true" : "false"; ?>';
	var modeEdit = '<?php echo (@$modeEdit == true) ? "true" : "false"; ?>';
	var birthDate = '<?php echo (isset($person["birthDate"])) ? $person["birthDate"] : null; ?>';
	var NGOCategoriesList = <?php echo json_encode($NGOCategories) ?>;
	var localBusinessCategoriesList = <?php echo json_encode($localBusinessCategories) ?>;
	var seePreferences = '<?php echo (@$element["seePreferences"] == true) ? "true" : "false"; ?>';


	var color = '<?php echo Element::getColorIcon($type); ?>';
	var icon = '<?php echo Element::getFaIcon($type); ?>';
	//var tags = <?php echo json_encode($tags)?>;

	//var contentKeyBase = "<?php echo isset($contentKeyBase) ? $contentKeyBase : ""; ?>";
	//By default : view mode
	//var images = <?php echo json_encode($images) ?>;
	
	//var publics = <?php echo json_encode($publics) ?>;

	jQuery(document).ready(function() {

		manageModeContextElement();
		changeHiddenIconeElement(true);
		manageDivEditElement();
		setTitle( "<?php echo addslashes($element["name"]) ?>" , "<i class='fa fa-circle text-"+color+"'></i> <i class='fa fa-"+icon+"'></i>" ,null,contextData.otags, contextData.odesc);

		bindAboutPodElement();
		activateEditableContext();
		manageAllDayElement(allDay);

		$("#btn-update-geopos").off().on( "click", function(){
			console.log("btn-update-geopos");
			$("#ajax-modal").modal("hide");
			showMap(true);
			if(typeof updateLocality != "undefined"){ updateLocality(contextData.address, contextData.geo); }
		});

		$("#btn-update-geopos-admin").click(function(){
			findGeoPosByAddress();
		});

		$("#btn-view-map").click(function(){
			showMap(true);
		});

		buildQRCode(contextControler,contextData.id);

		$(".toggle-tag-dropdown").click(function(){ console.log("toogle");
			if(!$("#dropdown-content-multi-tag").hasClass('open'))
			setTimeout(function(){ $("#dropdown-content-multi-tag").addClass('open'); }, 300);
			$("#dropdown-content-multi-tag").addClass('open');
		});
		$(".toggle-scope-dropdown").click(function(){ console.log("toogle");
			if(!$("#dropdown-content-multi-scope").hasClass('open'))
			setTimeout(function(){ $("#dropdown-content-multi-scope").addClass('open'); }, 300);
		});

		if(emptyAddress){
			$(".cobtn,.whycobtn").removeClass("hidden");
			$(".cobtn").click(function () { 
				$(".cobtn,.whycobtn").hide();
				$('#editElementDetail').trigger('click');
				setTimeout( function () { 
					$('#address').trigger('click'); 
					}, 500);
				return false;
			});
			console.log("modeEdit",modeEdit);
			if(modeEdit == "true"){
				switchModeElement();
			}
		}
	});

	function bindAboutPodElement() {
		$("#editGeoPosition").click(function(){
			Sig.startModifyGeoposition(contextData.id, "<?php echo $type ?>", contextData);
			showMap(true);
		});

		$("#editElementDetail").on("click", function(){
				switchModeElement();
		});

		$("#changePasswordBtn").click(function () {
			console.log("changePasswordbuttton");
			loadByHash('#person.changepassword.id.'+userId+'.mode.initSV', false);
		});

		$("#downloadProfil").click(function () {
			$.ajax({
				url: baseUrl + "/communecter/data/get/type/citoyens/id/"+contextData.id ,
				type: 'POST',
				dataType: 'json',
				async:false,
				crossDomain:true,
				complete: function () {},
				success: function (obj){
					console.log("obj", obj);
					$("<a/>", {
					    "download": "profil.json",
					    "href" : "data:application/json," + encodeURIComponent(JSON.stringify(obj))
					  }).appendTo("body")
					  .click(function() {
					    $(this).remove()
					  })[0].click() ;
				},
				error: function (error) {
					
				}
			});
		});

	    $(".confidentialitySettings").click(function(){
	    	param = new Object;
	    	param.type = $(this).attr("type");
	    	param.value = $(this).attr("value");
	    	param.typeEntity = "<?php echo $type; ?>";
	    	param.idEntity = contextData.id;
			$.ajax({
		        type: "POST",
		        url: baseUrl+"/"+moduleId+"/element/updatesettings",
		        data: param,
		       	dataType: "json",
		    	success: function(data){
			    	toastr.success(data.msg);
			    }
			});
		});

		$("#editConfidentialityBtn").on("click", function(){
	    	console.log("confidentiality", seePreferences);
	    	$("#modal-confidentiality").modal("show");
	    	if(seePreferences=="true"){
	    		param = new Object;
		    	param.name = "seePreferences";
		    	param.value = false;
		    	param.pk = contextData.id;
				$.ajax({
			        type: "POST",
			        url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,
			        data: param,
			       	dataType: "json",
			    	success: function(data){
				    	//toastr.success(data.msg);
				    	if(data.result){
							$("#divSeePreferencesHeader").addClass("hidden");
							$('#editConfidentialityBtn').removeClass("btn-red");
				    	}
				    }
				});
	    	}
	    	
	    });

		$(".panel-btn-confidentiality .btn").click(function(){
			var type = $(this).attr("type");
			var value = $(this).attr("value");
			$(".btn-group-"+type + " .btn").removeClass("active");
			$(this).addClass("active");
		});


	}

	function switchModeElement() {
		console.log("-------------"+mode);
		if(mode == "view"){
			mode = "update";
			$(".editProfilLbl").html(" Enregistrer les changements");
			$("#editElementDetail").addClass("btn-red");
			$(".cobtn,.whycobtn,.cobtnHeader,.whycobtnHeader").addClass("hidden");
		}else{
			mode ="view";
			$(".editProfilLbl").html(" Éditer");
			$("#editElementDetail").removeClass("btn-red");
			if(emptyAddress)
				$(".cobtn,.whycobtn,.cobtnHeader,.whycobtnHeader").removeClass("hidden");

		}
		manageModeContextElement();
		changeHiddenIconeElement(false);
		manageDivEditElement();
	}

	function manageModeContextElement() {
		console.log("-----------------manageModeContextElement----------------------", mode);
		listXeditables = [	'#birthDate', '#description', '#shortDescription', '#fax', '#fixe', '#mobile', 
							'#tags', '#facebookAccount', '#twitterAccount',
							'#gpplusAccount', '#gitHubAccount', '#skypeAccount', '#telegramAccount', 
							'#avancement', '#allDay', '#startDate', '#endDate', '#type'];
		if (mode == "view") {
			$('.editable-context').editable('toggleDisabled');
			$.each(listXeditables, function(i,value) {
				$(value).editable('toggleDisabled');
			});
			$("#btn-update-geopos").addClass("hidden");
			$("#btn-view-map").removeClass("hidden");
		} else if (mode == "update") {
			// Add a pk to make the update process available on X-Editable
			$('.editable-context').editable('option', 'pk', contextData.id);
			$('.editable-context').editable('toggleDisabled');
			$.each(listXeditables, function(i,value) {
				//add primary key to the x-editable field
				$(value).editable('option', 'pk', contextData.id);
				$(value).editable('toggleDisabled');
			})
			$("#btn-update-geopos").removeClass("hidden");
			$("#btn-view-map").addClass("hidden");
		}
	}

	function manageDivEditElement() {
		console.log("-----------------manageDivEditElement----------------------", mode);
		listXeditables = [	'#divName', '#divShortDescription' , '#divTags', "#divAvancement"];
		if(contextType != "citoyens")
			listXeditables.push('#divInformation');
		divInformation
		if (mode == "view") {
			$.each(listXeditables, function(i,value) {
				$(value).hide();
			});
		} else if (mode == "update") {
			$.each(listXeditables, function(i,value) {
				$(value).show();
			})
		}
	}

	function manageSocialNetwork(iconObject, value) {
		//console.log("-----------------manageSocialNetwork----------------------");
		tabId2Icon = {"facebookAccount" : "fa-facebook", "twitterAccount" : "fa-twitter", 
				"gpplusAccount" : "fa-google-plus", "gitHubAccount" : "fa-github", 
				"skypeAccount" : "fa-skype", "telegramAccount" : "fa-send"}

		var fa = tabId2Icon[iconObject.attr("id")];
		iconObject.empty();
		if (value != "") {
			
			//else{
			if(iconObject.attr("id") != "telegramAccount"){
				iconObject.tooltip({title: value, placement: "bottom"});
				iconObject.html('<i class="fa '+fa+' fa-blue"></i>');
			}
		} 

		if(iconObject.attr("id") == "telegramAccount"){
			iconObject.tooltip({title: value, placement: "left"});
			iconObject.html('<i class="fa '+fa+' text-white"></i> Telegram');
		}

		console.log(iconObject);
	}

	function changeHiddenIconeElement(init) { 
		console.log("-----------------changeHiddenIconeElement----------------------", mode);
		//".fa_streetAddress", ".fa_postalCode", ".fa_addressCountry"
		listIcones = [	'.fa_name', ".fa_birthDate", ".fa_email", ".fa_telephone_mobile",
						".fa_telephone",".fa_telephone_fax",".fa_url" , ".fa-file-text-o"];

		listXeditables = [	'#username','#birthDate',"#email", "#mobile", "#fixe", "#fax","#url"];
		if (init == true) {
			$.each(listIcones, function(i,value) {
				if($(listXeditables[i]).text().length != 0){
					//console.log(listXeditables[i], " : ", value);
					$(value).removeClass("hidden");	
				}
					 
			});
		}
		else if (mode == "view") {
			$.each(listIcones, function(i,value) {
				if($(listXeditables[i]).text().length == 0)
					$(value).addClass("hidden");
			});
		} else if (mode == "update") {
			$.each(listIcones, function(i,value) {
				$(value).removeClass("hidden"); 
			});
		}
	}

	function activateEditableContext() {

		
		$.fn.editable.defaults.mode = 'popup';

		$('.editable-context').editable({
			url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,
			title : $(this).data("title"),
			onblur: 'submit',
			success: function(response, newValue) {
				console.log(response, newValue);
				if(! response.result) return response.msg; //msg will be shown in editable form
    		},
    		success : function(data) {
    			console.log(data);
				if(data.result) {
					toastr.success(data.msg);
					loadActivity=true;

					if(typeof data.name != "undefined" && $('#nameHeader').length ){
						$('#nameHeader').html(data.name);
					}	
				}
				else 
					return data.msg;
			}

		});

		$('.socialIcon').editable({
			display: function(value) {
				manageSocialNetwork($(this), value);
			},
			url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,
			mode: 'popup'
		}); 


		//Type Organization
		 $('#type').editable({
		 	url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType, 
		 	value: '<?php echo (isset($element["type"])) ? $element["type"] : ""; ?>',
		 	placement: 'bottom',
		 	source: function() {
		 		return types;
		 	},
		 	success : function(data) {
				if(data.result) {
					toastr.success(data.msg);
					loadActivity=true;
					if(typeof data.type != "undefined" && $('#typeHeader').length ){
						$('#typeHeader').html(data.type);
					}
				}
				else 
					return data.msg;
			}
		 });

		$('#birthDate').editable({
			url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType, 
			mode: 'popup',
			placement: "right",
			format: 'yyyy-mm-dd',   
	    	viewformat: 'dd/mm/yyyy',
	    	datepicker: {
	            weekStart: 1,
	        },
	        showbuttons: true
		});
		//$('#birthDate').editable('setValue', moment(birthDate, "YYYY-MM-DD HH:mm").format("YYYY-MM-DD"), true);

		/*$('#tags').editable({
	        url: baseUrl+"/"+moduleId+"/element/updatefield", //this url will not be used for creating new user, it is only for update
	        mode : 'popup',
	        value: <?php echo (isset($person["tags"])) ? json_encode(implode(",", $person["tags"])) : "''"; ?>,
	        select2: {
	            tags: <?php if(isset($tags)) echo json_encode($tags); else echo json_encode(array())?>,
	            tokenSeparators: [","],
	            width: 200,
	            dropdownCssClass: 'select2-hidden'
	        }
	    });*/

		//Select2 tags
		$('#tags').editable({
			url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,
		 	mode: 'popup',
		 	value: returnttags(),
		 	select2: {
		 		tags: <?php if(isset($tags)) echo json_encode($tags); else echo json_encode(array())?>,
		 		tokenSeparators: [","],
		 		width: 200,
		 		dropdownCssClass: 'select2-hidden'
		 	},
		 	success : function(data) {
		 		console.log("TAGS", data);
				if(data.result) {
					toastr.success(data.msg);
					loadActivity=true;
					var str = "";
					if($('#divTagsHeader').length ){
						
						$.each(data.tags, function (key, tag){
							str +=	'<div class="tag label label-danger pull-right" data-val="'+tag+'">'+
										'<i class="fa fa-tag"></i>'+tag+
									'</div>';
							addTagToMultitag(tag);
						});
						
					}
					$('#divTagsHeader').html(str);	
				}
				else 
					return data.msg;
			}
		});


		$('#mobile').editable({
	        url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,
	        mode : 'popup',
	        value: <?php echo (isset($element["telephone"]["mobile"])) ? json_encode(implode(",", $element["telephone"]["mobile"])) : "''"; ?>,
	    	success : function(data) {
				if(data.result)
					toastr.success(data.msg);
				else 
					toastr.error(data.msg);
			}
	    });

	    $('#fax').editable({
	        url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,
	        mode : 'popup',
	        value: <?php echo (isset($element["telephone"]["fax"])) ? json_encode(implode(",", $element["telephone"]["fax"])) : "''"; ?>,
	    	success : function(data) {
				if(data.result)
					toastr.success(data.msg);
				else 
					toastr.error(data.msg);
			}
	    }); 

		$('#fixe').editable({
			url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType, 
			mode: 'popup',
			value: <?php echo (isset($element["telephone"]["fixe"])) ? json_encode(implode(",", $element["telephone"]["fixe"])) : "''"; ?>,
			success : function(data) {
				if(data.result)
					toastr.success(data.msg);
				else 
					toastr.error(data.msg);
			}
		});

		

		$('#category').editable({
			url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType, 
			mode: 'popup',
			value: <?php echo (isset($element["category"])) ? json_encode(implode(",", $element["category"])) : "''"; ?>,
			source: function() {
				var result = new Array();
				var categorySource = null;

				console.log("contextData.type",contextData.type);
				if (contextData.type == "<?php echo Organization::TYPE_NGO ?>") categorySource = NGOCategoriesList;
				if (contextData.type == "<?php echo Organization::TYPE_BUSINESS ?>") categorySource = localBusinessCategoriesList;
				
				if(categorySource != null)
				$.each(categorySource, function(i,value) {
					result.push({"value" : value, "text" : value}) ;
				});
				return result;
			},
			success : function(data) {
				if(data.result) {
					toastr.success(data.msg);
					loadActivity=true;	
				}
				else 
					return data.msg;
			}
		});

		$('#avancement').editable({
			url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,  
			source: function() {
				//idea => concept => Started => development => testing => mature
				avancement=["idea","concept","started","development","testing","mature"];
				return avancement;
			},
			success : function(data) {
				if(data.result) {
					toastr.success(data.msg);
					loadActivity=true;	
					if(data.avancement=="idea")
						val=5;
					else if(data.avancement=="concept")
						val=20;
					else if (data.avancement== "started")
						val=40;
					else if (data.avancement == "development")
						val=60;
					else if(data.avancement == "testing")
						val=80;
					else
						val=100;
					$('#progressStyle').val(val);
					$('#labelProgressStyle').html(data.avancement);
				}
				else 
					return data.msg;
		    }
		});

		$('#shortDescription').editable({
			url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType, 
			wysihtml5: {
				color: false,
				html: false,
				video: false,
				image: false,
				table : false
			},
			container: 'body',
			validate: function(value) {
			    console.log(value);
			    if($.trim(value).length > 140) {
			        return 'La description courte ne doit pas dépasser 140 caractères.';
			    }
			},
			success : function(data) {
				if(data.result) {
					toastr.success(data.msg);
					loadActivity=true;

					if(typeof data.shortDescription != "undefined" && $('#shortDescriptionHeader').length ){
						$('#shortDescriptionHeader').html(data.shortDescription);
					}
				}
				else 
					return data.msg;
			}
		});


		$('#description').editable({
			url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,  
			value: <?php echo (isset($element["description"])) ? json_encode($element["description"]) : "''"; ?>,
			placement: 'top',
			wysihtml5: {
				html: true,
				video: false
			},
			container: 'body',
			success : function(data) {
				if(data.result) {
					toastr.success(data.msg);
					loadActivity=true;	
				}
				else 
					return data.msg;
			}
		});
		
		$('#allDay').editable({
			url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,  
			mode: "popup",
			value: allDay,
			source:[{value: "true", text: "Oui"}, {value: "false", text: "Non"}],
			success : function(data, newValue) {
		        if(data.result) {
		        	manageAllDayEvent(newValue);
		        	toastr.success(data.msg);
					loadActivity=true;	
		        }
		        else
		        	return data.msg;  
		    },
		    success : function(data) {
				if(data.result) {
					toastr.success(data.msg);
					loadActivity=true;	
				}
				else 
					return data.msg;
			}
		});

	
		
	   
		//Validation Rules
		//Mandotory field
		$('.required').editable('option', 'validate', function(v) {
			var intRegex = /^\d+$/;
			if (!v)
				return 'Field is required !';
		});
	
		
	} 
	function manageAllDayElement(isAllDay) {
		console.warn("Manage all day event ", isAllDay);

		//$('#startDate').editable('destroy');
		//$('#endDate').editable('destroy');
		if (isAllDay == '') {
			$('#startDate').editable({
				url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,  
				pk: contextData.id,
				type: "date",
				mode: "popup",
				placement: "bottom",
				format: 'yyyy-mm-dd',
				viewformat: 'dd/mm/yyyy',
				datepicker: {
					weekStart: 1
				},
				success : function(data) {
					if(data.result) {
						toastr.success(data.msg);
						loadActivity=true;	
					}else 
						return data.msg;
			    }
			});

			$('#endDate').editable({
				url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType,  
				pk: contextData.id,
				type: "date",
				mode: "popup",
				placement: "bottom",
				format: 'yyyy-mm-dd',   
	        	viewformat: 'dd/mm/yyyy',
	        	datepicker: {
	                weekStart: 1
	           },
	           success : function(data) {
			        if(data.result) {
			        	toastr.success(data.msg);
						loadActivity=true;	
			        }else 
						return data.msg;
			    }
	        });

			formatDate = "YYYY-MM-DD";
		} else {
			$('#startDate').editable({
				url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType, 
				pk: contextData.id,
				type: "datetime",
				mode: "popup",
				placement: "bottom",
				format: 'yyyy-mm-dd hh:ii',
				viewformat: 'dd/mm/yyyy hh:ii',
				datetimepicker: {
					weekStart: 1,
					minuteStep: 30,
					language: 'fr'
				   },
				success : function(data) {
					if(data.result) {
						toastr.success(data.msg);
						loadActivity=true;	
					}else 
						return data.msg;
			    }
			});

			$('#endDate').editable({
				url: baseUrl+"/"+moduleId+"/element/updatefields/type/"+contextType, 
				pk: contextData.id,
				mode: "popup",
				type: "datetime",
				placement: "bottom",
				format: 'yyyy-mm-dd hh:ii',
	        	viewformat: 'dd/mm/yyyy hh:ii',
	        	datetimepicker: {
	                weekStart: 1,
	                minuteStep: 30,
	                language: 'fr'
	           },
	           success : function(data) {
			        if(data.result) {
			        	toastr.success(data.msg);
						loadActivity=true;	
			        }else 
						return data.msg;
			    }
	        });

			formatDate = "YYYY-MM-DD HH:mm";
		}
		if(startDate != "")
			$('#startDate').editable('setValue', moment(startDate, "YYYY-MM-DD HH:mm").format(formatDate), true);
		if(endDate != "")
			$('#endDate').editable('setValue', moment(endDate, "YYYY-MM-DD HH:mm").format(formatDate), true);
	}

	function returnttags() {
		console.log("------------- returnttags -------------------");
		var tags = <?php echo (isset($element["tags"])) ? json_encode(implode(",", $element["tags"])) : "''"; ?>;
		return tags ;
	}

	function returntel() {
		var tel = "";
		$(".tel").each(function(){
			
			if($(this).text().trim() != "")
	        {
	        	if(tel != "")
	        		tel += ", ";

	        	tel += $(this).text().trim();
	        }	
	        	
	    });

	    console.log(tel);
		return tel ;
	}
	//modification de la position geographique	

	function findGeoPosByAddress(){
		//si la streetAdress n'est pas renseignée
		if($("#streetAddress").html() == $("#streetAddress").attr("data-emptytext")){
			//on récupère la valeur du code insee s'il existe
			var insee = ($("#entity-insee-value").attr("insee-val") != "") ? 
						 $("#entity-insee-value").attr("insee-val") : "";
			//si on a un codeInsee, on lance la recherche de position par codeInsee
			if(insee != "") findGeoposByInsee(insee);
		//si on a une streetAddress
		}else{
			var request = "";

			//recuperation des données de l'addresse
			var street 			= ($("#streetAddress").html()  != $("#streetAddress").attr("data-emptytext"))  ? $("#streetAddress").html() : "";
			var address 		= ($("#address").html() 	   != $("#address").attr("data-emptytext")) 	   ? $("#address").html() : "";
			var addressCountry 	= ($("#addressCountry").html() != $("#addressCountry").attr("data-emptytext")) ? $("#addressCountry").html() : "";
			
			//construction de la requete
			request = addToRequest(request, street);
			request = addToRequest(request, address);
			request = addToRequest(request, addressCountry);

			request = transformNominatimUrl(request);
			request = "?q=" + request;
			console.log(request);
			findGeoposByNominatim(request);
		}
	
	}

	//quand la recherche nominatim a fonctionné
	function callbackNominatimSuccess(obj){
		console.log("callbackNominatimSuccess");
		//si nominatim a trouvé un/des resultats
		if (obj.length > 0) {
			//on utilise les coordonnées du premier resultat
			var coords = L.latLng(obj[0].lat, obj[0].lon);
			//et on affiche le marker sur la carte à cette position
			console.log("showGeoposFound coords", coords);
			console.dir("showGeoposFound obj", obj);

			//si la donné n'est pas geolocalisé
			//on lui rajoute les coordonées trouvés
			//if(typeof contextData["geo"] == "undefined")
			contextData["geo"] = { "latitude" : obj[0].lat, "longitude" : obj[0].lon };

			showGeoposFound(coords, contextData.id, "organizations", contextData);
		}
		//si nominatim n'a pas trouvé de résultat
		else {
			//on récupère la valeur du code insee s'il existe
			var insee = ($("#entity-insee-value").attr("insee-val") != "") ? 
						 $("#entity-insee-value").attr("insee-val") : "";
			//si on a un codeInsee, on lance la recherche de position par codeInsee
			if(insee != "") findGeoposByInsee(insee);
		}
	}

	//quand la recherche par code insee a fonctionné
	function callbackFindByInseeSuccess(obj){
		console.log("callbackFindByInseeSuccess");
		//si on a bien un résultat
		if (typeof obj != "undefined" && obj != "") {
			//récupère les coordonnées
			var coords = Sig.getCoordinates(obj, "markerSingle");
			//si on a une geoShape on l'affiche
			if(typeof obj.geoShape != "undefined") Sig.showPolygon(obj.geoShape);
			
			contextData["geo"] = { "latitude" : obj.geo.latitude, "longitude" : obj.geo.longitude };
			//on affiche le marker sur la carte
			showGeoposFound(coords, contextData.id, "organizations", contextData);
		}
		else {
			console.log("Erreur getlatlngbyinsee vide");
		}
	}


	//en cas d'erreur nominatim
	function callbackNominatimError(error){
		console.log("callbackNominatimError", error);
	}

	//quand la recherche par code insee n'a pas fonctionné
	function callbackFindByInseeError(){
		console.log("erreur getlatlngbyinsee", error);
	}
	

</script>