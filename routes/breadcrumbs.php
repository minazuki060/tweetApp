<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
 
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Timeline
Breadcrumbs::for('timeline', function ($trail) {
    $trail->parent('home');
    $trail->push('Timeline', route('timeline'));
});
    