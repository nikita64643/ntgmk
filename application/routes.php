<?php  
    Controller::view("main");

    /*
        Done by: Шкуратов Никита (nikita64643)
        Vkontakte: vk.com/nikita64643
    */
	get('/', function(){ PagesController::Index(); });

    /* App Panel */

    get('/app', function(){
		PagesController::AppAuth();
	}); // Auth page
    get('/app/logout', function(){
		unset($_SESSION["login"]);
		unset($_SESSION["password"]);
		unset($_SESSION["role"]);
		unset($_SESSION["seccession"]);
		unset($_SESSION["ggroup"]);
		header('Location: /app/');	
	}); // Logout
    post('/app/auth', function(){
		$login = $_POST["login"];
		$password = $_POST["password"];
        
		if(isset($_SESSION["error_auth"])) unset($_SESSION["error_auth"]);
		if(AppController::checkUser(htmlspecialchars($login), htmlspecialchars($password))) { 
            $_SESSION["login"] = $login;
            $_SESSION["password"] = $password;
            $mysqli = database::connect();
            $sql = $mysqli->query("SELECT * FROM `users` WHERE login = '$login'");
            $result = $sql->fetch_assoc();
            $_SESSION["role"] = $result["role"];
            $_SESSION["seccession"] = $result["seccession"];
            $_SESSION["ggroup"] = $result["ggroup"];
			database::close($mysqli); 
			header("Location: /cabinet"); exit();} 
            else { 
                $_SESSION["error_auth"] = 'Ошибка авторизации'; 
                header('Location: /app'); 
            }
	});  // Auth
    get('/cabinet', function(){ PagesController::Cabinet(); });
	get('/editing/groups', function(){ PagesController::Groups(); });
	get('/editing/group', function(){ PagesController::Group(); });
	get('/editing/students', function(){ PagesController::Students(); });
	get('/editing/student', function(){ PagesController::Student(); });

    //     /* Admin App */
    // get('/app/praepostor', function(){
	// 	PagesController::AppPraepostor();
	// });
    // get('/app/praepostor/add', function(){
	// 	PagesController::AppPraepostorAdd();
	// });
    // post('/app/praepostor/add', function(){
	// 	AppController::PraepostorAdd($_POST["login"], $_POST["password"], $_POST["select_seccession"], $_POST["select_group"]);
	// });
    // get('/app/praepostor/remove/([a-zA-Z0-9\-_]+)', function($id){
	// 	AppController::PraepostorRemove($id);
	// });
    
    // get('/app/news', function(){
	// 	PagesController::AppNews();
	// });
	// get('/app/news/add', function(){
	// 	PagesController::AppNewsAdd();
	// });
	// get('/app/news/update/([a-zA-Z0-9\-_]+)', function($id){
	// 	PagesController::AppNewsUpdate($id);
	// });
    // post('/app/news/add', function(){
	// 	AppController::NewsAdd($_POST["title"], $_POST["text"]);
	// });
	// get('/app/news/remove/([a-zA-Z0-9\-_]+)', function($id){
	// 	AppController::NewsRemove($id);
	// });
	// post('/app/news/update', function(){
	// 	AppController::NewsUpdate($_POST["id"], $_POST["title"], $_POST["text"]);
	// });

    // get('/app/all/update', function(){
	// 	AppController::AllUpdate();
	// });

    //     /* Praepostor App */
    // get('/app/homework', function(){
	// 	PagesController::AppHomework();
	// });
	// get('/app/homework/add', function(){
	// 	PagesController::AppHomeworkAdd();
	// });
	// get('/app/homework/update/([a-zA-Z0-9\-_]+)', function($id){
	// 	PagesController::AppHomeworkUpdate($id);
	// });
    // post('/app/homework/add', function(){
	// 	AppController::HomeworkAdd($_POST["predmet"], $_POST["text"]);
	// });
	// get('/app/homework/remove/([a-zA-Z0-9\-_]+)', function($id){
	// 	AppController::HomeworkRemove($id);
	// });
	// post('/app/homework/update', function(){
	// 	AppController::HomeworkUpdate($_POST["id"], $_POST["predmet"], $_POST["text"]);
	// });

	// get('/app/plane', function(){
	// 	PagesController::AppPlane();
	// });
    // get('/app/plane/edit', function(){
	// 	AppController::PlaneEdit();
	// });
	// get('/app/plane/update/', function(){
	// 	AppController::PlaneUpdate();
	// });
    // get('/app/plane/delete', function(){
	// 	AppController::PlaneDelete();
	// });
    
    

    /* API */

    // get('/api/news', function(){
	// 	APIController::news();
	// });
    // get('/api/homework', function(){
	// 	APIController::homework();
	// });
    // get('/api/plane', function(){
	// 	APIController::plane();
	// });
    // get('/api/praepostor', function(){
	// 	APIController::praepostor();
	// });
    

    /* other */

	if (!Nanite::$routeProccessed) header("Location: /");