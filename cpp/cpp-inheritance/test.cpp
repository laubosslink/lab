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

    operator A() { // j'ai testé, et ne fonctionne dans aucun exemple
      std::cout << "TRANSFORMATION" << std::endl;
    }
};

int main() {
  A a;
  B b;

  A* pa = &b;
  A a1 = b;
  A &ra = b;

  pa->affiche1(); // A::affiche1(), si virtual est ajouté devant la methode dans A, on aura B::affiche1()
  a1.affiche1(); // A::affiche1()
  ra.affiche1(); // A::affiche1(), en revanche si virtual est ajouté, et que &ra = *pa (avec *pa = &b), on aura B::affiche1()

  std::cout << std::endl;

  // static cast
  static_cast<A*>(pa)->affiche1(); // A::affiche1(), sauf si virtual => B::affiche1()
  static_cast<A>(b).affiche1(); // A::affiche1() equivalent ((A) b).affiche1()
  dynamic_cast<A*>(pa)->affiche1(); // A::affiche1(), sauf si virtual => B::affiche1()

  // bonus ambiguite
  B &rb = b; // err si on écrit B &rb = a;
  dynamic_cast<A&>(rb).affiche1(); // A::affiche1(), sauf si virtual => B::affiche1()

}
