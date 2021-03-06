/**
 * 
 */

function drawLogo() {
	/* canvas要素のノードオブジェクト */
	var canvas = document.getElementById('logo');
	/* canvas要素の存在チェックとCanvas未対応ブラウザの対処 */
	if (!canvas || !canvas.getContext) {
		return false;
	}
	canvas.width = 56;
	canvas.height = 56;
	var ctx = canvas.getContext('2d');

	ctx.beginPath();
	ctx.strokeStyle = 'rgb(102, 102, 255)';
	ctx.fillStyle = 'rgb(255, 255, 255)';
	ctx.arc(28, 28, 24, 0, Math.PI * 2, false);
	ctx.lineWidth = 8;

	ctx.moveTo(18, 38);
	ctx.lineTo(38, 18);
	ctx.lineCap = "round";

	ctx.fill();
	ctx.stroke();

}

function dot3() {
	$(".dot3").each(function() {
		/* canvas要素のノードオブジェクト */
		var canvas = $(this).get(0);
		/* canvas要素の存在チェックとCanvas未対応ブラウザの対処 */
		if (!canvas || !canvas.getContext) {
			return false;
		}
		canvas.width = 23;
		canvas.height = 25;
		var ctx = canvas.getContext('2d');

		ctx.beginPath();
		ctx.strokeStyle = 'rgb(0, 0, 0)';
		ctx.fillStyle = 'rgb(0, 0, 0)';
		ctx.arc(6, 6, 5, 0, Math.PI * 2, false);
		ctx.fill();
		ctx.stroke();
		
		ctx.beginPath();
		ctx.arc(6, 19, 5, 0, Math.PI * 2, false);
		ctx.fill();
		ctx.stroke();
		
		ctx.beginPath();
		ctx.arc(17, 13, 5, 0, Math.PI * 2, false);
		ctx.fill();
		ctx.stroke();
	});

}

function dot5() {
	$(".dot5").each(function() {
		/* canvas要素のノードオブジェクト */
		var canvas = $(this).get(0);
		/* canvas要素の存在チェックとCanvas未対応ブラウザの対処 */
		if (!canvas || !canvas.getContext) {
			return false;
		}
		canvas.width = 32;
		canvas.height = 34;
		var ctx = canvas.getContext('2d');

		ctx.beginPath();
		ctx.strokeStyle = 'rgb(0, 0, 0)';
		ctx.fillStyle = 'rgb(0, 0, 0)';
		ctx.arc(19, 6, 5, 0, Math.PI * 2, false);
		ctx.fill();
		ctx.stroke();
		
		ctx.beginPath();
		ctx.arc(12, 17, 5, 0, Math.PI * 2, false);
		ctx.fill();
		ctx.stroke();
		
		ctx.beginPath();
		ctx.arc(6, 28, 5, 0, Math.PI * 2, false);
		ctx.fill();
		ctx.stroke();
		
		ctx.beginPath();
		ctx.arc(26, 17, 5, 0, Math.PI * 2, false);
		ctx.fill();
		ctx.stroke();
		
		ctx.beginPath();
		ctx.arc(19, 28, 5, 0, Math.PI * 2, false);
		ctx.fill();
		ctx.stroke();
	});

}
