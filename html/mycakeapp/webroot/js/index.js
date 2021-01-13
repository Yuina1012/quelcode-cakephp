let dif = dif_time;//変数に定数を代入
setInterval(function () {
	if (dif > 0) {
		dif = dif - 1;
		console.log(dif);
		// 表記
		const day = parseInt(dif/60/60/24, 10); //日
		let dif_hour = dif%86400;
		console.log(dif_hour);
		const hour = parseInt(dif_hour/60/60, 10); //時
		let dif_min = dif_hour%3600;
		console.log(dif_min);
		const min = parseInt(dif_min/60 , 10); //分
		let dif_sec = dif_min%60;
		console.log(dif_sec);
		const sec = parseInt(dif_sec,10); //秒
		let timer = day + '日' + hour + '時間' + min + '分' + sec +'秒';
		console.log(dif_time);
		console.log(day);
		console.log(hour);
		console.log(min);
		console.log(sec);
		console.log(timer);
		document.getElementById('timer').innerHTML = timer;
	} else {
		document.getElementById('timer').innerHTML = "終了しました";
		console.log("end");
	}
}, 1000);
