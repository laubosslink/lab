#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include "formextractor.h"

class QAction;
class QMenu;

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    MainWindow();

private slots:
    void about();

private:
    FormExtractor *centralWidget;
    QMenu *fileMenu;
    QMenu *helpMenu;
    QAction *exitAct;
    QAction *aboutAct;
    QAction *aboutQtAct;

    void createActions();
    void createMenus();
};

#endif // MAINWINDOW_H
