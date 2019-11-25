$(document).ready(function() {
	$.ajaxSetup({
 	 headers: {
 	   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
	//alert("Website made by: metalkaiserpolanco@gmail.com");
	//Select Consultores
	$("#list1").change(function(){
		var list = $("#list1")[0].selectedOptions;
		var listl = list.length;
		var opts = "";
		for (var v = 0; v < listl; v++) {
			opts = opts + "<option value='" + list[v].value + "'>" + list[v].innerHTML + "</option>";
			$("#list2").html(opts);
		}
	});
	//Select Consultores
	$(".my-1").click(function(){
		var button = this.innerHTML;
		var listlen = $("#list2")[0].length;
		var startPeriod = $(".periodo")[1].value + "-" + $(".periodo")[0].value + "-01";
		var endPeriod = $(".periodo")[3].value + "-" + $(".periodo")[2].value + "-31";
		var queryArr = new Array();
		var nameArr = new Array();

		if (listlen > 0) {	
			for (var i = 0; i < listlen; i++) {
				queryArr[i] = $("#list2")[0].options[i].value;
				nameArr[i] = $("#list2")[0].options[i].text;
			}

			var ruta = "/create";
			$.ajax({
				url: ruta,
				type: 'GET',
				dataType: 'json',
				data: {
					queryArr:queryArr,
					startPeriod:startPeriod,
					endPeriod:endPeriod,
				},
				success: function(data){
					totalconsult = new Array();					//Create an array of total per consultant
					totalconsultcom = new Array();
					check = new Array();
					for (var j = 0; j < data.length; j++) {		//Consultant quantity
						var dateArr = new Array();
						if (data[j][0].length > 0) {
							for (var k = 0; k < data[j][0].length; k++) {	//Extract unique dates
								dateArr[k] = data[j][0][k].data_emissao.slice(0,7);
								uniqueValues = new Set(dateArr);
							}
							check[j] = Array.from(uniqueValues);
							if (j > 0) {
								if (test.length < check[j].length) {
									test = Array.from(uniqueValues);
								}
							}else{
								var test = Array.from(uniqueValues);	//Unique dates
							}		
						}else {
							//En caso de no haber datos del consultor
							//(solo funciona si se ha consultado un único consultor)
							//Necesita mejoras para casos de consultas de más de un consultor
							if (data.length == 1) {
								var test = new Array();
								test[0] = 0;
								totalconsult[0] = new Array();
								totalconsultcom[0] = new Array();
								totalconsult[0][0] = 0;
								totalconsultcom[0][0] = 0;
							}
						}
					}
					for (var l = 0; l < data.length; l++) {
						var totalds = new Array();				//Create an array of total per date period
						var totalcom = new Array();
						for (var m = 0; m < test.length; m++) {
							var totaldate1 = 0;					//Create the total for the specific date period
							var totalcomissao = 0;				//Create the total comission for the specific date period
							var impuesto = 0;
							for (var n = 0; n < data[l][0].length; n++) {
								if(data[l][0][n].data_emissao.slice(0,7) == test[m]){
									totaldate1 = totaldate1 + data[l][0][n].valor;
									totalcomissao = totalcomissao + (data[l][0][n].valor - (data[l][0][n].valor*data[l][0][n].total_imp_inc/100))*data[l][0][n].comissao_cn/100;
								}
							}
							totalds[m] = totaldate1;
							totalcom[m] = totalcomissao;
						}
						totalconsult[l] = totalds;
						totalconsultcom[l] = totalcom;
					}
					$("#results").html("");
					switch (button) {
						case '<img class="mr-1" src="http://127.0.0.1:8000/inc/039-file-text2.png"><span>Relatorio</span>': 	//Relatorio
							//Comienza case "Relatorio"
							for (var t = 0; t < data.length; t++) {
								$("#results").append(
								"<div><div class='consultor text-center mt-4'>" + nameArr[t] + "</div>"
								+ "<div class='row'><div class='col text-center'>Período</div>"
								+ "<div class='col text-center'>Receita Líquida</div>"
								+ "<div class='col text-center'>Custo Fixo</div>"
								+ "<div class='col text-center'>Comissâo</div>"
								+ "<div class='col text-center'>Lucro</div></div>");
								for (var h = 0; h < test.length; h++) {
									var receita = Math.round(totalconsult[t][h]*100)/100;
									var comissao = Math.round(totalconsultcom[t][h]*100)/100;
									if (data[t][1] != "") {
										var custo = data[t][1][0].brut_salario;
										var lucro = receita - comissao - custo;
									}else{
										var custo = 0;
										var lucro = 0;
									}
									$("#results").append(
									"<div class='row'><div class='col text-left'>" + test[h] + "</div>"
									+ "<div class='col text-right'>" + receita + "</div>"
									+ "<div class='col text-right'>" + custo + "</div>"
									+ "<div class='col text-right'>" + comissao + "</div>"
									+ "<div class='col text-right'>"
									+ Math.round(lucro*100)/100
									+ "</div></div></div>");
								}
							}
						break;
						//Termina case "Relatorio"
						case '<img class="mr-1" src="http://127.0.0.1:8000/inc/156-stats-dots.png"><span>Gráfico</span>': 	//Gráfico
							//Comienza case "Gráfico"
							$("#results").html("");
							var totalgrafico = new Array();
							var customedio = 0;
							for (var l = 0; l < data.length; l++) {
								var impuesto = 0;
								var value = 0;
								var totalbardata = new Array();				//Create an array of total per date period
								for (var m = 0; m < test.length; m++) {
									var totalbar = 0;					//Create the total for the specific date period
									for (var n = 0; n < data[l][0].length; n++) {
										if(data[l][0][n].data_emissao.slice(0,7) == test[m]){
											impuesto = data[l][0][n].total_imp_inc/100;
											value = data[l][0][n].valor - (data[l][0][n].valor*impuesto);
											totalbar = totalbar + value;
										}
									}
									totalbardata[m] = totalbar;
								}
								totalgrafico[l] = totalbardata;
								customedio = customedio + data[l][1][0].brut_salario;
							}
							customedio = customedio/data.length;
							$.ajax({
								url: "/grafico",
								type: 'GET',
								dataType: 'json',
								data: {
									totalgrafico:totalgrafico,
									customedio:customedio,
									nameArr:nameArr,
									test: test,
								},
								success: function(graficores) {
									$("#results").append(graficores);
								},
								error: function(res) {
									console.log(res);
								}
							});
						break;
						//Termina case "Gráfico"
						case '<img class="mr-1" src="http://127.0.0.1:8000/inc/155-pie-chart.png"><span>Pizza</span>': 		//Pizza
							//Comienza case "Pizza"
							$("#results").html("");
							var pizzaArr = new Array();
							for (var x = 0; x < nameArr.length; x++) {
								var totalpizza = 0;
								for (var y = 0; y < totalconsult[x].length; y++) {
									totalpizza = totalpizza + totalconsult[x][y];
								}
								pizzaArr[x] = totalpizza;
							}
							$.ajax({
								url: "/pizza",
								type: 'GET',
								dataType: 'json',
								data: {
									pizzaArr:pizzaArr,
									nameArr:nameArr,
								},
								success: function(pizzares) {
									$("#results").append(pizzares);
								},
								error: function(res) {
									console.log(res);
								}
							});
						break;
						//Termina case "Pizza"
					}//endswitch
				},
				error: function(res){
					alert("A problem during the request has ocurred");
				}
			});
		}
	});
	console.log("Website made by: metalkaiserpolanco@gmail.com");
});