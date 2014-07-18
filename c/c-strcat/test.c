#include <stdio.h>
#include <stdlib.h>
#include <string.h>

/* l'algo permet de passer un nombre (entier) en nombre (char) puis de le concatener avec une chaine de char */
int main()
{
	int number;
	
	char *buffer, *string;
	
	printf("Veuillez entrer un nombre: ");
	scanf("%d", &number);
	
	buffer = malloc(sizeof(char) * 100);
	
	string = malloc(sizeof(char) * 100);

	//string = "hello world"; /* provoque un segfault lors du strcat! */
	//printf("taille: %d\n", (int) strlen(string));
	
	/* number (int) => number (str) */
	sprintf(string, "%d", number);
	
	/* verifie que c'est pareil */
	printf(":%s\n", string);
	
	buffer = strcat(buffer, "Nombre (str): ");
	buffer = strcat(buffer, string);
	
	printf("%s", buffer);
		
	return 0;
}
