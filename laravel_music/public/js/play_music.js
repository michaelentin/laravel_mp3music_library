//changes the song that is playing on the page
function set_song(source){
  var player = document.getElementById("music_player");
  var source_element = document.getElementById("music_source");

  source_element.src = source;

  player.load();
  player.play();
}
