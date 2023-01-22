<?php

return [
    'dashboard' => [
        'title' => 'Dashboard',
        'icon' => 'fas fa-tachometer-alt nav-icon',
        'route.active' => 'dashboard.index',
        'route' => 'dashboard'
    ],
    'categories' => [
        'title' => 'Categories',
        'icon' => 'fas fa-tags nav-icon',
        'route.active' => 'dashboard.categories.*',
        'route' =>'',
    ],
    'products' => [
        'title' => 'Products',
        'icon' => 'fas fa-box nav-icon',
        'route.active' => '',
        'route' => '',
    ],
    'orders' => [
        'title' => 'Orders',
        'icon' => 'fas fa-shopping-bag nav-icon',
        'route.active' => '',
        'route' => '',
        'badge' => [
            'class' => 'primary',
            'label' => 'New'
        ]
    ],
    'settings' => [
        'title' => 'Settings',
        'icon' => 'fas fa-cogs nav-icon',
        'route.active' => '',
        'route' => '',
        'badge' => null,
    ]
];
