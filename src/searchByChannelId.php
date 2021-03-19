<?php 
namespace youTubeSearch;
class searchByChannelId{
    function channelId($channelId,$API_Key,$API_Url,$maxResult)
    {
        $parameter = [
            'id'=> $channelId,
            'part'=> 'contentDetails',
            'key'=> $API_Key
        ];
        $channel_URL = $API_Url . 'channels?' . http_build_query($parameter);
        $json_details = json_decode(file_get_contents($channel_URL), true);
        
        $playlist = $json_details['items'][0]['contentDetails']['relatedPlaylists']['uploads'];
        $parameter = [
            'part'=> 'snippet',
            'playlistId' => $playlist,
            'maxResults'=> $maxResult,
            'key'=> $API_Key
        ];
        $channel_URL = $API_Url . 'playlistItems?' . http_build_query($parameter);
        $json_details = json_decode(file_get_contents($channel_URL));

        $channel_title=$json_details->items;
        foreach ($channel_title as $titles){
            $get_title = $titles -> snippet -> title;
            print_r($get_title.'<br/>');
        }

    }
}
?>