
// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'red'; // TODO: change this to your favorite color from the list
console.log(color);
// TODO: Create a block of if/else statements to check for every color except indigo and violet.
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.
if (colors == 'red'){
	console.log("that is red like a firetruck");
}else if(color == 'yellow'){
	console.log("that is yellow like a banana");
}else if(color == 'green'){
	console.log("that is green like the grass");
}else if(color == 'blue'){
	console.log("that is blue like the sky");
}else if(color == 'orange'){
	console.log("that is orange like the sun");
}else (color = 'indigo','violet'){
	console.log("i dont know anything by that color");
}
var colors = (red) ? "That is my favorite color." : "I dont prefer that color.";


// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
