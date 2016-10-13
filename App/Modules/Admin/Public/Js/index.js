function resize_window(){
	$("#left").height($(window).height()-102);
	$("#right").height($(window).height()-82).width($(window).width()-201);
}
function nav(j){
		var oUl = document.getElementById("nav");
		var oLi = oUl.getElementsByTagName("a");
		var oLeft = document.getElementById("left");
		var oDl = oLeft.getElementsByTagName("dl");
		
		for(var i=0;i<oLi.length;i++){
			oLi[i].className = '';
			oDl[i].style.display='none';
		}
		 oLi[j].className = 'active';
		oDl[j].style.display= 'block';
		
		
}
$(function(){
	resize_window();
	$(window).resize(function(){
		resize_window();
	});

})


