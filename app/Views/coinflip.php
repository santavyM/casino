<?=$this->extend("layout/master")?>

<?=$this->section("content")?>
<div class="d-flex align-items-center card mx-auto bg-secondary" style="width: 600;">
<div class='coin-flip'>
  <!-- The tail starts out hidden; we don't want to wait until CSS rule evaluation to hide this image -->
  <div id='coin-tails' style='display:none'>
    <img src='<?= base_url('assets/casino/blue.png'); ?>'>
  </div>
  <div id='coin-heads'>
    <img src='<?= base_url('assets/casino/red.png'); ?>'>
  </div>
</div>

<div id='controls'>
    Balance <div id='div-balance'></div>
  <div id='buttons'>
    <div class="input-group">
    <span class="input-group-text">sazka:</span>
    <input type="number" class="form-control fancy-input" id="betText" value="5">
    </div>
    <p></p>
    <button id='btn-heads' class="btn btn-danger btn-md" onclick=flip('heads')>Red</button>
    <button id='btn-tails' class="btn btn-primary btn-md" onclick=flip('tails')>Blue</button>
  </div>
  <div id='div-result'></div>
</div>

<div id='div-debuginfo'></div>
</div>
<div class="d-flex align-items-center h-100">
  <div class="card mx-auto bg-dark text-white" style="width:1100px">
  <div class="card-body">
 

<?php

$table = new \CodeIgniter\View\Table();
$table->setHeading("id", "sazka", "vyhra", "datum");
foreach ($coinflip as $row) {
    $radek = array($row->id, $row->sazka, $row->vyplaceni, $row->datum);
    $table->addRow($radek);
}

$template = [
    'table_open' => '<table class="table text-white">',
    'thead_open' => '<thead>',
    'thead_close' => '</thead>',
    'heading_row_start' => '<tr>',
    'heading_row_end' => '</tr>',
    'heading_cell_start' => '<th>',
    'heading_cell_end' => '</th>',
    'tfoot_open' => '<tfoot>',
    'tfoot_close' => '</tfoot>',
    'footing_row_start' => '<tr>',
    'footing_row_end' => '</tr>',
    'footing_cell_start' => '<td>',
    'footing_cell_end' => '</td>',
    'tbody_open' => '<tbody>',
    'tbody_close' => '</tbody>',
    'row_start' => '<tr>',
    'row_end' => '</tr>',
    'cell_start' => '<td>',
    'cell_end' => '</td>',
    'row_alt_start' => '<tr>',
    'row_alt_end' => '</tr>',
    'cell_alt_start' => '<td>',
    'cell_alt_end' => '</td>',
    'table_close' => '</table>'
];

$table->setTemplate($template);
echo $table->generate();

?>
</div>
</div>
</div>
  </div>
  </div>

  <script>
    var result = 'heads';
var chosen = result;
var headClass = 'coin-heads';
var tailClass = 'coin-tails';

var balance;
var coinState;

const betUnit = document.getElementById('betText').value * 1;

const DGEBI = document.getElementById.bind(document);

var imgHead = DGEBI(headClass);
var imgTail = DGEBI(tailClass);
var btnHeads = DGEBI('btn-heads');
var btnTails = DGEBI('btn-tails');
var divResult = DGEBI('div-result');
var divBalance = DGEBI('div-balance');
var divDebugInfo = DGEBI('div-debuginfo');



/* Init game state; this function is intentionally unnamed, executed using IIFE */
(function(){
  balance = <?php echo($hodnota[0]->celkem-$sazka[0]->celkem+$vyplaceni[0]->celkem) //$data[0]->sazka+$data[0]->vyplaceni?>; //$data[0]->sazka+$data[0]->vyplaceni?>;
  coinState = 'stopped';
  divBalance.innerHTML = balance;
})();

function serverGetRandomByte(callback) {
  var val = randomIntInc(0,255); // mimic NodeJS' `crypto.randomBytes(1)`
  setTimeout(function() {callback(val)}, 1000 * randomIntInc(1,3))
}

// Returns a random number in range [low,high]; that is, both ends of the range are inclusive
function randomIntInc (low, high) {
    return Math.floor(Math.random() * (high - low + 1) + low);
}

function flip(p) {
  chosen = p
  startSpinning();
}

/*function toggleSpinning(){if(coinState==='spinning')stopSpinning();}else{startSpinning();}}*/

document.onkeypress = function(e){detectKeyPress(e)};
function detectKeyPress(e) {
  const key = e.key;
  if (key === 'h' || key === 'H') {
    flip('heads')
  } else if (key === 't' || key === 'T') {
    flip('tails')
  } else if (key === 'd') {
    divDebugInfo.style.display = 'none';
  } else if (key === 'D') {
    divDebugInfo.style.display = 'block';
  }
}

function updateResult() {
  divResult.innerHTML = result;
  
  if (debug) {
    divDebugInfo.innerHTML = debugText;
  } else {
    divDebugInfo.innerHTML = '';
  }
}

function startSpinning() {
  if (coinState === 'spinning')
    return;
  coinState = 'spinning';
  
  balance = balance - document.getElementById('betText').value;

  result = '?'
  updateResult();

  divBalance.innerHTML = balance;
  btnHeads.disabled = btnTails.disabled = true;
  imgHead.classList.add(headClass);
  imgTail.classList.add(tailClass);
  imgHead.style.display = imgTail.style.display = 'block';

  serverGetRandomByte(stopSpinning);
}

function stopSpinning(val) {
  if (coinState === 'stopped')
    return;
  coinState = 'stopped';
  
  btnHeads.disabled = btnTails.disabled = false;
  imgHead.classList.remove(headClass);
  imgTail.classList.remove(tailClass);

  if (val % 51 === 0) {
    /* The coin landed on edge; This is also the house-edge. */
    result = "edge";
  } else if (val % 2 === 0) {
    result = "heads";
  } else {
    result = "tails";
  }
  

  if (result === "edge") {
    divResult.innerHTML = 'Edge!!!';
  } else if (result == chosen) {
    balance = balance + (2 * document.getElementById('betText').value * 1);
    divResult.innerHTML = 'Výhra!!!';
    $(document).ready(function () {
    $.ajax({
    type: 'post',
    url: 'Casino/gameCoinflip',
    data: {
        vyplaceni: 2 * document.getElementById('betText').value,
        sazka: document.getElementById('betText').value
    },
    success: function (response) {
       console.log('nice');
       window.location="coinflip";
    }
});
});
  } else {
    divResult.innerHTML = 'Zkus to znova';
    $.ajax({
    type: 'post',
    url: 'Casino/gameCoinflip',
    data: {
        vyplaceni: 0,
        sazka: document.getElementById('betText').value
    },
    success: function (response) {
       console.log('not nice');
       window.location="coinflip";
    }
});
  }
  

  divBalance.innerHTML = balance;

  if (result === 'edge') {
    imgTail.style.display = 'none';
    imgHead.style.display = 'none';
  } else if (result === "heads") {
    imgTail.style.display = 'none';
  } else {
    imgHead.style.display = 'none';
  }

  // Debugging code
  if (debug) {
    iter = iter + 1;
    if (balance < lowBalance) lowBalance = balance;
    if (balance > highBalance) highBalance = balance;
    
    if (result === 'edge') edges = edges + 1;
    else if (result === 'heads') heads = heads + 1;
    else if (result === 'tails') tails = tails + 1;
    
    if (result === chosen) correctGuesses = correctGuesses +1;
    else wrongGuesses = wrongGuesses +1;

    debugText = `<table id='debuginfo'>`
    +`<tr><td>Random value</td><td>${val}</td></tr>`
    +`<tr><td>Total flips</td><td>${iter}</td></tr>`
    +`<tr><td>Landed on edge</td><td>${edges}</td></tr>`
    +`<tr><td>Landed on heads</td><td>${heads}</td></tr>`
    +`<tr><td>Landed on tails</td><td>${tails}</td></tr>`
    +`<tr><td>Correct guesses</td><td>${correctGuesses}</td></tr>`
    +`<tr><td>Wrong guesses</td><td>${wrongGuesses}</td></tr>`
    +`<tr><td>Low balance</td><td>${lowBalance}</td></tr>`
    +`<tr><td>High balance</td><td>${highBalance}</td></tr>`
    +`</table>`;
    
    updateResult();
    //setTimeout(function(){btnTails.click()}, 500)
  }
}

var debug = false;
var debugText = '';
var iter = 0;
var edges = 0;
var heads = 0;
var tails = 0;
var correctGuesses = 0;
var wrongGuesses = 0;
var lowBalance = balance;
var highBalance = balance;

  </script>
<?=$this->endSection()?>