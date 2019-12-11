import './data';
window.onload = function () {
  var video = document.getElementsByTagName('video')[0];
  document.getElementById("duration").innerHTML = video.duration;
  video.ontimeupdate = aktualTime;
  video.onvolumechange = volchange;
  document.getElementById("playBtn").onclick = start;
  document.getElementById("pauseBtn").onclick = pause;
  document.getElementById("plus5").onclick = plus5;
  document.getElementById("minus5").onclick = minus5;
  document.getElementById("vlmup").onclick = volup;
  document.getElementById("vlmdwn").onclick = voldwn;
  
}

function start() {
  var video = document.getElementsByTagName('video')[0];
  video.play();
}

function pause() {
  var video = document.getElementsByTagName('video')[0];
  video.pause();
}

function aktualTime() {
  var video = document.getElementsByTagName('video')[0];
  document.getElementById("licznik").innerHTML = video.currentTime;
  document.getElementById("pasek").value = video.currentTime;
}

function plus5() {
  var video = document.getElementsByTagName('video')[0];
  video.currentTime += 5;
}
import './css/style.css';
import './css/style_login.css';

function minus5() {
  var video = document.getElementsByTagName('video')[0];
  video.currentTime -= 5;
}

function volup() {
  var video = document.getElementsByTagName('video')[0];
  if ( video.volume + 0.2 <= 1) {
  video.volume += 0.2;
  }
}

function voldwn() {
  var video = document.getElementsByTagName('video')[0];
  if ( video.volume - 0.2 >= 0) {
  video.volume -= 0.2;
  }
}

function volchange() {
  var video = document.getElementsByTagName('video')[0];
  document.getElementById("actualVol").innerHTML = video.volume;
  }