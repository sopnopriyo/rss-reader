<?php namespace Shahin\Rss\Components;

use Cms\Classes\ComponentBase;
use Rainlab\Blog\Models\Post;
use Shahin\Rss\Models\RssModel ;

class RssReader extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'RssReader Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
	
	public function onRun(){
       
	   
		
		
		
		$all_data = RssModel::all();
	
	   
	   
		foreach ($all_data as $rss_data) {   // for loading sources 
		
		
			
			$rss = simplexml_load_file($rss_data->url); 
			

			
			
			$last_updated_date = (int) $rss_data->last_build_date;
			

						
			foreach($rss->channel->item as $item) {

                    
                 
					if($last_updated_date >= (int) strtotime($item->pubDate) ){
                    
						break;  

					}
					else 
					{
                       // update rainlab blog RssModel here
					   
                        $blog_post = new Post();
                       
						
                        $blog_post->title = $item->title;
                        $temp_slug = str_replace(array("http://www.gamespot.com/articles/","http://www.gamespot.com/reviews/","http://ap.ign.com/"),"", $item->link);
                        $blog_post->slug =str_replace("/","-",$temp_slug ) ;
						$blog_post->content = str_replace("<iframe src=\" ", "<iframe src= \"www.gamespot.com", $item->description);
						$blog_post->excerpt = substr(strip_tags($item->description), 0, 500);
                        $blog_post->published ='0' ;  // set it to 0 if moderator wants to publish it manually 
						$blog_post->published_at=strtotime($item->pubDate);    
                       	$blog_post->save() ;

                        
                    }
               
			
			
			}
			
			
			
			if($last_updated_date != (int) strtotime($rss->channel->item[0]->pubDate)){
				
				
				$rss_data->last_build_date= strtotime($rss->channel->item[0]->pubDate);
				$rss_data->save();
			}
			

			
			
        
        }
		
			
			
		
		
		// these following codes  are required for updating rss_sources table 
		
		  
		//$rss_post = new RssModel();
		//$rss_post->name = "Gamespot News ";
		//$rss_post->name = "Gamespot Reviews ";
		//$rss_post->name = "Ign Rss ";
		//$rss_post->url = "http://www.gamespot.com/feeds/news/";
		//$rss_post->url = "http://www.gamespot.com/feeds/reviews/";
		//$rss_post->url = "http://ap.ign.com/feed.xml";
		//$rss_post->last_build_date = "";
		//$rss_post->save();
			
		
		
		
		
	 }

}