<?php

$route['api/login/attempt']['post'] = 'Api/Auth/ApiAuthLoginController/attempt';
$route['api/register/store']['post'] = 'Api/Auth/ApiAuthRegisterController/store';
$route['api/forgot-password/send-email']['post'] = 'Api/Auth/ApiAuthForgotPasswordController/sendEmail';
$route['api/reset-password']['post'] = 'Api/Auth/ApiAuthResetPasswordController/index';

$route['api/photo/upload']['post'] = 'Api/ApiPhotoController/upload';
$route['api/user/(:num)/update']['post'] = 'Api/ApiUserController/update/$1';
$route['api/profile/update']['post'] = 'Api/ApiProfileController/update/$1';

$route['api/user/store']['post'] = 'Api/ApiUserController/store';
$route['api/user/(:num)/update']['post'] = 'Api/ApiUserController/update/$1';
$route['api/user/(:num)/destroy']['post'] = 'Api/ApiUserController/destroy/$1';

$route['api/blog/post/store']['post'] = 'Api/Blog/ApiBlogPostController/store';
$route['api/blog/post/(:num)/update']['post'] = 'Api/Blog/ApiBlogPostController/update/$1';
$route['api/blog/post/(:num)/destroy']['post'] = 'Api/Blog/ApiBlogPostController/destroy/$1';

$route['api/blog/category/store']['post'] = 'Api/Blog/ApiBlogCategoryController/store';
$route['api/blog/category/(:num)/update']['post'] = 'Api/Blog/ApiBlogCategoryController/update/$1';
$route['api/blog/category/(:num)/destroy']['post'] = 'Api/Blog/ApiBlogCategoryController/destroy/$1';

$route['api/forum/comment/store']['post'] = 'Api/Forum/ApiForumCommentController/store';
