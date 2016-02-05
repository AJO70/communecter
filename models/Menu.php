<?php
class Menu {

    function __construct() {
        $cs = Yii::app()->getClientScript();
        //$cs->registerScriptFile($moduleAssetsUrl.'/js/communecter.js');
    }

    public static $infoMenu = array();

	public static $sectionMenu = array();
    
    public static function person($person)
    {
        if( !is_array( Yii::app()->controller->toolbarMBZ ))
            Yii::app()->controller->toolbarMBZ = array();
        //$mbz = array("<li id='linkBtns'><a href='javascript:;' class='tooltips ' data-placement='top' data-original-title='This Organization is disabled' ><i class='text-red fa fa-times '></i>DISABLED</a></li>");
        $id = (string)$person["_id"];
        
        //HOME
        //-----------------------------
        self::entry("left", 'showAjaxPanel',"Person Details : ".$person['name'], 
                    Yii::t("common", "Details"), 
                    'user',
                    '/person/detail/id/'.$id,"person", "detail");
        
        //SEND MESSAGE
        //-----------------------------
        if(isset($person["_id"]) && isset(Yii::app()->session["userId"]) && $person["_id"] != Yii::app()->session["userId"]){
            self::entry("right", 'onclick',
                        Yii::t( "common", "Send a message to this Person"), 
                        Yii::t( "common", "Contact"),
                        'envelope-o',
                        "loadByHash( '#news.index.type.citoyens.id.".$id."')",null,null);
        }
        
        //DIRECTORY
        //-----------------------------
        self::entry("left", 'onclick', 
                    Yii::t("common", 'Show his directory'), 
                    Yii::t("common", 'Directory'),
                    'bookmark fa-rotate-270',
                    "loadByHash('#person.directory.id.".$id."?tpl=directory2&isNotSV=1')",null,null);
        
        //FOLLOW BUTTON
        //-----------------------------
        if(isset($person["_id"]) && isset(Yii::app()->session["userId"]) && $person["_id"] != Yii::app()->session["userId"]){
            //Link button
            if(isset($person["_id"]) && isset(Yii::app()->session["userId"]) && Link::isConnected( Yii::app()->session['userId'] , Person::COLLECTION , (string)$person["_id"] , Person::COLLECTION ))
                $htmlFollowBtn = array('tooltip' => Yii::t( "common", "Unfollow this Person"), 
                                       'position'   => "right",
                                       'label' => Yii::t( "common", "Unfollow"), 
                                       "iconClass"=>"disconnectBtnIcon fa fa-unlink",
                                        "href"=>"<a href='javascript:;' class='unfollowBtn text-red tooltips btn btn-default' data-name=\"".$person["name"]."\" data-id='".$person["_id"]."' data-type='".Person::COLLECTION."' data-ownerlink='".link::person2person."' ");
            else
                $htmlFollowBtn = array('tooltip' => Yii::t( "common", "Follow this Person"), 
                                       'position'   => "right",
                                       'label' => Yii::t( "common", "Follow"), 
                                        "iconClass"=>"connectBtnIcon fa fa-unlink",
                                        "href"=>"<a href='javascript:;' class='followBtn tooltips btn btn-default ' id='addKnowsRelation'  data-id='".$person["_id"]."' data-ownerlink='".link::person2person."' ");
            array_push(Yii::app()->controller->toolbarMBZ, $htmlFollowBtn);
        } 
        if( Yii::app()->controller->id == "person" && Yii::app()->controller->action->id == "directory" 
            && isset($person["_id"]) 
            && isset(Yii::app()->session["userId"]) 
            && $person["_id"] == Yii::app()->session["userId"] ){
            $onclick = "showPanel('box-add',null,'ADD SOMETHING TO MY NETWORK');";
            array_push( Yii::app()->controller->toolbarMBZ, array('tooltip' => Yii::t( "common", "Add Something to your network"),
                                                                'position'   => "right",
                                                                'label' => Yii::t( "common", "Add"),
                                                                "iconClass"=>"fa fa-plus",
                                                                "href"=>"<a  class='tooltips btn btn-default' href='javascript:;' onclick=\"".$onclick."\"") );
        }
    }
	 public static function event($event)
    {
        if( !is_array( Yii::app()->controller->toolbarMBZ ))
            Yii::app()->controller->toolbarMBZ = array();
        //$mbz = array("<li id='linkBtns'><a href='javascript:;' class='tooltips ' data-placement='top' data-original-title='This Organization is disabled' ><i class='text-red fa fa-times '></i>DISABLED</a></li>");
        $id = (string)$event["_id"];
        
        //HOME
        //-----------------------------
        self::entry("left", 'showAjaxPanel', Yii::t("event","Contact information"), Yii::t("common","Details"),'home','/event/detail/id/'.$id,"event","detail");
     }
    
    public static function organization($organization)
    {
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile(Yii::app()->controller->module->assetsUrl.'/js/communecter.js');
        
        if( !is_array( Yii::app()->controller->toolbarMBZ ))
            Yii::app()->controller->toolbarMBZ = array();
        //$mbz = array("<li id='linkBtns'><a href='javascript:;' class='tooltips ' data-placement='top' data-original-title='This Organization is disabled' ><i class='text-red fa fa-times '></i>DISABLED</a></li>");
        $id = (string)$organization["_id"];
        
        //HOME
        //-----------------------------
        self::entry("left", 'onclick',
        			Yii::t("organization","Contact information"), 
        			Yii::t("common","Details"),'home',
        			"loadByHash('#organization.detail.id.".$id."')",null,null);
//        			'/organization/detail/id/'.$id,"organization","detail");
       
        //SEE TIMELINE
        //-----------------------------
        self::entry("left", 'onclick', 
        		Yii::t( "common", 'Read all news publicated by this organization'), 
        		Yii::t( "common", 'Activity'), 
        		'rss',
        		"loadByHash('#news.index.type.".Organization::COLLECTION.".id.".$id."?isNotSV=1')",null,null);
//        		'/news/index/type/'.Organization::COLLECTION.'/id/'.$id.'?isNotSV=1',"news","index");

        //DIRECTORY
        //-----------------------------
        self::entry("left", 'onclick',
        			'Member list',
        			'Members' ,
        			'connectdevelop',
        			"loadByHash('#organization.directory.id.".$id."?tpl=directory2&isNotSV=1')",null,null);
        
        //ACTION ROOMS
        //-----------------------------
        /*$onclick = "showAjaxPanel( '/rooms/index/type/".Organization::COLLECTION."/id/".$id."', 'ORGANIZATION ACTION ROOM ','legal' )"; 
        $active = (Yii::app()->controller->id == "rooms" && Yii::app()->controller->action->id == "index" ) ? "active" : ""; 
        array_push( Yii::app()->controller->toolbarMBZ, array('tooltip' => "SURVEYS : Organization Action Room",
                                                              "iconClass"=>"fa fa-legal",
                                                              "href"=>"<a class='tooltips ".$active." btn btn-default' href='javascript:;' onclick=\"".$onclick."\"") );
        */
        // ADD MEMBER
        //-----------------------------
        if( Authorisation::isOrganizationAdmin(Yii::app()->session['userId'],$id) ){
            self::entry("right", 'showAjaxPanel',Yii::t('common','Add a member to this organization'), Yii::t("common",'Add member'),'plus','/organization/addmember/id/'.$id.'?isNotSV=1',"organization","addmember");
        }

        //SEND MESSAGE
        //-----------------------------
        if( Authorisation::isOrganizationMember(Yii::app()->session['userId'],$id) ){
            /*self::entry("right", 'onclick',
                        Yii::t( "common", "Send a message to this Organization"), 
                        Yii::t( "common", "Contact"),
                        'envelope-o',
                        "loadByHash( '#news.index.type.organizations.id.".$id."')",null,null);*/
        }
        
        //FOLLOW BUTTON
        //-----------------------------
        /*
	    *   If disabled there are no interactive buttons
	    *	If not connected, hide admin btn and link join btn to login form
        */
        if( !isset( $organization["disabled"] ) ){
            //Link button 
            if(isset($organization["_id"]) && isset(Yii::app()->session["userId"]) && 
                Link::isLinked((string)$organization["_id"], Organization::COLLECTION, Yii::app()->session["userId"])){
	            
	            self::entry("right", 'onclick',
                        Yii::t( "common", "Leave this Organization"),
                        Yii::t( "common", "Leave"),
                        'fa fa-unlink disconnectBtnIcon',
                        "disconnectTo('organizations','".$id."','".Yii::app()->session["userId"]."','".Person::COLLECTION."','members')",null,null,"text-red"); 
                /*$htmlFollowBtn = array('tooltip' => Yii::t( "common", "Leave this Organization"), 
                                       'position'   => "right",
                                       'label' => Yii::t( "common", "Leave"), 
                                       "iconClass"=>"disconnectBtnIcon fa fa-unlink",
                                       disconnectTo(parentType,parentId,childId,childType,connectType)
                                        "href"=>"<a href='javascript:;' class='removeMemberBtn text-red tooltips btn btn-default' data-name='".$organization["name"]."' data-memberof-id='".$organization["_id"]."' data-member-type='".Person::COLLECTION."' data-member-id='".Yii::app()->session["userId"]."'");
                    array_push(Yii::app()->controller->toolbarMBZ, $htmlFollowBtn);*/
            }else{
	            /*if (@Yii::app()->session["userId"]){
			        $href = "<a href='javascript:;' class='connectBtn tooltips btn btn-default ' id='addMeAsMemberInfo'";
		        }
		        else{
					$href = "<a href='javascript:;' class='tooltips btn btn-default' onclick='showPanel(\"box-login\");'";
		        }
                $htmlFollowBtn = array('tooltip' => Yii::t( "common", "Join this Organization"), 
                                        'position'   => "right",
                                        'label' => Yii::t( "common", "Join"), 
                                        "iconClass"=> "connectBtnIcon fa fa-unlink",
                                        "href"=> $href);
				array_push(Yii::app()->controller->toolbarMBZ, $htmlFollowBtn);*/
            }
            //Ask Admin button
            if (! Authorisation::isOrganizationAdmin(Yii::app()->session["userId"], $id) && @Yii::app()->session["userId"]) {
	            $connectAs="admin";
	            if(!@$organization["links"]["members"][Yii::app()->session["userId"]]){
		            $connectAs="member";
	            }
                self::entry("right", 'onclick',
                        Yii::t( "common", "Declare me as ".$connectAs." of this organization"),
                        Yii::t( "common", "Become ".$connectAs),
                        'fa fa-user-plus becomeAdminBtn',
                        "connectTo('organizations','".$id."','".Yii::app()->session["userId"]."','".Person::COLLECTION."','".$connectAs."','".addslashes($organization["name"])."')",null,null);                      
            }
        } 
    }

    public static function city($city)
    {
        if( !is_array( Yii::app()->controller->toolbarMBZ ))
            Yii::app()->controller->toolbarMBZ = array();
        //$mbz = array("<li id='linkBtns'><a href='javascript:;' class='tooltips ' data-placement='top' data-original-title='This Organization is disabled' ><i class='text-red fa fa-times '></i>DISABLED</a></li>");
        $insee = (string)$city["insee"];
        
        //HOME
        //-----------------------------
        self::entry("left", 'onclick', 
        			Yii::t( "common", 'City Home page'),
					Yii::t( "common", 'Details'), 'university',
					"loadByHash('#city.detail.insee.".$insee."?isNotSV=1')",null,null);
        
        //SEND MESSAGE
        //-----------------------------
        /*array_push( Yii::app()->controller->toolbarMBZ , array('tooltip' => "Send a message to this City",
                                                                "iconClass"=>"fa fa-envelope-o",
                                                                "href"=>"<a href='javascript:;' class='new-news tooltips btn btn-default' data-id='".$insee."' data-type='".City::COLLECTION."' data-name='".$city['name']."'") );
        */
        
        //SEE TIMELINE
        //-----------------------------
        /*$onclick = "showAjaxPanel( '/news/index/type/".City::COLLECTION."/id/".$insee."', 'CITY ACTIVITY ','rss' )";
        $active = (Yii::app()->controller->id == "news" && Yii::app()->controller->action->id == "index" ) ? "active" : "";
        array_push( Yii::app()->controller->toolbarMBZ, array('tooltip' => "TIMELINE : City Activity",
                                                              "iconClass"=>"fa fa-rss",
                                                              "href"=>"<a  class='tooltips ".$active." btn btn-default' href='javascript:;' onclick=\"".$onclick."\"") );*/
        
        //ACTION ROOMS
        //-----------------------------
        /*$onclick = "showAjaxPanel( '/rooms/index/type/".Organization::COLLECTION."/id/".$id."', 'ORGANIZATION ACTION ROOM ','legal' )"; 
        $active = (Yii::app()->controller->id == "rooms" && Yii::app()->controller->action->id == "index" ) ? "active" : ""; 
        array_push( Yii::app()->controller->toolbarMBZ, array('tooltip' => "SURVEYS : Organization Action Room",
                                                              "iconClass"=>"fa fa-legal",
                                                              "href"=>"<a class='tooltips ".$active." btn btn-default' href='javascript:;' onclick=\"".$onclick."\"") );
        */
        //DIRECTORY
        //-----------------------------


        self::entry("left", 'onclick',
        			Yii::t( "common", 'Local network'), 
        			Yii::t( "common", 'Directory'),'bookmark fa-rotate-270',
        			"loadByHash('#city.directory.insee.".$insee."?tpl=directory2&isNotSV=1')",null,null);
        			//'/city/directory/insee/'.$insee.'?isNotSV=1&tpl=directory2',"city","directory");

        //STATISTICS
        //-----------------------------
        self::entry("left", 'onclick',
        			Yii::t( "common", 'Show some statistics about this city'),
        			Yii::t( "common", 'Statistics'), 'line-chart',
        			"loadByHash('#city.opendata.insee.".$insee."?isNotSV=1')",null,null);
//        			'/city/opendata/insee/'.$insee.'?isNotSV=1',"city","opendata");

        //FOLLOW BUTTON
        //-----------------------------
        /*if( !isset( $organization["disabled"] ) ){
            //Link button
            if(isset($organization["_id"]) && isset(Yii::app()->session["userId"]) && Link::isLinked((string)$organization["_id"], Organization::COLLECTION , Yii::app()->session["userId"]))
                $htmlFollowBtn = array('tooltip' => "leave this Organization", 
                                       "iconClass"=>"disconnectBtnIcon fa fa-unlink",
                                        "href"=>"<a href='javascript:;' class='removeMemberBtn text-red tooltips btn btn-default' data-name='".$organization["name"]."' data-memberof-id='".$organization["_id"]."' data-member-type='".Person::COLLECTION."' data-member-id='".Yii::app()->session["userId"]."'");
            else
                $htmlFollowBtn = array('tooltip' => "join this Organization", 
                                        "iconClass"=>"connectBtnIcon fa fa-unlink",
                                        "href"=>"<a href='javascript:;' class='connectBtn tooltips btn btn-default ' id='addMeAsMemberInfo'");
            array_push(Yii::app()->controller->toolbarMBZ, $htmlFollowBtn);
            
            //Ask Admin button
            if (! Authorisation::isOrganizationAdmin(Yii::app()->session["userId"], $id)) {
                array_push(Yii::app()->controller->toolbarMBZ, array('tooltip' => "Declare me as admin of this organization",   
                                                                     "iconClass"=>"fa fa-user-plus",
                                                                     "href"=>"<a href='javascript:;' class='declare-me-admin tooltips btn btn-default' data-id='".$id."' data-type='".Organization::COLLECTION."' data-name='".$organization['name']."'") );
            }
        } */
    }

    public static function news()
    {
        if( !is_array( Yii::app()->controller->toolbarMBZ ))
            Yii::app()->controller->toolbarMBZ = array();
        
        //FILTERs
        //-----------------------------
       // self::entry("left", 'filter','SHOW NEWS ONLY','rss',null,"newsFeed",".news");
        //self::entry("left", 'filter','SHOW NETWORK ACTIVITY','exchange',null,"newsFeed",".activityStream");
        //self::entry("left", 'filter',"SHOW PEOPLE ENTRIES ONLY",'user',null,"newsFeed",".citoyens");
        //self::entry("left", 'filter',"SHOW ORGANIZATION ENTRIES ONLY",'users',null,"newsFeed",".organizations");
        //self::entry("left", 'filter',"SHOW EVENT ENTRIES ONLY",'calendar',null,"newsFeed",".events");
        //self::entry("left", 'filter',"SHOW PROJECT ENTRIES ONLY",'lightbulb-o',null,"newsFeed",".projects");

	        self::entry("right", 'onclick',Yii::t( "common", "Show tag filters"), Yii::t( "common", 'Search by tag'),'tags',"toggleFilters('#tagFilters')",null,null,"tagFilter");
	        self::entry("right", 'onclick',Yii::t( "common", "Show scope filters"), Yii::t( "common", 'Search by place'), 'circle-o',"toggleFilters('#scopeFilters')",null,null,"scopeFilter");
        //}
    }

    public static function project($project)
    {
        if( !is_array( Yii::app()->controller->toolbarMBZ ))
            Yii::app()->controller->toolbarMBZ = array();
        
        $id = (string)$project["_id"];

        //SEE DISCUSSION ROOMS
        //-----------------------------
        //self::entry("left",  null,"See Project Discussion","comments-o","/rooms/index/type/projects/id/".$id,"rooms","index",null );

        //SEND MESSAGE
        //-----------------------------
        //self::entry("left", null,"Post Something","envelope-o",null,null,null,"new-news");

        //HOME
        //-----------------------------
        self::entry("left", 'onclick',
        			Yii::t( "common", 'General information about this project'),
        			Yii::t( "common", 'Details'), 'home',
        			"loadByHash( '#project.detail.id.".$id."')",null,null);

        //SEE TIMELINE
        //-----------------------------
        self::entry("left",  'onclick',
        			Yii::t( "common", "Read all news publicated by this project"),
        			Yii::t( "common", 'Activity'), "rss",
        			"loadByHash('#news.index.type.".Project::COLLECTION.".id.".$id."?isNotSV=1')",null,null);

        //DIRECTORY
        //-----------------------------
        self::entry("left", 'onclick',
        Yii::t( "common", "Project contributors"), 
        Yii::t( "common", 'Contributors'), 'connectdevelop',
        "loadByHash('#project.directory.id.".$id."?tpl=directory2&isNotSV=1')",null,null);
                // ADD MEMBER
        //-----------------------------
        if( Authorisation::isProjectAdmin($id,Yii::app()->session['userId']) ){
            self::entry("right", 'showAjaxPanel',Yii::t('common','Add a contributor to this project'), Yii::t("common",'Add contributor'),'plus','/project/addcontributorsv/projectId/'.$id.'?isNotSV=1',"project","addcontributorsv");
        }
		if(isset($project["_id"]) && isset(Yii::app()->session["userId"]) && 
                Link::isLinked((string)$project["_id"], Project::COLLECTION, Yii::app()->session["userId"])){
	            
	            self::entry("right", 'onclick',
                        Yii::t( "common", "Leave this project"),
                        Yii::t( "common", "Leave"),
                        'fa fa-unlink disconnectBtnIcon',
                        "disconnectTo('projects','".$id."','".Yii::app()->session["userId"]."','".Person::COLLECTION."','contributors')",null,null,"text-red");
                        } 
        if (! Authorisation::isProjectAdmin($id, Yii::app()->session["userId"])) {
	         $connectAs="admin";
	            if(!@$project["links"]["contributors"][Yii::app()->session["userId"]]){
		            $connectAs="contributor";
	            }
                self::entry("right", 'onclick',
                        Yii::t( "common", "Declare me as ".$connectAs." of this organization"),
                        Yii::t( "common", "Become ".$connectAs),
                        'fa fa-user-plus becomeAdminBtn',
                        "connectTo('projects','".$id."','".Yii::app()->session["userId"]."','".Person::COLLECTION."','".$connectAs."','".addslashes($project["name"])."')",null,null); 
           }
    }

    public static function entry($position,$type,$title,$label,$icon,$url,$controllerid,$actionid,$class=null,$badge=null)
    {
        if( $type == 'showAjaxPanel')
        {
            $active = (Yii::app()->controller->id == $controllerid && Yii::app()->controller->action->id == $actionid ) ? "active" : "";
            $onclick = "showAjaxPanel( '".$url."', '".$title."','".$icon."' )";
            $entry = array( 'tooltip'   => $title,
                            'position'   => $position,
                            "iconClass" => "fa fa-".$icon,
                            "label"     => $label,
                            "badge"     => $badge,
                            "href"      => "<a  class='tooltips ".$active." btn btn-default' href='javascript:;' onclick=\"".$onclick."\"");
        } 
        else if( $type == 'filter')
        {
            $entry = array( 'tooltip'    => $title,
                            'position'   => $position,
                            "iconClass" => "fa fa-".$icon,
                            "label"     => $label,
                            "badge"     => $badge,
                            "href"      => "<a  class='tooltips filter btn btn-default' href='javascript:;' data-filter=\"".$actionid."\"");
        } 
        else if( $type == 'onclick')
        { 
            $onclick = $url;
            $entry = array( 'tooltip'    => $title,
                            'position'   => $position,
                            "iconClass" => "fa fa-".$icon,
                            "label"     => $label,
                            "badge"     => $badge,
                            "href"      => "<a  class='tooltips btn btn-default ".$class."' href='javascript:;' onclick=\"".$onclick."\"");
						

        }
        else 
        {
            $entry = array( 'tooltip'    => $title,
                            'position'   => $position,
                            "label"     => $label,
                            "iconClass" => "fa fa-".$icon,
                            "href"      => "<a href='javascript:;' class='".$class." coco tooltips btn btn-default' data-notsubview='1' ");
        }
        array_push( Yii::app()->controller->toolbarMBZ, $entry);
    }

    public static function add2MBZ($entry)
    {
        if( !is_array( Yii::app()->controller->toolbarMBZ ))
            Yii::app()->controller->toolbarMBZ = array();
        
        array_push( Yii::app()->controller->toolbarMBZ , $entry );
    }

    public static function menuItems($conn=null,$type=null)
    {
        $result = array();
        return $result;
    } 

    public static function buildMenu($children,$parentId,$menu = array())
    {
        foreach ($children as $v) 
        {
            if($parentId == $v->parentMenuItemId)
            {
                $id = (isset($v->menuItemId)) ? $v->menuItemId : null;
                $lbl = (isset($v->menuItemLabelFr)) ? $v->menuItemLabelFr : null;   
                $menu[] = array( "label"=>$v->menuItemLabelFr  , "onclick"=>"bootbox.alert('".$v->menuItemLabelEn."')" , "key"=>$v->menuItemId , "children"=>TeeoApi::buildMenu($children, $id) );
            }
        }
        return $menu;
    }

    public static function buildLi2( $item )
    {
      $modal = ( @$item["isModal"]) ? 'role="button" data-toggle="modal"' : "";
      $onclick = ( @$item["onclick"]) ? 'onclick="'.$item["onclick"].'"' 
                                           : ( ( @$item["key"] && false) ? 'onclick="scrollTo(\'#block'.$item["key"].'\')"' 
                                                                      : "" );
      $href = ( @$item["href"]) ? (stripos($item["href"], "http") === false) ? Yii::app()->createUrl($item["href"]) : $item["href"] : "javascript:;";
      $class = ( @$item["class"]) ? 'class="'.$item["class"].'"' : "";
      $class .= " homestead text-extra-large";
      $icon = ( @$item["iconClass"]) ? '<i class="'.$item["iconClass"].'"></i>' : '';
      $isActive = ( isset( Menu::$sectionMenu[ @$item["key"] ] ) && in_array( Yii::app()->controller->action->id, Menu::$sectionMenu[ $item["key"] ] ) ) ? true : false;
      
      $active = ( $isActive || ( @$item["active"] && $item["active"] ) ) ? "open active" : "";
      

      //This menu can have 2 levels
      if( isset($item["children"]) ){
            echo '<li><a href="javascript:;">'.
                  '<span class="status">'.
                    '<i class="fa fa-caret-down"></i>'.
                    '<span class="badge">'.count($item["children"]).'</span>'.
                  '</span>'.
                  $item["label"].
                  '</a>';
            echo "<ul class='sub-menu'>";
              foreach( $item["children"] as $item2 )
              {
                  buildLi22($item2);
              }
            echo "</ul></li>";
          }
      else
        echo '<li><a href="'.$href.'" '.$modal.' '.$class.' '.$onclick.' >'.@$item["label"].'</a></li>';
    }

} 
?>