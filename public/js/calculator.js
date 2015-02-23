var calculator = {};
//////////////////////////////////////////////////////////////////////
// VARS FOR ALL BUTTONS //////////////////////////////////////////////
	calculator.work;
	calculator.numSyst = document.getElementById("numSyst");
	calculator.numSysts = ["Dex", "Hex", "Bin"];
	calculator.numSystIt = -1;

	// calculator.num1 = document.getElementById("num1");
	// calculator.num2 = document.getElementById("num2");
	// calculator.num3 = document.getElementById("num3");
	// calculator.num4 = document.getElementById("num4");
	// calculator.num5 = document.getElementById("num5");
	// calculator.num6 = document.getElementById("num6");
	// calculator.num7 = document.getElementById("num7");
	// calculator.num8 = document.getElementById("num8");
	// calculator.num9 = document.getElementById("num9");
	// calculator.num0 = document.getElementById("num0");

	// calculator.per = document.getElementById("per");
	// calculator.opPlus = document.getElementById("op+");
	// calculator.opMinus = document.getElementById("op-");
	// calculator.opMult = document.getElementById("op*");
	// calculator.opClear = document.getElementById("opC");
	// calculator.opEqual = document.getElementById("op=");
	// calculator.opDiv = document.getElementById("op/");
	// calculator.opMod = document.getElementById("opMod");
	// calculator.swap = document.getElementById("swap");


	calculator.operand1 = "";
	calculator.operand2 = "";
	calculator.operator = "";
	calculator.operandCurrent = "";
// 
// WHEN AN operator IS CLICKED, THIS WILL SWITCH THE ACTIVE OPERAND //
	calculator.switchOperand = function() {
			console.log("operator: " + calculator.operator);
			if (calculator.operator == ""){
				console.log("Adding " + calculator.operandCurrent + " to operand1");
				calculator.operand1 = calculator.operandCurrent;
				calculator.operandCurrent = "";
				console.log("operand1: " + calculator.operand1);
			}
			else
			{
				console.log("Adding " + calculator.operandCurrent + " to operand2");
				calculator.operand2 = calculator.operandCurrent;
				calculator.operandCurrent = "";
				console.log("operand2: " + calculator.operand2);
			}
		};
//                                                                  //
// UPDATES THE CALCULATOR work WITH THE CURRANT OPERAND //////////////
	calculator.updateWork = function() {
		// if (calculator.operandCurrent.length > 26)
		// {
		// 	calculator.work.style["padding-top"] = "28px";
		// 	calculator.operandCurrent += "\n";
		// }
		calculator.work.innerHTML = calculator.operandCurrent;
	};
//                                                                  //
// USES THE SELECTED OPERATOR TO CALCULATE THE SOLUTION //////////////
	calculator.equals = function(){
		// console.log("The current operator is: " + calculator.operator);
		var int1 = parseFloat(calculator.operand1);
		var int2 = parseFloat(calculator.operand2);
		var result;
		if(calculator.operator[0] == "+"){
			result = int1 + int2;
			// console.log("+");
			// console.log(result);
		}
		else if(calculator.operator[0] == "-"){
			result = int1 - int2;
			// console.log("-");
			// console.log(result);
		}
		else if(calculator.operator[0] == "*"){
			result = int1 * int2;
			// console.log("*");
			// console.log(result);
		}
		else if (calculator.operator[0] == "/"){
			result = int1 / int2;
			// console.log("/");
			// console.log(result);
		}
		else if (calculator.operator[0] == "%"){
			result = int1 % int2;
			// console.log("%");
			// console.log(result);
		}
		else
		{
			result = 0;
		}
		// console.log("int1: " + int1);
		// console.log("int2: " + int2);
		// console.log("result: " + result);
		calculator.work.innerHTML = result;
		return result;
	}
//                                                                  //
// LISTEN FUNCTIONS FOR EACH BUTTON //////////////////////////////////
	// numSyst LISTEN FUNCTION
		calculator.numSystListen = function(event){
			calculator.swapSyst();
		}
	// BUTTON LISTENER
		calculator.listener = function(event){
			var val = this.value;
			// console.log("Val is: " + val);
			// console.log("Current Opperand is: " + calculator.operandCurrent);
			if(val == "C"){
				calculator.operator = "";
				calculator.operand1 = "";
				calculator.operand2 = "";
				calculator.operandCurrent = "";	
				calculator.work.innerHTML = 0;
			}
			else if (val == "="){
				if (calculator.operator != ""){
					calculator.operand2 = calculator.operandCurrent;
					
					calculator.operator += "=";
					calculator.operand1 = calculator.equals();
					calculator.operator = "";
					calculator.operand2 = "";
					calculator.operandCurrent = "";
				}	
			}
			else if (val == "."){
				if (calculator.operandCurrent.indexOf(".") == -1){
					calculator.operandCurrent += ".";
					calculator.updateWork();
				}
			}
			else if (val == "swap" && calculator.operandCurrent != "")
			{
				if (calculator.operandCurrent[0] == "-")
				{
					calculator.operandCurrent = calculator.operandCurrent.substring(1, calculator.operandCurrent.length);
				}
				else
				{
					calculator.operandCurrent = "-" + calculator.operandCurrent;
				}
				calculator.updateWork();
			}
			else if (isNaN(val)){
				if (calculator.operand1 == ""){
					calculator.operand1 = calculator.operandCurrent;
				}
				calculator.operator = val;
				calculator.operandCurrent = "";
			}
			else {
				if (calculator.operandCurrent == "" && val == "0"){
					return;
				}
				calculator.operandCurrent += val;
				calculator.updateWork();
			}
		}
	// OLD LISTENER FUNCTIONS FOR EVERY BUTTON
		// 	calculator.listen1 = function(event){
		// 		calculator.operandCurrent += 1;	
		// 		calculator.updateWork();
		// 	};
		// 	calculator.listen2 = function(event){
		// 		calculator.operandCurrent += 2;
		// 		calculator.updateWork();	
		// 	};
		// 	calculator.listen3 = function(event){
		// 		calculator.operandCurrent += 3;
		// 		calculator.updateWork();	
		// 	};
		// 	calculator.listen4 = function(event){
		// 		calculator.operandCurrent += 4;
		// 		calculator.updateWork();	
		// 	};
		// 	calculator.listen5 = function(event){
		// 		calculator.operandCurrent += 5;	
		// 		calculator.updateWork();
		// 	};
		// 	calculator.listen6 = function(event){
		// 		calculator.operandCurrent += 6;	
		// 		calculator.updateWork();
		// 	};
		// 	calculator.listen7 = function(event){
		// 		calculator.operandCurrent += 7;	
		// 		calculator.updateWork();
		// 	};
		// 	calculator.listen8 = function(event){
		// 		calculator.operandCurrent += 8;	
		// 		calculator.updateWork();
		// 	};
		// 	calculator.listen9 = function(event){
		// 		calculator.operandCurrent += 9;	
		// 		calculator.updateWork();
		// 	};
		// 	calculator.listen0 = function(event){
		// 		if (calculator.operandCurrent != ""){
		// 			calculator.operandCurrent += 0;
		// 			calculator.updateWork();
		// 		}
		// 	};
		// // OPERATOR LISTEN FUNCTIONS
		// 	calculator.listenPer = function(event){
		// 		if (calculator.operandCurrent.indexOf(".") == -1)
		// 		{
		// 			calculator.operandCurrent += ".";
		// 		}
		// 		calculator.updateWork();
		// 	}
		// 	calculator.listenPlus = function(event){
		// 		calculator.switchOperand(); 
		// 		if (calculator.operand1 != ""){
		// 			calculator.operator = "+";
		// 		}
		// 	};
		// 	calculator.listenMinus = function(event){
		// 		calculator.switchOperand(); 
		// 		if (calculator.operand1 != ""){
		// 			calculator.operator = "-";
		// 		}
		// 	};
		// 	calculator.listenMult = function(event){
		// 		calculator.switchOperand(); 
		// 		if (calculator.operand1 != ""){
		// 			calculator.operator = "*";	
		// 		}
		// 	};
		// 	calculator.listentMod = function(event){
		// 		calculator.switchOperand();
		// 		if (calculator.operand1 != ""){
		// 			calculator.operator = "%";
		// 		}
		// 	}
		// 	calculator.listenClear = function(event){
		// 		calculator.operator = "";
		// 		calculator.operand1 = "";
		// 		calculator.operand2 = "";
		// 		calculator.operandCurrent = "";	
		// 		calculator.updateWork();
		// 		calculator.work.innerHTML = 0;
		// 	};
		// 	calculator.listenEqual = function(event){
		// 		calculator.switchOperand(); 
		// 		if (calculator.operand1 != "" && calculator.operand2 != ""){
		// 			calculator.operator += "=";
		// 			calculator.equals();
		// 			calculator.operator = "";
		// 			calculator.operand1 = "";
		// 			calculator.operand2 = "";
		// 			calculator.operandCurrent = "";		
		// 		}
		// 	};
		// 	calculator.listenDiv = function(event){
		// 		calculator.switchOperand();
		// 		if (calculator.operand1 != ""){ 
		// 			calculator.operator = "/";	
		// 		}
		// 	};
		// 	calculator.listenSwap = function(event){
		// 		if (calculator.operandCurrent != ""){
		// 			if (calculator.operandCurrent[0] == "-")
		// 			{
		// 				calculator.operandCurrent = calculator.operandCurrent.substring(1, calculator.operandCurrent.length);
		// 			}
		// 			else
		// 			{
		// 				calculator.operandCurrent = "-" + calculator.operandCurrent;
		// 			}
		// 			calculator.updateWork();
		// 		}	
		// 	}
	// EventListener ASSIGNMENTS
		// calculator.numSyst.addEventListener("click", calculator.numSystListen, false);

		// calculator.num1.addEventListener("click", calculator.listener, false);
		// calculator.num2.addEventListener("click", calculator.listener, false);
		// calculator.num3.addEventListener("click", calculator.listener, false);
		// calculator.num4.addEventListener("click", calculator.listener, false);
		// calculator.num5.addEventListener("click", calculator.listener, false);
		// calculator.num6.addEventListener("click", calculator.listener, false);
		// calculator.num7.addEventListener("click", calculator.listener, false);
		// calculator.num8.addEventListener("click", calculator.listener, false);
		// calculator.num9.addEventListener("click", calculator.listener, false);
		// calculator.num0.addEventListener("click", calculator.listener, false);

		// calculator.per.addEventListener("click", calculator.listener, false);
		// calculator.opPlus.addEventListener("click", calculator.listener, false);
		// calculator.opMinus.addEventListener("click", calculator.listener, false);
		// calculator.opMult.addEventListener("click", calculator.listener, false);
		// calculator.opClear.addEventListener("click", calculator.listener, false);
		// calculator.opDiv.addEventListener("click", calculator.listener, false);
		// calculator.opMod.addEventListener("click", calculator.listener, false);
		// calculator.opEqual.addEventListener("click", calculator.listener, false);
		// calculator.swap.addEventListener("click", calculator.listener, false);
// SWAP BETWEEN THE DIFFERENT NUMBER SYSTEMS
	calculator.decSystem = function(){
		var calc = document.getElementById("border");
		calc.innerHTML = '<div id = "calculator">' +
						'<div id = "workspace">' +
							'<button id = "numSyst">' +
								'Dec'+
							'</button>' +
							'<p id = "work">' +
								'0'+
							'</p>'+
						'</div>'+
						'<button id = "opC" class = "button operator" value = "C">'+
							'C'+
						'</button>'+
						'<button id = "swap" class = "button operator" value = "swap">'+
							'+/-'+
						'</buton>'+
						'<button id = "opMod" class = "button operator" value = "%">'+
							'%'+
						'</button>'+
						'<button id = "op/" class = "button operator" value = "/">'+
							'/'+
						'</button>'+
						'<button id = "num7" class = "button" value = "7">'+
							'7'+
						'</button>'+
						'<button id = "num8" class = "button" value = "8">'+
							'8'+
						'</button>'+
						'<button id = "num9" class = "button" value = "9">'+
							'9'+
						'</button>'+
						'<button id = "op*" class = "button operator" value = "*">'+
							'*'+
						'</button>'+
						'<button id = "num4" class = "button" value = "4">'+
							'4'+
						'</button>'+
						'<button id = "num5" class = "button" value = "5">'+
							'5'+
						'</button>'+
						'<button id = "num6" class = "button" value = "6">'+
							'6'+
						'</button>'+
						'<button id = "op-" class = "button operator" value = "-">'+
							'-'+
						'</button>'+
						'<button id = "num1" class = "button" value = "1">'+
							'1'+
						'</button>'+
						'<button id = "num2" class = "button" value = "2">'+
							'2'+
						'</button>'+
						'<button id = "num3" class = "button" value = "3">'+
							'3'+
						'</button>'+
						'<button id = "op+" class = "button operator" value = "+">'+
							'+'+
						'</button>'+
						'<button id = "num0" class = "button" value = "0">'+
							'0'+
						'</button>'+
						'<button id = "per" class = "button operator"  value = ".">'+
							'.'+
						'</button>'+
						'<button id = "op=" class = "button operator" value = "=">'+
							'='+
						'</button>'+
					'</div>';
		var buttons = document.getElementsByTagName("button");
		for (var i = 0; i < buttons.length; i++){
			buttons[i].addEventListener("click", calculator.listener, false);
		}
		calculator.work = document.getElementById("work");
		document.getElementById("border").style["width"].value = "219px";
		document.getElementById("border").style["height"].value = "75px";

		document.getElementById("calculator").style["width"].value = "225px";
		document.getElementById("calculator").style["height"].value = "250px";
	}
	// calculator.decSystem();
	// LOOPS BETWEEN THE NUMBER SYSTEMS                                 //
	calculator.swapSyst = function(){
		calculator.numSystIt++;
		if (calculator.numSystIt == 3){
			calculator.numSystIt = 0;
		}
		// calculator.numSyst.innerHTML = calculator.numSysts[calculator.numSystIt];
		switch(calculator.numSystIt)
		{
			case(0):
				calculator.decSystem();
				break;
			default:
				calculator.decSystem();
		}
	}    
	calculator.swapSyst();
//////////////////////////////////////////////////////////////////////