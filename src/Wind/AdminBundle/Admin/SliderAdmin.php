<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 02.12.14
 * Time: 15:05
 */

namespace Wind\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type;
use Sonata\AdminBundle\Show\ShowMapper;

use Wind\ModelBundle\Entity\Slider;
class SliderAdmin extends Admin {
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
          ->add('title')
          ->add('file', 'file', array('template' => 'WindAdminBunde:AdminSonata:show_image.html.twig'))
          ->add('body')
//          ->add('created_at')
//          ->add('updated_at')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
          ->add('title')
          ->add('file', 'file', array('required' => true, 'label' => 'Image'))
          ->add('body')
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
          ->addIdentifier('id')
          ->addIdentifier('path')
          ->addIdentifier('title')
//          ->addIdentifier('created_at')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
          ->add('title')
          ->add('body')
//          ->add('created_at')
        ;
    }

} 