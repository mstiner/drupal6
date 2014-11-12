// $Id: ckeditor.config.js,v 1.2.2.6 2010/01/14 08:19:27 wwalc Exp $

/*
 WARNING: clear browser's cache after you modify this file.
 If you don't do this, you may notice that browser is ignoring all your changes.
 */
CKEDITOR.editorConfig = function(config) {
config.scayt_autoStartup = false;
config.disableNativeSpellChecker = false;
config.browserContextMenuOnCtrl = false;
config.resize_enabled = true;
config.disableObjectResizing = true;
config.disableNativeTableHandles = false;
// this needs to be protocol neutral
config.stylesCombo_stylesSet = 'drupal:http://www.hsolc.org/sites/all/themes/headstart/ckeditor.styles.js';  
      //config.extraPlugins += (config.extraPlugins ? ',imce' : 'imce' );
      //CKEDITOR.plugins.addExternal('imce', Drupal.settings.ckeditor.module_path + '/plugins/imce/');

	config.templates_files = [ '/sites/all/themes/headstart/ckeditor_templates.js' ];
//config.filebrowserBrowseUrl = 'index.php?q=imagebrowser/view/browser&app=image_ref';
//config.filebrowserWindowWidth = '695';
//config.filebrowserWindowHeight = '525';
  config.indentClasses = [ 'rteindent1', 'rteindent2', 'rteindent3', 'rteindent4' ];

  // [ Left, Center, Right, Justified ]
  config.justifyClasses = [ 'rteleft', 'rtecenter', 'rteright', 'rtejustify' ];

  // The minimum editor width, in pixels, when resizing it with the resize handle.
  config.resize_minWidth = 450;

  // Protect PHP code tags (<?...?>) so CKEditor will not break them when
  // switching from Source to WYSIWYG.
  // Uncommenting this line doesn't mean the user will not be able to type PHP
  // code in the source. This kind of prevention must be done in the server
  // side
  // (as does Drupal), so just leave this line as is.
  config.protectedSource.push(/<\?[\s\S]*?\?>/g); // PHP Code
  config.extraPlugins = '';
  if (Drupal.ckeditorCompareVersion('3.1')) {
    config.extraPlugins += (config.extraPlugins ? ',drupalbreaks' : 'drupalbreaks' );
  }
    config.extraPlugins += (config.extraPlugins ? ',drupalbreaks' : 'drupalbreaks' );
  if (Drupal.settings.ckeditor.linktocontent_node) {
    config.extraPlugins += (config.extraPlugins ? ',linktonode' : 'linktonode' );
  }
  if (Drupal.settings.ckeditor.linktocontent_menu) {
    config.extraPlugins += (config.extraPlugins ? ',linktomenu' : 'linktomenu' );
  }

  // Define as many toolbars as you need, you can change toolbar names and remove or add buttons.
  // List of all buttons is here: http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html#.toolbar_Full

  // This toolbar should work fine with "Filtered HTML" filter
/*
  config.toolbar_DrupalFiltered = [
    ['Source'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker', 'Scayt'],
    ['Undo','Redo','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar'],
    ['Maximize', 'ShowBlocks'],
    '/',
    ['Format'],
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor','LinkToNode', 'LinkToMenu'],
    ['DrupalBreak', 'DrupalPageBreak']
   ];
*/

  config.toolbar_DrupalFiltered = [
    ['Source',],['Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker', 'Scayt'],
    ['Undo','Redo','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Image','Table','HorizontalRule','SpecialChar'],
    ['Maximize', 'ShowBlocks'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    '/',
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    ['Styles','Format','TextColor'],
    ['Link','Unlink','Anchor','LinkToMenu'],
    ['DrupalBreak']
   ];

 /*
  * DrupalBasic will be forced on some smaller textareas (if enabled)
  * if you change the name of DrupalBasic, you have to update
  * CKEDITOR_FORCE_SIMPLE_TOOLBAR_NAME in ckeditor.module
  */
  config.toolbar_DrupalBasic = [ [ 'Format', '-', 'Bold', 'Italic', '-', 'NumberedList','BulletedList', '-', 'Link', 'Unlink', 'Image','-','Maximize','SpellChecker'],  ['DrupalBreak'] ];

  /*
   * This toolbar is dedicated to users with "Full HTML" access some of commands
   * used here (like 'FontName') use inline styles, which unfortunately are
   * stripped by "Filtered HTML" filter
   */
  config.toolbar_DrupalFull = [
      ['Source'],
      ['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker', 'Scayt'],
      ['Undo','Redo','Find','Replace','-','SelectAll','RemoveFormat'],
      ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar'],
      '/',
      ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
      ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
      ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
      ['Link','Unlink','Anchor','MediaEmbed','LinkToNode', 'LinkToMenu'],
      '/',
      ['Format','Font','FontSize'],
      ['TextColor','BGColor','TextColor'],
      ['Maximize', 'ShowBlocks'],
      ['DrupalBreak', 'DrupalPageBreak']
     ];


// This is actually the default value.
config.keystrokes =
[
    [ CKEDITOR.ALT + 121 /*F10*/, 'toolbarFocus' ],
    [ CKEDITOR.ALT + 122 /*F11*/, 'elementsPathFocus' ],

    [ CKEDITOR.SHIFT + 121 /*F10*/, 'maximize' ],

    [ CKEDITOR.CTRL + 90 /*Z*/, 'undo' ],
    [ CKEDITOR.CTRL + 89 /*Y*/, 'redo' ],
    [ CKEDITOR.CTRL + CKEDITOR.SHIFT + 90 /*Z*/, 'redo' ],

    [ CKEDITOR.CTRL + 76 /*L*/, 'link' ],

    [ CKEDITOR.CTRL + 66 /*B*/, 'bold' ],
    [ CKEDITOR.CTRL + 73 /*I*/, 'italic' ],
    [ CKEDITOR.CTRL + 85 /*U*/, 'underline' ],

    [ CKEDITOR.ALT + 109 /*-*/, 'toolbarCollapse' ]
];


config.toolbar_Full =
[
    ['Source','-','Save','NewPage','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    '/',
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
      ['Link','Unlink','Anchor','MediaEmbed','LinkToNode', 'LinkToMenu'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
 //    ['Image','IMCE','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
    '/',
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize', 'ShowBlocks','-','About'],
      ['DrupalBreak','-', 'DrupalPageBreak']
];




  /*
   * Append here extra CSS rules that should be applied into the editing area.
   * Example: 
   * config.extraCss = 'body {color:#FF0000;}';
   */
  config.extraCss = '';


  /**
   * CKEditor's editing area body ID & class.
   * See http://drupal.ckeditor.com/tricks
   * This setting can be used if CKEditor does not work well with your theme by default.
   */

  config.bodyId = 'ckeditor_content';
  config.format_tags = 'p;h2;h3;h4;';
  config.fontSize_sizes = '1.0em;1.2em;1.4em;1.6em;1.8em';
//config.contentsCss = '/themes/headstart/style.css';  
config.ignoreEmptyParagraph = false;    
    //config.extraCss = "li{margin-left:8px;}.square li{list-style-type:square;}.circle li{list-style-type:circle;}";
  
  


/**
	Here we set the class attribute of the body tag to "node" so that all content inherits the .node styling.
 */
config.bodyClass = 'node';
config.startupOutlineBlocks = true;
config.height = 500;


  if (Drupal.ckeditorCompareVersion('3.1')) {
    CKEDITOR.plugins.addExternal('drupalbreaks', Drupal.settings.ckeditor.module_path + '/plugins/drupalbreaks/');
  }
  if (Drupal.settings.ckeditor.linktocontent_menu) {
    CKEDITOR.plugins.addExternal('linktomenu', Drupal.settings.ckeditor.module_path + '/plugins/linktomenu/');
    Drupal.settings.ckeditor.linktomenu_basepath = Drupal.settings.basePath;
  }
  if (Drupal.settings.ckeditor.linktocontent_node) {
    CKEDITOR.plugins.addExternal('linktonode', Drupal.settings.ckeditor.module_path + '/plugins/linktonode/');
    Drupal.settings.ckeditor.linktonode_basepath = Drupal.settings.basePath;
  }

  //'MediaEmbed' plugin. To enable it, uncomment lines below and add 'MediaEmbed' button to selected toolbars.
  config.extraPlugins += (config.extraPlugins ? ',mediaembed' : 'mediaembed' );
  CKEDITOR.plugins.addExternal('mediaembed', Drupal.settings.ckeditor.module_path + '/plugins/mediaembed/');
  
  
  // 'IMCE' plugin. If IMCE module is enabled, you may uncomment lines below and add an 'IMCE' button to selected toolbar. 
  config.extraPlugins += (config.extraPlugins ? ',imce' : 'imce' );
  CKEDITOR.plugins.addExternal('imce', Drupal.settings.ckeditor.module_path + '/plugins/imce/');
  
// | FCKConfig.Plugins.Add('imagebrowser'); 
  //config.extraPlugins += (config.extraPlugins ? ',imagebrowser' : 'imagebrowser' );
  //CKEDITOR.plugins.addExternal('imagebrowser', Drupal.settings.ckeditor.module_path + '/plugins/imagebrowser/');  

};