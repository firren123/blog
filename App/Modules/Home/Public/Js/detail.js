function subMsg(){
	var content = $('#evaluate-message').val();
	var uid = $('#uid').val();
	var target_uid = $('#target_uid').val();
	$.ajax({
        url:'/Home/Detail/subMessage',
        type:'post',
        datatype:'json',
        data:'content='+content+'&uid='+uid+'&target_uid='+target_uid,
        success:function(data){
            if(data== 0){
            	alert('提交成功~');
            	 location.reload() 
            }else{
            	alert('提交失败~');
            	
            }
               
        },
        async:false
    });
}
$(function(){
    $(".bSub").click(function(){
        var code = $(this).attr('id');
        //var k = code.sibling(0,7);
        //var k = code.
        alert(k);
    })
})