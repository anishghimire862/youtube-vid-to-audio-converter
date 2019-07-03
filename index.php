<form action="#" method="post">
  <input type="text" name="searchquery"/>
  <input type="submit" />
</form>
<?php
if(isset($_POST['searchquery'])) {
error_reporting(0);

$search = $_POST['searchquery'];

$api = "AIzaSyCScIvOKvE7BuFl4Ee19WjR6epDrZ3RxOg";

$link = "https://www.googleapis.com/youtube/v3/search?safeSearch=moderate&order=relevance&part=snippet&q=".urlencode($search). 
  "&maxResults=5&key=". $api;

$video = file_get_contents($link);

$video = json_decode($video, true);

foreach ($video['items'] as $data){
  $title = $data['snippet']['title'];
  $description = $data['snippet']['title'];
  $vid = $data['id']['videoId'];
  $videolink = "https://youtube.com/embed/$vid";
  if($vid){
?>
<?php echo "<p> $title</p>";?>
<iframe src="<?php echo $videolink; ?>" > </iframe>
<form action="./download.php" method="post">
  <input type="hidden" name="vidid" value="<?php echo $vid; ?>">
  <input type="submit" value="Download"/>
</form>
<hr />
<?php
  }
}
} else {
  echo "Search";
}
?>
