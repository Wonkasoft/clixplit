<?php
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
        <li>
          <h5><a href="'.$link.'">'.$title.'</h5>
          <span class="dateWrap">'.$pubDate.'</span>
          <p>'.$description.'<br>
          More Info</a></p>
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
    $rss_data = '<label class="clixplit-labels">'.$head.'</label><ul class="newsBlock">';
    while($i<$numrows){
      $rss_data .= $rss_split[$i];
      $i++;
    }
    $trim = str_replace('', '',$this->feed);
    $user = str_replace('&lang=en-us&format=rss_200','',$trim);


    $rss_data.='</ul>';

    return $rss_data;
  }
}
?>