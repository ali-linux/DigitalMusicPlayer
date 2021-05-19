<?php
  include('includes/includedFiles.php');
  if(isset($_SESSION['userLoggedIn'])){
    $userLoggedIn = $_SESSION['userLoggedIn'];
  } else {
    header('Location registration.php');
  }

?>
<div id="main">
  <?php
if(isset($_GET['id'])){
  $albumId =  $_GET['id'];
} else {
  header("Location: index.php");
}

$album = new Album($con, $albumId);

$artist = $album->getArtist();

?>



<div class="entityInfo">
  <div class="leftSection">
    <img src="<?php echo $album->getArtworkPath(); ?>" alt="">
  </div>
  <div class="rightSection">
    <h2><?php echo $album->getTitle(); ?></h2>
    <p>By <?php echo $artist->getName()?></p>
    <p><?php echo $album->getNumberOfSongs(); ?> Songs</p>
  </div>

</div>

<div class="tracklistContainer">
  <ul class="tracklist">
  <?php
    $songIdArray = $album->getSongIds();
    $i=1;
    foreach($songIdArray as $songId){
      
      $albumSong = new Song($con, $songId);
      $albumArtist = $albumSong->getArtist();

      echo "
        <li class='tracklistRow'>
          <div class='trackCount'>
            <img src='assets/images/icons/play-black.png' class='play' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
            <span class='trackNumber'>$i.</span>
          </div>

          <div class='trackInfo'>
            <span class='trackName'>". $albumSong->getTitle() ."</span>
            <span class='artistName'>". $albumArtist->getName() ."</span>
          </div>

          <div class='trackOptions'>
            <input type='hidden' class='songId' value='".$albumSong->getId()."'>
            <img src='assets/images/icons/more-black.png' class='optionsButton' onclick='showOptionsMenu(this)' style='cursor:pointer;'>
          </div>

            <div class='trackDuration'>
              <span class='duration'>
                ". $albumSong->getDuration() ."
              </span>
            </div>

        </li>
      ";
      $i++;
    }
  ?>
  <script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>
  </ul>
</div>
</div>

<nav class="optionsMenu">
	<input type="hidden" class="songId">
  <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn); ?>
</nav>

<!-- // $albumQuery = mysqli_query($con, "SELECT * FROM album WHERE id='$albumId'");
// $album = mysqli_fetch_array($albumQuery);
// $artistQuery = mysqli_query($con, "SELECT * FROM artists WHERE id='$artistId'");
// $artist = mysqli_fetch_array($artistQuery); -->
