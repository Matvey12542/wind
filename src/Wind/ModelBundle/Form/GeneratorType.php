<?php

namespace Wind\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GeneratorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('slug')
            ->add('title')
            ->add('file')
            ->add('body')
            ->add('performance')
            ->add('initialSpeed')
            ->add('ratedSpeed')
            ->add('weight')
            ->add('price')
            ->add('author');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wind\ModelBundle\Entity\Generator'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wind_modelbundle_generator';
    }
}
