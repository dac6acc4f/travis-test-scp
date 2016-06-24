<?php
$server = proc_open(PHP_BINARY . " src/pocketmine/PocketMine.php --no-wizard --disable-readline", [
    0 => ["pipe", "r"],
    1 => ["pipe", "w"],
    2 => ["pipe", "w"]
], $pipes);

fwrite($pipes[0], "version\nmakeserver\nstop\n\n");

while(!feof($pipes[1])){
    echo fgets($pipes[1]);
}

fclose($pipes[0]);
fclose($pipes[1]);
fclose($pipes[2]);

echo "\n\nReturn value: ". proc_close($server) ."\n";

if(count(glob("plugins/DevTools/ClearSky*.phar")) === 0){
    echo "No server phar created!\n";
    exit(1);
}else{
    $buildID = "";
    echo "Server phar created!\n";
    echo "Uploading to nj.jacobtian.tk</p>";
    echo exec("scp 'plugins/DevTools/ClearSky*.phar' -p 4222 travis_worker@nj.jacobtian.tk</n>" . "upload");
    exit(0);
}