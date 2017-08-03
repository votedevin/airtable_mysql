<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
| http://laravel.com/docs/5.1/authentication
| http://laravel.com/docs/5.1/authorization
| http://laravel.com/docs/5.1/routing
| http://laravel.com/docs/5.0/schema
| http://socialiteproviders.github.io/
|
*/

// HOMEPAGE ROUTE
Route::get('/', function () {
    //return view('welcome');
    return redirect('/agencies');
});

Route::get('/twitter', function()
{

	return Twitter::getUserTimeline(['screen_name' => 'jeremyekenedy', 'count' => 20, 'format' => 'json']);

    //return Twitter::getHomeTimeline(['count' => 20, 'format' => 'json']);

	//return Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']);

	//return Twitter::postTweet(['status' => 'Laravel is beautiful', 'format' => 'json']);

});
Route::get('/home', function () {
	return redirect('/agencies');
});

Route::get('/agencies', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'AgencyController@agencyview'
]);
Route::get('/agencies/totalcostdesc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'AgencyController@totalcostdesc'
]);
Route::get('/agencies/totalcostasc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'AgencyController@totalcostasc'
]);
Route::get('/agencies/projectsdesc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'AgencyController@projectsdesc'
]);
Route::get('/agencies/projectsasc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'AgencyController@projectsasc'
]);
Route::get('/agencies/commitmentsdesc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'AgencyController@commitmentsdesc'
]);
Route::get('/agencies/commitmentsasc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'AgencyController@commitmentsasc'
]);
Route::get('/agencies/{id}', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'AgencyController@commitmentlink'
]);
Route::match(['get', 'post'], '/agencies/find', [
    'uses'          => 'AgencyController@find'
]);
Route::get('/projects', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'ProjectController@projectview'
]);
Route::get('/projects/{id}', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'ProjectController@projectfind'
]);
Route::get('/project/{id}', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'ProjectController@agencyfind'
]);
Route::get('/projecttype/{id}', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'ProjectController@projecttypefind'
]);
Route::get('/commitments', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'CommitmentController@commitmentview'
]);

Route::get('/commitments/noncitycostdesc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'CommitmentController@noncitycostdesc'
]);
Route::get('/commitments/noncitycostasc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'CommitmentController@noncitycostasc'
]);
Route::get('/commitments/citycostdesc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'CommitmentController@citycostdesc'
]);
Route::get('/commitments/citycostasc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'CommitmentController@citycostasc'
]);
Route::match(['get', 'post'], '/commitments/find', [
    'uses'          => 'CommitmentController@find'
]);

// ALL AUTHENTICATION ROUTES - HANDLED IN THE CONTROLLERS
Route::controllers([
	'auth' 		=> 'Auth\AuthController',
	'password' 	=> 'Auth\PasswordController',
]);
// REGISTRATION EMAIL CONFIRMATION ROUTES
Route::get('/resendEmail', [
    'as' 		=> 'user',
	'uses'		=> 'Auth\AuthController@resendEmail'
]);
Route::get('/activate/{code}', [
    'as' 		=> 'user',
	'uses'		=> 'Auth\AuthController@activateAccount'
]);

// CUSTOM REDIRECTS
Route::get('restart', function () {
    \Auth::logout();
    return redirect('auth/register')->with('anError',  \Lang::get('auth.loggedOutLocked'));
});
Route::get('another', function () {
    \Auth::logout();
    return redirect('auth/login')->with('anError',  \Lang::get('auth.tryAnother'));
});

// LARAVEL SOCIALITE AUTHENTICATION ROUTES
Route::get('/social/redirect/{provider}', [
	'as' 		=> 'social.redirect',
	'uses' 		=> 'Auth\AuthController@getSocialRedirect'
]);
Route::get('/social/handle/{provider}',[
	'as' 		=> 'social.handle',
	'uses' 		=> 'Auth\AuthController@getSocialHandle'
]);

// AUTHENTICATION ALIASES/REDIRECTS
Route::get('login', function () {
    return redirect('/auth/login');
});
Route::get('logout', function () {
    return redirect('/auth/logout');
});
Route::get('register', function () {
    return redirect('/auth/register');
});
Route::get('reset', function () {
    return redirect('/password/email');
});
Route::get('admin', function () {
    return redirect('/dashboard');
});


// USER PAGE ROUTES - RUNNING THROUGH AUTH MIDDLEWARE
Route::group(['middleware' => 'auth'], function () {

	// USER DASHBOARD ROUTE
	Route::get('/dashboard', [
	    'as' 		=> 'dashboard',
	    'uses' 		=> 'UserController@index'
	]);

	// USERS VIEWABLE PROFILE
	Route::get('profile/{username}', [
		'as' 		=> '{username}',
		'uses' 		=> 'ProfilesController@show'
	]);
	Route::get('dashboard/profile/{username}', [
		'as' 		=> '{username}',
		'uses' 		=> 'ProfilesController@show'
	]);
	Route::get('/pages/agencies', [
    	'as' 		=> 'dashboard',
	    'uses' 		=> 'AgencyController@index'
	]);
	Route::get('/pages/agencies/totalcostdesc', [
	'as' 		=> 'dashboard',
	'uses' 		=> 'AgencyController@totalcostdesc1'
	]);
	Route::get('/pages/agencies/totalcostasc', [
		'as' 		=> 'dashboard',
		'uses' 		=> 'AgencyController@totalcostasc1'
	]);
	Route::get('/pages/agencies/projectsdesc', [
		'as' 		=> 'dashboard',
		'uses' 		=> 'AgencyController@projectsdesc1'
	]);
	Route::get('/pages/agencies/projectsasc', [
		'as' 		=> 'dashboard',
		'uses' 		=> 'AgencyController@projectsasc1'
	]);
	Route::get('/pages/agencies/commitmentsdesc', [
		'as' 		=> 'dashboard',
		'uses' 		=> 'AgencyController@commitmentsdesc1'
	]);
	Route::get('/pages/agencies/commitmentsasc', [
		'as' 		=> 'dashboard',
		'uses' 		=> 'AgencyController@commitmentsasc1'
	]);
	Route::match(['get', 'post'], '/pages/agencies/find', [
		'as' 		=> 'dashboard',
	    'uses'          => 'AgencyController@find1'
	]);
	Route::get('/pages/projects', [
    	'as' 		=> 'dashboard',
	    'uses' 		=> 'ProjectController@index'
	]);
	Route::get('/pages/projects/{id}', [
		'as' 		=> 'dashboard',
		'uses' 		=> 'ProjectController@projectfind1'
	]);
	Route::get('/pages/project/{id}', [
		'as' 		=> 'dashboard',
		'uses' 		=> 'ProjectController@agencyfind1'
	]);
	Route::get('/pages/commitments', [
    	'as' 		=> 'dashboard',
	    'uses' 		=> 'CommitmentController@index'
	]);
	Route::get('/pages/menuedit', [
    	'as' 		=> 'dashboard',
	    'uses' 		=> 'MenueditController@index'
	]);
	Route::resource('menu_create', 'MenueditController@create');
	Route::resource('menu_update', 'MenueditController@store');
	Route::resource('menu_delete', 'MenueditController@delete');

	Route::resource('main_menu_create', 'MenueditController@maincreate');
	Route::resource('main_menu_update', 'MenueditController@mainstore');
	Route::resource('main_menu_delete', 'MenueditController@maindelete');

	Route::resource('left_menu_create', 'MenueditController@leftcreate');
	Route::resource('left_menu_update', 'MenueditController@leftstore');
	Route::resource('left_menu_delete', 'MenueditController@leftdelete');

	Route::get('/pages/datasync', [
    	'as' 		=> 'dashboard',
	    'uses' 		=> 'CommitmentController@datasync'
	]);

	Route::get('/updateagency', function () {
    	return view('airtable.agency');
	});
	Route::get('/updateproject', function () {
    	return view('airtable.project');
	});
	Route::get('/updatecommitment', function () {
    	return view('airtable.commitment');
	});

	// MIDDLEWARE INCEPTIONED - MAKE SURE THIS IS THE CURRENT USERS PROFILE TO EDIT
	Route::group(['middleware'=> 'currentUser'], function () {
			Route::resource(
				'profile',
				'ProfilesController', [
					'only' 	=> [
						'show',
						'edit',
						'update'
					]
				]
			);
	});

});

// ADMINISTRATOR ACCESS LEVEL PAGE ROUTES - RUNNING THROUGH ADMINISTRATOR MIDDLEWARE
Route::group(['middleware' => 'administrator'], function () {

	// SHOW ALL USERS PAGE ROUTE
	Route::resource('users', 'UsersManagementController');
	Route::get('users', [
		'as' 			=> '{username}',
		'uses' 			=> 'UsersManagementController@showUsersMainPanel'
	]);

	// EDIT USERS PAGE ROUTE
	Route::get('edit-users', [
		'as' 			=> '{username}',
		'uses' 			=> 'UsersManagementController@editUsersMainPanel'
	]);

	// TAG CONTROLLER PAGE ROUTE
	Route::resource('admin/skilltags', 'SkillsTagController', ['except' => 'show']);

	// TEST ROUTE ONLY ROUTE
	Route::get('administrator', function () {
	    echo 'Welcome to your ADMINISTRATOR page '. Auth::user()->email .'.';
	});

});

// EDITOR ACCESS LEVEL PAGE ROUTES - RUNNING THROUGH EDITOR MIDDLEWARE
Route::group(['middleware' => 'editor'], function () {

	//TEST ROUTE ONLY
	Route::get('editor', function () {
	    echo 'Welcome to your EDITOR page '. Auth::user()->email .'.';
	});

});

// CATCH ALL ERROR FOR USERS AND NON USERS
/*Route::any('/{page?}',function(){
	if (Auth::check()) {
	    return view('admin.errors.users404');
	} else {
		return View('errors.404');
	}
})->where('page','.*');*/


//***************************************************************************************//
//***************************** USER ROUTING EXAMPLES BELOW *****************************//
//***************************************************************************************//

//** OPTION - ALL FOLLOWING ROUTES RUN THROUGH AUTHETICATION VIA MIDDLEWARE **//
/*
Route::group(['middleware' => 'auth'], function () {

	// OPTION - GO DIRECTLY TO TEMPLATE
	Route::get('/', function () {
	    return view('pages.user-home');
	});

	// OPTION - USE CONTROLLER
	Route::get('/', [
	    'as' 			=> 'user',
	    'uses' 			=> 'UsersController@index'
	]);

});
*/
//** OPTION - SINGLE ROUTE USING A CONTROLLER AND AUTHENTICATION VIA MIDDLEWARE **//
/*
Route::get('/', [
    'middleware' 	=> 'auth',
    'as' 			=> 'user',
    'uses' 			=> 'UsersController@index'
]);
*/