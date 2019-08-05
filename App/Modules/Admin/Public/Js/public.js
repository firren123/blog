//验证URL方法
function valid_url(url) {
	var patten = new RegExp(/^((http|https):\/\/)(\w(\:\w)?@)?([0-9a-z_-]+\.)*?([a-z0-9-]+\.[a-z]{2,6}(\.[a-z]{2})?(\:[0-9]{2,6})?)((\/[^?#<>\/\\*":]*)+(\?[^#]*)?(#.*)?)?$/i);
	return patten.test(url);
}
//返回val的字节长度 
function getByteLen(val) { 
	var len = 0; 
	for (var i = 0; i < val.length; i++) { 
		if (val[i].match(/[^\x00-\xff]/ig) != null){ //全角 
			len += 2; 
		}else{
			len += 1; 
		}
	} 
	return len; 
}
