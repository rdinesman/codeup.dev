var rando = 2;
while (rando % 2 == 0)
{
	rando = Math.floor((Math.random() * 50) + 1);
}

console.log("The number we are skipping is " + rando);
var i = 1;
while (i <= 50)
{
	if (i != rando)
	{
		console.log(i);
	}
	i+=2;
}