<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'welcome'; //all non-logged part of lmal.tv
$route['terms'] = 'welcome/terms'; 
$route['pricing'] = 'welcome/pricing';
$route['app'] = 'app/index';
$route['faq'] = 'welcome/faq';
$route['404_override'] = '';
$route['login'] = 'account/login';
$route['logout'] = 'account/logout';
$route['signup'] = 'account/signup';
$route['getkey'] = 'account/getkey';
$route['(:any)/welcome'] = 'account/welcome/$1';
$route['(:any)/activate/(:any)'] = 'account/activate/$1/$2';

$route['(:any)/start'] = 'channel/start/$1';
$route['(:any)/stop'] = 'channel/stop/$1';

$route['forgotpwd'] = 'account/forgotpwd';
$route['metadatas/eventid/(:any)/poster'] = 'metadatas/poster/$1';
$route['metadatas/eventid/(:any)'] = 'metadatas/event/$1';
$route['metadatas/channel/(:any)/picture'] = 'metadatas/picture/$1';
$route['metadatas/channel/(:any)'] = 'metadatas/channel/$1';
$route['metadatas/getchannelstatus/(:any)'] = 'metadatas/getchannelstatus/$1';
$route['(:any)/archives/(:any)'] = 'channel/index/$1/$2';
$route['(:any)/new'] = 'channel/newevent/$1';
$route['delete/eventid/(:num)'] = 'channel/deleteeventid/$1';
$route['delete/(:any)'] = 'channel/deleteevent/$1';

//embed2
//$route['(:any)/embed2'] = 'channel/index/$1//embed2'; //default 16x9/576p
//$route['(:any)/embed2/large'] = 'channel/index/$1//embed2/large';
//$route['(:any)/embed2/medium'] = 'channel/index/$1//embed2/medium';
//$route['(:any)/embed2/small'] = 'channel/index/$1//embed2/small';
$route['metadatas/nextevent/(:any)'] = 'metadatas/nextevent/$1';

$route['(:any)/embed'] = 'channel/embed/$1'; //default 16x9/576p
//$route['(:any)/embed/large'] = 'channel/embed/$1/large';
//$route['(:any)/embed/medium'] = 'channel/embed/$1/medium';
//$route['(:any)/embed/small'] = 'channel/embed/$1/small';
//$route['(:any)/embed/fb'] = 'channel/embed/$1/fb'; //default 16x9/576p

/*$route['(:any)/embed'] = 'channel/index/$1//embed'; //default 16x9/576p
$route['(:any)/embed/fb'] = 'channel/index/$1//embed/fb'; //default 16x9/576p
$route['(:any)/embed/large'] = 'channel/index/$1//embed/large_169';
$route['(:any)/embed/medium'] = 'channel/index/$1//embed/medium_169';
$route['(:any)/embed/small'] = 'channel/index/$1//embed/small_169';
$route['(:any)/embed/xlarge_43'] = 'channel/index/$1//embed/xlarge_43';
$route['(:any)/embed/large_43'] = 'channel/index/$1//embed/large_43';
$route['(:any)/embed/medium_43'] = 'channel/index/$1//embed/medium_43';
*/
$route['(:any)/pay/(:any)/json'] = 'pay/index/$1/$2/json';
$route['(:any)/pay/(:any)'] = 'pay/index/$1/$2';
//$route['(:any)'] = 'channel/index/$1';
$route['(:any)'] = 'channel/publicchannel/$1';
$route['fb/return_tab'] = 'fbapp/return_tab';
$route['fb/tab'] = 'fbapp/tab';


/* End of file routes.php */
/* Location: ./application/config/routes.php */