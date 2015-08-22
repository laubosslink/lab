#include "formextractor.h"

#include <QWebElement>

FormExtractor::FormExtractor(QWidget *parent, Qt::WindowFlags flags)
    : QWidget(parent, flags)
{
    ui.setupUi(this);
    ui.webView->setUrl(QUrl("qrc:/form.html"));
    resize(300, 300);


    // methode 1 :  broadcast only when submit is clicked on webpage
    connect(ui.webView->page()->mainFrame(), SIGNAL(javaScriptWindowObjectCleared()),
            this, SLOT(populateJavaScriptWindowObject()));

    // methode 2 :  direct broadcast !
    //connect(ui.webView->page(), SIGNAL(contentsChanged()), this, SLOT(submit()));
}

FormExtractor::~FormExtractor()
{
}

void FormExtractor::submit()
{
    QWebFrame *frame = ui.webView->page()->mainFrame();

    QWebElement firstName = frame->findFirstElement("#firstname");
    QWebElement lastName = frame->findFirstElement("#lastname");
    QWebElement maleGender = frame->findFirstElement("#genderMale");
    QWebElement femaleGender = frame->findFirstElement("#genderFemale");
    QWebElement updates = frame->findFirstElement("#updates");

    ui.firstNameEdit->setText(firstName.evaluateJavaScript("this.value").toString());
    ui.lastNameEdit->setText(lastName.evaluateJavaScript("this.value").toString());

    if (maleGender.evaluateJavaScript("this.checked").toBool())
        ui.genderEdit->setText(maleGender.evaluateJavaScript("this.value").toString());
    else if (femaleGender.evaluateJavaScript("this.checked").toBool())
        ui.genderEdit->setText(femaleGender.evaluateJavaScript("this.value").toString());

    if (updates.evaluateJavaScript("this.checked").toBool())
        ui.updatesEdit->setText("Yes");
    else
        ui.updatesEdit->setText("No");
}

void FormExtractor::populateJavaScriptWindowObject()
{
    ui.webView->page()->mainFrame()->addToJavaScriptWindowObject("formExtractor", this);
}
