$(document).ready(function() {

	$('.playername').keyup(function()
	{
		if (3 == $(this).val().length) {
			$('#start-pong').removeClass('hidden');
			$('.enter-name').addClass('hidden');
		} else {
			$('#start-pong').addClass('hidden');
			$('.enter-name').removeClass('hidden');
		}
	})

	//BEGIN LIBRARY CODE
	var x;
	var y;
	var dx;
	var dy;
	var WIDTH;
	var HEIGHT;
	var ctx;
	var paddlex;
	var paddleh;
	var paddlew;
	var intervalId;
	var rightDown = false;
	var leftDown = false;
	var radius;
	var paddlexAI;

	var canvas = document.getElementById( 'myCanvas' );

	//set rightDown or leftDown if the right or left keys are down
	function onKeyDown(evt) {
	  if (evt.keyCode == 39) rightDown = true;
	  else if (evt.keyCode == 37) leftDown = true;
	}

	//and unset them when the right or left key is released
	function onKeyUp(evt) {
	  if (evt.keyCode == 39) rightDown = false;
	  else if (evt.keyCode == 37) leftDown = false;
	}

	$(document).keydown(onKeyDown);
	$(document).keyup(onKeyUp);

	function init_paddles() {
		paddlex = WIDTH / 2;
		paddlexAI = paddlex;
		paddleh = 10;
		paddlew = 75;

	}

	function init() {
		ctx = canvas.getContext("2d");
		WIDTH = canvas.width;
		HEIGHT = canvas.height;
		x = 150;
		y = 150;
		dx = 2;
		dy = 4;
		radius = 10;
		rightDown = false;
		leftDown = false;
		intervalId = 0;

		intervalId = setInterval(draw, 10);
		init_paddles();

	}

	function circle(x,y,r) {
	  ctx.beginPath();
	  ctx.arc(x, y, r, 0, Math.PI*2, true);
	  ctx.closePath();
	  ctx.fill();
	}

	function rect(x,y,w,h) {
	  ctx.beginPath();
	  ctx.rect(x,y,w,h);
	  ctx.closePath();
	  ctx.fill();
	}

	function clear() {
	  ctx.clearRect(0, 0, WIDTH, HEIGHT);
	}

	function followBallAI() {

		//randomly pick number beteween 0 and 1
		var delayReaction = Math.random();

		//25% chance of reaction delay
		if(delayReaction >= 0.3) {

			if(x > paddlexAI + paddlew) {
				if(paddlexAI + paddlew + 5 <= WIDTH) {
					paddlexAI += 5;
				}
			}

			else if(x < paddlexAI) {
				if(paddlexAI - 5 >= 0) {
					paddlexAI -= 5;
				}
			}

			else {

				var centerPaddle = Math.random();

				//80% chance of better centering the paddle
				//otherwise the paddleAI will most of the times
				//hit the ball in one of its extremities
				if(centerPaddle > 0.2) {

					//if ball closer to left side of computer paddle
					if( Math.abs(x - paddlexAI) < Math.abs(x - paddlexAI - paddlew) ) {
						if(paddlexAI - 5 >= 0) {
							paddlexAI -= 5;
						}
					}

					else {
						if(paddlexAI + paddlew + 5 <= WIDTH) {
							paddlexAI += 5;
						}
					}
				}

			}

		}

	}

	function drawSideLines() {
		 ctx.beginPath();
		 ctx.rect(0,0,10,HEIGHT);
	     ctx.closePath();
	     ctx.fillStyle = "white";
	     ctx.fill();

		 ctx.beginPath();
		 ctx.rect(WIDTH - 10,0,10,HEIGHT);
	     ctx.closePath();
	     ctx.fillStyle = "white";
	     ctx.fill();
	}

	//END LIBRARY CODE

	function draw() {
		  clear();
		  circle(x, y, radius);

		  //move the paddle if left or right is currently pressed

		  if (rightDown) {
			if(paddlex + paddlew + 5 <= WIDTH) {
				paddlex += 5;
			}
		  }

		  else if (leftDown) {
			if(paddlex - 5 >= 0) {
				paddlex -= 5;
			}
		  }

		  followBallAI();

		  drawSideLines();
		  rect(paddlex, HEIGHT-paddleh, paddlew, paddleh);
		  rect(paddlexAI, 0, paddlew, paddleh);

		  if (x + dx + radius > WIDTH || x + dx - radius < 0)
			dx = -dx;

		  //upper lane
		  if (y + dy - radius <= 0) {
			if (x <= paddlexAI || x >= paddlexAI + paddlew) {
				clearInterval(intervalId);
				$('.score-player').html(parseInt($('.score-player').html()) + 100);
				init();
			}

			else {
				dy = -dy*1.01;
			}
		  }

		  //lower lane
		  else if (y + dy + radius > HEIGHT) {

			if (x > paddlex  && x < paddlex + paddlew) {
				dx = 8 * ((x-(paddlex+paddlew/2))/paddlew);
				dy = -dy;
				$('.score-player').html(parseInt($('.score-player').html()) + 10);
			} else {
				clearInterval(intervalId);
				// alert('You Lose ! :(');
				//$('.score-comp').html(parseInt($('.score-comp').html()) + 1);
			  	//init();

				$.ajax({
                    type: 'post',
                    url: $('.playername').attr('data-url'),
                    data: {
                    	playername: $('.playername').val(),
                    	score: $('.score-player').html()
                    },
					success: function(data)
                    {
                    	$('.score-table').empty().html(data);
					  	$('.game-over').show();
						$('#start-pong').toggle();
                    }
                });

			}
		  }

		  x += dx;
		  y += dy;
		}

		$(document).on('click', '#start-pong', function(e)
		{
			$(this).toggle();
			e.preventDefault();
			e.stopPropagation();
			clearInterval(intervalId);
			$('.score-player').html(0);
			$('.game-over').hide();
			init();

		})
});
