

<style type="text/css">

	.dropdown.open #dropdown-multi-tag,
	.dropdown.open #dropdown-multi-scope{
		display: inline !important;
	}

	#dropdown-multi-tag, 
	#dropdown-multi-scope{
		position: absolute;
	    top: -5px;
		left: -5px;
	    z-index: 1000;
	    display: none;
	    float: left;
	    padding: 5px 0;
	    margin: 2px 0 0;
	    font-size: 14px;
	    text-align: left;
	    list-style: none;
	    background-color: #fff;
	    -webkit-background-clip: padding-box;
	    background-clip: padding-box;
	    border: 1px solid #ccc;
	    border: 1px solid rgba(0,0,0,.15);
	    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
	    box-shadow: 0 6px 12px rgba(0,0,0,.175);

	    width: 550px;
		min-width: 550px;
		max-width: 550px;
		margin-top: 4px;
		border-radius: 0px 0px 4px 4px;
	}
	#dropdown-multi-scope {
	    left: 0px;
	}
	#dropdown-multi-tag input.form-control,
	#dropdown-multi-scope input.form-control {
	    text-align: left;
	    border-radius: 0px !important;
	    padding: 5px;
	    height: 34px !important;
	}

	#dropdown-multi-tag .item-tag-input,
	#dropdown-multi-scope .item-scope-input{
		padding:6px;
		border-radius:20px;
		display: inline-block;
		margin-right: 3px;
		margin-top: 3px;
	}
	#dropdown-multi-tag .item-tag-input .item-tag-checker:hover,
	#dropdown-multi-tag .item-tag-input .item-tag-deleter:hover,
	#dropdown-multi-scope .item-scope-input .item-scope-checker:hover,
	#dropdown-multi-scope .item-scope-input .item-scope-deleter:hover{
		color:#ffa9a9;
	}

	#dropdown-multi-tag .item-tag-input .item-tag-name,
	#dropdown-multi-scope .item-scope-input .item-scope-name{
	    padding-left: 5px;
	    padding-right: 5px;
	}

	#dropdown-multi-tag .item-tag-input a,
	#dropdown-multi-scope .item-scope-input a{
	    color:white;
	}

	#btn-modal-multi-scope, #btn-modal-multi-tag{
		/*border-radius: 30px;
		border: 0px none;
		padding: 10px;
		width: 40px;
		height: 40px;
		margin-top: 5px;
		font-size: 15px;
		margin-right:8px;*/
		border-radius: 30px;
		border: 0px none;
		padding: 5px;
		width: 35px;
		height: 35px;
		margin-top: 8px;
		font-size: 15px;
		margin-right: 2px;
		background-color: white;
	}

	#dropdown-multi-scope .input-group-addon, 
	#dropdown-multi-tag .input-group-addon{
		background-color: rgba(192, 192, 192, 0.42) !important;
	    border-radius: 4px 0px 0px 4px !important;
	    color: #555 !important;
	    height: 34px;
	    border: 1px solid rgba(128, 128, 128, 0) !important;
	}

	#dropdown-multi-scope .item-tag-input.bg-red.disabled,
	#dropdown-multi-tag .item-tag-input.bg-red.disabled{
		background-color:#DBBCC1 !important;
	}

	@media screen and (max-width: 767px) {
		#dropdown-multi-tag .modal-dialog,
		#dropdown-multi-scope .modal-dialog{
			width: 100% !important;
			min-width: 100% !important;
			max-width: 100% !important;	
		}
	}
</style>

<?php $this->renderPartial('../default/menu/multi_tag'); ?>
<?php $this->renderPartial('../default/menu/multi_scope'); ?>


<script>
/*function openCommonModal(hash){ console.log("search for modal key :", hash);
	var urls = {
		"organization.addorganizationform": { 
			what: { 
				title: 	"Créer une organisation",
				icon: 	"users",
				desc: 	""
			},
			//url:"organization/addorganizationform",
			id: ""
		},
		"project.projectsv": { 
			what: { 
				title: 	"Créer un projet",
				icon: 	"lightbulb-o",
				desc: 	""
			},
			//url:"project/projectsv",
			id: ""
		},
	};

	if(typeof urls[hash] != "undefined"){ console.log("modal key found");
		var slashHash = hash.replace( /\./g,"/" );
		var url = "/" + moduleId + "/" + slashHash; //urls[hash]["url"];
		getModal(urls[hash]["what"], url); //, urls[hash]["id"])
	}else{
		console.log("modal key not found");
	}
}*/
</script>