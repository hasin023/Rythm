let currentPlaylist = [];
let audioElement;
let mouseDown = false;

function formatTime(seconds) {
  let time = Math.round(seconds);
  let minutes = Math.floor(time / 60);
  let secondsLeft = time - minutes * 60;
  let extraZero = secondsLeft < 10 ? "0" : "";

  return minutes + ":" + extraZero + secondsLeft;
}

function updateTimeProgressBar(audio) {
  $(".progressTime.current").text(formatTime(audio.currentTime));
  $(".progressTime.remaining").text(
    formatTime(audio.duration - audio.currentTime)
  );

  let progress = (audio.currentTime / audio.duration) * 100;
  $(".playBackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio) {
  let volume = audio.volume * 100;
  $(".volumeBar .progress").css("width", volume + "%");
}

function Audio() {
  this.currentlyPlaying;
  this.audio = document.createElement("audio");

  this.audio.addEventListener("canplay", function () {
    let duration = formatTime(this.duration);
    $(".progressTime.remaining").text(duration);
    updateVolumeProgressBar(this);
  });

  this.audio.addEventListener("timeupdate", function () {
    if (this.duration) {
      updateTimeProgressBar(this);
    }
  });

  this.audio.addEventListener("volumechange", function () {
    updateVolumeProgressBar(this);
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

  this.setTime = function (seconds) {
    this.audio.currentTime = seconds;
  };
}
