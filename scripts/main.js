/*require(["jquery", "headshowcase", "FileUploader", "HeadCreator"], function($, headshowcase, FileUploader) {
    $(function() {
		headshowcase.init("headshowcase");	
		headshowcase.setWorkspace();
		var fileUploader = new FileUploader("fileUploaderDiv");

		$("#buttonCreateHead").click(function()
		{
			fileUploader.show();
		});
    });
});*/
require(["jquery", "headshowcase", "FileUploader", "TextCreator"], function($, headshowcase, FileUploader, TextCreator) {
    $(function() {
		headshowcase.init("headshowcase");	
		headshowcase.setWorkspace();
				
		var textCreator;
		$("#template1").click(function()
		{
			selectedTemplateId = "template1";
			textCreator = new TextCreator("textCreatorDiv");
			textCreator.load("sprite-26-0.png", "images/");
		});
		$("#template2").click(function()
		{
			selectedTemplateId = "template2";
			textCreator = new TextCreator("textCreatorDiv");
			textCreator.load("sprite-26-0.png", "images/");
		});		
    });
});
