#include <cstdio>
#include <utility>
#include <iostream>
#include <ostream>
#include <string>
#include <typeinfo>
#include <list>
#include <vector>
#include <initializer_list>
#include <algorithm>

template<typename T, int size> class Vecteur;

template<typename T, int size>
std::ostream & operator<<(std::ostream &, Vecteur<T, size> &);

template<typename T, int size>
class Vecteur{
public:
  T tab[size];

  Vecteur():tab(0){}
  Vecteur(std::initializer_list<T> l){
    auto it = l.begin();
    // typename std::initializer_list<T>::iterator = l.begin();
    int i=0;
    while(it != l.end() ){
      tab[i] = *it;
      i++;
      ++it;
    }

    if(i<size-1){
      for(int j=i; j<size; j++)
        tab[j] = 0;
    }
  }

  T operator[](int& i){
    return tab[i];
  }

  T operator()(int& i){
    return tab[i];
  }

  Vecteur & operator+(Vecteur<T, size> & v){
    for(int i=0; i<size; i++){
      tab[i] += v.tab[i];
    }

    return *this;
  }

  friend std::ostream & operator<< <>(std::ostream &, Vecteur<T, size> &);
};

template <typename T, int size>
std::ostream & operator<<(std::ostream & out, Vecteur<T, size> & v){
  for(int i= 0; i< size; i++){
    out << v.tab[i] << std::endl;
  }

  return out;
}

int main(){
  Vecteur<int, 6> v = {1,2,3,4 };
  Vecteur<int, 6> v2 = {1,2,3,4 };
  Vecteur<int, 6> v3 = v + v2;

  std::cout << v << std::endl;

  return 0;
}
