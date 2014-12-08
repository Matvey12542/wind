<?php
/**
 * Menu..
 */

namespace Wind\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class Builder extends ContainerAware
{
  public function mainMenu(FactoryInterface $factory, array $options)
  {

    $menu = $factory->createItem('root');
    $menu->setChildrenAttribute('class', 'nav pull-right main-menu');
    $menu->addChild('Home', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');

    /*$menu->addChild('Productions', array(
      'route' => 'wind_core_generator_index',
    ))->setAttribute('class', 'dropdown');
    $menu['Productions']->setExtra('translation_domain', 'WindCoreBundle');
    $menu['Productions']->addChild('Wind tyrbines', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu['Productions']->addChild('Tree Bulb', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu['Productions']->addChild('Sonyachna power', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu['Productions']->addChild('Controlers', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu['Productions']->addChild('Solar battery', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu['Productions']->addChild('Heat pumps', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu['Productions']->addChild('LED Lighting', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');*/

    /*$menu->addChild('Solutions', array(
      'route' => 'wind_core_generator_index',
    ))->setAttribute('class', 'dropdown');
    $menu['Solutions']->addChild('Hybrid Position', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu['Solutions']->addChild('For private clients', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu['Solutions']->addChild('For companies', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu['Solutions']->addChild('Heating with wind generators', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');*/

//    $menu->addChild('Installation', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');

//    $menu->addChild('Design', array('route' => 'wind_core_generator_index'))
//      ->setAttribute('class', 'dropdown')
//      ->setExtra('translation_domain', 'WindCoreBundle');
//    $menu['Design']->addChild('Order plan', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');

//    $menu->addChild('Questions Answers', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');

      $menu->addChild('Entity')->setAttribute('class', 'dropdown');
    $menu['Entity']->addChild('Posts', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
//    $menu->addChild('Winds', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
//    $menu->addChild('Contacts', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
      $menu['Entity']->addChild('Entity with image', array('route' => 'wind_core_generator_generator'))->setExtra('translation_domain', 'WindCoreBundle');

    $menu->addChild('Admin', array('route' => 'sonata_admin_redirect'))->setExtra('translation_domain', 'WindCoreBundle');
    return $menu;
  }

  public function footerFirst(FactoryInterface $factory, array $options)
  {
    $menu = $factory->createItem('root');
    $menu->setChildrenAttribute('class', 'footer menu footer-first');
    $menu->addChild('Ready-made solutions', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('Ready-made solutions.bisness', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('hibride solutions', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('wind.generator.heating.private.houses', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    return $menu;
  }

  public function footerSecond(FactoryInterface $factory, array $options)
  {
    $menu = $factory->createItem('root');
    $menu->setChildrenAttribute('class', 'footer menu footer-second');
    $menu->addChild('Wind.500', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('Wind.1', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('Wind.5', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('Wind.10', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('Wind.20', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('Wind.roof', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('Wind.vertical', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    return $menu;
  }

  public function footerThread(FactoryInterface $factory, array $options)
  {
    $menu = $factory->createItem('root');
    $menu->setChildrenAttribute('class', 'footer menu footer-thread');
    $menu->addChild('Solar acumulator', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('Solar collectors', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('integrated solutions for heating', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    $menu->addChild('Heat pumps', array('route' => 'wind_core_generator_index'))->setExtra('translation_domain', 'WindCoreBundle');
    return $menu;
  }

  public function languageMenu(FactoryInterface $factory, array $options)
  {
    $menu = $factory->createItem('root');
    $menu->setChildrenAttribute('class', 'lang');

    $route = $this->container->get('request')->get('_route');
    $slug = $this->container->get('request')->get('slug');
//    echo $currentUrl;

    $menu->addChild('ua', ['route' => $route, 'routeParameters' => array( '_locale' => 'ua', 'slug' => $slug)]);
    $menu->addChild('en', ['route' => $route, 'routeParameters' => array('_locale' => 'en' , 'slug' => $slug )]);

//    $menu->setCurrentUri($this->container->get('request')->getRequestUri());

    return $menu;
  }
}