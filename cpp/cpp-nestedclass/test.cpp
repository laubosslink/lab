#include <iostream>

template <typename T> class Hello;

template <typename T>
int test(Hello<T>);

//template <typename T>
//int test2(Hello<T>::Test);

template <typename T>
class Hello {
private:
	int i;
public:
	Hello(){}
	Hello(T i): i(i) {}
	class Test {
	private:
		int j;
	public:
		Test(int j): j(j) {}
		int t(){return i;} // make error if used
	};

	friend int test<>(Hello<T>);
//	friend int test2<>(Hello<T>::Test);
};

template <typename T>
int test(Hello<T> t)
{
	return t.i;
}

/*
template <typename T>
int test2(Hello<T>::Test t)
{
	return t.j;
}*/

int main()
{
	Hello<int> h(5);
	Hello<int>::Test t(6);

	std::cout << test(h) << std::endl;
//	std::cout << test2(t) << std::endl;
//	std::cout << t.t() << std::endl;
	return 0;
}
