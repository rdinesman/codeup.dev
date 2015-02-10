var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'green'; // todo, change this to your favorite color from the list

// todo: Create a block of if/else statements to check for every color except indigo and violet.
if (color =="red")
{
	console.log("The color is red, the color of EoW.");
}
else if (color == "orange")
{
	console.log("The color is orange, the color of GPs oranges.");
}
else if (color == "yellow")
{
	console.log("The color is yellow, the color of SotD. RIP.");
}
else if (color == "green")
{
	console.log("The color is green, the color of bushes.");
}
else if (color == "blue")
{
	console.log("The color is blue, the color of the river.");
}
// todo: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// todo: Have a final else that will catch indigo and violet.
// todo: In the else, log: I do not know anything by that color.
else if (color == "indigo")
{
	console.log("The color is indigo, the color of karthus skittles.");
}
else if (color == "violet")
{
	console.log("The color is violet, the color of Rek'Sai torpedoes.");	
}
else
{
	console.log("I do not know anything about this colors.");
}
// todo: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
(color == favorite) ? console.log("Hey, that's my favorite color!") : console.log("I do not care much for this color.");