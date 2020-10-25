<?php

if(isset($_GET['fetch'])){
    echo file_get_contents('https://onegreatworknetwork.com/nowplaying/VLCPlaying.txt');
}
