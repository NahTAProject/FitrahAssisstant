		// GIF n Img container
		const gifContainer = document.getElementById("gif-container");
		const gifImage = document.getElementById("gif-image");
		//Jwb BotEA
		const buttons = document.querySelectorAll("[id^='btn']");
		const answerDiv = document.getElementById("answer");
		let isTyping = false;
		let currentAnswer = null;
		// id tombol2 interaksi botea 1
		const changeGIFButton = document.getElementById("change-gif-button");
		const Bbtn = document.getElementById("bigButtonsContainer");
		const HiText = document.getElementById("Htxt");
		const KTBotEA = document.getElementById("keterangan_BotEA")
		const TDR = document.getElementById("tdrBotEA");
		const Sbtn = document.getElementById("smallButtonsContainer");
		//jawaban botea
		const answerTexts = [
			"Untuk panduan dan dukungan lebih lanjut, NahTA Projects akan selalu memberikan bantuan dan kerjasama yang terbaik.",
			"Apa anda berniat memberi dukungan? silahkan pergi melalui tombol berikut terimakasih banyak",
		];
		
		function typeAnswer(answer) {
		  isTyping = true;
		  let index = 0;
		  const intervalId = setInterval(() => {
			if (!currentAnswer) {
			  answerDiv.innerHTML = "";
			  clearInterval(intervalId);
			  isTyping = false;
			  return;
			}
			answerDiv.innerHTML = answer.substring(0, index) + "<strong>|</strong>";
			index++;
			if (index > answer.length) {
			  answerDiv.innerHTML = answer;
			  clearInterval(intervalId);
			  isTyping = false;
			}
		  }, 25);
		}

		function getAnswer(buttonId) {
		  let answer = null;
		  if (buttonId === "btn1") {
			answer =  RAbtn1[Math.floor(Math.random() * RAbtn1.length)];
		  } else if (buttonId === "btn2") {
			answer =  RAbtn2[Math.floor(Math.random() * RAbtn2.length)];
		  } else if (buttonId === "btn3") {
			answer =  RAbtn3[Math.floor(Math.random() * RAbtn3.length)];
		  } else if (buttonId === "btn4") {
			answer =  RAbtn4[Math.floor(Math.random() * RAbtn4.length)];
		  } else if (buttonId === "btn5") {
			answer =  RAbtn5[Math.floor(Math.random() * RAbtn5.length)];
		  } else if (buttonId === "btn6") {
			answer =  RAbtn6[Math.floor(Math.random() * RAbtn6.length)];
		  } else if (buttonId === "btn7") {
			answer =  RAbtn7[Math.floor(Math.random() * RAbtn7.length)];
		  } else if (buttonId === "btn8") {
			answer =  RAbtn8[Math.floor(Math.random() * RAbtn8.length)];
		  } else if (buttonId === "btn9") {
			answer = answerTexts[8];
		  } else if (buttonId === "btn10") {
			answer = answerTexts[9];
		  } else if (buttonId === "btn11") {
			answer = answerTexts[10];
		  } else if (buttonId === "btn12") {
			answer = answerTexts[11];
		  } else if (buttonId === "btn13") {
			answer = answerTexts[12];
		  } else if (buttonId === "btn14") {
			answer = answerTexts[13];
		  } else if (buttonId === "btn15") {
			answer = answerTexts[14];
		  } else if (buttonId === "btn16") {
			answer = answerTexts[15];
		  } else if (buttonId === "btn17") {
			answer = answerTexts[0];
		  } else if (buttonId === "btn18") {
			answer = answerTexts[1];
		  }
		  return answer;
		}

		buttons.forEach(button => {
		  button.addEventListener("click", () => {
			const buttonId = button.getAttribute("id");
			const answer = getAnswer(buttonId);
			if (!isTyping) {
			  if (currentAnswer !== answer) {
				answerDiv.innerHTML = "";
				typeAnswer(answer);
				currentAnswer = answer;
			  }
			}
		  });
		});

		answerDiv.addEventListener("click", () => {
		  if (isTyping) {
			answerDiv.innerHTML = currentAnswer;
			isTyping = false;
		  }
		});

		// ambil aktivitas terakhir dan set ke waktu berlangsung
		let lastActivityTime = document.cookie.replace(/(?:(?:^|.*;\s*)lastActivityTime\s*\=\s*([^;]*).*$)|^.*$/, "$1") || new Date().getTime();

		// event listener tombol chng gif
		changeGIFButton.addEventListener("click", function() {
		  // penganimasian turn on
		  changeGIFButton.style.display = "none";
		  HiText.style.display = "none";
		  TDR.style.display = "none";
		  gifImage.src = "BotEA/TurnOnBot.gif";
		  
		  // update aktivitas terakhir ke waktu berlangsung
		  lastActivityTime = new Date().getTime();
		  document.cookie = "lastActivityTime=" + lastActivityTime + ";path=/";
		  
		  // timeout ON penganimasian BotEA
		  setTimeout(function() {
			gifImage.src = "BotEA/BangkitON.gif";
			  setTimeout(function() {
				gifImage.src = "BotEA/Levitating_BotEA.gif";
				KTBotEA.style.display = "block";
				Sbtn.style.display = "grid";
				Bbtn.style.display = "grid";
			  }, 750);
		  }, 9700);
		});

		// perubahan gif
		setInterval(function() {
		  const currentTime = new Date().getTime();
		  const timeSinceLastActivity = currentTime - lastActivityTime;
		  
		  if (timeSinceLastActivity >= 50000 && gifImage.src !== "BotEA/Levitating_BotEA.gif") {
			gifImage.src = "BotEA/Sleepingbot.gif";
			currentAnswer = null;
			answerDiv.textContent = ""; // menghapus text yang muncul pada answerDiv
			changeGIFButton.style.display = "block";
			HiText.style.display = "block";
		    TDR.style.display = "block";
			KTBotEA.style.display = "none";
			Sbtn.style.display = "none";
			Bbtn.style.display = "none";
		  }
		}, 10000); // cek setiap 1 menit

		// pengecekkan aktivitas
		const currentTime = new Date().getTime();
		const timeSinceLastActivity = currentTime - lastActivityTime;
		if (timeSinceLastActivity < 50000) {
		  // rumus untuk tanpa aktivitas kurang dari 5 menit
		  if (gifImage.src !== "BotEA/Levitating_BotEA.gif") {
			  gifImage.src = "BotEA/Levitating_BotEA.gif";
			  changeGIFButton.style.display = "none";
			  HiText.style.display = "none";
			  TDR.style.display = "none";
			  KTBotEA.style.display = "block";
			  Sbtn.style.display = "grid";
			  Bbtn.style.display = "grid";
		  }
		  // rumus perubahan tanpa untuk aktivitas lebih dari 5 menit
		  setTimeout(function() {
			gifImage.src = "BotEA/Sleepingbot.gif";
			answerDiv.textContent = ""; // menghapus text yang muncul pada answerDiv
			currentAnswer = null;
			changeGIFButton.style.display = "block";
			HiText.style.display = "block";
		    TDR.style.display = "block";
			KTBotEA.style.display = "none";
			Sbtn.style.display = "none";
			Bbtn.style.display = "none";
		  }, 50000 - timeSinceLastActivity);
		}