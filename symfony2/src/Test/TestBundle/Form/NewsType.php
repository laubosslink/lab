<?php

namespace Test\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lang')
            ->add('title')
            ->add('auteur')
            ->add('date') 
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\TestBundle\Entity\News'
        ));
    }

    public function getName()
    {
        return 'test_testbundle_newstype';
    }
}
