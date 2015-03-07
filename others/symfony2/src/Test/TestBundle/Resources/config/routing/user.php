<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('user', new Route('/', array(
    '_controller' => 'TestBundle:User:index',
)));

$collection->add('user_show', new Route('/{id}/show', array(
    '_controller' => 'TestBundle:User:show',
)));

$collection->add('user_new', new Route('/new', array(
    '_controller' => 'TestBundle:User:new',
)));

$collection->add('user_create', new Route(
    '/create',
    array('_controller' => 'TestBundle:User:create'),
    array('_method' => 'post')
));

$collection->add('user_edit', new Route('/{id}/edit', array(
    '_controller' => 'TestBundle:User:edit',
)));

$collection->add('user_update', new Route(
    '/{id}/update',
    array('_controller' => 'TestBundle:User:update'),
    array('_method' => 'post')
));

$collection->add('user_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'TestBundle:User:delete'),
    array('_method' => 'post')
));

return $collection;
