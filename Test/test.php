<!DOCTYPE html>
<html lang="ru-RU">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Тест на javascript | Блог sergey-oganesyan.ru</title>
<style>
body{
	font-family: verdana;
	color: #000;
	background-color: #fff;
}
#option1,#option2,#option3,#option4{
	display:none;
	margin-bottom: 10px;
}
.oganesyan{
    text-decoration: none;
    font-size: 20px;
    margin-right: 20px;
    color: #fff;
    background: #3C8FB7;
    padding: 4px 8px;
	border: 0;
	cursor: pointer;

/*<span style="color:green">Верно!</span>
 
<span style="color:red">' + "Неверно! Правильный ответ: " + data_array[cur_answer][data_array[cur_answer][5]] + '</span>'*/

}
</style>
<script type="text/javascript">

	//Массив вопросов и ответа
	var data_array = [
	  ['<center><img src="1.png"/></center><br><br>'+"Сколько красных кружков на рисунке?","5","7","9","10",3],
	  ["Перевод слова: Hello","Как дела?","Привет","Ты","Дом",1],
	  ["Перевод слова: Dog","Собака","Кошка","Дерево","Сосиска",1],
	  ["Сколько месяцев в году?","10","11","12","13",1],
	  ["Перевод слова: Tree","Три","Собака","Дерево","Дом",1],
	  ["Перевод слова: Wall","Стена","Дом","Башня","Война",1],
	];

	var plus = 0;
	var time = 0;
	var cur_answer = 0;
	var count_answer = data_array.length;
	
	function sec() {
		time++;	
		document.getElementById('time').innerHTML='Затрачено времени: ' + time + ' сек';
	}
	
	function check(num){

		if(num == 0){ 
		
			document.getElementById('option1').style.display='block';
			document.getElementById('option2').style.display='block';
			document.getElementById('option3').style.display='block';
			document.getElementById('option4').style.display='block';
			document.getElementById('question').style.display='block';

			document.getElementById('option1').innerHTML=data_array[cur_answer][1];
			document.getElementById('option2').innerHTML=data_array[cur_answer][2];
			document.getElementById('option3').innerHTML=data_array[cur_answer][3];
			document.getElementById('option4').innerHTML=data_array[cur_answer][4];
			document.getElementById('question').innerHTML=data_array[cur_answer][0];
			
			document.getElementById('start').style.display='none';
			document.getElementById('end').style.display='inline';
			
			var intervalID = setInterval(sec, 1000);
			
		}else{

			if( num ==  data_array[cur_answer][5]){
				plus++;
				document.getElementById('result').innerHTML='<span style="color:green">Верно!</span>';
			}else{
				document.getElementById('result').innerHTML='<span style="color:red">Неверно! Правильный ответ: ' + data_array[cur_answer][data_array[cur_answer][5]] + '</span>';
			}
				
			cur_answer++;
			if(cur_answer < count_answer){
			
				document.getElementById('option1').innerHTML=data_array[cur_answer][1];
				document.getElementById('option2').innerHTML=data_array[cur_answer][2];
				document.getElementById('option3').innerHTML=data_array[cur_answer][3];
				document.getElementById('option4').innerHTML=data_array[cur_answer][4];
				document.getElementById('question').innerHTML=data_array[cur_answer][0];
				
			}else{
				
				document.getElementById('time').id = 'stop';
				document.getElementById('option1').style.display='none';
				document.getElementById('option2').style.display='none';
				document.getElementById('option3').style.display='none';
				document.getElementById('option4').style.display='none';
				document.getElementById('question').style.display='none';
				document.getElementById('end').style.display='inline';
				
				var percent =  Math.round(plus/count_answer*100);				
				var res = '<span style="color: red">Оценка: 2 (неудовлетворительно)</span>';
				if(percent>50) res = '<span style="color: yellow">Оценка: 3 (удовлетворительно)</span>';
				if(percent>80) res = '<span style="color: green">Оценка: 4 (хорошо)</span>';
				if(percent==100) res = '<span style="color: purple">Оценка: 5 (отлично)</span>';
				
				document.getElementById('result').innerHTML='Правильных ответов: ' + plus + ' из ' + count_answer + ' (' + percent + '%)<br>' + res;
			}
		}
	}
</script>
</head>
<body>
	<center>			
		<p style="font-size: 38px;font-weight: bold;padding-top: 2px;" id="time">Затрачено времени: 0 сек</p>
		<p style="font-size: 38px;font-weight: bold;padding-top: 2px;" id="result"></p>
					
		<p style="font-size: 38px;font-weight: bold;padding-top: 2px;" id="question"></p>
		
		<button onclick="check(1)" class="oganesyan" id="option1"></button>
		
		<button onclick="check(2)" class="oganesyan" id="option2"></button>
		
		<button onclick="check(3)" class="oganesyan" id="option3"></button>
		
		<button onclick="check(4)" class="oganesyan" id="option4"></button>
	</center><br>
	<center>
		<button id="start" class="oganesyan" onclick="check(0)">Запустить тест</button>
		<script type="text/javascript"> var curent_url = document.URL; document.write("<a id='end' style='display: none;' class='oganesyan' href='" + curent_url + "'>Начать сначала</a>"); </script>	
	</center><br><br>
	<center style="clear:both;"><br>
		<a href="index.html" class="oganesyan">На главную</a> 
	</center>
</body>
</html>