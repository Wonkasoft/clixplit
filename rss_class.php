<?php
// Add this to the page for display!
//<?php include('rss_class.php');
//          $feed_url = 'http://clixplit.com/feed/';
//          $category_pass = 'Updates';
//          $feedlist_Updates = new rss($feed_url, $category_pass);
//         echo $feedlist_Updates->display(6,"Updates From Clixplit"); 

class rss {
  var $feed;
  var $category_type;
  function rss($feed,$category_type){
    $this->feed = $feed;
    $this->category_type = $category_type;
  }

  function parse(){
    $rss = simplexml_load_file($this->feed);

            //print_r($rss);die; /// Check here for attributes

    $rss_split = array();
    foreach ($rss->channel->item as $item) {

      $category = (string) $item->category;
      if ($this->category_type == $category) {
        $title = (string) $item->title; 
        $link   = (string) $item->link; 
        $pubDate   = (string) $item->pubDate;
        $description = (string) $item->description; 
        $image = $rss->channel->item->enclosure->attributes();

        $rss_split[] = '
        <div class="col-xs-12"><ul class="newsBlock">
        <li class="feed-hover">
          <a href="'.$link.'" target="_blank"><h4>'.$title.'</h4>
          <span class="dateWrap">'.$pubDate.'</span>
          <p>'.$description.'</p></a>
        </li>
         <li> <p></p></li>
        ';
      }
    }
    return $rss_split;
  }

  function display($numrows,$head){

    $rss_split = $this->parse();
    $i = 0;
    $rss_data = '<div class="col-xs-12 text-center"><label class="clixplit-labels"><h3>'.$head.'</h3></label></div>';
    while($i<$numrows){
      $rss_data .= $rss_split[$i];
      $i++;
    }
    $trim = str_replace('', '',$this->feed);
    $user = str_replace('&lang=en-us&format=rss_200','',$trim);


    $rss_data.='</ul></div>';

    return $rss_data;
  }
}
?>