#include "adaptee.cpp"
#include "target.cpp"
#include "adapter.cpp"

int main(int argc, char* argv[])
{
	Target* t = (Target*) new Adapter();
	t->print();

	return 0;
}
