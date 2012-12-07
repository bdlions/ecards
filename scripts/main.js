require(["jquery", "headshowcase", "FileUploader", "HeadCreator"], function($, headshowcase, FileUploader) {
    $(function() {
		headshowcase.init("headshowcase");	
		headshowcase.setWorkspace();
		var fileUploader = new FileUploader("fileUploaderDiv");

		$("#buttonCreateHead").click(function()
		{
			fileUploader.show();
		});
    });
});
