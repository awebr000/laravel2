<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//
// Route::get('/', function()
// {
// 	return View::make('hello');
// });

// Use App\models\User;

//Show Task Dashboard
Route::get('/', function(){
	 $tasks = Task::orderBy('created_at', 'asc')->get();

	return View::make('tasks', ['tasks' => $tasks]);
	// return "worked";
});

// Add New tasks
Route::post('/task', function(){
	$validator = Validator::make(Input::all(), [
		'name' => 'required|max:255',
]);

if ($validator->fails()) {
		return redirect('/')
				->withInput()
				->withErrors($validator);
}

$task = new Task;
$task->name = Input::get('name');
$task->save();
//
return Redirect::to('/');
// return Input::get('name');

});

//Delete Task
Route::post('/task/{task}', function($task){
	$del=Task::whereid($task)->delete();

return Redirect::to('/');

});
