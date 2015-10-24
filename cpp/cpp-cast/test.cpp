#include <iostream>
#include <math.h>

class Rationnel {
  int num;
  unsigned int denum;
public:
  Rationnel(int num, unsigned int denum) {
    this->num = num;
    this->denum = denum;
  }
  explicit operator bool() {
    return true; // il faudrait vérifier que c'est un nombre finit ou pas !
  }
};

int main(){
  int a = 1;
  int b = 3;

  Rationnel r(a,b);

  if(r) { // sans operator bool() ne fonctionnerai pas
    std::cout << a << "/" << b << " est rationnel" << std::endl;
    return 0;
  }

  std::cout << a << "/" << b << " n'est pas rationnel" << std::endl;
  return 0;
}
