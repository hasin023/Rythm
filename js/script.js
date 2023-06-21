let currentPlaylist = [];
let audioElement;

function formatTime(seconds) {
  let time = Math.round(seconds);
  let minutes = Math.floor(time / 60);
  let secondsLeft = time - minutes * 60;
  let extraZero = secondsLeft < 10 ? "0" : "";

  return minutes + ":" + extraZero + secondsLeft;
}

function Audio() {
  this.currentlyPlaying;
  this.audio = document.createElement("audio");

  this.audio.addEventListener("canplay", function () {
    let duration = formatTime(this.duration);
    $(".progressTime.remaining").text(duration);
  });

  this.setTrack = function (track) {
    this.audio.src = track;
  };

  this.play = function () {
    this.audio.play();
  };

  this.pause = function () {
    this.audio.pause();
  };
}
