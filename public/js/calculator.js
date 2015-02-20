var calculator = {};
//////////////////////////////////////////////////////////////////////
// VARS FOR ALL BUTTONS //////////////////////////////////////////////
	calculator.work = document.getElementById("work");


	calculator.num1 = document.getElementById("num1");
	calculator.num2 = document.getElementById("num2");
	calculator.num3 = document.getElementById("num3");
	calculator.num4 = document.getElementById("num4");
	calculator.num5 = document.getElementById("num5");
	calculator.num6 = document.getElementById("num6");
	calculator.num7 = document.getElementById("num7");
	calculator.num8 = document.getElementById("num8");
	calculator.num9 = document.getElementById("num9");
	calculator.num0 = document.getElementById("num0");


	calculator.opPlus = document.getElementById("op+");
	calculator.opMinus = document.getElementById("op-");
	calculator.opMult = document.getElementById("op*");
	calculator.opClear = document.getElementById("opC");
	calculator.opEqual = document.getElementById("op=");
	calculator.opDiv = document.getElementById("op/");


	calculator.operand1 = "";
	calculator.operand2 = "";
	calculator.operator = null;
	calculator.operandCurrent = "";
//                                                                  //
// WHEN AN operator IS CLICKED, THIS WILL SWITCH THE ACTIVE OPERAND //
	calculator.switchOperand = function() {
			if (calculator.operator == null){
				calculator.operand1 = calculator.operandCurrent;
				calculator.operandCurrent = "";
			}
			else
			{
				calculator.operand2 = calculator.operandCurrent;
				calculator.operandCurrent = "";
			}
		};
//                                                                  //
// UPDATES THE CALCULATOR work WITH THE CURRANT OPERAND //////////////
	calculator.updateWork = function() {
		calculator.work.innerHTML = calculator.operandCurrent;
	};
//                                                                  //
// LISTEN FUNCTIONS FOR EACH BUTTON //////////////////////////////////
	// NUMBER LISTEN FUNCTIONS
		calculator.listen1 = function(event){
			calculator.operandCurrent += 1;	
			calculator.updateWork();
		};
		calculator.listen2 = function(event){
			calculator.operandCurrent += 2;
			calculator.updateWork();	
		};
		calculator.listen3 = function(event){
			calculator.operandCurrent += 3;
			calculator.updateWork();	
		};
		calculator.listen4 = function(event){
			calculator.operandCurrent += 4;
			calculator.updateWork();	
		};
		calculator.listen5 = function(event){
			calculator.operandCurrent += 5;	
			calculator.updateWork();
		};
		calculator.listen6 = function(event){
			calculator.operandCurrent += 6;	
			calculator.updateWork();
		};
		calculator.listen7 = function(event){
			calculator.operandCurrent += 7;	
			calculator.updateWork();
		};
		calculator.listen8 = function(event){
			calculator.operandCurrent += 8;	
			calculator.updateWork();
		};
		calculator.listen9 = function(event){
			calculator.operandCurrent += 9;	
			calculator.updateWork();
		};
		calculator.listen0 = function(event){
			calculator.operandCurrent += 0;
			calculator.updateWork();
		};

	// OPERATOR LISTEN FUNCTIONS
		calculator.listenPlus = function(event){
			calculator.operator = "+";
			calculator.switchOperand();	
		};
		calculator.listenMinus = function(event){
			calculator.operator = "-";
			calculator.switchOperand();	
		};
		calculator.listenMult = function(event){
			calculator.operator = "*";
			calculator.switchOperand(); 	
		};
		calculator.listenClear = function(event){
			calculator.operator = null;
			calculator.operand1 = "";
			calculator.operand2 = "";
			calculator.operandCurrent = "";	
			calculator.updateWork();
		};
		calculator.listenEqual = function(event){
			calculator.operator = "=";
			calculator.switchOperand(); 
			calculator.updateWork();
			calculator.operator = null;
			calculator.operand1 = "";
			calculator.operand2 = "";
			calculator.operandCurrent = "";		
		};
		calculator.listenDiv = function(event){
			calculator.operator = "/";
			calculator.switchOperand(); 	
		};

	// EventListener ASSIGNMENTS
		calculator.num1.addEventListener("click", calculator.listen1, false);
		calculator.num2.addEventListener("click", calculator.listen2, false);
		calculator.num3.addEventListener("click", calculator.listen3, false);
		calculator.num4.addEventListener("click", calculator.listen4, false);
		calculator.num5.addEventListener("click", calculator.listen5, false);
		calculator.num6.addEventListener("click", calculator.listen6, false);
		calculator.num7.addEventListener("click", calculator.listen7, false);
		calculator.num8.addEventListener("click", calculator.listen8, false);
		calculator.num9.addEventListener("click", calculator.listen9, false);
		calculator.num0.addEventListener("click", calculator.listen0, false);


		calculator.opPlus.addEventListener("click", calculator.listenPlus, false);
		calculator.opMinus.addEventListener("click", calculator.listenMinus, false);
		calculator.opMult.addEventListener("click", calculator.listenMult, false);
		calculator.opClear.addEventListener("click", calculator.listenClear, false);
		calculator.opDiv.addEventListener("click", calculator.listenDiv, false)
//////////////////////////////////////////////////////////////////////