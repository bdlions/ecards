<!DOCTYPE html >
<html>
	<head>
        <title>Ecards Processing</title>
		<meta charset="UTF-8">
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"> 
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"> 
        <meta content="Ecards, image, processing" name="keywords">
		<meta content="mtea" name="author">
		<link href="css/jquery-ui.css" rel="stylesheet"/>
		<link href="css/filebrowser.css" rel="stylesheet"/>
		<script data-main="scripts/main" src="scripts/require-jquery.js"></script>
		<style type="text/css">
			.main {
				margin-left: 40px;
			}
			.headshowcase {
				margin: 0 0 20px 10px;
				padding: 10px 0 0;
				position: relative;
			}
			
		</style>
	</head>	

    <body class="main">
		<table align="center">				
			<tr>
				<td><input type = "button" name = "template1" id="template1" value="Template 1"/></td>
			</tr>	
			<tr>
				<td><input type = "button" name = "template2" id="template2" value="Template 2"/></td>
			</tr>
		</table>
		<table align="center" style="width:850px;height:400px">
			<tr>
				<td colspan="3">
					<div id="divImageCanvas" style="border: 1px black solid; height: 400px; width: 600px; display: block; margin-left: auto; margin-right: auto;">
						<script type="text/javascript">
							var imageCanvas = null;
							var problemImage = null;
							var canvasContext = null;
							
							var selectedTemplateId = "";
							
							window.onload = function()
							{
								imageCanvas = document.getElementById("imageCanvas");
								problemImage = new Image();
								
								if(imageCanvas.getContext)
								{
									//canvas context
									canvasContext = imageCanvas.getContext('2d');
									
									//var divImageCanvas = document.getElementById("divImageCanvas");
									
									//set canvas height and width
									imageCanvas.width = 600 ;
									imageCanvas.height = 400 ;
									
									problemImage.onload = function()
									{
										//set the image start position x and y pos
										imageStartX = imageCanvas.width/2 - problemImage.width / 2;
										imageStartY = imageCanvas.height/2 - problemImage.height / 2;
										
									};
									
									//problemImage.src = 'images/1.jpg';
									//console.log("Executed");
									
									imageCanvas.onmouseup = function(e)
									{
										//console.log("canvas mouse up");
									}
								}
							}
							/*window.onmousedown = function(e)
							{
								console.log("Mouse down");
							}
							window.onmousemove = function (e) {
								//console.log("mouse move");
							};

							window.onmouseup = function (e) {
								console.log("mouse up");
							};*/
							

						
						</script>
						<canvas id="imageCanvas"> 
							Sorry, your browser doesn't support HTML5.
						</canvas>
					</div> 
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<div class="headshowcase" style="height: 120px; width: 400px; display: block; margin-left: auto; margin-right: auto;">
						<ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1;  left: -340px;">
							<li style="overflow: hidden; float: left; width: 150px; height: 120px;"><img draggable="true" src="images/1.jpg" alt="1"></li>
							<li style="overflow: hidden; float: left; width: 150px; height: 120px;"><img draggable="true" src="images/1.jpg" alt="2"></li>
							<li style="overflow: hidden; float: left; width: 150px; height: 120px;"><img draggable="true" src="images/1.jpg" alt="3"></li>
							<li style="overflow: hidden; float: left; width: 150px; height: 120px;"><img draggable="true" src="images/1.jpg" alt="4"></li>
							<li style="overflow: hidden; float: left; width: 150px; height: 120px;"><img draggable="true" src="images/1.jpg" alt="5"></li>
							<li style="overflow: hidden; float: left; width: 150px; height: 120px;"><img draggable="true" src="images/1.jpg" alt="6"></li>
						</ul>
					</div>
				</td>
				<td>	    
					<button class="prev">&lt;&lt;</button>
					<button class="next">&gt;&gt;</button>
					<input type = "button" name = "buttonCreateHead" id="buttonCreateHead" value="Create New Head"/>
				</td>
			</tr>
		</table>
		<div style="visibility: hidden">
			<div id="textCreatorDiv" style="border: 1px black solid; display: block;">				
				<table align="center">					
					<tr>
						<td colspan="2">
							<canvas id="textCreatorCanvas"> 
								Sorry, your browser doesn't support HTML5.
							</canvas>
						</td>
					</tr>
					<tr>
						<td><label>From</label>&nbsp;</td>
						<td><label for="fromText"></label>
						<input type="text" name="fromText" id="fromText" maxlength="20"></td>
					</tr>	
					<tr>
						<td><label>To</label>&nbsp;</td>
						<td><label for="toText"></label>
						<input type="text" name="toText" id="toText" maxlength="20"></td>
					</tr>	
					<tr>
						<td><label>Message</label>&nbsp;</td>
						<td><label for="messageText"></label>
						<input type="text" name="messageText" id="messageText" maxlength="20"></td>
					</tr>					
				</table>	
			</div> 
			<div id="fileUploaderDiv" title="Basic dialog">
				<form id="fileUploadForm" name="fileUploadForm" action="uploader.php"  method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td colspan="3">
								<label>Upload a photo of you or yourrself</label>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="fileName" id="fileName"/>
							</td>
							<td>
								<div id='file_browse_wrapper'>
									<input type='file' name="file" id='file_browse'/>
								</div>
							</td>
						</tr>
					</table>
				</form>
				<div id="displayer"><label>loading...</label><img src="images/loader.gif" width="80" height="40" alt="loader"/></div>
			</div>
			
			<div id="headCreatorDiv" style="border: 1px black solid; display: block;">
				<canvas id="headCreatorCanvas"> 
					Sorry, your browser doesn't support HTML5.
				</canvas>
				<table style="margin-left:auto; margin-right: auto;">
					<tr>
						<td><input id="buttonClockwiseRotation" type="image" src="images/clockwiserotate.jpg"/></td>
						<td><input id="buttonAntiClockwiseRotation" type="image" src="images/anticlockwise.jpg"/></td>
						<td><input id="buttonZoomIn" type="image" src="images/zoomin.jpg"/></td>
						<td><input id="buttonZoomOut" type="image" src="images/zoomout.jpg"/></td>
					</tr>
				</table>
			</div> 
		</div>
	</body>
</html>