startList = function() {
	if (document.all && document.getElementById) {
		cssdropdownRoot = document.getElementById("nice-menu-1");
		for (x=0; x<cssdropdownRoot.childNodes.length; x++) {
			node = cssdropdownRoot.childNodes[x];
			if (node.nodeName=="LI") {
				
					
				node.onmouseover=function() {
				this.className+=" over ie-over";
				//window.alert(this.className);
				}//function
				
				node.onmouseout=function() {
				this.className=this.className.replace(" over ie-over", "");
				}//function
				
				/*if(node.hasChildNodes()) {
					for (index=0; index<node.childNodes.length; index++) {
						if(node.childNodes[index].nodeName=='UL') {
							tmpnode=node.childNodes[index];
							//window.alert(tmpnode.nodeName);
							for (i=0; i<tmpnode.childNodes.length; i++) {
								subnode = tmpnode.childNodes[i];
								if (subnode.nodeName=="LI") {
		
									subnode.onmouseover=function() {
									this.className+=" mover";
									//window.alert(this.className);
									}//function
									
									subnode.onmouseout=function() {
									this.className=this.className.replace(" mover", "");
									}//function
								}//if
							}//for
							break;
						}//if nodeName=='UL'
						else continue;
					}//for iterate childNodes
				}//if hasChildNodes
				*/
				/*new code*/
				if(node.hasChildNodes()) {
					try {
						tmpnode=node.getElementsByTagName('UL');
						//window.alert(tmpnode[0]);
					}
					catch(e) {
						throw new Error("noSubMenuError");
						continue;
					}
					if(tmpnode.length>0) {
						subnode=tmpnode[0].getElementsByTagName('LI');
						
						for(i=0; i<subnode.length; i++) {
	
							subnode[i].onmouseover=function() {
							this.className+=" over ie-over";
							//window.alert(this.className);
							}//function
							
							subnode[i].onmouseout=function() {
							this.className=this.className.replace(" over ie-over", "");
							}//function
						}//for
					}//for all possible submenus ( li ul li (ul) )
				}//if hasChildNodes
				
				
				
			}//if nodeName==LI
		}//outer for
	}//if document.all
	
	function hithere(){
		window.alert('Hello World!');
	}//hithere
	
	hithere();
	
}//startList

if (document.all && !window.opera && (navigator.appVersion.search("MSIE 6.0") != -1) ) {//&& $.browser.msie) {
	window.alert('Hello World!');
	if (window.attachEvent)
	window.attachEvent("onload", startList)
	else
	window.onload=startList;
}//if