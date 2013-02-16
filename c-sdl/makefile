CC = g++
CFLAGS = -W -Wall -g -ansi -pedantic -std=c99
LDFLAGS = -lSDL -lSDLmain 

all: menu

menu: menu.o 
	$(CC) $(CFLAGS) $^ -o $@ $(LDFLAGS)

menu.o: menu.c
	$(CC) -c $(CFLAGS) $< -o $@

clean:
	rm -f menu menu.o 
