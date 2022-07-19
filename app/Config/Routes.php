<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function(){
    $data = [
        'title_meta' => view('partials/title-meta', ['title' => 'Error_404'])
    ];
    return view('pages-404',$data);
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('index-dark', 'Home::show_index_dark');
$routes->get('index-rtl', 'Home::show_index_rtl');
$routes->get('layouts-boxed', 'Home::show_layouts_boxed');
$routes->get('layouts-colored-sidebar', 'Home::show_colored_sidebar');
$routes->get('layouts-compact-sidebar', 'Home::show_compact_sidebar');
$routes->get('layouts-dark-sidebar', 'Home::show_dark_sidebar');
$routes->get('layouts-icon-sidebar', 'Home::show_icon_sidebar');
$routes->get('layouts-scrollable', 'Home::show_layouts_scrollable');


//Multi-language functionality 
$routes->get('/lang/{locale}', 'Language::index');

// //Layout section routing
$routes->get('layouts-horizontal', 'Home::show_layouts_horizontal');
$routes->get('layouts-horizontal-boxed', 'Home::show_layouts_horizontal_boxed');
$routes->get('layouts-horizontal-dark', 'Home::show_layouts_horizontal_dark');
$routes->get('layouts-horizontal-rtl', 'Home::show_layouts_horizontal_rtl');
$routes->get('layouts-horizontal-scrollable', 'Home::show_layouts_horizontal_scrollable');
$routes->get('layouts-horizontal-dark-topbar', 'Home::show_layouts_dark_topbar');


// //App section routing
$routes->get('apps-calendar', 'Home::show_calendar');

$routes->get('apps-chat', 'Home::show_chat');

$routes->get('apps-email-inbox', 'Home::show_email_inbox');
$routes->get('apps-email-read', 'Home::show_email_read');

$routes->get('apps-invoices-list', 'Home::show_invoices_list');
$routes->get('apps-invoices-detail', 'Home::show_invoices_detail');

$routes->get('apps-contacts-grid', 'Home::show_contacts_grid');
$routes->get('apps-contacts-list', 'Home::show_contacts_list');
$routes->get('apps-contacts-profile', 'Home::show_contacts_profile');

// Pages
$routes->get('auth-login', 'Home::show_auth_login');
$routes->get('auth-register', 'Home::show_auth_register');
$routes->get('auth-recoverpw', 'Home::show_auth_recoverpw');
$routes->get('auth-lock-screen', 'Home::show_auth_lock_screen');
$routes->get('auth-confirm-mail', 'Home::show_auth_confirm_mail');
$routes->get('auth-email-verification', 'Home::show_auth_email_verification');
$routes->get('auth-two-step-verification', 'Home::show_auth_two_step_verification');


$routes->get('pages-starter', 'Home::show_pages_starter');
$routes->get('pages-invoice', 'Home::show_pages_invoice');
$routes->get('pages-profile', 'Home::show_pages_profile');
$routes->get('pages-maintenance', 'Home::show_pages_maintenance');
$routes->get('pages-comingsoon', 'Home::show_pages_comingsoon');
$routes->get('pages-timeline', 'Home::show_pages_timeline');
$routes->get('pages-faqs', 'Home::show_pages_faqs');
$routes->get('pages-pricing', 'Home::show_pages_pricing');
$routes->get('pages-404', 'Home::show_pages_404');
$routes->get('pages-500', 'Home::show_pages_500');

// UI Elements
$routes->get('ui-alerts', 'Home::show_ui_alerts');
$routes->get('ui-buttons', 'Home::show_ui_buttons');
$routes->get('ui-cards', 'Home::show_ui_cards');
$routes->get('ui-carousel', 'Home::show_ui_carousel');
$routes->get('ui-dropdowns', 'Home::show_ui_dropdowns');
$routes->get('ui-grid', 'Home::show_ui_grid');
$routes->get('ui-images', 'Home::show_ui_images');
$routes->get('ui-modals', 'Home::show_ui_modals');
$routes->get('ui-progressbars', 'Home::show_ui_progressbars');
$routes->get('ui-tabs-accordions', 'Home::show_ui_tabs_accordions');
$routes->get('ui-typography', 'Home::show_ui_typography');
$routes->get('ui-video', 'Home::show_ui_video');
$routes->get('ui-general', 'Home::show_ui_general');
$routes->get('ui-colors', 'Home::show_ui_colors');
$routes->get('ui-offcanvas', 'Home::show_ui_offcanvas');

//Extended
$routes->get('extended-lightbox', 'Home::show_extended_lightbox');
$routes->get('extended-rangeslider', 'Home::show_extended_rangeslider');
$routes->get('extended-session-timeout', 'Home::show_extended_session_timeout');
$routes->get('extended-sweet-alert', 'Home::show_extended_sweet_alert');
$routes->get('extended-rating', 'Home::show_extended_rating');
$routes->get('extended-notifications', 'Home::show_extended_notification');

// Forms
$routes->get('form-elements', 'Home::show_form_elements');
$routes->get('form-validation', 'Home::show_form_validation');
$routes->get('form-advanced', 'Home::show_form_advanced');
$routes->get('form-editors', 'Home::show_form_editors');
$routes->get('form-uploads', 'Home::show_form_uploads');
$routes->get('form-xeditable', 'Home::show_form_xeditable');
$routes->get('form-repeater', 'Home::show_form_repeater');
$routes->get('form-wizard', 'Home::show_form_wizard');
$routes->get('form-mask', 'Home::show_form_mask');

// Tables
$routes->get('tables-basic', 'Home::show_tables_basic');
$routes->get('tables-datatable', 'Home::show_tables_datatable');
$routes->get('tables-responsive', 'Home::show_tables_responsive');
$routes->get('tables-editable', 'Home::show_tables_editable');

// Charts
$routes->get('charts-apex', 'Home::show_charts_apex');
$routes->get('charts-chartjs', 'Home::show_charts_chartjs');
$routes->get('charts-echart', 'Home::show_charts_echart');
$routes->get('charts-knob', 'Home::show_charts_knob');
$routes->get('charts-sparkline', 'Home::show_charts_sparkline');

// Icons
$routes->get('icons-boxicons', 'Home::show_icons_boxicons');
$routes->get('icons-materialdesign', 'Home::show_icons_materialdesign');
$routes->get('icons-dripicons', 'Home::show_icons_dripicons');
$routes->get('icons-fontawesome', 'Home::show_icons_fontawesome');

// Maps
$routes->get('maps-google', 'Home::show_maps_google');
$routes->get('maps-vector', 'Home::show_maps_vector');
$routes->get('maps-leaflet', 'Home::show_maps_leaflet');

// INTRA

// Login & Logout
// $routes->get('login','Home::login');


// Register
// $routes->get('register','Home::register');

## GroupDivisi
$routes->get('group-divisi', 'Master/Grupdivisi::index');
$routes->post('group-divisi/delete', 'Master/Grupdivisi::delete');
$routes->post('group-divisi/post', 'Master/Grupdivisi::save');

## Divisi
$routes->get('divisi', 'Master/Divisi::index');
$routes->post('divisi/delete', 'Master/Divisi::delete');
$routes->post('divisi/post', 'Master/Divisi::save');

## Department
$routes->get('department', 'Master/Department::index');
$routes->post('department/delete', 'Master/Department::delete');
$routes->post('department/post', 'Master/Department::save');

## Jabatan
$routes->get('department', 'Master/Department::index');
$routes->post('department/delete', 'Master/Department::delete');
$routes->post('department/post', 'Master/Department::save');


## Struktur
$routes->get('struktur-organisasi', 'Bpo/Strukturorg::index');
$routes->post('struktur-organisasi/delete', 'Bpo/Strukturorg::delete');
$routes->post('struktur-organisasi/post', 'Bpo/Strukturorg::save');

## Kategory
$routes->get('kategory', 'Bpo/Kategory::index');
$routes->post('kategory/delete', 'Bpo/Kategory::delete');
$routes->post('kategory/post', 'Bpo/Kategory::save');

## Position
$routes->get('jabatan', 'Master/Position::index');
$routes->post('jabatan/delete', 'Master/Position::delete');
$routes->post('jabatan/post', 'Master/Position::save');

## GroupUser
$routes->get('group-user', 'Master/GroupUser::index');
$routes->post('group-user/delete', 'Master/GroupUser::delete');
$routes->post('group-user/post', 'Master/GroupUser::save');

## Position
$routes->get('users', 'Master/User::index');
$routes->post('users/delete', 'Master/User::delete');
$routes->post('users/post', 'Master/User::save');

## Meeting Room
$routes->get('room-meeting','Meeting/MeetingRoom::index');
$routes->get('room-meeting/detail/:any','Meeting/MeetingRoom::detail');

## Meeting Schedule
$routes->get('meeting-schedule','Meeting/MeetingSchedule::index');
$routes->get('meeting-schedule/booking','Meeting/MeetingSchedule::booking');
$routes->get('meeting-schedule/booking/:any','Meeting/MeetingSchedule::booking');
$routes->get('meeting-schedule/:any','Meeting/MeetingSchedule::schedule');

// RESOURCE
//$routes->resource('grupdivisi', ['controller' => 'Api\Grupdivisi']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
