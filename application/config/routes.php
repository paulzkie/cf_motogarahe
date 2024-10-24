<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['member'] = 'member/login';
$route['admin'] = 'admin/login';
$route['dealer'] = 'dealer/login';
$route['merchant'] = 'merchant/login';
$route['brand'] = 'brand/login';
$route['tvs'] = 'tvs/mall';
$route['404_override'] = 'pages/error';
$route['motorcycles/dealers/(:any)'] = 'motorcycles/dealers/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10';
$route['motorcycles/add_dealers/(:any)/(:any)/(:any)'] = 'motorcycles/add_dealers/$1/$2/$3';
$route['motorcycles/remove_dealer/(:any)'] = 'motorcycles/remove_dealer/$1';
$route['motorcycles/inquiry/(:any)'] = 'motorcycles/inquiry/$1/$2';
$route['motorcycles/kawasaki'] = 'motorcycles/index/kawasaki';
$route['motorcycles/yamaha'] = 'motorcycles/index/yamaha';
$route['motorcycles/(:any)/(:any)'] = 'motorcycles/index/$1/$2';
$route['motorcycles/honda'] = 'motorcycles/index/honda';
$route['motorcycles/suzuki'] = 'motorcycles/index/suzuki';
$route['motorcycles/vespa'] = 'motorcycles/index/vespa';
$route['motorcycles/benelli'] = 'motorcycles/index/benelli';
$route['motorcycles/euro-motor'] = 'motorcycles/index/euro-motor';
$route['motorcycles/keeway'] = 'motorcycles/index/keeway';
$route['motorcycles/bajaj'] = 'motorcycles/index/bajaj';
$route['motorcycles/sym'] = 'motorcycles/index/sym';
$route['motorcycles/kymco'] = 'motorcycles/index/kymco';
$route['motorcycles/tvs'] = 'motorcycles/index/tvs';
$route['motorcycles/royal-enfield'] = 'motorcycles/index/royal-enfiel';
$route['motorcycles/husqvarna'] = 'motorcycles/index/husqvarna';
$route['motorcycles/bristol'] = 'motorcycles/index/bristol';
$route['motorcycles/mv-agusta'] = 'motorcycles/index/mv-agusta';
$route['motorcycles/cfmoto'] = 'motorcycles/index/cfmoto';
$route['motorcycles/ktm'] = 'motorcycles/index/ktm';
$route['motorcyclespromo/(:any)/(:any)'] = 'motorcyclespromo/index/$1/$2';
$route['motorcyclespromogms/(:any)/(:any)'] = 'motorcyclespromogms/index/$1/$2';
$route['motorcyclespromogms/dealers/(:any)'] = 'motorcyclespromogms/dealers/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10';
$route['rheanmotorcyclespromo/(:any)/(:any)'] = 'rheanmotorcyclespromo/index/$1/$2';
$route['rheanmotorcyclespromo/dealers/(:any)'] = 'rheanmotorcyclespromo/dealers/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10';
$route['guide/(:any)'] = 'guide/index/$1';
$route['ebike/(:any)/(:any)'] = 'ebike/index/$1/$2';