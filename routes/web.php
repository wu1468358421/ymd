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

#  / 根路径 

// 代表  服务器上的绝对地址 : 域名后面 以 / 开头的字符串
// Route::get('/匹配服务器上的绝对地址'，'callbackk');


// Route 路由
Route::get('/', function () {
	// 设置
	Config::set('app.title','hello 215');


	// 加载视图 welcome 模板的名字
    return view('welcome');
});


// 打印
// dump()  dd() 

Route::get('/hello',function(){
	

	// var_dump(date('Y-m-d H:i:s',time()));
	// dump(date('Y-m-d H:i:s',time()));

	// dd(date('Y-m-d H:i:s',time())); 
	echo "string hello";
	
});

Route::get('admin',function(){
	echo '您现在访问的是admin路由';
	// date_default_timezone_set('PRC');

	var_dump(date('Y-m-d H:i:s',time()));

});


// 路由  url

// 获取配置 读取 配置
Route::get('conf',function(){
	// 获取
	dump(Config::get('app.name'));
	dump(Config::get('app.debug'));
	dump(Config::get('database.default'));
	dump(Config::get('app.abc'));
	dump(Config::get('app.title'));

});

//get、post 访问类型
// Route::get('匹配服务器上的绝对路径','callback');
// Route::post('匹配服务器上的绝对路径','callback');

Route::get('add',function(){
	return view('add');
});

// csrf 验证
Route::post('insert',function(){
	echo '您现在访问的是post路由';
	dump($_POST);

});


Route::get('insert2',function (){
	echo '您访问的  get  、  insert';
});

// 带参数的路由
Route::get('user/del/{id}/{name}',function($id,$name){
	echo '用户删除';
	dump($id);
	dump($name);
});

// 参数限定
Route::get('goods/del/{id}/{name}',function($id,$name){
	echo '商品删除22222222222222222222';
	dump($id);
	dump($name);
})->where('name','[a-z]+')->where('id','[0-9]+');

Route::get('list',function(){
	// return redirect('home/articles/create');	 //普通的url
	// return redirect()->route('hac');	
	return redirect()->route('had',['id'=>100,'name'=>'xxooo']);	
});


// 带有命名的路由  第一种风格
Route::get('home/articles/create',['as'=>'hac','uses'=>function(){
	echo " 访问 前台 用户 发帖功能";
}]);

// 带有命名路由  第二种风格
Route::get('home/articles/delele/{id}/{name}',function($id,$name){
	echo '访问 前台 文章 删除 -=---------'.$id.'--------'.$name;
})->name('had');


