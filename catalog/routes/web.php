<?php

$route['login']['get'] = 'Auth/AuthLoginController/index';
$route['register']['get'] = 'Auth/AuthRegisterController/index';
$route['logout'] = 'Auth/AuthLogoutController/index';
$route['forgot-password']['get'] = 'Auth/AuthForgotPasswordController/index';
$route['reset-password']['get'] = 'Auth/AuthResetPasswordController/index';
$route['photo/resize/(:num)x(:num)/(.+)'] = 'PhotoController/resize/$1/$2/$3';

$route['profile']['get'] = 'ProfileController/index';
$route['profile/change-password']['get'] = 'ProfileController/changePassword';

$route['blog/category/(:num)'] = 'Blog/BlogCategoryController/show/$1';
$route['blog/post/(:num)'] = 'Blog/BlogPostController/show/$1';

$route['forum/post/(:num)'] = 'Forum/ForumPostController/show/$1';
$route['product/detail'] = 'Product/ProductController';
