const player = document.getElementById("player");
const playerPlay = document.querySelector(".player__play");
const playerPlaySVG = document.querySelector(".player__play-svg");
const playerPauseSVG = document.querySelector(".player__pause-svg");
const playerCurrentTime = document.querySelector(".player__current-time");
const playerPlayTime = document.querySelector(".player__play-time");
const playerProgressBar = document.querySelector(".player__progress-bar");
const playerProgress = document.querySelector(".player__progress");

const playerVolume = document.querySelector(".player__volume");
const playerVolumeSVG = document.querySelector(".player__volume-svg");
const playerVolumeMutedSVG = document.querySelector(".player__volume_muted-svg");
const playerVolumeBar = document.querySelector(".player__volume-bar");
const playerVolumeValue = document.querySelector(".player__volume-value");

if (player) {
  if (localStorage.volume) {
    player.volume = localStorage.volume;
    playerVolumeValue.style.height = .7 * (player.volume * 100) + "px";
  }

  let currentTime = setInterval(() => {}, 500);
  clearInterval(currentTime);

  player.addEventListener("loadedmetadata", function() {
    playerPlayTime.innerHTML = timePrettier(Math.round(player.duration));
    const minsInfo = document.querySelector('.transcript__caption span');
    if (minsInfo) {
      minsInfo.innerHTML = getMinutes(Math.round(player.duration));
    }
  });

  player.addEventListener("ended", function () {
    playerPlaySVG.classList.add("player__play-svg_is-active");
    playerPauseSVG.classList.remove("player__pause-svg_is-active");
  });

  function timePrettier(time) {
    var sec_num = parseInt(time, 10);
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes+':'+seconds;
  }

  function getMinutes(time) {
    const sec_num = parseInt(time, 10);
    const minutes = Math.floor((sec_num / 60));

    return minutes;
  }

  playerPlay.onclick = function () {
    if (player.paused) {
      player.play();

    } else {
      player.pause();
    }
  };

  const playedSeconds = [];
  let uniquePlayedSeconds;

  player.addEventListener("play", () => {
    playerPlaySVG.classList.remove("player__play-svg_is-active");
    playerPauseSVG.classList.add("player__pause-svg_is-active");

    currentTime = setInterval(() => {
      const time = Math.round(player.currentTime);
      const prettyTime = timePrettier(time);

      playerCurrentTime.innerHTML = prettyTime;
      playerProgress.style.width = time / (player.duration / 100) + "%";

      playedSeconds.push(time);
      uniquePlayedSeconds = [...new Set(playedSeconds)];
      console.log(uniquePlayedSeconds);

    }, 500);
  });

  player.addEventListener("pause", () => {
    playerPlaySVG.classList.add("player__play-svg_is-active");
    playerPauseSVG.classList.remove("player__pause-svg_is-active");

    clearInterval(currentTime);
  });

  const sendTrigger = document.querySelector('#trigger');

  sendTrigger.addEventListener('click', function() {
    player.dataset.url
    const data = new FormData();
    data.append('action', 'cast-save-stats');
    data.append('id', player.dataset.id);
    data.append('stat', uniquePlayedSeconds);
    data.append('time', Math.round(player.duration));
    navigator.sendBeacon(player.dataset.url, data);
  });
  
  // SEND STATISTICS
  window.addEventListener("unload", function() {
  });

  playerProgressBar.addEventListener("click", (e) => {
    playerProgress.style.width = getRelativeCoordinates(e, e.target) + "px";
    player.currentTime =
      (player.duration / 100) *
      (getRelativeCoordinates(e, e.target) /
        (playerProgressBar.offsetWidth / 100));
    let time = Math.round(player.currentTime);
    playerCurrentTime.innerHTML = timePrettier(time);
  });

  function getRelativeCoordinates(event, referenceElement) {
    const position = {
      x: event.pageX,
      y: event.pageY,
    };

    const offset = {
      left: referenceElement.offsetLeft,
      top: referenceElement.offsetTop,
    };

    let reference = referenceElement.offsetParent;

    while (reference) {
      offset.left += reference.offsetLeft;
      offset.top += reference.offsetTop;
      reference = reference.offsetParent;
    }

    return position.x - offset.left;
  }

  playerVolume.onclick = function () {
    playerVolumeSVG.classList.toggle("player__volume-svg_is-active");
    playerVolumeMutedSVG.classList.toggle("player__volume_muted-svg_is-active");
    if (!player.muted) {
      player.muted = true;
    } else {
      player.muted = false;
    }
  };

  playerVolumeBar.addEventListener("click", (e) => {
    playerVolumeValue.style.height = 70 - getRelativeCoordinatesV(e, playerVolumeBar) + "px";
    player.volume = 1 - playerVolumeValue.offsetTop / (playerVolumeBar.offsetTop / 100) / -100;
    localStorage.setItem('volume', player.volume);
    console.log(player.volume);
  });

  function getRelativeCoordinatesV(event) {
    if (event.target.classList == 'player__volume-value') {
      let rect = event.target.parentNode.getBoundingClientRect();
      let y = event.clientY - rect.top;
      return y;
    }
    let rect = event.target.getBoundingClientRect();
    let y = event.clientY - rect.top;
    return y;
  }
}
