#include <iostream>
#include <ostream>
#include <string.h>

class Chaine {
  char *tableau;
  unsigned int longueur;
public:
  char* getStr() const { return tableau; }
  unsigned int getLength() const { return longueur; }
  Chaine() { tableau = 0; }
  Chaine(const char *s) {
    std::cout << "Chaine(char) called" << std::endl; // called once
    longueur = strlen(s);
    tableau = new char[longueur + 1];
    strcpy(tableau, s);
  }

  Chaine(const Chaine & s) { // constructeur par recopie
    std::cout << "Chaine(Chaine) called" << std::endl; // NO CALL
    longueur = s.getLength();
    tableau = new char[longueur + 1];
    strcpy(tableau, s.getStr());
  }

  ~Chaine() { std::cout << "delete"<< std::endl; delete[] tableau;  }

  friend std::ostream & operator<<(std::ostream & out, const Chaine & c) {
    return out << c.getStr() ;
  }
};

int main() {
  Chaine ecole("ENSICAEN");
  Chaine s;
  std::cout << "affectation:" << std::endl;
  s = ecole; // ERROR (poly page 40) sans surchage operator=, on copie les même données <=> même adr mémoire dans tableau => si on delete, on delete deux fois sur même adr mém => segfault
  // en revanche Chaine s = ecole; // aurait marche

  std::cout << ecole << std::endl;
  std::cout << s << std::endl;

  return 0;
}
