<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//path navbar
$routes->get('/arsip', 'Arsip::index');
$routes->get('/kategori', 'Kategori::index');
$routes->get('/about', 'About::index');

//arsip
$routes->get('arsip/tambah', 'Arsip::tambah');
$routes->post('arsip/insert', 'Arsip::insert');
$routes->post('arsip/hapus', 'Arsip::hapus');
$routes->post('arsip/unduh', 'Arsip::unduh');
$routes->post('arsip/lihat', 'Arsip::lihat');
$routes->get('arsip/lihat/(:num)', 'Arsip::lihat/$1');
// $routes->get('arsip/unduh/(:num)', 'Arsip::unduh/$1');

$routes->get('kategori/index', 'Kategori::index');

$routes->get('kategori/tambah', 'Kategori::formtambah');
$routes->post('kategori/storeall', 'Kategori::storeAll');
$routes->post('kategori/edit', 'Kategori::edit');
$routes->post('kategori/update', 'Kategori::update');
$routes->post('kategori/hapus', 'Kategori::hapus');

$routes->get('about/index', 'About::index');

