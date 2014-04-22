function addImageToACF(){
	jQuery("#acf-kosher_icon ul li").each(function(){
		var i = jQuery(this).index()+1;
		var img = jQuery('<img src="/wp-content/themes/16handles/img/kosher_icons/kosher_icon_'+i+'.png" style="margin-right:10px;" />');
		jQuery(this).prepend(img).css({marginBottom : "20px", padding : "20px", border: "1px solid #999", background: "#eee", minHeight : "140px"});
	})
}
jQuery(function(){
	addImageToACF();	
});

