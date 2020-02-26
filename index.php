<html>
<head>
<script src="jquery.min.2.1.4.js"></script>
<script src="web.js"></script>
<script src="web_sort_controller.js"></script>
<link rel="stylesheet" type="text/css" href="web.css">
<script src="firework.js"></script>
<script type="text/javascript" src="chartlib/canvasjs.min.js"></script> 
<link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.css">
<script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script src="jquery-ui-1.11.4/jquery-ui.js"></script>
</head>
<body style=" margin: 0">
		<div class="border" >
			<div id="selectMode">
				<h1 align="center"  style="color: white;">Select Mode</h1>
			</div>
			<div id="showVocab" >
			<h1 align="center">Vocaburaly</h1>
				<div class="scroll" >
					<table id="showListVocab">
					</table>
				</div>
				<div id="btnStart" onClick="start()">LET'S GO</div>
				<div id="btnStart2" onClick="start2()">Couple Choice</div>
			</div>
			<div id="countDown">5</div>
			<div id="startTest">
				<table id="tbChoice">
				<tr><td><div id="a" class="choice" ></div></td><td><div id="b" class="choice"></div></td></tr>
				<tr style='height: 20px'></tr>
				<tr><td><div id="c" class="choice" ></div></td><td><div id="d" class="choice"></div></td></tr>
<!-- 					<div id="a" class="choice"></div> -->
<!-- 					<div id="b" class="choice"></div> -->
<!-- 					<div id="c" class="choice"></div> -->
<!-- 					<div id="d" class="choice"></div> -->
				</table>
				<div id="vocab" ></div>
				<div id="showAns" style="display:none;"></div>
				<div id="showAns_W" style="display:none;"></div>
			</div>
			<div id="startTest2">
				<div id="choiceCouple"></div>
			</div>
			<div id="conclude" style="display:none;">
				<h1 align="center" style="font-size: 40px;color: mediumaquamarine;">Conclude Result</h1>
				<div class="b1">
					<div class="b2"></div>
				</div>
				<div id="showResult"></div>
				<div id="showScore">
					<h1 id="finalScore"></h1>
				</div>
				<div style="display:none"id="btnAgain" onclick="refresh()"></div>
			</div>
			<div id="dialogChooseEx" ></div>
				
		</div>
		<div id="firework" style="z-index: 1"></div>
		
</body>
</html>