var debug = false;
var debugEl = document.getElementById('debug');

// Prevent scrolling
document.addEventListener('touchmove', function (e) {
	e.preventDefault();
});

// Elements
var ball = document.getElementById('ball');
var hole = document.getElementById('hole');
var messages = {
	congrats: document.getElementById('congrats'),
	intro: document.getElementById('intro'),
	photo: document.getElementById('photo')
}

// Game config
var won = false;
var repeater;
var level = 0;
var levels = [
	{
		holeX: 100,
		holeY: 100
	},
	{
		holeX: 50,
		holeY: 50
	},
	{
		holeX: 200,
		holeY: 250
	}
];

// Hole config
var hole = document.getElementById('hole');
var holeX;
var holeY;
var holeWidth = hole.clientWidth;
var holeHeight = hole.clientHeight;




// Ball config
var x = 0,
y = 0,
vx = 0,
vy = 0,
ax = 0,
ay = 0;

// Grab ball element
var ball = document.getElementById("ball");
var ballWidth = ball.clientWidth;
var ballHeight = ball.clientHeight;


function startGame() {
	// Set up acceleration
	if (window.DeviceMotionEvent != undefined) {
		window.ondevicemotion = function (e) {
			ax = event.accelerationIncludingGravity.x * 5;
			ay = event.accelerationIncludingGravity.y * 5;
			if (debug) console.log('accelerationX', e.accelerationIncludingGravity.x);
			if (debug) console.log('accelerationY', e.accelerationIncludingGravity.y);
			if (debug) console.log('accelerationZ', e.accelerationIncludingGravity.z);
			if (e.rotationRate) {
				if (debug) console.log('rotationAlpha', e.rotationRate.alpha);
				if (debug) console.log('rotationBeta', e.rotationRate.beta);
				if (debug) console.log('rotationGamma', e.rotationRate.gamma);
			}
		}
		repeater = setInterval(function () {
			var landscapeOrientation = window.innerWidth / window.innerHeight > 1;
			if (landscapeOrientation) {
				vx = vx + ay;
				vy = vy + ax;
			} else {
				vy = vy - ay;
				vx = vx + ax;
			}
			vx = vx * 0.98;
			vy = vy * 0.98;
			y = parseInt(y + vy / 50);
			x = parseInt(x + vx / 50);
			boundingBoxCheck();
			ball.style.top = y + "px";
			ball.style.left = x + "px";
			
			if (debug) debugEl.innerHTML = 'ballX: ' + x + ' ballY: ' + y + ' ballX2: '+ (x + ballWidth) + ' ballY2:' + (y + ballHeight);
		}, 25);
	}
	
	// Setup first level
	setupLevel(0);
}

// Callback to check ball within arena bounds, and test hole success
function boundingBoxCheck() {
	if (x < 0) {
		x = 0;
		vx = -vx;
	}
	if (y < 0) {
		y = 0;
		vy = -vy;
	}
	if (x + ballWidth > document.documentElement.clientWidth) {
		x = document.documentElement.clientWidth - ballWidth;
		vx = -vx;
	}
	if (y > document.documentElement.clientHeight - ballHeight) {
		y = document.documentElement.clientHeight - ballHeight;
		vy = -vy;
	}
	
	// Check if ball over hole
	if ( x > holeX && x + ballWidth < holeX + holeWidth && y > holeY && y + ballHeight < holeY + holeHeight ) {
		//clearInterval(repeater);
		if (level >= levels.length ) {
			clearInterval(repeater);
			showMessage('congrats');
		} else {
			alert('well done! next level coming up...');
			level ++;
			setupLevel(level);
		}
	}
}

// Function to set up hole position for level
function setupLevel (level) {
	holeX = levels[level].holeX
	holeY = levels[level].holeY
	hole.style.left = holeX + 'px';
	hole.style.top = holeY + 'px';
}

// Function to show message screens
function showMessage (msg) {
	messages[msg].classList.add('is-shown');
}
function hideMessage(msg) {
	messages[msg].classList.remove('is-shown');
}

// Bind message screens
var goButton = messages.intro.querySelector('.button');
goButton.addEventListener('click', function(e) {
	hideMessage('intro');
	startGame();
});

var photoButton = messages.congrats.querySelector('.button');
photoButton.addEventListener('click', function(e) {
	hideMessage('congrats');
	showMessage('photo');
});

// Init
showMessage('intro');
