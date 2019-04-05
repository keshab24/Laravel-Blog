<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','FrontEndController@index')->name('index');
Auth::routes();

Route::get('/post/{slug}',[
    'uses'=>'FrontEndController@singlePost',
    'as'=>'post.single'
]);

Route::get('/category/{id}',[
    'uses'=>'FrontEndController@category',
    'as'=>'category.single'
]); 

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('posts/create',[
        'uses'=>'PostsController@create',
        'as'=>'posts.create'
    ]);
    Route::post('/posts/store',[
     'uses'=>'PostsController@store',
     'as'=>'posts.store'
    ]);
    Route::get('posts',[
        'uses'=>'PostsController@index',
        'as'=>'posts'
    ]);
    Route::get('post/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'
    ]);
    Route::get('category/create',[
        'uses'=>'CategoriesController@create',
        'as'=>'category.create'
    ]);
    Route::get('categories',[
        'uses'=>'CategoriesController@index',
        'as'=>'categories'
    ]);
    Route::get('/home', ['uses'=>'HomeController@index','as'=>'home']);
    Route::post('/category/store',[
        'uses'=>'CategoriesController@store',
        'as'=>'category.store'
       ]);
       Route::get('category/edit/{id}',[
        'uses'=>'CategoriesController@edit',
        'as'=>'category.edit'
    ]);
    Route::get('category/delete/{id}',[
        'uses'=>'CategoriesController@destroy',
        'as'=>'category.delete'
    ]);
    Route::post('/category/update/{id}',[
        'uses'=>'CategoriesController@update',
        'as'=>'category.update'
       ]);
    Route::get('posts/trashed',[
        'uses'=>'PostsController@trashed',
        'as'=>'posts.trashed'
        ]);
    Route::get('posts/kill/{id}',[
            'uses'=>'PostsController@kill',
            'as'=>'post.kill'
            ]);
    Route::get('post/edit/{id}',[
                'uses'=>'PostsController@edit',
                'as'=>'post.edit'
            ]);
    Route::post('/post/update/{id}',[
                'uses'=>'PostsController@update',
                'as'=>'post.update'
               ]);
    Route::get('posts/restore/{id}',[
                'uses'=>'PostsController@restore',
                'as'=>'post.restore'
                ]);
    Route::get('tags',[
                    'uses'=>'tagsController@index',
                    'as'=>'tags'
                ]);
    Route::get('tag/create',[
                    'uses'=>'TagsController@create',
                    'as'=>'tag.create'
                ]);
    Route::post('/tag/store',[
                    'uses'=>'TagsController@store',
                    'as'=>'tag.store'
                   ]);
    Route::get('tag/edit/{id}',[
                    'uses'=>'TagsController@edit',
                    'as'=>'tag.edit'
                ]);
    Route::post('/tag/update/{id}',[
                    'uses'=>'TagsController@update',
                    'as'=>'tag.update'
                   ]);   
    
    Route::get('tag/delete/{id}',[
                    'uses'=>'TagsController@destroy',
                    'as'=>'tag.delete'
                ]);
    Route::get('users',[
                    'uses'=>'UsersController@index',
                    'as'=>'users'
                ]);
    Route::get('user/create',[
                    'uses'=>'UsersController@create',
                    'as'=>'user.create'
                ]);
    Route::post('/user/store',[
                    'uses'=>'UsersController@store',
                    'as'=>'user.store'
                   ]);
   Route::get('/user/admin/{id}',[
       'uses'=>'UsersController@admin',
       'as'=>'user.admin'
   ]);
   Route::get('/user/not-admin/{id}',[
    'uses'=>'UsersController@not_admin',
    'as'=>'user.not.admin'
]); 
Route::get('user/profile',[
    'uses'=>'ProfilesController@index',
    'as'=>'user.profile'
]);
Route::post('/user/profile/update',[
    'uses'=>'ProfilesController@update',
    'as'=>'user.profile.update'
   ]);
   Route::get('user/delete/{id}',[
    'uses'=>'UsersController@destroy',
    'as'=>'user.delete'
]);
Route::get('user/profile/edit',[
    'uses'=>'ProfilesController@edit',
    'as'=>'user.profile.edit'
]); 
Route::get('user/profile/view',[
    'uses'=>'ProfilesController@index',
    'as'=>'user.profile.view'
]);               
            });
