<?php 

 /** PARAMS PATAPOUF **/
// $params['result']['displayType'] = false;
// $params['result']['fullLocality'] = true;
// $params['result']['datesEvent'] = true;

  // $params['source']['sourcekey'] = 'patapouf';
  $path = Yii::app()->controller->module->viewPath.'/default/dir/';
  $json = file_get_contents($path."params.json");
  $params = json_decode($json, true);

?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/2.1.11/jquery.mixitup.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->

<style>


.searchEntity{
  border:1px solid #ccc;
}

  .container{
    width:99%;
    /*background-color: white;*/
  }

  .simply-button{
      padding-top: 10px;
      padding-bottom: 10px;
      color: #666;
      background-color: #ccc;
      border: 0px solid #666;
  }

  .navbar{
    background-color: #CCC;
  }

  /*button, .button {
    -webkit-appearance: none;
    -moz-appearance: none;
    border-radius: 0;
    border-style: solid;
    border-width: 0;
    cursor: pointer;
    font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
    font-weight: normal;
    line-height: normal;
    margin: 0 0 1.25rem;
    position: relative;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    padding: 1rem 2rem 1.0625rem 2rem;
    font-size: 1rem;
    background-color: #008CBA;
    border-color: #007095;
    color: #FFFFFF;
    transition: background-color 300ms ease-out;
  }*/

  .panel-filter{
    border-right:2px solid grey;
  }




	.btn-add-to-directory{
		font-size: 14px;
		margin-right: 0px;
		border-radius: 6px;
		color: #666;
		border: 1px solid rgba(188, 185, 185, 0.69);
		margin-left: 3px;
		float: right;
		padding: 1px;
		width: 24px;
		margin-top: 4px;
	}


  .btn-filter-type{
    height:44px;
  }

  .btn-scope{
    display: inline;
  }

  .simply-nav{
    border:0px;
    padding-right: 0px;
    padding-left: 0px;
  }

  .searchEntity hr{
    margin:3px; 
  }

  fieldset{
    width: 99%;
    border: 10px solid white;
  }
 
</style>

<div class="row" id="dropdown_params">
  
    <form class="controls" id="Filters">
      <!-- We can add an unlimited number of "filter groups" using the following format: -->
<!--       <fieldset class="filter-group checkboxes">
        <h4>Type</h4>
          <div class="checkbox">
            <input type="checkbox" class="typeFilter" value="persons" checked="checked"/><label><i class="fa fa-user text-yellow"></i>Citoyens</label>
          </div>
          <div class="checkbox">
            <input type="checkbox" class="typeFilter" value="organizations" checked="checked"/><label><i class="fa fa-group text-green"></i>Organisations</label>
          </div>
          <div class="checkbox">
            <input type="checkbox" class="typeFilter" value="projects" checked="checked" /><label><i class="fa fa-lightbulb-o text-purple"></i>Projet</label>
          </div>
      </fieldset> -->
     <!--  <fieldset class="filter-group checkboxes">
        <h4>Localité</h4>
          <div class="checkbox">
            <input type="checkbox" class="cpFilter" value="97416" checked="checked"/><label>97416</label>
          </div>
          <div class="checkbox">
            <input type="checkbox" class="cpFilter" value="35600" checked="checked"/><label>35600</label>
          </div>
          <div class="checkbox">
            <input type="checkbox" class="cpFilter" value="97411" checked="checked" /><label>97411</label>
          </div>
         
      </fieldset> -->
    </form>

</div>
<div class="row" id="dropdown_search"></div>


<?php @$this->renderPartial(@$path."first_step_directory"); ?> 

<script type="text/javascript">

var searchType = [ "persons", "organizations", "projects" ];
var allSearchType = [ "persons", "organizations", "projects" ];

jQuery(document).ready(function() {

  selectScopeLevelCommunexion(levelCommunexion);

  searchType = [ "persons", "organizations", "projects" ];
  allSearchType = [ "persons", "organizations", "projects" ];

  $('.typeFilter').on('change', function() {
        console.log(".typeFilter");
        var type = $(this).attr("value");
        var index = searchType.indexOf(type);

        if(type == "all" && searchType.length > 1){
          $.each(allSearchType, function(index, value){ removeSearchType(value); }); return;
        }
        if(type == "all" && searchType.length == 1){
          $.each(allSearchType, function(index, value){ addSearchType(value); }); return;
        }

        if (index > -1) removeSearchType(type);
        else addSearchType(type);
        startSearch(0,100);
  });


	topMenuActivated = true;
	hideScrollTop = true; 
	checkScroll();
  var timeoutSearch = setTimeout(function(){ }, 100);
  
  setTimeout(function(){ $("#input-communexion").hide(300); }, 300);

	$(".moduleLabel").html("<i class='fa fa-connectdevelop'></i> <span id='main-title-menu'>L'Annuaire</span> <span class='text-red'>COMMUNE</span>CTÉ");

	$('.tooltips').tooltip();

	$('.main-btn-toogle-map').click(function(e){ showMap(); });

	$('#searchBarText').keyup(function(e){
      console.log("#searchBarText");
      clearTimeout(timeoutSearch);
      timeoutSearch = setTimeout(function(){ startSearch(0, 100); }, 800);
  });
  // $('#searchBarPostalCode').keyup(function(e){
  //     clearTimeout(timeoutSearch);
  //     timeoutSearch = setTimeout(function(){ startSearch(0, 100); }, 800);
  // });



  /***** CHANGE THE VIEW GRID OR LIST OR PARAMS  *****/
  // $('#grid').hide();
  // $('#dropdown_params').hide();
  
  // $('#list').click(function(event){$('#tags')
  //   event.preventDefault();
  //   $('#dropdown_search .item').addClass('list-group-item');
  //   $('#grid').show();
  //   $('#list').hide();
  // });

  // $('#grid').click(function(event){
  //   event.preventDefault();
  //   $('#dropdown_search .item').removeClass('list-group-item');
  //   $('#dropdown_search .item').addClass('grid-group-item');
  //   $('#list').show();
  //   $('#grid').hide();
  // });


  // $('#dropdown_paramsBtn').click(function(event){
  //   event.preventDefault();
  //   if($('#dropdown_paramsBtn').hasClass('active')){
  //     $('#dropdown_params').fadeOut();
  //     $('#dropdown_params').removeClass('col-md-3');
  //     $('#dropdown_search').removeClass('col-md-9');
  //     $('#dropdown_search').addClass('col-md-12');
  //     $('#dropdown_paramsBtn').removeClass('active');
  //   }
  //   else{
  //     $('#dropdown_params').addClass('col-md-3');
  //     $('#dropdown_params').fadeIn();
  //     $('#dropdown_search').addClass('col-md-9');
  //     $('#dropdown_search').removeClass('col-md-12');
  //     $('#dropdown_paramsBtn').addClass('active');
  //   }
   
  // });

  // $(".btn-geolocate").click(function(e){
		// if(geolocHTML5Done == false){
  //   		initHTML5Localisation('prefillSearch');
  //       $("#modal-select-scope").modal("show");
  //       $("#main-title-modal-scope").html('<i class="fa fa-spin fa-circle-o-notch"></i> Recherche de votre position ... Merci de patienter ...'); 
  //       //<i class="fa fa-angle-right"></i> Dans quelle commune vous situez-vous en ce moment ?
  //   }	else{
  //   		$("#modal-select-scope").modal("show");
  //   }
  // });

  $(".my-main-container").scroll(function(){
    if(!loadingData && !scrollEnd){
        var heightContainer = $(".my-main-container")[0].scrollHeight;
        var heightWindow = $(window).height();
        //console.log("scroll : ", scrollEnd, heightContainer, $(this).scrollTop() + heightWindow);
        if(scrollEnd == false){
          var heightContainer = $(".my-main-container")[0].scrollHeight;
          var heightWindow = $(window).height();
          if( ($(this).scrollTop() + heightWindow) >= heightContainer-150){
            console.log("scroll MAX");
            startSearch(currentIndexMin+indexStep, currentIndexMax+indexStep);
          }
        }
    }
  });

  $(".btn-filter-type").click(function(e){
    console.log(".btn-filter-type");
    var type = $(this).attr("type");
    var index = searchType.indexOf(type);

    if(type == "all" && searchType.length > 1){
      $.each(allSearchType, function(index, value){ removeSearchType(value); }); return;
    }
    if(type == "all" && searchType.length == 1){
      $.each(allSearchType, function(index, value){ addSearchType(value); }); return;
    }

    if (index > -1) removeSearchType(type);
    else addSearchType(type);
  });
 
  initBtnToogleCommunexion();
  $(".btn-activate-communexion").click(function(){
    toogleCommunexion();
  });

  //initBtnScopeList()
  console.log("Begin");
  startSearch(0, 100);

});

var indexStepInit = 100;
var indexStep = indexStepInit;
var currentIndexMin = 0;
var currentIndexMax = indexStep;
var scrollEnd = false;
var totalData = 0;

var timeout = null;

function startSearch(indexMin, indexMax){
    console.log("startSearch", indexMin, indexMax, indexStep);

    if(loadingData) return;
    loadingData = true;
    
    console.log("loadingData true");
    indexStep = indexStepInit;

	  var name = $('#searchBarText').val();
    //var locality = $('#searchBarPostalCode').val();
    //inseeCommunexion = locality;
    
    //if(communexionActivated)
    //$(".lbl-scope-list").html("<i class='fa fa-check'></i> " + cityNameCommunexion.toLowerCase() + ", " + cpCommunexion);
      
    if(typeof indexMin == "undefined") indexMin = 0;
    if(typeof indexMax == "undefined") indexMax = indexStep;

    currentIndexMin = indexMin;
    currentIndexMax = indexMax;

    if(indexMin == 0 && indexMax == indexStep) {
      totalData = 0;
      mapElements = new Array(); 
    }
    else{ if(scrollEnd) return; }
    
    //name = name.replace(/[^\w\s']/gi, '');
    ///locality = locality.replace(/[^\w\s']/gi, '');

    //verification si c'est un nombre
    //if(!isNaN(parseInt(locality))){
    //    if(locality.length == 0 || locality.length > 5) locality = "";
    //}

    if(name.length>=3 || name.length == 0){
      var locality = "";
      if(communexionActivated){
        if(levelCommunexion == 1) locality = inseeCommunexion;
        if(levelCommunexion == 2) locality = cpCommunexion;
        if(levelCommunexion == 3) locality = cpCommunexion.substr(0, 2);
        if(levelCommunexion == 4) locality = inseeCommunexion;
        if(levelCommunexion == 5) locality = "";
      } 
      autoCompleteSearch(name, locality, indexMin, indexMax);
    }else{
      
    }   
}


function addSearchType(type){
  var index = searchType.indexOf(type);
  if (index == -1) {
    searchType.push(type);
    $(".search_"+type).removeClass("fa-circle-o");
    $(".search_"+type).addClass("fa-check-circle-o");
  }
}
function removeSearchType(type){
  var index = searchType.indexOf(type);
  if (index > -1) {
    searchType.splice(index, 1);
    $(".search_"+type).removeClass("fa-check-circle-o");
    $(".search_"+type).addClass("fa-circle-o");
  }
}

var loadingData = false;
var mapElements = new Array(); 


function autoCompleteSearch(name, locality, indexMin, indexMax){
    var levelCommunexionName = { 1 : "INSEE",
                             2 : "CODE_POSTAL_INSEE",
                             3 : "DEPARTEMENT",
                             4 : "REGION"
                           };
    console.log("levelCommunexionName", levelCommunexionName[levelCommunexion]);
    locality = "";
    var data = {"name" : name, "locality" : locality, "searchType" : searchType, "searchBy" : levelCommunexionName[levelCommunexion], 
                "indexMin" : indexMin, "indexMax" : indexMax, 
                "sourceKey" : "<?php echo (isset($params['source']['sourcekey'])) ? $params['source']['sourcekey'] : false;?>"  };

    //console.log("loadingData true");
    loadingData = true;
    
    str = "<i class='fa fa-circle-o-notch fa-spin'></i>";
    $(".btn-start-search").html(str);
    $(".btn-start-search").addClass("bg-azure");
    $(".btn-start-search").removeClass("bg-dark");
    //$("#dropdown_search").css({"display" : "inline" });

    if(indexMin > 0)
    $("#btnShowMoreResult").html("<i class='fa fa-spin fa-circle-o-notch'></i> Recherche en cours ...");
    else
    $("#dropdown_search").html("<center><span class='search-loaderr text-dark' style='font-size:20px;'><i class='fa fa-spin fa-circle-o-notch'></i> Recherche en cours ...</span></center>");
      
    if(isMapEnd)
      $.blockUI({
        message : "<h1 class='homestead text-red'><i class='fa fa-spin fa-circle-o-notch'></i> Commune<span class='text-dark'>xion en cours ...</span></h1>"
      });
    //$(".moduleLabel").html("<i class='fa fa-circle-o-notch'></i> <span id='main-title-menu'>L'Annuaire</span> <span class='text-red'>COMMUNE</span>CTÉ</h1>");
    
    $.ajax({
      type: "POST",
          url: baseUrl+"/" + moduleId + "/search/globalautocomplete",
          data: data,
          dataType: "json",
          error: function (data){
             console.log("error"); console.dir(data);          
          },
          success: function(data){
            if(!data){ toastr.error(data.content); }
            else
            {
              var countData = 0;
            	$.each(data, function(i, v) { if(v.length!=0){ countData++; } });
              
              totalData += countData;
            
              str = "";
              var city, postalCode = "";
              
              //parcours la liste des résultats de la recherche
              $.each(data, function(i, o) {
                  var typeIco = i;
                  var ico = mapIconTop["default"];
                  var color = mapColorIconTop["default"];

                  mapElements.push(o);

  				        typeIco = o.type;
                  ico = ("undefined" != typeof mapIconTop[typeIco]) ? mapIconTop[typeIco] : mapIconTop["default"];
                  color = ("undefined" != typeof mapColorIconTop[typeIco]) ? mapColorIconTop[typeIco] : mapColorIconTop["default"];
                  
                  htmlIco ="<i class='fa "+ ico +" fa-2x bg-"+color+"'></i>";
                 	if("undefined" != typeof o.profilThumbImageUrl && o.profilThumbImageUrl != ""){
                    var htmlIco= "<img width='80' height='80' alt='' class='img-circle bg-"+color+"' src='"+baseUrl+o.profilThumbImageUrl+"'/>"
                  }

                  city="";

                  var postalCode = o.cp
                  if (o.address != null) {
                    city = o.address.addressLocality;
                    postalCode = o.cp ? o.cp : o.address.postalCode ? o.address.postalCode : "";
                  }
                  
                  //console.dir(o);
                  var id = getObjectId(o);
                  var insee = o.insee ? o.insee : "";
                  type = o.type;
                  if(type=="citoyen") type = "person";
                  var url = "javascript:"; //baseUrl+'/'+moduleId+ "/default/simple#" + o.type + ".detail.id." + id;
                  var url = baseUrl+'/'+moduleId+ "/default/dir#" + type + ".simply.id." + id;
                  var onclick = 'loadByHash("#' + type + '.simply.id.' + id + '");';
                  var onclickCp = "";
                  var target = " target='_blank'";
                  var dataId = "";
                  if(type == "city"){
                  	url = "javascript:"; //#main-col-search";
                  	onclick = 'setScopeValue($(this))'; //"'+o.name.replace("'", "\'")+'");';
                  	onclickCp = 'setScopeValue($(this));';
                  	target = "";
                    dataId = o.name; //.replace("'", "\'");
                  }

                  var tags = "";
                  if(typeof o.tags != "undefined" && o.tags != null){
          					$.each(o.tags, function(key, value){
          						if(value != "")
  		                tags +=   "<a href='javascript:' class='badge bg-red btn-tag'>#" + value + "</a>";
  		              });
                  }

                  var name = typeof o.name != "undefined" ? o.name : "";
                  var postalCode = (typeof o.address != "undefined" &&
                  				  typeof o.address.postalCode != "undefined") ? o.address.postalCode : "";
                  
                  if(postalCode == "") postalCode = typeof o.cp != "undefined" ? o.cp : "";
                  var cityName = (typeof o.address != "undefined" &&
                  				typeof o.address.addressLocality != "undefined") ? o.address.addressLocality : "";
                  
                  var fullLocality = postalCode + " " + cityName;

                  var description = (typeof o.shortDescription != "undefined" &&
                  					o.shortDescription != null) ? o.shortDescription : "";
                  if(description == "") description = (typeof o.description != "undefined" &&
                  									 o.description != null) ? o.description : "";
                  description = "";

                  var startDate = (typeof o.startDate != "undefined") ? "Du "+dateToStr(o.startDate, "fr", true, true) : null;
                  var endDate   = (typeof o.endDate   != "undefined") ? "Au "+dateToStr(o.endDate, "fr", true, true)   : null;


                  /***** VERSION SIMPLY *****/
                 // str += "</div>";
                  str += "<div class='col-md-3 item searchEntity'>";

                    str += "<div class='row entityMiddle no-padding'>";
                      // str += "<div class='col-md-2 entityTop'>";
                      //   str += "<a href='"+url+"' onclick='"+onclick+"'>" + htmlIco + "</a>";
                      // str += "</div>";
                      // str += "<div class='col-md-12 entityTop'>";
                        str += "<a href='"+url+"' onclick='"+onclick+"' class='entityName text-dark'>" + name + "</a>";
                      // str += "</div>";
                    str += "</div>";
                   
                      // str += "<div class='col-md-2 entityTop'>";
                      //   str += "<a href='"+url+"' onclick='"+onclick+"'>" + htmlIco + "</a>";
                      // str += "</div>";
                      // str += "<div class='col-md-12 entityTop'>";
                    <?php if(isset($params['result']['displayType']) && $params['result']['displayType']) { ?>
                      str += "<hr>";
                      str += "<div class='row entityTop'>";
                         str += htmlIco+" - " + typeIco + "</a>";
                      str += "</div>";
                    <?php } ?>
                      // str += "</div>";
                   
                   
                    target = "";
                    str += "<div class='row entityMiddle no-padding'>";
                      <?php if(isset($params['result']['fullLocality']) && $params['result']['fullLocality']) { ?>
                       str += "<hr>";
                      // str += "<a href='"+url+"' onclick='"+onclick+"'"+target+" class='entityName text-dark'>" + name + "</a>";
                      if(fullLocality != "" && fullLocality != " ")
                      str += "<a href='"+url+"' onclick='"+onclickCp+"'"+target+ ' data-id="' + dataId + '"' + "  class='entityLocality'><i class='fa fa-home'></i> " + fullLocality + "</a>";
                      <?php } ?>
                      <?php if(isset($params['result']['datesEvent']) && $params['result']['datesEvent']) { ?>
                      if(startDate != null)
                      str += "<a href='"+url+"' onclick='"+onclick+"'"+target+"  class='entityDate bg-azure badge'><i class='fa fa-caret-right'></i> " + startDate + "</a>";
                      if(endDate != null)
                      str += "<a href='"+url+"' onclick='"+onclick+"'"+target+"  class='entityDate bg-azure badge'><i class='fa fa-caret-right'></i> " + endDate + "</a>";
                      <?php } ?>
                      // if(description != "")
                      // str += "<div onclick='"+onclick+"'"+target+"  class='entityDescription'>" + description + "</div>";
                    str += "</div>";
                    str += "<div class='row entityBottom'>";
                      <?php if( isset( Yii::app()->session['userId'] ) ) { ?>
                      isFollowed=false;
                      if(typeof o.isFollowed != "undefined" )
                        isFollowed=true;
                      if(type!="city" && id != "<?php echo Yii::app()->session['userId']; ?>")
                      str += "<a href='javascript:;' class='btn btn-default btn-sm btn-add-to-directory bg-white tooltips followBtn'" + 
                            'data-toggle="tooltip" data-placement="left" data-original-title="Suivre"'+
                            " data-ownerlink='follow' data-id='"+id+"' data-type='"+type+"' data-name='"+name+"' data-isFollowed='"+isFollowed+"'>"+
                                "<i class='fa fa-chain'></i>"+ //fa-bookmark fa-rotate-270
                              "</a>";
                      <?php } ?>
                      str += "<hr>";
                      if(tags=="") tags = "<a href='#' class='badge bg-red btn-tag'>#</a>";
                      str += tags;


                    str += "</div>";          
                  str += "</div>";

              }); //end each

              if(str == "") { 
                  $(".btn-start-search").html("<i class='fa fa-search'></i>"); 
                  if(indexMin == 0){
                    //ajout du footer   
                    var msg = "Aucun résultat";    
                    if(name == "" && locality == "") msg = "<h3 class='text-dark'><i class='fa fa-3x fa-keyboard-o'></i><br> Préciser votre recherche pour plus de résultats ...</h3>"; 
                    str += '<div class="center" id="footerDropdown">';
                    str += "<hr style='float:left; width:100%;'/><label style='margin-bottom:10px; margin-left:15px;' class='text-dark'>"+msg+"</label><br/>";
                    str += "</div>";
                    $("#dropdown_search").html(str);
                    $("#searchBarText").focus();
                  }
              }
              else
              {       
                //ajout du footer      	
                str += '</div><div class="center col-md-12" id="footerDropdown">';
                str += "<hr style='float:left; width:100%;'/><label style='margin-bottom:10px; margin-left:15px;' class='text-dark'>" + totalData + " résultats</label><br/>";
                str += '<button class="btn btn-default" id="btnShowMoreResult"><i class="fa fa-angle-down"></i> Afficher plus de résultat</div></center>';
                str += "</div>";

                //si on n'est pas sur une première recherche (chargement de la suite des résultat)
                if(indexMin > 0){
                  //on supprime l'ancien bouton "afficher plus de résultat"
                  $("#btnShowMoreResult").remove();
                  //on supprimer le footer (avec nb résultats)
                  $("#footerDropdown").remove();

                  //on calcul la valeur du nouveau scrollTop
                  var heightContainer = $(".my-main-container")[0].scrollHeight - 180;
                  //on affiche le résultat à l'écran
                  $("#dropdown_search").append(str);
                  //on scroll pour afficher le premier résultat de la dernière recherche
                  // $(".my-main-container").animate({"scrollTop" : heightContainer}, 1700);
                  //$(".my-main-container").scrollTop(heightContainer);

                  
                //si on est sur une première recherche
                }else{
                  //on affiche le résultat à l'écran
                  $("#dropdown_search").html(str);
                  //on scroll pour coller le haut de l'arbre au menuTop
                  // $(".my-main-container").scrollTop(95);
                }
                //remet l'icon "loupe" du bouton search
                $(".btn-start-search").html("<i class='fa fa-search'></i>");
                $.unblockUI();
                //$(".moduleLabel").html("<i class='fa fa-connectdevelop'></i> <span id='main-title-menu'>L'Annuaire</span> <span class='text-red'>COMMUNE</span>CTÉ</h1>");
    
                //affiche la dropdown
                //$("#dropdown_search").css({"display" : "inline" });

                //active le chargement de la suite des résultat au survol du bouton "afficher plus de résultats"
                //(au cas où le scroll n'ait pas lancé le chargement comme prévu)
               	$("#btnShowMoreResult").mouseenter(function(){
                  // if(!loadingData){
                  //   startSearch(indexMin+indexStep, indexMax+indexStep);
                  //   $("#btnShowMoreResult").mouseenter(function(){});
                  // }
                });
                
                //initialise les boutons pour garder une entité dans Mon répertoire (boutons links)
                initBtnLink();

    	        } //end else (str=="")

              //signal que le chargement est terminé
              console.log("loadingData false");
              loadingData = false;

              //quand la recherche est terminé, on remet la couleur normal du bouton search
    	        $(".btn-start-search").removeClass("bg-azure");
        	  }

            console.log("scrollEnd ? ", scrollEnd, indexMax, countData , indexMin);
            //si le nombre de résultat obtenu est inférieur au indexStep => tous les éléments ont été chargé et affiché
            if(indexMax - countData > indexMin){
              $("#btnShowMoreResult").remove(); 
              scrollEnd = true;
            }else{
              scrollEnd = false;
            }

            //affiche les éléments sur la carte
            Sig.showMapElements(Sig.map, mapElements);
          }
    });

                    
  }

  // function addEventOnSearch() {
  //   $('.searchEntry').off().on("click", function(){
      
  //     //toastr.success($("#dropdown_search").position().top);
  //     var top = $(this).position().top;// + $("#dropdown_search").position().top;

  //     setSearchInput($(this).data("id"), $(this).data("type"),
  //                    $(this).data("insee"), top );
  //   });
  // }

  function initBtnLink(){
    $('.tooltips').tooltip();
  	//parcours tous les boutons link pour vérifier si l'entité est déjà dans mon répertoire
  	$.each($(".followBtn"), function(index, value){
    	var id = $(value).attr("data-id");
   		var type = $(value).attr("data-type");
   		if(type == "person") type = "people";
   		else type = type + "s";
   		//console.log("#floopItem-"+type+"-"+id);
   		if($("#floopItem-"+type+"-"+id).length){
   			//console.log("I FOLLOW THIS");
   			if(type=="people"){
	   			$(value).html("<i class='fa fa-unlink text-green'></i>");
	   			$(value).attr("data-original-title", "Ne plus suivre cette personne");
	   			$(value).attr("data-ownerlink","unfollow");
   			}
   			else{
	   			$(value).html("<i class='fa fa-user-plus text-green'></i>");
	   			
          if(type == "organizations")
	   				$(value).attr("data-original-title", "Vous êtes membre de cette organization");
	   			else if(type == "projects")
	   				$(value).attr("data-original-title", "Vous êtes contributeur de ce projet");
	   			
          //(value).attr("onclick", "");
	   			$(value).removeClass("followBtn");
	   		}
   		}
   		if($(value).attr("data-isFollowed")=="true"){
	   		$(value).html("<i class='fa fa-unlink text-green'></i>");
	   		$(value).attr("data-original-title", "Ne plus suivre");
			  $(value).attr("data-ownerlink","unfollow");
        $(value).addClass("followBtn");
   		}
   	});

  	//on click sur les boutons link
   	$(".followBtn").click(function(){
	   	formData = new Object();
   		formData.parentId = $(this).attr("data-id");
   		formData.childId = "<?php echo Yii::app() -> session["userId"] ?>";
   		formData.childType = "<?php echo Person::COLLECTION ?>";
   		var type = $(this).attr("data-type");
   		var name = $(this).attr("data-name");
   		var id = $(this).attr("data-id");
   		//traduction du type pour le floopDrawer
   		var typeOrigine = type + "s";
   		if(typeOrigine == "persons"){ typeOrigine = "<?php echo Person::COLLECTION ?>";}
   		formData.parentType = typeOrigine;
   		if(type == "person") type = "people";
   		else type = type + "s";

		var thiselement = this;
		$(this).html("<i class='fa fa-spin fa-circle-o-notch text-azure'></i>");
		//console.log(formData);
		if ($(this).attr("data-ownerlink")=="follow"){
			$.ajax({
				type: "POST",
				url: baseUrl+"/"+moduleId+"/link/follow",
				data: formData,
				dataType: "json",
				success: function(data) {
					if(data.result){
						//addFloopEntity(data.parent["_id"]["$id"], data.parentType, data.parent);
						toastr.success(data.msg);	
						$(thiselement).html("<i class='fa fa-unlink text-green'></i>");
						$(thiselement).attr("data-ownerlink","unfollow");
						$(thiselement).attr("data-original-title", "Ne plus suivre");
						//if(type=="people"){
							addFloopEntity(id, type, data.parentEntity);
						//}
					}
					else
						toastr.error(data.msg);
				},
			});
		} else if ($(this).attr("data-ownerlink")=="unfollow"){
			formData.connectType =  "followers";
			console.log(formData);
			$.ajax({
				type: "POST",
				url: baseUrl+"/"+moduleId+"/link/disconnect",
				data : formData,
				dataType: "json",
				success: function(data){
					if ( data && data.result ) {
						$(thiselement).html("<i class='fa fa-chain'></i>");
						$(thiselement).attr("data-ownerlink","follow");
						$(thiselement).attr("data-original-title", "Suivre");
						removeFloopEntity(data.parentId, type);
						toastr.success("<?php echo Yii::t("common","You are not following") ?> "+data.parentEntity.name); //+" <?php echo Yii::t("common","anymore") ?>");	
					} else {
					   toastr.error("You leave succesfully");
					}
				}
			});
		}
   	});
   	//on click sur les boutons link
    $(".btn-tag").click(function(){
      setSearchValue($(this).html());
    });
  }



  function setSearchValue(value){
    $("#searchBarText").val(value);
    startSearch(0, 100);
  }

</script>
