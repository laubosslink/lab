#include <iostream>

class A {
public:
  virtual void affiche1() {
    std::cout << "A::affiche1()" << std::endl;
  }
};

class B : public A {
public:
    void affiche1() {
      std::cout << "B::affiche1()" << std::endl;
    }

    
};

int main() {
  // conversion implicit
}
