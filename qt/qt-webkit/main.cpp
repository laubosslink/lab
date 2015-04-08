#include <QtWidgets/QApplication>
#include "mainwindow.h"

int main(int argc, char *argv[])
{
    Q_INIT_RESOURCE(formextractor);
    QApplication app(argc, argv);
    MainWindow mainWindow;
    mainWindow.setWindowTitle("Form Extractor");
    mainWindow.show();
    return app.exec();
}
