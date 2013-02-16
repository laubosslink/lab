#include <stdlib.h>
#include <stdio.h>
#include <SDL/SDL.h>

void pause()
{
    int continuer = 1;
    SDL_Event event;
  
    while (continuer)
    {
        SDL_WaitEvent(&event);
        switch(event.type)
        {
            case SDL_QUIT:
                continuer = 0;
        }
    }
}

int main(int argc, char *argv[])
{
	if(SDL_Init(SDL_INIT_VIDEO) < 0)
	{
		fprintf(stderr, "Impossible d'initialiser la SDL : %s\n", SDL_GetError());
		return EXIT_FAILURE;
	}
	
	SDL_WM_SetCaption(argv[0], NULL);
	SDL_SetVideoMode(400, 300, 32, SDL_HWSURFACE | SDL_RESIZABLE | SDL_DOUBLEBUF);
	
	pause();
	
	SDL_Quit();
	
	return EXIT_SUCCESS;
}
