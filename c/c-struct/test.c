#include <stdlib.h>
#include <stdio.h>

typedef struct Position {
	int x;
	int y;
} Position;

typedef Position* Positions;

int main(){
	Position p1;
	Position p2;

	p1.x = 5;
	p1.y = 10;

	p2.x = 15;
	p2.y = 20;

	Positions ps = malloc(sizeof(Position) * 2);

	ps[0] = p1;
	ps[1] = p2;

	printf("%d\n", ps[1].x);

	return 0;
}
