
	var speech = ('webkitSpeechRecognition' in window)

	if (!speech) {
		
	} else {
		window.recognition = new webkitSpeechRecognition();
		recognition.continuous = true;
		recognition.interimResults = false;
		recognition.lang = 'en-GB';

		recognition.onresult = function(event) {
			console.log(event.results[0][0].transcript);
			if ( event.results[0][0].transcript.indexOf('melon') != -1 ) {
				recognition.stop();
				aud_open.play();
				gate.classList.add('is-open');
				msg1.classList.remove('is-shown');
				msg2.classList.add('is-shown');
			} else {
				recognition.stop();
				aud_fool.play();
				alert('Fool of a Took! Try again...');
				recognition.start();
			}
		};
	}

	// Init
	var scene = document.querySelector('.scene');
	var gate = document.querySelector('.gate');
	var msg1 = document.querySelector('.msg1');
	var msg2 = document.querySelector('.msg2');
	gate.addEventListener('click', function (e) {
		if (!gate.classList.contains('is-open'))
			recognition.start();
	});
	var aud = document.querySelector('audio');
	aud.play();
	aud.addEventListener('timeupdate', function () {
		if ( Math.ceil(this.currentTime) == Math.ceil(this.duration) ) {
			scene.classList.add('is-ready');
			msg1.classList.add('is-shown');
		}
	});
	// Get 'try again' sound
	var aud_fool = document.querySelector('.snd-fool');
	// Get 'open' sound
	var aud_open = document.querySelector('.snd-open');
	

