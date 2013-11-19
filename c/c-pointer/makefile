CC=gcc

all:tab_3d simple_test advanced_test

simple_test: simple_test.c
	$(CC) $< -o $@

advanced_test: advanced_test.c
	$(CC) $< -o $@

tab_3d: tab_3d.c
	$(CC) $< -o $@

clean:
	rm -f simple_test tab_3d

test_tab:
	./tab_3d

test_simple:
	./simple_test

test_advanced:
	./advanced_test
