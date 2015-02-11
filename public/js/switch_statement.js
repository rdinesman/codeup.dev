var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

switch (color) {

    // todo: create a case statement that will handle every color except indigo and violet
    // todo: when a color is encountered log a message that tells the color, and an object of that color
    //       example: Blue is the color of the sky.
    	case "red":
    		console.log("red is the color of red pikmin");
    		break;
    	case "orange":
    		console.log("orange is the color of orange crayons");
    		break
    	case "yellow":
    		console.log("yellow is the color of yellow crayons");
    		break
    	case "green":
    		console.log("green is the color of green crayons");
    		break
    	case "blue":
    		console.log("blue is the color of blue crayons");
    		break
    	default:
    		console.log("I've run out of crayons :<");
    
    // todo: create a default case that will catch indigo and violet
    // todo: for the default case, log: I do not know anything by that color.
}