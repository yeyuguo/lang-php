function lang(value) {
	// old function oldlang(name,value,days) {
	var days = '30';

	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = "lang"+"="+value+expires+"; path=/";
	// old document.cookie = name+"="+value+expires+"; path=/";
	
	var url = document.URL;
	var arr = url.split('?');
	var ar = arr[0];
	location.replace(ar);
}