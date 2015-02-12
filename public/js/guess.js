var rando;
var guess;
var done = false;
while(done != "no" && done != "No" && done != "NO")
{
	rando = Math.floor((Math.random() * 100) + 1);
	while (guess != rando)
	{
		guess = prompt("What is your guess?");
		if (guess > rando)
		{
			alert("Your guess is too high.");
		}
		else if (guess < rando)
		{
			alert("Your guess is too low.");
		}
		else 
		{
			alert("You got it!");
		}
	}
	done = prompt("Would you like to play again? Enter 'yes' or 'no.'");
}