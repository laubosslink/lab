#ifndef FORMEXTRACTOR_H
#define FORMEXTRACTOR_H

#include <QtWidgets/QWidget>
#include <QWebFrame>
#include "ui_formextractor.h"

class FormExtractor : public QWidget
{
    Q_OBJECT

public:
    FormExtractor(QWidget *parent = 0, Qt::WindowFlags flags = 0);
    ~FormExtractor();

public slots:
    void submit();
    void populateJavaScriptWindowObject();

private:
    Ui::Form ui;
};

#endif // FORMEXTRACTOR_H
