var i = 0;
while (i <= 100)
{
	++i;
	console.log(i);
}
console.log("\n\n");

i = 2;
while (i <= 100)
{
	console.log(i);
	i+=2;
}

console.log("\n\n");
i = 1;
var sum = 0;
while (i < 1000)
{
	if (i % 3 == 0 && i % 5 == 0)
	{
		// console.log("FizzBuzz");
		sum += i;
	}
	else if (i % 3 == 0)
	{
		// console.log("Fizz");
		sum += i;
	}
	else if (i % 5 == 0)
	{
		// console.log("Buzz");
		sum += i;
	}
	else
	{
		// console.log(i);
	}
	++i;
}
console.log("The sum of all multiples of 3 and 5 below 100 is " + sum + "\n\n");
i = 0;
sum = 0;

function facSum(count, tot)
{
	if (count % 3 == 0 || count % 5 == 0)
	{
		tot += count;
	}

	count++;
	if (count == 1000)
	{
		return tot;
	}
	else
	{
		return facSum(count, tot);
	}
}
 console.log(facSum(0, 0));