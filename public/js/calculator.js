var calculator = {
// VARS FOR ALL BUTTONS //////////////////////////
	var work = document.getElementById("work");

	var num1 = document.getElementById("num1");
	var num2 = document.getElementById("num2");
	var num3 = document.getElementById("num3");
	var num4 = document.getElementById("num4");
	var num5 = document.getElementById("num5");
	var num6 = document.getElementById("num6");
	var num7 = document.getElementById("num7");
	var num8 = document.getElementById("num8");
	var num9 = document.getElementById("num9");
	var num0 = document.getElementById("num0");

	var opPlus = document.getElementById("op+");
	var opMinus = document.getElementById("op-");
	var opMult = document.getElementById("op*");
	var opClear = document.getElementById("opC");
	var opEqual = document.getElementById("op=");
	var opDiv = document.getElementById("op/");

	var operandCurrent = operand1;
	var operand1 = "";
	var operand2 = "";
	var operator;
	var operandCurrent = operand1;

// WHEN AN operator IS CLICKED, THIS WILL SWITCH
// THE ACTIVE OPERAND ////////////////////////////
function switchOperand(){
		if (operandCurrent == operand1)
		{
			operandCurrent == operand2;
		}
	}

// LISTEN FUNCTIONS FOR EACH BUTTON ///////////////
	var listen1 = function(event){
		operandCurrent += 1;	
	}
	num1.addEventListener("click", listen1, false);
	var listen2 = function(event){
		operandCurrent += 2;	
	}
	num2.addEventListener("click", listen2, false);
	var listen3 = function(event){
		operandCurrent += 3;	
	}
	num3.addEventListener("click", listen3, false);
	var listen4 = function(event){
		operandCurrent += 4;	
	}
	num4.addEventListener("click", listen4, false);
	var listen5 = function(event){
		operandCurrent += 5;	
	}
	num5.addEventListener("click", listen5, false);
	var listen6 = function(event){
		operandCurrent += 6;	
	}
	num6.addEventListener("click", listen6, false);
	var listen7 = function(event){
		operandCurrent += 7;	
	}
	num7.addEventListener("click", listen7, false);
	var listen8 = function(event){
		operandCurrent += 8;	
	}
	num8.addEventListener("click", listen8, false);
	var listen9 = function(event){
		operandCurrent += 9;	
	}
	num9.addEventListener("click", listen9, false);
	var listen0 = function(event){
		operandCurrent += 0;	
	}
	num0.addEventListener("click", listen0, false);

	var listenPlus = function(event){
		operator = "+";
		switchOperand(); 	
	}
	var listenMinus = function(event){
		operator = "-";
		switchOperand(); 	
	}
	var listenMult = function(event){
		operator = "*";
		switchOperand(); 	
	}
	var listenClear = function(event){
		operator = null;
		operand1 = "";
		operand2 = "";
		operandCurrent = operand1;	
	}
	var listenEqual = function(event){
		operator = "=";
		switchOperand(); 	
	}
	var listenDiv = function(event){
		operator = "/";
		switchOperand(); 	
	}
}