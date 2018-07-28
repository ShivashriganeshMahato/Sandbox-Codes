<?php
	/*
		@author Aadhithya Kannan
		@date   20 November 2017
		COPYRIGHT SANDBOX LLC
	*/

	require "checklogin.php";
	$text = json_decode(file_get_contents("languages/en-US.json"), true);
?>

<!DOCTYPE HTML>
<html lang="en" ng-app="playground">
	<head>
		<title><?php echo $text["title"]; ?></title>
		<link rel="stylesheet" type="text/css" href="Sandbox_Back/css/playground.css" />
		<link href="node_modules/fine-uploader/all.fine-uploader/fine-uploader-new.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://togetherjs.com/togetherjs-min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
        <script src="controller.js"></script>
	</head>
	<body style="background-color:rgba(255,255,255,0.2);">
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <span class="close">&times;</span>
        <div class="modal-content" style="border-radius: 64px">
            <div class="modal-header" id="fileheader">Create New File!</div>
            <div class="modal-header" id="folderheader" style="display: none;">Create New Folder!</div>
            <div class="modal-body">
                <fieldset style="    margin-top: 1%;">
                    <label class="switch">
                        <input value="None" type="checkbox" id="letscheck" onchange="switcher()">
                        <span class="slider"></span>
                    </label>
                </fieldset>
                <form id="fileform" class="animated fadeIn">
                    <fieldset style="    margin-top: 2%;">
                        Filename:<br>
                        <input id="filename" class="inputname" type="text" oninput="typeUpdater()" autocomplete="off" required>
                    </fieldset>
                    <fieldset style="    margin-top: 2%;">
                        File type:
                        <select id="filechoose">
                            <option value="java">Java</option>
                            <option value="python">Python</option>
                            <option value="javascript">JavaScript</option>
                            <option value="html">HTML</option>
                            <option value="css">CSS</option>
                            <option value="cplusplus">C++</option>
                            <option value="objc">Objective-C</option>
                            <option value="csharp">C#</option>
                            <option value="ruby">Ruby</option>
                        </select>
                    </fieldset>
                    <fieldset style="    margin-top: 2%;">
                        <div style="float:right; background-color:green; margin-right: 5%" class="goBtn" onclick="addFile()">Create</div>
                        <div style="float:left; background-color:#FF3366; margin-left: 5%;" class="goBtn" onclick="closeModal()">Cancel</div>
                    </fieldset>
                </form>
                <form id="folderform" style="display: none;" class="animated fadeIn">
                    <fieldset style="    margin-top: 2%;">
                        Foldername:<br>
                        <input id="foldername" class="inputname" type="text" autocomplete="off">
                    </fieldset>
                    <fieldset style="    margin-top: 2%;">
                        <div style="float:right; background-color:green;margin-right: 5% " class="goBtn" onclick="">Create</div>
                        <div style="float:left; background-color:#FF3366; margin-left:5%" class="goBtn" onclick="closeModal()">Cancel</div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <!-- *************************************************** -->
			<!-- ********************* DOWNLOAD ******************** -->
			<!-- *************************************************** -->
		<iframe id="download"></iframe>

			<!-- *************************************************** -->
			<!-- ********************* TOOLBAR ********************* -->
			<!-- *************************************************** -->
            <nav class="navbar-default" style="background:url('../images/blur.jpg');background-size: cover">
                <div class="container-fluid">
                    <div class="navbar-header" style="width: 20%">
                        <button value="" onclick="openModal()" class="btn navbar-btn toolbarButton"><i class="fas fa-plus fa-2x"></i></button>
                        <button value="" id="runButton" class="btn navbar-btn toolbarButton"><i class="fas fa-play fa-2x"></i></button>
                        <button type="button" id="btn-add-tab" class="btn btn-primary pull-right">Add Tab</button>
                        <button class="dropdown btn navbar-btn toolbarButton">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="."><span style="color:white" class="fas fa-ellipsis-h fa-2x"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:temper('chrome')">chrome</a></li>
                                <li><a href="javascript:temper('clouds')">clouds</a></li>
                                <li><a href="javascript:temper('clouds_midnight')">clouds_midnight</a></li>
                                <li><a href="javascript:temper('cobalt')">cobalt</a></li>
                                <li><a href="javascript:temper('crimson_editor')">crimson_editor</a></li>
                                <li><a href="javascript:temper('dawn')">dawn</a></li>
                                <li><a href="javascript:temper('eclipse')">eclipse</a></li>
                                <li><a href="javascript:temper('idle_fingers')">idle_fingers</a></li>
                                <li><a href="javascript:temper('kr_theme')">kr_theme</a></li>
                                <li><a href="javascript:temper('merbivore')">merbivore</a></li>
                                <li><a href="javascript:temper('merbivore_soft')">merbivore_soft</a></li>
                                <li><a href="javascript:temper('mono_industrial')">mono_industrial</a></li>
                                <li><a href="javascript:temper('monokai')">monokai</a></li>
                                <li><a href="javascript:temper('pastel_on_dark')">pastel_on_dark</a></li>
                                <li><a href="javascript:temper('solarized_dark')">solarized_dark</a></li>
                                <li><a href="javascript:temper('solarized_light')">solarized_light</a></li>
                                <li><a href="javascript:temper('text_mate')">text_mate</a></li>
                                <li><a href="javascript:temper('tomorrow')">tomorrow</a></li>
                                <li><a href="javascript:temper('tomorrow_night')">tomorrow_night</a></li>
                                <li><a href="javascript:temper('tomorrow_night_blue')">tomorrow_night_blue</a></li>
                                <li><a href="javascript:temper('tomorrow_night_bright')">tomorrow_night_bright</a></li>
                                <li><a href="javascript:temper('tomorrow_night_eighties')">tomorrow_night_eighties</a></li>
                                <li><a href="javascript:temper('twilight')">twilight</a></li>
                                <li><a href="javascript:temper('vibrant_ink')">vibrant_ink</a></li>
                            </ul>
                        </button>
                    </div>
                    <div class="nav navbar-nav navbar-right" style="	margin-top:0.5%;
	margin-right: 3%;">
                        <img class="bordered-circle-green" src="https://ui-avatars.com/api/?size=40&background=a0a0a0&rounded=true">
                        <img src="https://ui-avatars.com/api/?size=40&background=a0a0a0&rounded=true">
                        <img src="https://ui-avatars.com/api/?size=40&background=a0a0a0&rounded=true">
                        <button onclick="shareFile()" id="addpeople"><span class="fas fa-plus"></span></button>
                    </div>
                </div>
            </nav>
            <div id="leftcol">
			<!-- *************************************************** -->
			<!-- ******************* FILE MANAGER ****************** -->
			<!-- *************************************************** -->
			<div id="filemanager" ng-controller="controller">
                <ul style="color: black;" ng-bind-html="scan"></ul>
            </div>

			<!-- *************************************************** -->
			<!-- ******************* CURSOR MENUS ****************** -->
			<!-- *************************************************** -->
			<div id="foldermenu">
                <li id="folderNewFile" class="contextMenuItem"><span class="fas fa-file"></span> <?php echo $text["newFile"]; ?></li>
				<li id="folderNewFolder" class="contextMenuItem"><span class="fas fa-folder"></span> <?php echo $text["newFolder"]; ?></li>
				<li id="folderRenameFolder" class="contextMenuItem"><span class="fas fa-pencil-alt"></span> <?php echo $text["renameFolder"]; ?></li>
				<li id="folderDuplicateFolder" class="contextMenuItem"><span class="fas fa-copy"></span> <?php echo $text["duplicateFolder"]; ?></li>
				<div class="lineBreak"></div>
				<li id="folderDownloadFolder" class="contextMenuItem"><span class="fas fa-cloud-download-alt"></span> <?php echo $text["downloadFolder"]; ?></li>
				<li id="folderUpload" class="contextMenuItem"><span class="fas fa-cloud-upload-alt"></span> <?php echo $text["upload"]; ?></li>
				<div class="lineBreak"></div>
				<li id="folderEmpty" class="contextMenuItem"><span class="fas fa-folder-open"></span> <?php echo $text["emptyFolder"]; ?></li>
				<li id="folderDelete" class="contextMenuItem"><span class="fas fa-trash"></span> <?php echo $text["deleteFolder"]; ?></li>
				<div class="lineBreak"></div>
				<li id="folderRefresh" class="contextMenuItem"><span class="fas fa-sync-alt"></span> <?php echo $text["refreshFiles"]; ?></li>
			</div>

			<div id="filemenu">
                <li id="folderNewFile" class="contextMenuItem"><span class="fas fa-file"></span> <?php echo $text["newFile"]; ?></li>
                <li id="folderNewFolder" class="contextMenuItem"><span class="fas fa-folder"></span> <?php echo $text["newFolder"]; ?></li>
                <li id="folderRenameFolder" class="contextMenuItem"><span class="fas fa-pencil-alt"></span> <?php echo $text["renameFile"]; ?></li>
                <li id="folderDuplicateFolder" class="contextMenuItem"><span class="fas fa-copy"></span> <?php echo $text["duplicateFile"]; ?></li>
                <div class="lineBreak"></div>
                <li id="folderDownloadFolder" class="contextMenuItem"><span class="fas fa-cloud-download-alt"></span> <?php echo $text["downloadFolder"]; ?></li>
                <li id="folderUpload" class="contextMenuItem"><span class="fas fa-cloud-upload-alt"></span> <?php echo $text["upload"]; ?></li>
                <div class="lineBreak"></div>
                <li id="folderDelete" class="contextMenuItem"><span class="fas fa-trash"></span> <?php echo $text["deleteFile"]; ?></li>
                <div class="lineBreak"></div>
                <li id="folderRefresh" class="contextMenuItem"><span class="fas fa-sync-alt"></span> <?php echo $text["refreshFiles"]; ?></li>
			</div>
		</div>
		<!-- *************************************************** -->
		<!-- ***************** ACE CODE EDITOR ***************** -->
		<!-- *************************************************** -->
            <div class="rightcol">
                <ul id="tab-list" class="nav navbar-nav nav-tabs" >
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href=".">Menu 1</a></li>
                    <li><a href=".">Menu 2</a></li>
                    <li><a href=".">Menu 3</a></li>
                </ul>
		<div id="editor"></div>
		
		<!-- *************************************************** -->
		<!-- ******************** TERMINAL ********************* -->
		<!-- *************************************************** -->
		<div id="terminal">
			<iframe id="consoleFrame" src="http://localhost:7681/" width=100% height=100%></iframe>
		</div>
		
		<script src="Sandbox_Back/ace_editor/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
		<script src="Sandbox_Back/ace_editor/src-noconflict/ext-language_tools.js"></script>
		<script>
            function switcher(){
                if(document.getElementById("letscheck").checked === true){
                    document.getElementById("fileform").style.display="none";
                    document.getElementById("folderform").style.display="block";
                    document.getElementById("fileheader").style.display="none";
                    document.getElementById("folderheader").style.display="block";
                }else{
                    document.getElementById("fileform").style.display="block";
                    document.getElementById("folderform").style.display="none";
                    document.getElementById("fileheader").style.display="block";
                    document.getElementById("folderheader").style.display="none";
                }
            }
            function closeModal(){
                var modal = document.getElementById('myModal');
                modal.style.display="none";
            }
            function openModal(){
                var modal = document.getElementById('myModal');
                modal.style.display="block";
            }
            function typeUpdater(){
                var name = document.getElementById("filename").value;
                var array =[".java",".py",".js",".html",".css",".cpp",".cs",".m",".rb"];
                var actual =["java","python","javascript","html","css","cplusplus","csharp","objc","ruby"];
                var temp = "";
                for(i =0; i<array.length;i++){
                    if(name.substring(name.indexOf(".")) === array[i]){
                        temp=actual[i];
                        document.getElementById("filechoose").value = actual[i];
                    }
                }
            }
            function temper(theme){
                var editor = ace.edit('editor');
                editor.setTheme("ace/theme/"+theme);
            }
			$(document).ready(function(){
				/****************************************************
				 *********** ACTIVE DIRECTORY VARIABLES *************
				 ****************************************************/
				//active directory files
				var active_dir = "/Applications/MAMP/htdocs/Sandbox 2.0/Users/aadhi0319";
				var active_file = "";
				var activeRight = "";
				var ext = "";
				var name = ""
				
				//debug variables
				var debug = true;
				var breakpointAnchors = [];
				
				/****************************************************
				 **************** ACE CODE EDITOR  *******************
				 ****************************************************/
				ace.require("ace/ext/language_tools");
				var editor = ace.edit("editor");
				editor.setOptions({
					enableBasicAutocompletion: true,
					enableSnippets: true,
					enableLiveAutocompletion: false
				});
				editor.setTheme("ace/theme/chrome");
				editor.getSession().setMode("ace/mode/javascript");
				editor.getSession().on('change', function() {
					save(editor, false);					
				});
				
				/****************************************************
				 *************** ACE CODE DEBUGGER  *****************
				 ****************************************************/
				editor.on("guttermousedown", function(e) {
					if(debug){
						var target = e.domEvent.target; 
						if (target.className.indexOf("ace_gutter-cell") == -1) //make sure that user clicked on a gutter cell
							return;

						var breakpoints = e.editor.session.getBreakpoints(row, 0);
						var row = e.getDocumentPosition().row;
						if(typeof breakpoints[row] === typeof undefined){ //add breakpoint
							e.editor.session.setBreakpoint(row);
							breakpointAnchors.push(editor.getSession().getDocument().createAnchor(row, 0)); 
							breakpointAnchors[breakpointAnchors.length-1].on("change", function(element){
								e.editor.session.clearBreakpoint(element.old.row); //moves breakpoint in sync with line of code
								e.editor.session.setBreakpoint(element.value.row);
							});
						}else{ //delete breakpoint
							e.editor.session.clearBreakpoint(row);
							breakpointAnchors.forEach(function(element, index) {
								if(row == element.row){
									element.detach();
									breakpointAnchors.splice(index, 1);	
								}
							});
						}
						e.stop();
					}
				});

				/****************************************************
				 **************** HELPER FUNCTIONS ******************
				 ****************************************************/
				function compile(in_editor){
					$.ajax({	
						type: "POST",
						url: "compile2.php",
						data: {
							code: in_editor.getValue(),
							filepath: active_file
						},
						dataType: "text",
						success: function(data){
							if(data){
								var htmldiv = document.createElement("div");
								htmldiv.innerHTML = data;
								swal({
									content: htmldiv,
									className: "swal-compiled",
									buttons: false
								});
							}else{
								$("#consoleFrame").attr("src", "http://localhost:7680/");
								const socket = new WebSocket('ws://localhost:7680');
								socket.addEventListener('close', function (event) {
									$("#consoleFrame").attr("src", "http://localhost:7681/");
								});
							}
						}
					});
				}
				
				function save(in_editor, notify){
					$.ajax({	
						type: "POST",
						url: "saveFile.php",
						data: {
							code: in_editor.getValue(),
							path: active_file
						},
						dataType: "text",
						success: function(data){
							if(notify)
								swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
						},
						error: function(data){
							if(notify)
								swal({icon:"error", buttons:false, timer:1000, className:"swal-icon-notification"});
						}
					});
				}
				
				//not yet tested
				function readFile(filepath){
					$.ajax({	
						type: "POST",
						url: "readFile.php",
						data: {
							path: filepath
						},
						dataType: "text",
						success: function(data){
							editor.setValue(data, -1);
							editor.getSession().setMode("ace/mode/"+ext);
						}
					});	
				}
				
				function sleep(ms) {
					return new Promise(resolve => setTimeout(resolve, ms));
				}
					/****************************************************
				 	************* HELPER FUNCTIONS (FILES) **************
				 	****************************************************/
				function createFile(in_editor){
					swal({
					  content: {
						element: "input",
						attributes: {
						  placeholder: "sandbox.txt",
						  type: "text",
						},
					  },
						text: "<?php echo $text["createFilePrompt"]; ?>"
					}).then((value) => {
						ext = value.split(".")[1];
						active_file = active_dir + "<?php echo DIRECTORY_SEPARATOR; ?>" + value;
						  $.ajax({	
							type: "POST",
							url: "newFile.php",
							data: {
								path: active_file
							},
							dataType: "text",
							success: function(data){
								swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
								//replace with readfile later
								$.ajax({	
									type: "POST",
									url: "readFile.php",
									data: {
										path: active_file
									},
									dataType: "text",
									success: function(data){
										editor.setValue(data, -1);
										editor.getSession().setMode("ace/mode/"+ext);
									}
								});
								scan();
							},
							error: function(data){
								swal({icon:"error", buttons:false, timer:1000, className:"swal-icon-notification"});
							}
						});
					});
				}
				
				function renameFile(filepath){
					swal({
					  content: {
						element: "input",
						attributes: {
						  placeholder: "sandbox",
						  type: "text",
						},
					  },
						text:"<?php echo $text["renameFilePrompt"]; ?>"
					}).then((value) => {

						var newdir = filepath.substring(0, filepath.lastIndexOf("/")+1) + value;
						  $.ajax({	
							type: "POST",
							url: "rename.php",
							data: {
								oldpath: filepath,
								newpath: newdir
							},
							dataType: "text",
							success: function(data){
								swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
								scan();
							},
							error: function(data){
								swal({icon:"error", buttons:false, timer:1000, className:"swal-icon-notification"});
							}
						});
					});
				}
				
				function duplicateFile(filepath){
					$.ajax({	
							type: "POST",
							url: "duplicateFile.php",
							data: {
								filepath: filepath
							},
							dataType: "text",
							success: function(data){
								swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
								scan();
							},
							error: function(data){
								swal({icon:"error", buttons:false, timer:1000, className:"swal-icon-notification"});
							}
					});
				}
				
				function downloadFile(filepath){
					document.getElementById("download").src = "downloadFile.php?filepath="+encodeURIComponent(filepath);
				}
				
				function deleteFile(filepath){
					swal({
					 	title: "<?php echo $text["deleteFileConfirmTitle"]; ?>",
					  	text: "<?php echo $text["deleteFileConfirmText"]; ?> \""+filepath.substring(filepath.lastIndexOf("/")+1)+"\".",
					  	icon: "warning",
					  	buttons: true,
						dangerMode: true,
					}).then((willDelete) => {
					  	if (willDelete) {
							$.ajax({	
								type: "POST",
								url: "deleteFile.php",
								data: {
									filepath: filepath
								},
								dataType: "text",
								success: function(data){
									swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
									scan();
								},
								error: function(data){
									swal("<?php echo $text["deleteFileError"]; ?>", {
						  				icon: "error",
									});
									scan();
								}
							});
					  }
					});
				}
				
					/****************************************************
				 	************ HELPER FUNCTIONS (FOLDERS) *************
				 	****************************************************/
				function createFolder(){
					swal({
					  content: {
						element: "input",
						attributes: {
						  placeholder: "sandbox",
						  type: "text",
						},
					  },
						text:"<?php echo $text["createFilePrompt"]; ?>"
					}).then((value) => {
						active_dir += "<?php echo DIRECTORY_SEPARATOR; ?>" + value;
						  $.ajax({	
							type: "POST",
							url: "newFolder.php",
							data: {
								folderpath: active_dir
							},
							dataType: "text",
							success: function(data){
								swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
								scan();
							},
							error: function(data){
								swal({icon:"error", buttons:false, timer:1000, className:"swal-icon-notification"});
							}
						});
					});
				}
				
				function renameFolder(filepath){
					swal({
					  content: {
						element: "input",
						attributes: {
						  placeholder: "sandbox",
						  type: "text",
						},
					  },
						text: "<?php echo $text["renameFolderPrompt"]; ?>"
					}).then((value) => {

						var newdir = filepath.substring(0, filepath.lastIndexOf("/")+1) + value;
						  $.ajax({	
							type: "POST",
							url: "rename.php",
							data: {
								oldpath: filepath,
								newpath: newdir
							},
							dataType: "text",
							success: function(data){
								swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
								scan();
							},
							error: function(data){
								swal({icon:"error", buttons:false, timer:1000, className:"swal-icon-notification"});
							}
						});
					});
				}
				
				function duplicateFolder(folderpath){
					$.ajax({	
							type: "POST",
							url: "duplicateFolder.php",
							data: {
								folderpath: folderpath
							},
							dataType: "text",
							success: function(data){
								swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
								scan();
							},
							error: function(data){
								swal({icon:"error", buttons:false, timer:1000, className:"swal-icon-notification"});
							}
					});	
				}
				
				function downloadFolder(folderpath){
					document.getElementById("download").src = "downloadFolder.php?folderpath="+encodeURIComponent(folderpath);

				}
				
				function emptyFolder(folderpath){
					swal({
					 	title: "<?php echo $text["emptyFolderConfirmTitle"]; ?>",
					  	text: "<?php echo $text["emptyFolderConfirmText"]; ?> \""+folderpath.substring(folderpath.lastIndexOf("/")+1)+"\".",
					  	icon: "warning",
					  	buttons: true,
						dangerMode: true,
					}).then((willDelete) => {
					  	if (willDelete) {
							$.ajax({	
								type: "POST",
								url: "emptyFolder.php",
								data: {
									folderpath: folderpath
								},
								dataType: "text",
								success: function(data){
									swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
									scan();
								},
								error: function(data){
									swal("<?php echo $text["emptyFolderError"]; ?>", {
						  				icon: "error",
									});
									scan();
								}
							});
					  }
					});	
				}
				
				function deleteFolder(folderpath){
					swal({
					 	title: "<?php echo $text["deleteFolderTitle"]; ?>",
					  	text: "<?php echo $text["deleteFolderTextBefore"]; ?> \""+folderpath.substring(folderpath.lastIndexOf("/")+1)+"\" <?php echo $text["deleteFolderTextAfter"]; ?>",
					  	icon: "warning",
					  	buttons: true,
						dangerMode: true,
					}).then((willDelete) => {
					  	if (willDelete) {
							console.log(folderpath);
							$.ajax({	
								type: "POST",
								url: "deleteFolder.php",
								data: {
									folderpath: folderpath
								},
								dataType: "text",
								success: function(data){
									swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
									scan();
								},
								error: function(data){
									swal("<?php echo $text["deleteFolderError"]; ?>", {
						  				icon: "error",
									});
									scan();
								}
							});
					  }
					});
				}
				
				/****************************************************
				 ************ TOOLBAR HELPER FUNCTIONS **************
				 ****************************************************/
				$("#newFileButton").on("click",function(){
					createFile(editor);
				});
				
				$("#newFolderButton").on("click",function(){
					createFolder();
				});
				
				$("#debugButton").on("click",function(){
					var breakpoints = "";
					breakpointAnchors.forEach(function(element) {
						breakpoints += (element.row+1)+":";
					});
					breakpoints = breakpoints.substring(0, breakpoints.length-1);
				});
				
				$("#runButton").on("click",function(){
					compile(editor);
				});
				
				/****************************************************
				 ********** FILE MANAGER HELPER FUNCTIONS ***********
				 ****************************************************/
				scan();			
				function scan(){
					$.ajax({	
						type: "POST",
						url: "scan.php",
						data: {
							scandir: ""
						},
						dataType: "text",
						success: function(data){
							//document.getElementById("filemanager").innerHTML = data;
							$("#filemanager .file").draggable({
								revert: "invalid"
							});
							$("#filemanager .folder").draggable({
								revert: "invalid"
							});
							$("#filemanager .file").droppable({
								drop: drop
							});
							$("#filemanager .folder").droppable({
								drop: drop
							});
						}
					});
				}
				
				function drop(event, drop){
					var fromPath = drop.draggable.attr("data-wd");
					var toPath = $(this).attr("data-wd");
					if($(this).hasClass("file")){
						toPath = toPath.substring(0,toPath.lastIndexOf("<?php echo DIRECTORY_SEPARATOR; ?>"));
					}
					console.log("From: "+fromPath+"\nTo: "+toPath);
					$.ajax({	
						type: "POST",
						url: "move.php",
						data: {
							from: fromPath,
							to: toPath
						},
						dataType: "text",
						success: function(data){
							swal({icon:"success", buttons:false, timer:1000, className:"swal-icon-notification"});
							scan();
						}
					});
				}
				
				$("#filemanager").on("click",".file",function(element){
					if($("#filemenu").is(":visible") || $("#foldermenu").is(":visible")){
						return;
					}
					active_file = $(this).attr("data-wd");
					active_dir = active_file.substring(0, active_file.lastIndexOf("/"));
					ext = $(this).attr("data-name").split(".")[1];
					name = $(this).attr("data-name").split(".")[0];
					$.ajax({	
						type: "POST",
						url: "readFile.php",
						data: {
							path: active_file
						},
						dataType: "text",
						success: function(data){
							editor.setValue(data, -1);
							editor.getSession().setMode("ace/mode/"+ext);
						}
					});
					return false;
				});
				
				$("#filemanager").on("click",".folder",function(element){
					if($("#filemenu").is(":visible") || $("#foldermenu").is(":visible")){
						return;
					}
					if($(this).hasClass("expand")){
						$(this).removeClass("expand");
					}else{
						$(this).addClass("expand");
					}
					active_dir = $(this).attr("data-wd");
					return false;
				});
				
				/****************************************************
				 ********************* UPLOAD ***********************
				 ****************************************************/
				$("#folderUpload, #fileUpload").on("click",function(){
					upload(activeRight);
				});
				
				function upload(path){
					$.ajax({	
						type: "POST",
						url: "upload.html",
						dataType: "text",
						success: function(data){
							var uploadBox = document.createElement("iframe");
							uploadBox.id = "uploadBox";
							uploadBox.src = "upload.html";
							uploadBox.width = "100%";
							uploadBox.height = "100%";
							uploadBox.scrolling = "no";
							console.log(uploadBox);
							swal({
								content: uploadBox,
								buttons: false,
								className: "swal-uploadBox"
							});
						}
					});
				}
				
				/****************************************************
				 ********************* COLLAB ***********************
				 ****************************************************/
				function collab(){
					var TogetherJSConfig_dontShowClicks = true;
					var TogetherJSConfig_cloneClicks = true;
					TogetherJS(this);
				}

				/****************************************************
				 ****************** CURSOR MENUS ********************
				 ****************************************************/
				//Context Menu Helpers for FOLDERS
				$("#filemanager").on("mousedown",".folder",function(element){
					$(this).attr("oncontextmenu", "return false;");
					if(element.button == 2){
						activeRight = $(this).attr("data-wd");
						$("#foldermenu").css("left", element.pageX+5);
						$("#foldermenu").css("top", element.pageY+5);
						$("#foldermenu").fadeIn(100);
						$("#filemenu").fadeOut(80);
					}
					return false;
				});
				
				$("#folderDelete").on("click",function(){
					deleteFolder(activeRight);
				});
				
				$("#folderNewFile").on("click",function(){
					active_dir = activeRight;
					createFile(editor);
				});
				
				$("#folderNewFolder").on("click",function(){
					active_dir = activeRight;
					createFolder();
				});
				
				$("#folderRenameFolder").on("click",function(){
					renameFolder(activeRight);
				});
				
				$("#folderDuplicateFolder").on("click",function(){
					duplicateFolder(activeRight);
				});
				
				$("#folderDownloadFolder").on("click",function(){
					downloadFolder(activeRight);
				});
				
				$("#folderEmpty").on("click",function(){
					emptyFolder(activeRight);
				});
				
				$("#folderRefresh").on("click",function(){
					scan();
				});
				
				//Makes the context menu disappear on a left click in the body
				$("body").on("click",function(element){
					$(this).attr("oncontextmenu", "return false;");
					if(element.button == 0){
						activeRight = "";
						$("#foldermenu").fadeOut(80);
						$("#filemenu").fadeOut(80);
					}
				});
				
				//Context Menu Helpers for FILES
				$("#filemanager").on("mousedown",".file",function(element){
					$(this).attr("oncontextmenu", "return false;");
					if(element.button == 2){
						activeRight = $(this).attr("data-wd");
						$("#filemenu").css("left", element.pageX+5);
						$("#filemenu").css("top", element.pageY+5);
						$("#filemenu").fadeIn(100);
						$("#foldermenu").fadeOut(80);
					}
					return false;
				});
				
				$("#fileNewFile").on("click",function(){
					active_dir = activeRight.substring(0,activeRight.lastIndexOf("/"));
					createFile(editor);
				});
				
				$("#fileNewFolder").on("click",function(){
					active_dir = activeRight.substring(0,activeRight.lastIndexOf("/"));
					createFolder();
				});
				
				$("#fileRenameFile").on("click",function(){
					renameFile(activeRight);
				});
				
				$("#fileDuplicateFile").on("click",function(){
					duplicateFile(activeRight);
				});
				
				$("#fileDownloadFile").on("click",function(){
					downloadFile(activeRight);
				});
				
				$("#fileDelete").on("click",function(){
					deleteFile(activeRight);
				});
				
				$("#fileRefresh").on("click",function(){
					scan();
				});
				
				/****************************************************
				 ****************** KEY BINDINGS ********************
				 ****************************************************/
				editor.commands.addCommand({
					name: "compile",
					bindKey: {win: "Ctrl-e", mac: "Command-e"},
					exec: function() {
						compile(editor);
					}
				});
				
				editor.commands.addCommand({
					name: "saveFile",
					bindKey: {win: "Ctrl-s", mac: "Command-s"},
					exec: function() {
						save(editor, true);
					}
				});
				
				editor.commands.addCommand({
					name: "newFile",
					bindKey: {win: "Ctrl-n", mac: "Command-right"},
					exec: function() {
						createFile(editor);
					}
				});
				
				editor.commands.addCommand({
					name: "collab",
					bindKey: {win: "Ctrl-k", mac: "Command-k"},
					exec: function() {
						collab();
					}
				});

			});
            function shareFile(){
                swal({
                    title:'Share With',
                    content: {
                        element: "input",
                        attributes: {
                            placeholder: "@johndoe",
                            type: "text",
                        },
                    },
                });
            }
            $(document).ready(function () {
                var tabID = 1;
                $('#btn-add-tab').click(function () {
                    tabID++;
                    $('#tab-list').append($('<li><a href="#tab' + tabID + '" role="tab" data-toggle="tab">Tab ' + tabID + '<button class="close" type="button" title="Remove this page">×</button></a></li>'));
                    //$('#tab-content').append($('<div class="tab-pane fade" id="tab' + tabID + '">Tab '+ tabID +' content</div>'));
                });
                $('#tab-list').on('click','.close',function(){
                    var tabID = $(this).parents('a').attr('href');
                    $(this).parents('li').remove();
                    $(tabID).remove();

                    //display first tab
                    var tabFirst = $('#tab-list a:first');
                    tabFirst.tab('show');
                });
            });
		</script>
	</body>
</html>