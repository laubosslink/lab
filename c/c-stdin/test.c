#include <stdlib.h>
#include <stdio.h>

int main()
{

	while(1)
	{
		printf("%c", (char) fgetc(stdin));
	}

	return 0;
}
