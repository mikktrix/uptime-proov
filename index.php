<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Block Proov</title>
</head>
<body>

	
<div  id = "feed"><a href = https://flipboard.com/@raimoseero/feed-nii8kd0sz?rss id="feedhref">FEED<a></div>

<?php require_once "includes/functions.php"; ?>
	
	<div class = "table">
		<?php $postString = getFeed("https://flipboard.com/@raimoseero/feed-nii8kd0sz?rss"); ?>   
	</div>

<script type="text/javascript">

//Open new window, running curl.php?"clicked posts URL" 
$(document).ready(function() {
$(".cell").click(function () {
     window.open($(this).attr("title"), '_blank');
    });
});

</script>

</body>
</html>
