#include <unistd.h>
#include <stdio.h>
#include <sys/inotify.h>

#include <limits.h> // NAME_MAX

int main()
{
  int i;

  int fd = inotify_init();

  int wd = inotify_add_watch(fd, "/home/laubosslink", IN_CREATE | IN_DELETE);

  struct inotify_event e;
  e.wd = wd;

  while(1)
  {
    read(fd, &e, sizeof(struct inotify_event) + NAME_MAX + 1);

    printf("Read events: \n");
    printf(" - wd: %d\n", e.wd);
    printf(" - mask: %d\n", e.mask);
    printf(" - cookie: %d\n", e.cookie);

    if(e.len != 0)
      printf("- name: %s\n", e.name);

    printf("\n");

    sleep(5);
  }

  return 0;
}
