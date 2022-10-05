<!DOCTYPE html>
<html>
<head>
    <title>IP TV</title>

    <link rel="stylesheet" type="text/css" href="mystyle.css" />
</head>
<body onload="onload();">
    <video id="idle_video" onended="onVideoEnded();"></video>
    <script>
        
        <?php 
		 include "db_conn.php";
		 $sql = "SELECT * FROM videos ORDER BY id DESC";
		 $res = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($res) > 0) {
		 	while ($video = mysqli_fetch_assoc($res)) { 
		?>
        var video_list      = uploads/<?=$video['video_url']?>;
        var video_index     = 0;
        var video_player    = null;

        function onload(){
            console.log("body loaded");
            video_player        = document.getElementById("idle_video");
            video_player.setAttribute("src", video_list[video_index]);
            video_player.play();
        }

        function onVideoEnded(){
            console.log("video ended");
            if(video_index < video_list.length - 1){
                video_index++;
            }
            else{
                video_index = 0;
            }
            video_player.setAttribute("src", video_list[video_index]);
            video_player.play();
        }
    </script>
</body>
</html>