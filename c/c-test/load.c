#include <stdio.h>
#include <unistd.h>
#include <math.h>

char get_current_char(int number){
	if(number%4 == 1)
	{
		return '|';
	} else if(number%4 == 2)
	{
		return '/';
	} else if(number%4 == 3)
	{
		return '-';
	} else
	{
		return '\\';
	}
}

int main()
{
	// min percent = 1 or error with log10(0)
	int percent=1, i;
	char current_char;

	printf("Chargement : ");

	for(; percent<=100; percent++)
	{
		current_char = get_current_char(percent);

		printf("%c %d%%", current_char, percent);

		usleep(50000);

		if(percent != 100)
		{
			for(i=0; i<(2 + floor(log10(percent)) + 2); i++){
				printf("\b");
			}

			fflush(stdout);
		}

	}

	printf("\nfinish.\n");

	return 0;
}
