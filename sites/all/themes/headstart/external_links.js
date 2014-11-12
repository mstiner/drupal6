

if (!window.addEventListener) {
	window.attachEvent( 'onload', getLinks, window.event );
} else window.addEventListener('load',getLinks, true);

 
function getLinks() {
	var links = document.getElementsByTagName('a');
	/*window.alert(links.length);*/
	
	for ( i=0; i < links.length; i++ ) {
	
		var h = links[i].href;
		//window.alert(href);
		
		var protocol = /^http\:\/\//;
		var domain = /www\.hsolc\.org/;
		//if( h.match( re ) ) {
		//if( h.indexOf("http")!=-1 ) {
		if( protocol.test(h) ) {
			//window.alert(h);
			if( !domain.test(h) ) {
				links[i].onclick = function(){ window.open(h,"_blank"); return false; }
				links[i].h="#";
			}//end domain check

		} //end protocol check
	
	}  // end for

} //function getLinks