<?php

$route['login']['get'] = 'Auth/AuthLoginController/index';
$route['register']['get'] = 'Auth/AuthRegisterController/index';
$route['logout'] = 'Auth/AuthLogoutController/index';
$route['forgot-password']['get'] = 'Auth/AuthForgotPasswordController/index';
$route['reset-password']['get'] = 'Auth/AuthResetPasswordController/index';
$route['photo/resize/(:num)x(:num)/(.+)'] = 'PhotoController/resize/$1/$2/$3';

$route['profile']['get'] = 'ProfileController/index';
$route['profile/change-password']['get'] = 'ProfileController/changePassword';

$route['user']['get'] = 'UserController/index';
$route['user/create']['get'] = 'UserController/create';
$route['user/(:num)']['get'] = 'UserController/show/$1';
$route['user/(:num)/edit']['get'] = 'UserController/edit/$1';
$route['user/(:num)/login-as']['post'] = 'UserController/loginAs/$1';


// -------------------------BLOG----------------------------------- //

$route['blog/category']['get'] = 'Blog/BlogCategoryController/index';
$route['blog/category/(:num)']['get'] = 'Blog/BlogCategoryController/index/$1';
$route['blog/category/create']['get'] = 'Blog/BlogCategoryController/create';
$route['blog/category/(:num)/edit']['get'] = 'Blog/BlogCategoryController/edit/$1';
$route['blog/category/(:num)/post/create']['get'] = 'Blog/BlogPostController/create/$1';
$route['blog/post/(:num)/edit']['get'] = 'Blog/BlogPostController/edit/$1';

// $route['blog/post']['get'] = 'Blog/BlogPostController/index';
// $route['blog/post/create']['get'] = 'Blog/BlogPostController/create';
// $route['blog/post/(:num)/edit']['get'] = 'Blog/BlogPostController/edit/$1';

// $route['blog/tag']['get'] = 'Blog/BlogTagController/index';
// $route['blog/tag/create']['get'] = 'Blog/BlogTagController/create';
// $route['blog/tag/(:num)/edit']['get'] = 'Blog/BlogTagController/edit/$1';

// $route['blog/tag']['get'] = 'Blog/BlogTagController/index';
// $route['blog/tag/create']['get'] = 'Blog/BlogTagController/create';
$route['blog/discussion/(:num)']['get'] = 'Blog/BlogDiscussionController/show/$1';






// -------------------------PRODUCT----------------------------------- //

$route['product/category']['get'] = 'Product/ProductCategoryController/index';
$route['product/category/(:num)']['get'] = 'Product/ProductCategoryController/index/$1';
$route['product/category/create']['get'] = 'Product/ProductCategoryController/create';
$route['product/category/(:num)/edit']['get'] = 'Product/ProductCategoryController/edit/$1';
$route['product/category/(:num)/post/create']['get'] = 'Product/ProductPostController/create/$1';
$route['product/post/(:num)/edit']['get'] = 'Product/ProductPostController/edit/$1';

// $route['blog/post']['get'] = 'Blog/BlogPostController/index';
// $route['blog/post/create']['get'] = 'Blog/BlogPostController/create';
// $route['blog/post/(:num)/edit']['get'] = 'Blog/BlogPostController/edit/$1';

// $route['blog/tag']['get'] = 'Blog/BlogTagController/index';
// $route['blog/tag/create']['get'] = 'Blog/BlogTagController/create';
// $route['blog/tag/(:num)/edit']['get'] = 'Blog/BlogTagController/edit/$1';

// $route['blog/tag']['get'] = 'Blog/BlogTagController/index';
// $route['blog/tag/create']['get'] = 'Blog/BlogTagController/create';
$route['product/discussion/(:num)']['get'] = 'Product/ProductDiscussionController/show/$1';
