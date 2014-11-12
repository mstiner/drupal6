<?php
// $Id$

error_reporting(~E_NOTICE);

/**
 * @file
 * Administration page callbacks for the annotate module.
 */




function getcsv_file_path( $filename ) {
	global $base_path;
	return( base_path() . file_directory_path() . "/{$filename}" );
}





/**
 * Form builder. Configure annotations.
 *
 * @ingroup forms
 * @ see system_settings_form()
 */

function thinkables_admin_settings() {
	// Get an array of node types with internal names as keys and
	// "friendly names" as values. E.g.,
	// array('page' => 'Page', 'story' => 'Story')
	$options = node_get_types('names');
	
	
	$csv_products = array();
	
		$result = db_query("SELECT * FROM {uc_products} WHERE model NOT LIKE '%-%'");
		while ($method = db_fetch_object($result)) {
			$csv_products[] = $method->model;
		}
	
	
	
	
	
	
	$form['annotate_node_types'] = array(
		'#type' => 'checkboxes',
		'#title' => t('Users may annotate these content types'),
		//'#options' => $options,
		'#options' => $csv_products,
		'#default_value' => variable_get('annotate_node_type', array('page')),
		'#description' => t('A text field will be available on these content type to make user-specific notes.'),
	);
	
	$form['annotate_current_csv_path'] = array(
		'#type' => 'textfield',
		'#title' => t('Internal path to the CSV file'),
		'#default_value' => getcsv_file_path('activities.csv'),
		'#description' => t('The internal path to the CSV file'),
	);
	
	$form['annotate_current_csv'] = array(
		'#type' => 'textarea',
		'#title' => t('Current values in the CSV file'),
		'#default_value' => getCSV('activities.csv'),
		'#description' => t('The text literal from the CSV file'),
	);
	
	return system_settings_form($form);

}




function getCSV( $filename = NULL ) {
	if ( !isset($filename) ) return false;
	
	$wasdir = getcwd();
	
	chdir( "/home/tinman/www/sites/default/files" );
	
	//check if the file exists
	$row = 1;
	$csv_contents = "";
if (($handle = fopen( 'activities.csv', "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            $csv_contents .= $data[$c] . ",";
        }
        $csv_contents .= "\n";
    }
    fclose($handle);
}

chdir( $wasdir );	
return $csv_contents;
	
	
	
	
}