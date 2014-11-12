<?php
header('Content-Type: text/html');

define('DATABASE_INSERT_ROWS',FALSE);
if(DATABASE_INSERT_ROWS) {
    mysql_connect('localhost','jbernal','8a9F313a57');
    mysql_query('use drupal');
}
?>

<html><head><title>Hello World!</title></head>
<body>

<?php
$find_links = "/<a\shref\=\"(http\:\/\/www\.head\-start\.lane\.or\.us\/administration\/policy\/[\.\s\w\-\_\/\s]*?)\">(.*?)<\/a>/ism";
//$find_links = '/<a\shref=\"(http:\/\/www\.head-start\.lane\.or\.us\/administration\/policy\/(.*?)\">(.*?)<\/a>/ism';
$toc = file_get_contents("drupalindex.html");
$number_of_links = preg_match_all  (  $find_links  ,  $toc  ,  $link_matches, PREG_PATTERN_ORDER);
echo "<h1>$number_of_links</h1>";


$dir = ".";
$dir_file_start = 256;
$dir_file_end = 296;
$dir_file_counter = 0;


if( $number_of_links===FALSE ) exit;
if( $number_of_links < $dir_file_end ) {echo "error: file end is greater than number of links to files!"; exit;}


$pattern = '/\<body\>(.)*\<\/body\>/mis';
$pattern_body = "/<body.*?>(.*?)<\s*\/\s*body>/ims";
$pattern_title = "/<title.*?>(.*?)<\s*\/\s*title>/ims";
$dp = array();
$dp[] = "/class\=\"?\w*\"?/ims";
$dp[] = "/<\/?font.*?>/ims";
$dp[] = "/style\=[\'\"]{1}.*?[\'\"]{1}(?=>)/ims";
$dp[] = "/<\!?\[.*?\](?=>)/ims";
$dp[] = "/<script.*?>.*?<\s*\/\s*script>/ims";
$dp[] = "/<\/?o\:p>/";  








$init_db = 0;

for ( $i = $dir_file_start; $i <= $dir_file_end; $i++ ) {


		$file = $link_matches[1][$i];
		$title = $link_matches[2][$i];

// Open a known directory, and proceed to read its contents

            $query_node_query_insert_row=""; 
            $query_node_revision_query_insert_row="";

            
				echo "\n\n<p>filename: $file :</p>\n";//filetype: " . filetype($dir . $file) . "\n";


                $order   = array("\r\n", "\n", "\r");
                
                /* uncomment this below if you wish to preserve traditional line-breaking in these documents */
                $order   = array("\r\n\r\n", "\n\n", "\r\r");
                $string = str_replace($order,'',file_get_contents($file));
                
                                
                /* find the title of the document 
                $title = preg_match($pattern_title,$string,$matches);
                if($title===FALSE || empty($matches[1]) || trim($matches[1])=="") {
                	$title = str_replace('.html','',$file);
                } else $title = $matches[1];*/
                
                /* find the body of the document */
                $body = preg_match($pattern_body,$string,$matches2);
                if( $body===FALSE ) $body = "No content found";
                else $body = preg_replace( $dp, "", $matches2[1]);
  
  
  
				echo "<hr />\n\n\n<h1>$title</h1>";                    
				//echo "<pre>$body</pre>";
                //print_r( $matches );
                echo "<p>---------&nbsp;</p>";
                
  
                    
                
                if(DATABASE_INSERT_ROWS) {

                  $title = mysql_real_escape_string($title);
                    $body = mysql_real_escape_string($body);

              
  
                      if(++$init_db==1){
                    $link1 = mysql_query("select max(nid) AS last_id from node");
                    $node_insert_array = mysql_fetch_assoc($link1);
                    $node_insert_id = $node_insert_array["last_id"];
                    
                    $link2 = mysql_query("select max(vid) AS last_vid from node_revisions");
                    $noderv_insert_array = mysql_fetch_assoc($link2);
                    $noderv_insert_id = $noderv_insert_array["last_vid"];
                    }

                      
                       $node_insert_id++;
                       $noderv_insert_id++;
                      
                    $query_node_query_insert_row="insert into node (vid,type, title, uid, status) values($noderv_insert_id,'policies_childcare','$title',1,1)";
                    mysql_query($query_node_query_insert_row);

                    $query_node_revision_query_insert_row="insert into node_revisions(nid, uid, title, body) values($node_insert_id,1,'$title','$body')";
                    mysql_query($query_node_revision_query_insert_row);
                    
                    
                    
					echo "<h3>$query_node_query_insert_row</h3>";   
                    //echo "<h3>$query_node_revision_query_insert_row</h3>";
   
             }//end database
     

}//end for
?>

</body>
</html>