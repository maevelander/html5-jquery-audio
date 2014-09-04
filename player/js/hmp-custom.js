// JavaScript Document
jQuery(document).ready(function(){
	
	
	
	jQuery('.st_upload_button').click(function() {
		 targetfield = jQuery(this).prev('.upload-url');
		 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		 return false;
	});

	window.send_to_editor = function(html) {
		 fileurl = jQuery(html).attr('href');
		 jQuery(targetfield).val(fileurl);
		 tb_remove();
	}
	
});