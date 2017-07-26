// get elements
var modal = document.getElementById('efp_modal');
var span = document.getElementById("efp_close");

// calculate the scroll position in percentage
function getScrollPercent() {
    var h = document.documentElement, 
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight';
    return (h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100;
}

// set a cookie
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// get a cookie
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

var cookie_name = "efp_modal_cookie";

// function for showing popup
function showPopup(){
	if (!getCookie(cookie_name)){
		modal.style.display = "block";
		setCookie(cookie_name, 1 , efp_options.efp_run_days);
	}
}

// check if we should show popup to user
if (!getCookie(cookie_name)){

	// run a script after specific time
	if (efp_options.efp_run_after_time){
		setTimeout(
			function() {
			  showPopup();
			}, efp_options.efp_run_after_ms);
	}
	
	
	// run a script after specific scrolling
	if(efp_options.efp_run_after_scrolling){
		window.onscroll = function() {
			if (getScrollPercent() >= efp_options.efp_run_after_scroll_percent){
				showPopup();
			}	
		};
		
	}


	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}

}