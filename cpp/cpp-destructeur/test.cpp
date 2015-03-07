#include <string.h>
#include <iostream>

class Chaine{
	char * tableau;
	unsigned int longueur;
	
public:
	Chaine() { tableau = 0; }
	Chaine(const char *s) {
		longueur = strlen(s);
		tableau = new char[longueur + 1];
		strcpy(tableau, s);
	}
	
	// construction par affectation (resolve segfault #2)
	Chaine & operator=(const Chaine & autre)
	{
		if(this == &autre) return *this;
		if(tableau) // optionel
			delete[] tableau;
		
		longueur = autre.longueur;
		tableau = new char[longueur + 1];
		strcpy(tableau, autre.tableau); // dst, src
		return *this;
	}
	
	// construction par recopie (dont resolve segfault #2, but resolve #1)
	Chaine(const Chaine &autre)
	{
		std::cout << "construction par recopie" << std::endl;
		longueur = autre.longueur;
		tableau = new char[longueur + 1];
		strcpy(tableau, autre.tableau);
	}
	
	// construction par deplacement (interet : economie memoire pour objet tmp/variable local retournee)
	// official terms : move semantics (norme C++11, must compile -std=c++11)
	Chaine(Chaine && autre)
	{
		std::cout << "move semantics" << std::endl;
		longueur = autre.longueur;
		tableau = autre.tableau;
		autre.longueur = 0;
		autre.tableau = nullptr;
	}
	
	Chaine & operator=(Chaine && autre)
	{
		std::cout << "move semantics operator" << std::endl;
		longueur = autre.longueur;
		tableau = autre.tableau;
		autre.longueur = 0;
		autre.tableau = nullptr;
	}
	
	~Chaine(){ // destructor
		delete[] tableau;
	}
};

Chaine test_move(const Chaine & c)
{
	Chaine resultat(c);
	
	return resultat;
}

int main()
{
	Chaine ecole("ENSICAEN");
	//std::cout << ecole << std::endl; // not possible
	
	Chaine s(ecole); // segfault #1 due to destructor
	//s = ecole; // segfault #2 due to destructor ~Chaine
	
	Chaine t;
	t = test_move(ecole);
	
	Chaine &a = ecole;
	Chaine &b = a;
	
	return 0;
}
