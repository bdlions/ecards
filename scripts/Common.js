define(["jquery"], function($){
	var Common = function(){};

	Common.setTransparency = function(canvasContext, transparency)
	{
		canvasContext.save();
		canvasContext.fillStyle = "rgba(255, 255, 255," + transparency+" )";
		//canvasContext.globalCompositeOperation = "lighter";
		//canvasContext.globalAlpha = parseInt(transparency);
		canvasContext.rect(0,0, canvasContext.canvas.width, canvasContext.canvas.height);
		canvasContext.fill();
		canvasContext.restore();
	};

	Common.saveImage = function(croppedImage, savedImageCanvas, imageData)
	{
		var tempCanvasContext = savedImageCanvas;
		tempCanvasContext.canvas.height = croppedImage.height;
		tempCanvasContext.canvas.width = croppedImage.width;
		tempCanvasContext.putImageData(croppedImage, 0 ,0);
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				console.log("completed");
			}
		}
		xmlhttp.open("POST","save_image.php",true);
		var multipart ="";

		var boundary = Math.random().toString().substr(2);
		var data = tempCanvasContext.canvas.toDataURL("image/png")
		xmlhttp.setRequestHeader("content-type",
				  "multipart/form-data; charset=utf-8; boundary=" + boundary);

		multipart += "--" + boundary
			   + "\r\nContent-Disposition: form-data; name=data"
			   + "\r\nContent-type: image/jpeg"
			   + "\r\n\r\n" + data + "\r\n";
		
		multipart += "--"+boundary+"--\r\n";
		xmlhttp.send(multipart);
	};
	return Common;
});