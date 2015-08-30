jQuery(document).ready(function(e){
	var textBlog = $('.blog_content_prev').text();
	if(textBlog.length>500){
		newText=textBlog.substr(0, 450)+"...";
		$('.blog_content_prev').html(newText);
	}
})