var a = [0,1,2,3,4];

for(var b =0; b <= a.length; ++b){
  console.log(b);
}

function menseki(x,y){
var z;
z = x * y / 2;
console.log(z);
}
menseki (30,5);


var raku = document.getElementById("test");	
raku.style.color = "red"

var p1 =document.getElementById("par1");
		console.log(p1.innerHTML);
		p1.innerHTML = "スーパードライ";
		var clz = document.getElementsByClassName("p");/*複数のS忘れないように*/
		console.log(clz[1].innerHTML);
		var tags = document.getElementsByTagName("p");
		console.log(tags[2].innerHTML);

		function changeString(message, msg2, msg3) {
			var p1 =document.getElementById("par1")
			p1.innerHTML = message;
			var p2 =document.getElementById("par2")
			p2.innerHTML = msg2;
			var p3 =document.getElementById("par3")
			p3.innerHTML = msg3;
		}

		document.getElementById("remove-div-bottom")
		.addEventListener("click", function(){
			var container =
				document.getElementById("container");
			var children = container.children;
			console.log(children);/*.childrenで親要素の中の子要素*/
			// container.removeChild(children[2]);
			var l = container.lastChild;
			container.removeChild(l);
		});		
		document.getElementById("remove-div-top")
		.addEventListener("click", function(){
			var container =
				document.getElementById("container");
			var children = container.children;
			console.log(children);
			var f = container.firstChild;
			container.remove-div-topChild(f);
		});

		document.getElementById("add-div")
		.addEventListener("click", function(){
			var c = document.getElementById("container");
			var e = document.createElement("div");
			e.setAttribute("class", "child");
			e.innerHTML = c.children.length + 1;
			c.appendChild(e);
		});

		var timerId;/*どいつでも観れるように上に*/
		document.getElementById("stop")
		.addEventListener("click", function(){
			clearInterval(timerId);
			timerId = undefined;
		});
		document.getElementById("start")
		.addEventListener("click", function(){
			if (timerId == undefined) {
			var value = 0;
			timerId = setInterval(function(){
				var timer =
					document.getElementById("timer-display");
				value++
				timer.innerHTML = value;
			}, 1000);
		}
	});

		document.getElementById("delay")
			.addEventListener("click", function(){
				setTimeout(function(){
					alert("３秒後にこんにちは"); 
				}, 3000);
			});

		 var i = 0;
		  document.getElementById("image")
		   .addEventListener("click", function(){	  	
			 var images = 
		   	  	[
			   	  	["asikan.jpg", "アジカン"],["bump.jpg", "バンプ"],["rad.jpg", "ラッド"]
		   	  	];
		   	  	this.src = images[i][0];
		   	  	this.alt = images[i][1];

		   	  i++;
		   	  if (i >= images.length) {
		   	  	i = 0;
		   	  }

		   	  // if (this.src.endsWith(images[0][0])) {
		   	  // 	var asikan = images[1];
		   	  // 	this.src = asikan[0];
		   	  // 	this.alt = asikan[1];
		   	  // } else {
		   	  // 	var rad = images[0];
			   		// this.src = rad[0];
			   		// this.alt = rad[1];
		   });
		   /*endwithはもしradならば〜にする*/
/*クリックするボタンと対象が同じ場合thisを使用*/
			document.getElementById("btn1")
			.addEventListener('click', function(){
				var v = document.getElementById("text1").value;
				if (v >= 60) {
					alert("おーいいね");
				} 
				else {
					alert("殺すぞ");
				}
			});
			document.getElementById("div2")
			.addEventListener("click", function(){
				var ts = this.style;
				if (ts.backgroundColor == "") {
				ts.backgroundColor = "blue";
				ts.borderRadius = "500px";
				ts.width = "800px";
				ts.height = "50px";
				ts.fontSize = "50px";
				ts.color = "white";
				ts.margin = "50px 0 0 100px";
			} else {
				ts.backgroundColor = null;
				ts.borderRadius = null;
				ts.fontSize = null;
				ts.height = null;
				ts.width = null;
				ts.margin = null;
			}
		});

			document.getElementById("div1")
			.addEventListener("mouseover", function(){
				// var div = document.getElementById("div1");
				this.style.backgroundColor = "#ff2222"
			});
			/*単語の切れ目は大文字のルール*/
			/*thisは上のgetElementとしたのが一緒の場合これだけでも良い*/

		document.getElementById("open-self")
		.addEventListener('click', function(){
			location.href = "http://www.yahoo.co.jp";
		});
		/*colationを場所*/
		document.getElementById("open-new")
		.addEventListener('click', function(){
			window.open("http://www.apple.com/ph");
		});/*"_self"は自分の現在のブラウザで出す*/
/*windowはブラウざ自体を示す。別タブで開く。*/
		document.getElementById("btn4")
			.addEventListener("click", function(){
				var from = document.getElementById("from").value;
				var to = document.getElementById("to").value;
				var num = +from;/*この＋で文字列ではなく数値という意味*/
				var total = 0;
				while(num <= +to ) {
					total = total + num;
					num++;
				}
				alert(total);
			});

		document.getElementById("btn3")
			.addEventListener('click', function(){
				var gender = new Array();/*Arrayは配列、関数*/
				gender[0] = "男";
				gender[1] = "女";
				gender[2] = "おかま";
				console.log(gender);
				// alert(gender[2] + gender[1]);

				var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Spt","Oct", "Nov", "Dec"];
				console.log(month);/*[]は配列と言ういみ。これで勝手に番号が振られていく*/
				var index =document.getElementById("text2").value;
				// alert(month[index]);
				for(var i=0; i<month.length; i++) {
					// if (i == 4) {
					// 	continue;
					// }	
					// console.log(month[i]);	
					if (i == 4) {
						break;
					}
					console.log(month[i]);	
				}
				/*for i<month.length;はiがmonthの数以下ならループをしていく。i++は一個ずつ足していく*/
				/*forではiを使うのが伝統*/
			});
		document.getElementById("btn2")
			.addEventListener('click', function(){
				var v = document.getElementById("text1").value;
				switch(v) {
					case "0":
						alert("0です");
						break;
					case "1":
						alert("1です");
						break;
					case "好き":
						alert("え、私も！");
						alert("嬉しい！");
						alert("結婚しましょう！");
						alert("いますぐ！");
						alert("新婚旅行どこ行こうかね？");
						alert("セブかなー");
						alert("日本かなー");						
						alert("インドもいいなー");
						alert("あ、そうだ	");
						alert("もし浮気したら");
						alert("ちんこ切るぞ");
						break;
					default:
						alert("ふざけてんの？");
						break;
				}
			});
		document.getElementById("alertdesu")/*alert対話できるbox*/
			.addEventListener('click', function(){
				alert("Hello javascript!")
			});
		document.getElementById("confirmdesu")
			.addEventListener('click', function(){
				var result = confirm("明日もまた見てくれるかなー？？")
				if (result == true) {/*＝一つは代入。二つは比較*/
					alert("好き");
				} 
				else {
					alert("殺すぞ");
				}
			});
			/*result=confirm*/
			/*resultは変数*/
			/*confirmはtrueかfalseしかないから、==trueはなくても良い*/
		document.getElementById("promptdesu")
		.addEventListener('click', function(){
			var result = prompt("あなたのパンツの色を教えてください");
			alert("ええ、" + result + "のパンツ履いてるのかきも");
		});
/*ボタンたぐ外から指令*/
		var b = document.getElementById("btn");
		b.addEventListener('mouseover', function(){
			var p1 = document.getElementById("par1");
			p1.innerHTML = "ラガービール";
		});
		var b = document.getElementById("btn");
		b.addEventListener('mouseout', function(){
			var p1 = document.getElementById("par1");
			p1.innerHTML = "プレミアムモルツ";
		});

		/*addeventlistenerイベントが起きたら、この関数()内を実行するよ。イベントはclickの事*/
		/*イベントは幾つかある。*/
		/*javascriptは耐えず呼び出される側*/