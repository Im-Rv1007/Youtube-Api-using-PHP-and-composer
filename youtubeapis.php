<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

    // $API_Key = 'AIzaSyDdHf9N8TBys9gqhZibLgZPZyR5-0XiV-I';
    // $API_Url = 'https://www.googleapis.com/youtube/v3/';
    // $maxResult = '1';

    $API_Key = $_POST["api_key"];
    $API_Url = 'https://www.googleapis.com/youtube/v3/';
    $maxResult = $_POST["max_length"];
    $selected = $_POST['selectedOp'];
    $datas=$_POST['valuesof'];
    require 'vendor/autoload.php';

    use youTubeSearch\searchByName;
    use youTubeSearch\searchByChannelId;
    use youTubeSearch\searchByPlayList;

    if($selected=='SearchByNameAPI'){
        echo '<b>Title Name Search By Name</b> </br>';
        $n1 = new searchByName();
        $n1->searchName($datas,$API_Key,$API_Url,$maxResult);
        echo '</br>';
    }
    if($selected=='SearchByChannelId'){
        echo '<b>Channel content Search by Channel Id</b> </br>';
        $i1 = new searchByChannelId();
        $i1->channelId($datas,$API_Key, $API_Url,$maxResult); 
        echo '</br>';
    }
    if($selected=='SearchByPlayList'){
        echo '<b>Channel Playlists name Search By Channel Id</b> </br>';
        $p1 = new searchByPlayList();
        $p1-> channalName($datas,$API_Key,$API_Url,$maxResult);
    }
?>

<form method="POST" >
    Enter the API Key : <input type='text' name='api_key'><br />
    Max Output : <input type='number' name='max_length'><br /> 
    Select an Option :
    <select name='selectedOp'>
        <option value="SearchByNameAPI">Title Name Search By Name</option>
        <option value="SearchByChannelId">Channel content Search by Channel Id</option>
        <option value="SearchByPlayList">Channel Playlists name Search By Channel Id</option>
    </select><br/>
    Enter id/name :<input type='text' name='valuesof'><br />
    <input type="submit" value="Submit">
</form>

    
</body>
</html>