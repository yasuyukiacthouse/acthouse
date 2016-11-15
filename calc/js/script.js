 /*この上は何も書かない。*/
 jQuery(function($){
 	var maxLength = 6;
 	var memory = "";
 	$("#calc").on("click", ".num", function(){
 		var num = $(this).text();
 		var current = $(".result").text();
 		var newVal;

 		if( current == "0") {
 			newVal = num;
 		} else if (
 			memory.length == 0 ||
 			memory.match(/[\+\-\*\/\%]$/)){/*$は行の最後*/ /*^を先頭に入れたら先頭の意味*/
 			newVal = num;
 		} else {
 			newVal = current + num;
 		}
 		 if (newVal.length > maxLength) {
 			return;/*そこで終わり。呼び出し元へ戻る*/
 		}
 		$(".result").text(newVal);
 		memory = memory + num;
 	})
 	.on("click", ".clear", function(){
 		$(".result").text(0);
 		memory = "";
 	})
 	.on("click", ".ope", function(){
 		new Audio("images/oto.mp3").play();
 		if (!isEndOpe()) {
			if(checkOverflow()) {
				return;
			} else {
			showResult(eval(memory));
		 	}
		}

 		var ope = $(this).text();
 		if (memory.length == 0) {
 			memory = $(".result").text() + ope;
 		} else if (isEndOpe()){
 			memory = memory.replace(/[\+\-\*\/\%]$/, ope);/*最後に打った演算子を今打った演算子に置き換える。*/
 		} else {
			memory = memory + ope;
 	}
 	})
 	.on("click", ".eq", function(){
 		if (isEndOpe()) {
 			return;
 		}
 		// var result = eval(memory);
 		if (!checkOverflow()) {
 		// if (result.toString().length > maxLength) {/*tostringは数値を文字列に*/
 			// alert("おーいダメじゃないか")
 			// memory = "";
 			// showResult(0);
 		// } else {
 			showResult(eval(memory));
 		// $(".result").text(result);/*javascriptのソースコードに変換する*/
 		memory = "";
 	}
 	}).on("click", ".switch", function(){
 		var current =$(".result").text();
 		if (current == "0") {
 			return;
 		}
 		var newValue;
 		if (current.startsWith("-")) {
 			newValue = current.replace(/^\-?/, "");/*^は文字の一番最初という意味*//*？は1もじ　＼はーが文字ですよと認識させる。*/
 		} else {  /*replaceは、,の手前のものを,の後のに置き換える。*/
 			newValue = "-" + current;
 		}
 		showResult(newValue);
 	})
 	.on("click", ".button", function(){
 		console.log(memory);
 	})

 	var isEndOpe = function(){
 		return memory.match(/[\+\-\*\/\%]$/);

 	};
 	var checkOverflow = function(){
 		var result = eval(memory);
 		if (result && result.toString().length > maxLength) {/*tostring文字列に変える*/
 			alert("ケタ数ダメ");
 			showResult(0);
 			memory = "";
 			return true;
 		}
			return false;
 	};
	function showResult(value) {
		$(".result").text(value);
	}

 });
 /*この下は何も書かない。*/