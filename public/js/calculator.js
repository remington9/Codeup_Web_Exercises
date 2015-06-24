(function() {
  "use strict";
  // define input fields and buttons
    var leftOperand = document.getElementById('leftOperand');
  	var operator = document.getElementById('operator');
  	var rightOperand = document.getElementById('rightOperand');
  	var buttons = document.getElementsByTagName('button');

  	var action = function(operator){
  		if(operator == '+'){
  			var result =  parseInt(leftOperand.value) + parseInt(rightOperand.value);
  		}else if(operator == '-'){
  			var result =  parseInt(leftOperand.value) - parseInt(rightOperand.value);
  		}else if(operator == '*'){
  			var result =  parseInt(leftOperand.value) * parseInt(rightOperand.value);
  		}else if(operator == '/'){
  			var result =  parseInt(leftOperand.value) / parseInt(rightOperand.value);
  		}
  	leftOperand.value = result;
  	rightOperand.value = '';	
  	}
  	
  	var beforeOperator = true;
  	var result;
  	var addStringValue = function(){
      if(this.value == 'C'){
      	leftOperand.value = '';
      	operator.value = '';
      	rightOperand.value = '';
      	beforeOperator = true;
      }		
      if(beforeOperator){
      	if(this.value % 1 == 0){
        		leftOperand.value += this.value;
        	}else{
        		if(this.value == '+' || this.value == '-' || this.value == '*' || this.value == '/'){
        			operator.value += this.value;
          		beforeOperator = false;
        		}
        	}
        }else{
        	if(this.value % 1 == 0){
        		rightOperand.value += this.value;
          }else if(this.value == '='){
          	action(operator.value);
          	operator.value ='';
          	beforeOperator = true;
        	}
      }
    }
  	for (var i = 0; i < buttons.length; i++) {
  		buttons[i].addEventListener('click', addStringValue, false);
  }
})();