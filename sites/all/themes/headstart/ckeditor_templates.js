/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
current_theme = 'headstart/';
path_to_theme = 'http://www.hsolc.org/themes/'+current_theme+'images/ckeditor/';
CKEDITOR.addTemplates(
'default',{imagesPath:CKEDITOR.getUrl(/*CKEDITOR.plugins.getPath('templates')+*/path_to_theme),templates:[

{
	title:'Two-Column Template',
	image:'twocolumn.gif',
	description:'Two evenly-spaced columns within the content region of a page.',
	html:'<div id="column1"><h2>Type the title here</h2><p>Type the text here</p></div><div id="column2"><h2>Type the title here</h2><p>Type the text here</p></div><div id="clear-both">&nbsp;</div>'
},


{
	title:'Banner Text/Image Above',
	image:'bannerabove.gif',
	description:'banner text above',
	html:'<div><p>Banner Text Here.</p></div><div class="column column-left"><h2>Type the title here</h2><p>Type the text here</p></div><div class="column column-right"><h2>Type the title here</h2><p>Type the text here</p></div><div id="clear-both">&nbsp;</div>'
},


{
	title:'Banner Text/Image Below',
	image:'twocolumn.gif',
	description:'banner text below',
	html:'<div class="column column-left"><h2>Type the title here</h2><p>Type the text here</p></div><div class="column column-right"><h2>Type the title here</h2><p>Type the text here</p></div><div id="clear-both">&nbsp;</div><div><p>Banner Text Here.</p></div>'
},



{
	title:'Larger Left Column',
	image:'largerleft.gif',
	description:'A larger left column with a smaller right column.',
	html:'<div class="column column-left column-larger"><h2>Type the title here</h2><p>Type the text here</p></div><div class="column column-right column-smaller"><h2>Type the title here</h2><p>Type the text here</p></div><div id="clear-both">&nbsp;</div>'
},


/*{
	title:'Larger Right Column',
	image:'twocolumn.gif',
	description:'A larger right column with a smaller left column.',
	html:'<div class="column column-left column-smaller"><h2>Type the title here</h2><p>Type the text here</p></div><div class="column column-right column-larger"><h2>Type the title here</h2><p>Type the text here</p></div><div id="clear-shrink" style="clear:both;"></div>'
},*/

{
	title:'Single Column',
	image:'singlecolumn.gif',
	description:'Two Columns with the right column set to 0px wide.',
	html:'<div class="column column-style-single column-left column-larger"><h2>Type the title here</h2><p>Type the text here</p></div><div class="column column-style-single column-right column-smaller">&nbsp;</div><div id="clear-both">&nbsp;</div>'
},

/*{title:'Text and Table',image:'template3.gif',description:'A title with some text and a table.',html:'<div style="width: 80%"><h3>Title goes here</h3><table style="float: right" cellspacing="0" cellpadding="0" style="width:150px" border="1"><caption style="border:solid 1px black"><strong>Table title</strong></caption></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table><p>Type the text here</p></div>'}*/

]
}
);
