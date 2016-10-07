<?php 
class rss { 
	var $feed; 
	function rss($feed){ $this->feed = $feed; 
	} 
	function parse(){ $rss = simplexml_load_file($this->feed); 
		//print_r($rss);die; //Check here for attributes 
		$rss_split = array(); 
		foreach ($rss->channel->item as $item) { 
			$title = (string) $item->title; $link = (string) $item->link; 
			$pubDate = (string) $item->pubDate; 
			$category = (string) $item->category;
			$description = (string) $item->description; 
			$image = $rss->channel->item->enclosure->attributes(); 
			$testing = the_post_thumbnail();
			//$image_url = $image['url']; 
			$rss_split[] = '<div class="col-xs-12 col-md-4"><ul class="newsBlock"> 
							<li> 
							<h5><a href="'.$link.'">'.$title.'</a></h5> 
							<span class="dateWrap">'.$pubDate.'</span> 
							<span class="">'.$category.'</span>
							<p>'.$testing.'</p>
							<p>'.$description.'</p> 
							<a href="'.$link.'">Read Full Story</a> 
							</li>
							</ul> 
							</div>'; 
		} return 
		$rss_split; 
	} 
	function display($numrows,$head){ 
		$rss_split = $this->parse(); 
		$i = 0; $rss_data = '<div class="container"><div class="row"><div class="col-xs-12"><h2>'.$head.'</h2></div></div></div><div class="container"><div class="row">'; 
		while($i<$numrows){ 
			$rss_data .= $rss_split[$i]; 
			$i++; 
		} 
		$trim = str_replace('', '',$this->feed); 
		$user = str_replace('&lang=en-us&format=rss_200','',$trim); 
		$rss_data.='</div></div>'; return $rss_data; 
	} 
} 
?>