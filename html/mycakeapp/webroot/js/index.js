let dif = dif_time;//変数に定数を代入
document.addEventListener("DOMContentLoaded",setInterval(() => {
	if (dif > 0) {
		dif = dif - 1;
		// 表記
		const day = parseInt(dif / 60 / 60 / 24, 10); //日
		const dif_hour = dif % 86400;
		const hour = parseInt(dif_hour / 60 / 60, 10); //時
		const dif_min = dif_hour % 3600;
		const min = parseInt(dif_min / 60, 10); //分
		const dif_sec = dif_min % 60;
		const sec = parseInt(dif_sec, 10); //秒
		const timer = day + '日' + hour + '時間' + min + '分' + sec + '秒';
		document.getElementById('timer').innerHTML = timer;
	} else {
		document.getElementById('timer').innerHTML = "終了しました";
	}
}, 1000));
