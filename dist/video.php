<?php
echo'
<html>
<head>
</head>
</body>
<video>
      <source src="videoplayback.webm">
  </video>
  <div>
    <progress id = "pasek" value="0" max="160"></progress>
  </div>
  <p>
  Audio volume :
  <button id = "vlmup">Volume+</button>
  <button id = "vlmdwn">Volume-</button>
  <p>
  <button id = "playBtn"> Play </button>
  <button id = "pauseBtn"> Pause </button>
  <button id = "plus5">Dodaj 5</button>
  <button id = "minus5">Cofnij 5</button>
  <div>
  Duration: <span id = "duration"/>
  </div>
  <div>
  Current time:<span id = "licznik"/>
  </div>
  <div>
    Aktualna glosnosc: <span id = "actualVol"/>
  </div>
  </body>
  </html>'
  ?>
