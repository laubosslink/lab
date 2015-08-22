#include <iostream>
using namespace std;

class A{
public:
  void montreToi() {
    cout << this << endl;
  }
};

int main() {
  A a,b;
  A *pa = &a;
  cout << &a << endl;
  a.montreToi();
  cout << pa << endl;
  pa->montreToi();
  cout << &b << endl;
  b.montreToi();
  return 0;
}
