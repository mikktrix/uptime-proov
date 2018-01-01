<?php
 
function getFeed($feed_url) {

  //Load XML
  $x = simplexml_load_file($feed_url);
 
 //Separate posts by "item" tag.  
  foreach($x->channel->item as $entry) {
    $content = $entry->description;
   //remove html tags
    $content = strip_tags(html_entity_decode($content));
    $namespaces = $entry->getNamespaces(true);    
    //If there is Media:content picture..
    if (isset($namespaces['media'])){
      $media_url =  trim((string)$entry->children($namespaces['media'])->content->attributes()->url);
      echo "<span class='cell' title='includes/curl.php?$entry->link'><img src='$media_url' alt='$entry->title' height='100' width='100' id = 'imageMedia'; margin: 0px 0px 20px 0px;'><strong>". $entry->title ."</strong><br /><p>".$content/*strip_tags("$entry->description")*/."</p>"."<div class = 'postfooter'>".$entry->author." | ".$entry->pubDate."</div>"."</span>";
    //Where there is no pictures, add Google logo
      }else{
      echo "<span class='cell' title='includes/curl.php?$entry->link'><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/Google-favicon-2015.png/150px-Google-favicon-2015.png' alt = 'Default image' width='100' height='100' id = 'imageMedia' ; margin: 0px 0px 20px 0px;'><strong>". $entry->title ."</strong><br /><p>".$content/*strip_tags("$entry->description")*/."</p>"."<div class = 'postfooter'>".$entry->author." | ".$entry->pubDate."</div>"."</span>";
      }
    

    }
  
}


?>

