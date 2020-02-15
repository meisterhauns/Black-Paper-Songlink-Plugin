<?php

function songlink($atts) {

    //get shortcode data
    
    $urls = shortcode_atts( array(
        'title' => "",
    ), $atts );

    
    //open files with data inside
    
    $json = file_get_contents(dirname(__DIR__, 2).'/plugins/bp-songlink-storage/files/'.$urls['title'].'.txt');
    $obj = json_decode($json);

    $jsono = file_get_contents(dirname(__DIR__, 2).'/plugins/bp-songlink-storage/files/'.$urls['title'].'.other.txt');
    $objo = json_decode($jsono);
    
    
    //create an empty string to later paste into site
    
    $str="";


    //fill with links

    if($obj->linksByPlatform->spotify->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->spotify->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/spotify.png"></a>';
    }

    if($objo->juno != ''){
        $str = $str.'<a href="'.$objo->juno.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/juno.png"></a>';
    }

    if($objo->beatport != ''){
        $str = $str.'<a href="'.$objo->beatport.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/beatport.png"></a>';
    }
    
    if($objo->traxsource != ''){
        $str = $str.'<a href="'.$objo->traxsource.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/traxsource.png"></a>';
    }

    if($obj->linksByPlatform->napster->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->napster->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/napster.png"></a>';
    }

    if($obj->linksByPlatform->tidal->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->tidal->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/tidal.png"></a>';
    }

    if($obj->linksByPlatform->deezer->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->deezer->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/deezer.png"></a>';
    }

    if($obj->linksByPlatform->appleMusic->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->appleMusic->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/applemusic.png"></a>';
    }

    if($obj->linksByPlatform->googleStore->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->googleStore->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/playstore.png"></a>';
    }

    if($obj->linksByPlatform->google->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->google->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/playmusic.png"></a>';
    }
    
    if($obj->linksByPlatform->amazonStore->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->amazonStore->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/amazon.png"></a>';
    }

    if($obj->linksByPlatform->amazonMusic->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->amazonMusic->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/primemusic.png"></a>';
    }

    if($obj->linksByPlatform->pandora->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->pandora->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/pandora.png"></a>';
    }
    
    if($obj->linksByPlatform->youtubeMusic->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->youtubeMusic->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/ytmusic.png"></a>';
    }

    if($obj->linksByPlatform->youtube->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->youtube->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/youtube.png"></a>';
    }

    if($obj->linksByPlatform->soundcloud->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->soundcloud->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/soundcloud.png"></a>';
    }    
    
    if($obj->linksByPlatform->yandex->url != null){
        $str = $str.'<a href="'.$obj->linksByPlatform->yandex->url.'"><img style="max-height: '.$objo->size.'vmin;" class="'.$objo->class.'" src="'.home_url().'/wp-content'.$objo->path.'/yandex.png"></a>';
    }
    

    //paste links

    return $str;
}