$.ajax({async:false});
var page = 0;
var result;

function start2(){
	result={score:0,checkTF:[]}
	$("#showVocab").fadeOut("slow");
//	$(".border").animate({borderRadius:"60%",width:"17%",height:"275px",backgroundColor:getRandomColor()},3000,startExamBorder);
	$(".border").animate({left:"30%",width:'638px',height:"500px",borderRadius:"15%",backgroundColor:"#fffff"},3000,loadChoice2);
//	bodyColorAnimate();
}

function init(){
	$( "#dialog" ).dialog({
	      autoOpen: false,
	      width: 500,
	      modal:true,
	      show: {
	        effect: "size",
	        duration: 1000
	      },
	      hide: {
	        effect: "puff",
	        duration: 1000
	      }
	 
	 });
	  
	genChoiceEx2()
	$("#finish").click(function(){
		checkAnswerEx2(0);
		$(this).fadeOut(1000);
	});
	$("#next").click(function(){
		if(page<4){
			$("ul[id*=sortable] li").animate({backgroundColor:"white",color:"#1c94c4"},1500,genChoiceEx2);
		}else{
			$("#ex2").fadeOut(1000,showConclude);
		}
		
	});
}

function loadChoice2(){
	$.ajax({
	  	method: "post",
		url: "Controller_CoupleChoice.php",
	  	data: {src:fileSelect}
	}).done(function(data) {
		$("#showVocab").html(data);
		startExam2();
		
	});
	
}

function startExam2(){
	
	$.ajax({
	  	method: "post",
		url: "exam2_couple.php"
	}).done(function(data) {
		$("#choiceCouple").html(data)
		init();
	});
		
}

function genChoiceEx2(){
	$("#sortable2").sortable('enable'); 
	$("#sortable1 li").each(function(n){
		if(jsonData[n+(5*page)])
			$(this).text(jsonData[n+(5*page)].vocab);
	});
	
	$("#sortable2 li").each(function(n){
		if(jsonData[n+(5*page)])
			$(this).text(jsonData.choice[n+(5*page)]);
	});
	
	$("#next").hide()
	$("#finish").fadeIn(1000);
}

function checkAnswerEx2(n){
	$("#sortable2").sortable('disable'); 
	var next = function(){
		if(n<4)checkAnswerEx2(n+1)
		else{
			page++;
			$("#next").fadeIn(1000);
		}
	};
	txt = $($("#sortable2 li")[n]).text();
	if(txt == jsonData[n+(5*page)].tran){
		result.score++;
		result.checkTF.push(true);
		$($("#sortable1 li")[n]).animate({backgroundColor:"green",color:"#7BFC00"},1000)
		$($("#sortable2 li")[n]).animate({backgroundColor:"green",color:"#7BFC00"},1000,next)
	}else{
		result.checkTF.push(false);
		$($("#sortable1 li")[n]).animate({backgroundColor:"red",color:"#FFF8DC"},1000)
		$($("#sortable2 li")[n]).animate({backgroundColor:"red",color:"#FFF8DC"},1000,next)
	}
}

function showConclude(){
	
		var chart = new CanvasJS.Chart("chartContainer",
		{
			title:{
				text: "Result Exam"
			},
			animationEnabled: true,
			legend:{
				verticalAlign: "bottom",
				horizontalAlign: "center",
				fontSize: 15,
				fontFamily: "Helvetica"        
			},
			theme: "theme1",
			data: [
			{        
				type: "pie",       
				indexLabelFontFamily: "Garamond",       
				indexLabelFontSize: 20,
				indexLabel: "{label} {y}",
				startAngle:0,      
				showInLegend: true,
				toolTipContent:"{legendText} {y}",
				dataPoints: [
					{  y: result.score, legendText:"Correct", label: "Correct" , legendMarkerType: "circle",color: "#32CD32"},
					{  y: 20 - result.score, legendText:"Wrong", label: "Wrong" , legendMarkerType: "circle",color: "#FF4500"},
					//{  y: 4.67, legendText:"Bing", label: "Bing" },
					//{  y: 1.67, legendText:"Baidu" , label: "Baidu"},       
					//{  y: 0.98, legendText:"Others" , label: "Others"}
				],
				click: chartClick
			}
			]
		});
		showChart = function(){
			chart.render(2000);
			$(".canvasjs-chart-credit").remove();
		}
		
		showChart();
	$("#concludeEx2").fadeIn(1000);
}

function chartClick(e){
//    alert(  e.dataSeries.type+ ", dataPoint { x:" + e.dataPoint.x + ", y: "+ e.dataPoint.y + " }" );
	var listC="",listW="";
	for(var g=0;g<jsonData.length;g++){
		if(result.checkTF[g]){
			listC +="<tr><td align='center'>"+jsonData[g].vocab+"</td><td>"+jsonData[g].tran+"</td></tr>";
		}else{
			listW +="<tr><td align='center'>"+jsonData[g].vocab+"</td><td>"+jsonData[g].tran+"</td></tr>";
		}
	}
	$( "#dialog" ).dialog( "close" );
	
	$("#tbShowVocabEx2 tbody").children().remove();
	if(e.dataPoint.label == "Wrong"){
		$("#tbShowVocabEx2 tbody").append(listW);
		$( "#dialog" ).dialog( "open" );
		$(".ui-widget-header").css("background","red");
	}else if(e.dataPoint.label == "Correct"){
		$("#tbShowVocabEx2 tbody").append(listC);
		$( "#dialog" ).dialog( "open" );
		$(".ui-widget-header").css("background","green");
	}
}