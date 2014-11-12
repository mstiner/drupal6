/*
$Id: ckeditor.styles.js,v 1.1.2.2 2009/12/16 11:32:04 wwalc Exp $
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*
 * This file is used/requested by the 'Styles' button.
 * 'Styles' button is not enabled by default in DrupalFull and DrupalFiltered toolbars.
 */

CKEDITOR.addStylesSet( 'drupal',
[
	/* Block Styles */

	// These styles are already available in the "Format" combo, so they are
	// not needed here by default. You may enable them to avoid placing the
	// "Format" combo in the toolbar, maintaining the same features.


	{ name : 'Blue Title'		, element : 'h3', styles : { 'color' : 'Blue' } },
	{ name : 'Red Title'		, element : 'h3', styles : { 'color' : 'Red' } },

	{
		name : 'Quicklink',
		element : 'div',
		attributes :
		{
			'id' : 'quicklinks'
		}
	},

	/* Inline Styles */

	// These are core styles available as toolbar buttons. You may opt enabling
	// some of them in the Styles combo, removing them from the toolbar.


	{ name : 'Deleted Text'		, element : 'del' },


	/* Object Styles */

	{
		name : 'Image on Left',
		element : 'img',
		attributes :
		{
			'style' : 'padding: 5px; margin-right: 5px',
			'border' : '2',
			'align' : 'left'
		}
	},

	{
		name : 'Image on Right',
		element : 'img',
		attributes :
		{
			'style' : 'padding: 5px; margin-left: 5px',
			'border' : '2',
			'align' : 'right'
		}
	}
]);