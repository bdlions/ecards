define(["jquery", 'jqueryui', "jqueryform", "HeadCreator"], function($, jqueryui, jqueryform, HeadCreator) 
{
	function FileUploader(divId)
	{
		var dialogOpts, file;
		var uploadFileName, uploadFilePath;
		var headCreator;
		
		$("#displayer").hide();
		
		dialogOpts = 
		{
			title: "Upload File",
			modal: true,
			autoOpen: false,
			height: 260,
			width: 400,
			buttons: 
			{
				'Upload': function() 
				{   
					$("form").submit();
					$(this).dialog('destroy');
				},
				'Cancel': function() 
				{
					$(this).dialog('destroy');
				}
			},
			open: function() 
			{
				//display correct dialog content
				$("#file_browse").change(function()
				{
					file = this.files[0];
					$("#fileName").val(file.name);
				});
			}
		};
		$('#fileUploadForm').submit(function() { 
			
			// submit the form 
			$(this).ajaxSubmit(
			{
				beforeSubmit: function() 
				{
					var fileType = file.name.substring(file.name.lastIndexOf(".") + 1);
					if( file.size / (1024 * 1024) > 3 || fileType != "jpg")
					{
						if(fileType != "jpg")
						{
							alert("File type is not jpg");
						}
						else if( (file.size / (1024 * 1024)) > 3)
						{
							alert("File size is larger that 3 MB.");
						}
						
						$("#fileName").val("");
						return false;
					}
					else
					{
						$("#displayer").show();
					}
				},
				success: function(resp) 
				{
					//alert(resp);
					var result = JSON.parse(resp);
					if(result.success)
					{
						uploadFileName = result.fileName;
						uploadFilePath = result.uploadPath;
						//console.log(result.fileName);
						//console.log(result.uploadPath);
						headCreator = new HeadCreator("headCreatorDiv");
						headCreator.load(uploadFileName, uploadFilePath);
						
						
					}
					else
					{
						alert("File cannot be save at this moment. Try again");
					}
					
					$("#displayer").hide();
					$("#fileName").val("");
				}
			}); 
			return false; 
		});
		
		$("#"+divId).dialog(dialogOpts);
		
		FileUploader.prototype.show = function()
		{
			$("#"+divId).dialog(dialogOpts);
			$("#"+divId).dialog("open");
		};
		FileUploader.prototype.getFile = function()
		{
			return file;
		};
		
	};
	return FileUploader;
});