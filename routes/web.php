<?php

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

$json = file_get_contents('users.json', true);
$users = json_decode($json, true);

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->get(),
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

// Route::get('/hello', function () {
//     return 'Hello World';
// })->name('hello');

// // REDIRECT URL'S
// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

Route::fallback(function () {
    return 'still got somewhere!';
});
