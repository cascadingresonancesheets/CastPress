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
  let currentTime = setInterval(() => {}, 500);
  clearInterval(currentTime);

  player.addEventListener("loadedmetadata", function getTime() {
    playerPlayTime.innerHTML = timePrettier(Math.round(player.duration));
  });

  player.addEventListener("ended", function () {
    playerPlaySVG.classList.add("player__play-svg_is-active");
    playerPauseSVG.classList.remove("player__pause-svg_is-active");
  });

  function timePrettier(time) {
    let minutes = Math.floor(time / 60);
    if (minutes.toString().length == 1) minutes = "0" + minutes;
    let seconds = time - minutes * 60;
    if (seconds.toString().length == 1) seconds = "0" + seconds;
    return minutes + ":" + seconds;
  }

  playerPlay.onclick = function () {
    function playBtnSwitch() {
      playerPlaySVG.classList.toggle("player__play-svg_is-active");
      playerPauseSVG.classList.toggle("player__pause-svg_is-active");
    }

    if (player.paused) {
      player.play();
      playBtnSwitch();
      currentTime = setInterval(() => {
        let time = Math.round(player.currentTime);
        playerCurrentTime.innerHTML = timePrettier(time);

        playerProgress.style.width = time / (player.duration / 100) + "%";
      }, 500);
    } else {
      player.pause();
      playBtnSwitch();
      clearInterval(currentTime);
    }
  };

  playerProgressBar.addEventListener("click", (e) => {
    playerProgress.style.width = getRelativeCoordinates(e, e.target) + "px";
    player.currentTime = (player.duration / 100) * (getRelativeCoordinates(e, e.target) / (playerProgressBar.offsetWidth / 100));
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
  });

  function getRelativeCoordinatesV(event, referenceElement) {
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

    return position.y - offset.top;
  }
}
