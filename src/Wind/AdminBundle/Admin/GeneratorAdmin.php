<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 12.09.14
 * Time: 17:38
 */

namespace Wind\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type;
use Sonata\AdminBundle\Show\ShowMapper;

use Wind\ModelBundle\Entity\Generator;
class GeneratorAdmin extends Admin {
    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->add('title')
            ->add('file', 'file')
            ->add('body')
            ->add('performance')
            ->add('initialSpeed')
            ->add('ratedSpeed')
            ->add('weight')
            ->add('price')
            ->add('author')
//            ->add('tags')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('file')
            ->add('body')
            ->add('performance')
            ->add('initialSpeed')
            ->add('ratedSpeed')
            ->add('weight')
            ->add('price')
            ->add('author')
//            ->add('image')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('title')
//            ->add('link', 'string', array('template' => 'KPhoenSingleUploadableBundle:Image:list_link.html.twig'))
//            ->add('file')
              ->add('file', 'file', array(
                      'data_class' => 'Symfony\Component\HttpFoundation\File\File',
                      'attr' => array('class' => 'sonata-medium-file')
                  ))
//            ->add('body')
//            ->add('performance')
//            ->add('initialSpeed')
//            ->add('ratedSpeed')
//            ->add('weight')
//            ->add('price')
            ->add('author')
//            ->add('image')
//            ->add('tags')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
//            ->add('logo')
            ->add('body')
            ->add('performance')
            ->add('initialSpeed')
            ->add('ratedSpeed')
            ->add('weight')
            ->add('price')
            ->add('author')
//            ->add('image')
        ;
    }
    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'name'
    );
} 