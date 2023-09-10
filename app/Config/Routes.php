<?php

namespace Config;

use CodeIgniter\Router\RouteCollection; 
use Myth\Auth\Config\Auth as AuthConfig;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();
$config         = config(AuthConfig::class);
$reservedRoutes = $config->reservedRoutes;

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(
    function () {
        $controller = new \App\Controllers\Home();
        return $controller->notfound();
    }
);
   

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/google-auth', 'Googleauth::index' , ['as' => $reservedRoutes['google-auth']]); 
$routes->get('/test', 'Test::index');
$routes->get('/list_project', 'Home::project');

$routes->get('/leads/(:num)', 'Leads::detail/$1');
$routes->get('/leads/all', 'Leads::all');
$routes->get('/leads/new', 'Leads::new');
$routes->get('/leads/contacted', 'Leads::contacted');
$routes->get('/leads/visit', 'Leads::visit');
$routes->get('/leads/deal', 'Leads::deal');
$routes->get('/leads/close', 'Leads::close');
$routes->get('/leads/pending', 'Leads::pending');

$routes->get('/getleads/(:num)', 'Leads::indexFilter/$1');

$routes->get('/home/(:num)', 'Home::indexFilter/$1');
$routes->post('/range', 'Home::range');
$routes->post('/range_list', 'Leads::rangeList');

$routes->post('/search_leads', 'Leads::search_leads');



// PROJECT
$routes->get('/project/(:num)', 'Project::detail/$1');
$routes->get('/project/iklan_digital/(:num)', 'Project::iklandigital/$1');
$routes->get('/project/video/(:num)', 'Project::video/$1');
$routes->get('/project/file/(:num)', 'Project::file/$1');
$routes->get('/project/interior/(:num)', 'Project::interior/$1');
$routes->post('/project_save', 'CMS::project_save');
$routes->delete('/delete_project/(:num)','CMS::delete_project/$1');
$routes->get('/edit_project/(:num)', 'CMS::edit_project/$1');
$routes->post('/update_project','CMS::update_project');

$routes->get('/add_images_promo/(:num)', 'CMS::add_images_promo/$1');
$routes->post('/save_promo/(:num)', 'CMS::save_promo/$1');

$routes->get('/add_images_interior/(:num)', 'CMS::add_images_interior/$1');
$routes->post('/save_interior/(:num)','CMS::save_interior/$1');

$routes->get('/add_video/(:num)', 'CMS::add_video/$1' );
$routes->post('/save_video/(:num)', 'CMS::save_video/$1');

$routes->get('/add_file/(:num)', 'CMS::add_file/$1');
$routes->post('/save_file/(:num)', 'CMS::save_file/$1');


// REPORT
// $routes->get('/report/chart', 'Report::chart');
$routes->get('/report/leads_subholding','Report::subholding');
$routes->get('/report/leads_project', 'Report::project');
$routes->get('/report/report_sales', 'Report::sales');
$routes->get('/report_sales_filter/(:num)', 'Report::salesFilter/$1');
$routes->post('/report_sales_range', 'Report::salesRange');

$routes->post('/search_report', 'Report::search_report');

//report filter 
$routes->get('/reportleads/(:num)', 'Report::leadsFilter/$1');
$routes->get('/leads_subholding/(:num)', 'Report::subholdingFilter/$1');
$routes->post('/range_leads_report', 'Report::range');
$routes->get('/report_project/(:num)', 'Report::projectFilter/$1');
$routes->post('/project_report_range', 'Report::projectRange');
$routes->get('/report_source/(:num)', 'Report::sourceFilter/$1');
$routes->post('/report_source_range', 'Report::sourceRange');
$routes->get('/export_leads/(:num)', 'Report::exportLeadsFilter/$1');
$routes->post('/exportRange', 'Report::exportRange');

// USER
$routes->get('/user/agent', 'User::users');
$routes->get('/user/admin','User::admin');
$routes->get('/user/(:num)', 'User::detail/$1');
$routes->get('/user_detail', 'User::user_loggedin');
$routes->post('/search_leads_user/(:num)', 'User::search_leads/$1');
$routes->post('/search_leads_user_loggedin/(:num)', 'User::search_leads_loggedin/$1');
$routes->get('/edit_user/(:num)', 'CMS::edit_user/$1');
$routes->get('/edit_user_id', 'CMS::edit_user_id');
$routes->post('/user_update', 'CMS::user_update');
$routes->post('/search_user', 'User::search_user');

// MSDP
$routes->get('/add_submission', 'CMS::add_submission');
$routes->post('/msdp/save', 'CMS::msdpSave');
$routes->get('print_msdp/(:num)', 'CMS::print_msdp/$1');
$routes->post('update_msdp/(:num)', 'CMS::msdpupdate/$1');
$routes->post('update_msdp_edit/(:num)', 'CMS::msdpupdateEdit/$1');
$routes->get('/edit_msdp/(:num)', 'CMS::edit_msdp/$1');
$routes->delete('/delete_msdp/(:num)', 'CMS::delete_msdp/$1');
$routes->get('/submission/(:num)', 'CMS::submission/$1');


// EVENT
$routes->post('/event_save', 'CMS::EventSave');
$routes->get('/list_event/(:num)', 'Event::list/$1');
$routes->get('/event/(:num)', 'Event::detail/$1');
$routes->get('/edit_event/(:num)', 'CMS::edit_event/$1');
$routes->post('update_event/(:num)', 'CMS::update_event/$1');
$routes->delete('/delete_event/(:num)', 'CMS::delete_event/$1');
$routes->post('/range_event', 'Event::listRange');



// ADD EDIT DATA
$routes->get('/add_leads', 'CMS::add_leads');
$routes->get('edit_leads/(:num)','CMS::edit_leads/$1');
$routes->post('update_leads/(:num)', 'CMS::update_leads/$1');
$routes->delete('/delete_leads/(:num)', 'CMS::delete_leads/$1');
$routes->post('/add_leads/save', 'CMS::save_leads');
$routes->get('/add_project', 'CMS::add_project'); //, ['filter' => 'role:admin,admin_group,admin_project']
$routes->get('/add_user','CMS::add_user');
$routes->get('/add_event', 'CMS::add_event');
$routes->get('/create/groups', 'CMS::groups');
$routes->post('/groups_save', 'CMS::groups_save');
$routes->get('/create/groupsales', 'CMS::groupsales');
$routes->post('/group_sales_save', 'CMS::group_sales_save');
$routes->delete('/delete_user_group/(:num)', 'CMS::delete_id_group/$1');
$routes->delete('/delete_group/(:num)', 'CMS::delete_group/$1');



// NOT FOUND

$routes->get('/404', 'Home::notfound');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
