<?php 
namespace youTubeSearch;
class searchByPlayList{
    function channalName($channelListId,$API_Key,$API_Url,$maxResult){

        $parameter=[
            'part'=> 'snippet,contentDetails',
            'channelId'=>$channelListId,
            'maxResults'=> $maxResult,
            'key'=> $API_Key
        ];

        $channel_URL = $API_Url  .'playlists?'. http_build_query($parameter);
        $json_details = json_decode(file_get_contents($channel_URL));
        
        file_put_contents('data.json',json_encode($json_details));
        $channel_title=$json_details->items;
        foreach ($channel_title as $titles){
            $get_title = $titles -> snippet -> title;
            print_r($get_title.'<br/>');
        }
    }
}
?>