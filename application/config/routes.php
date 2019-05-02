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

$route['default_controller'] = "chess";
$route['404_override'] = '';

$route['play'] = 'chess/play';
$route['challenge'] = 'chess/challenge';
$route['rating'] = 'chess/rating';

$route['matches'] = 'chess/matches';

$route['profile'] = 'chess/profile';
$route['profile/(:any)'] = 'chess/profile/$1';


$route['test'] = 'test';
//$route['test/(:any)'] = 'test/index/$1';

$route['match/(:num)'] = 'chess/match/$1';

//$route['match_move/(:num)'] = 'chess/get_move_number/$1';
$route['match_move'] = 'chess/get_move_number';

$route['move/(:num)/(:any)'] = 'chess/move/$1/$2';
//$route['move/check'] = 'move/check';


//$route['challenge/(:any)'] = 'challenge/index/$1';
$route['challenge/(:any)'] = 'challenge/index/$1';
$route['cancel/(:any)'] = 'challenge/cancel/$1';
$route['play/(:any)'] = 'challenge/accept/$1';
//$route['challenge/(:any)'] = 'chess/play';

$route['logoff'] = 'chess/logoff';

$route['signin'] = 'user';
$route['login'] = 'user';
$route['signup'] = 'user/register_user';
$route['forgot'] = 'user/forgot_password';



/* End of file routes.php */
/* Location: ./application/config/routes.php */