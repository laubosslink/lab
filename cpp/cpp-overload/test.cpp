#include <iostream>

void succ(int i) {
    std::cout << "int: " << i << std::endl;
}

void succ(float x) {
  std::cout << "float: " << x << std::endl;
}

int main() {
  float z = 1;
  succ(z);
}
