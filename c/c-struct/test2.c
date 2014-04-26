#include <stdlib.h>
#include <stdio.h>

typedef struct Personne Personne;

struct Personne {
	char *name;
	Personne *p;
};


int main(){
	Personne p1;
	Personne p2;

	p1.name = "hello";
	p2.name = "world";

	p1.p = &p2;

	printf("%s\n", p1.p->name);

	return 0;
}
