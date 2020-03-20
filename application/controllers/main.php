<?php 
    class PagesController {
        public static function Index() {
            Controller::page(['main','/']);
        }

        public static function Cabinet() {
            AppController::session_check();
            Controller::page(['app','/cabinet']);
        }

        public static function Groups() {
            AppController::session_check();
            Controller::page(['app','/group/index']);
        }

        public static function Group() {
            AppController::session_check();
            Controller::page(['app','/group/group']);
        }

        public static function Students() {
            AppController::session_check();
            Controller::page(['app','/student/index']);
        }

        public static function Student() {
            AppController::session_check();
            Controller::page(['app','/student/student']);
        }

            public static function MainWelcome() {
                Controller::page(['main','/welcome']);
            }
            public static function MainHomework() {
                Controller::page(['main','/homework']);
            }
            public static function MainPlane() {
                Controller::page(['main','/plane']);
            }
        
            /* App pages */
        
            public static function AppAuth() { 
                if(isset($_SESSION["login"])) return header('Location: /app/main');
                Controller::page(['main','/app/auth']); 
            }

            public static function AppPraepostor() {
                
                AppController::session_check();
                AppController::check('admin');
                Controller::page(['app','/app/praepostor/list']);
                
            }
            public static function AppPraepostorAdd() {
                AppController::session_check();
                AppController::check('admin');
                Controller::page(['app','/app/praepostor/add']);
            }
        
            public static function AppNews() {
                AppController::session_check();
                AppController::check('admin');
                Controller::page(['app','/app/news/list']);
            }
            public static function AppNewsAdd() {
                AppController::session_check();
                AppController::check('admin');
                Controller::page(['app','/app/news/add']);
            }
            public static function AppNewsUpdate($id) {
                AppController::session_check();
                AppController::check('admin');
                Controller::page(['app','/app/news/update', $id]);
            }
            
            public static function AppHomework() {
                AppController::session_check();
                AppController::check('praepostor');
                Controller::page(['app','/app/homework/list']);
            }
            public static function AppHomeworkAdd() {
                AppController::session_check();
                AppController::check('praepostor');
                Controller::page(['app','/app/homework/add']);
            }
            public static function AppHomeworkUpdate($id) {
                AppController::session_check();
                AppController::check('praepostor');
                Controller::page(['app','/app/homework/update', $id]);
            }
        
            public static function AppPlane() {
                AppController::session_check();
                AppController::check('praepostor');
                
                Controller::page(['app','/app/plane']);
            }

    }

    class database {
        
        public static function connect() {
            return new mysqli("localhost", "root", "RMmA34D", "ktk"); 
        }

        public static function close($mysqli) {
            $mysqli->close();
        }
        
    }

    class APIController {

        public static function news() {
			$mysqli = database::connect();
			$sql = $mysqli->query("SELECT * FROM `news` ORDER BY id DESC LIMIT 3");
			if(mysqli_num_rows($sql) == null) return print('[{"title": "Привет :)", "news": "К сожалению, на сайте нет новостей", "id": "undefined"}]');
			$d = true;
			while ($result = mysqli_fetch_array($sql)) {
				if($d == false) print(',');
				else { print('['); $d = false; }
				$json = '{"lenght": "'.mysqli_num_rows($sql).'","title": "'.htmlspecialchars($result["title"]).'", "news": "'.htmlspecialchars($result["text"]).'","id": "'.htmlspecialchars($result["id"]).'"}';
				print(str_replace("\r\n", "",$json));
			}
			print(']');
			database::close($mysqli); 
        }
        public static function homework() {
                if(!isset($_GET["seccession"])) { 
                    return print("<div class='form-group'><div class='input-group'><div class='input-group-prepend'><div class='input-group-text'>Отделение</div></div><select class='form-control' onchange='seccession(this.value)' id='exampleFormControlSelect1'><option value='none'>-- </option><option value='aivt'>АиВТ</option><option value='td'>Технологии и дизайн</option><option value='awc'>Автосервис</option></select></div></div><script>function seccession(group) { if(group != 'none') { $('#loading').show();$('#content').html('');$.get('/api/homework?seccession='+ group, function(data){ $('#loading').hide(); $('#group').html(data); }); } }</script>"); } 
                else {
                    if(!isset($_GET["group"])) {
                        print('<div class="form-group"><div class="input-group"><div class="input-group-prepend"><div class="input-group-text">Группа</div></div><select class="form-control" onchange="app(this.value)"><option value="none">--</option>');
                        APIController::getGroups($_GET["seccession"]);
                        print("</select></div></div><script>function app(group) { if(group != 'none') { $('#loading').show(); $('#content').html('');$.get('/api/homework?group='+ group, function(data){ $.cookie('default', group, {expires: 365});$('#loading').hide();var ss = JSON.parse(data);$('#pagination').pagination({ dataSource: ss, pageSize: 4,callback: function(data, pagination) { var html = homeworktpl(data); $('#content').html(html);} }); }); }} </script>");
                    }
                    if(isset($_GET["group"]) AND isset($_GET["seccession"])) { 
                        $mysqli = database::connect();
                        $group = $_GET["group"];
                        $seccession = explode('.xlsx', $_GET["seccession"]);
                        $seccession = explode('.xls', $_GET["seccession"]);
                        $seccession = $seccession[0];
                        $sql = $mysqli->query("SELECT * FROM `homework` WHERE seccession = '$seccession' and ggroup = '$group' ORDER BY id DESC");
                        $d = 0;

                    if(mysqli_num_rows($sql) == null) return print('[{"predmet": "Ошибка", "text": "В группе '.$_GET["group"].' не обновлено рассписание."}]'); 
                        print('[');
                        while ($result = mysqli_fetch_array($sql)) {
                            $res = htmlspecialchars($result["text"]);
                            if($d != 0) print(',');
                            $json = '{ "id": "'.$result["id"].'", "predmet": "'.$result["predmet"].'", "text": "'.$res.'"}';
                            $json = preg_replace('/\s*\(.*?\)/', "", $json);
                            print(str_replace("\r\n", "",$json));
                            $d++;
                        }
                        print(']');
                    database::close($mysqli); 
                 }
            }
        }
        public static function plane() {

                if(!isset($_GET["seccession"])) { 
                    return print("<div class='form-group'><div class='input-group'><div class='input-group-prepend'><div class='input-group-text'>Отделение</div></div><select class='form-control' onchange='seccession(this.value)'><option value='none'>--</option><option value='aivt'>АиВТ</option><option value='td'>Технология и Дизайн</option><option value='awc'>Автосервис</option></select></div></div><script>function seccession(group) { if(group != 'none') { $('#loading').show();$('#content').html('');$.get('/api/plane?seccession='+ group, function(data){ $('#loading').hide();$('#group').html(data);});}}</script>");
                } 

                else {

                    if(!isset($_GET["group"])) {
                        print('<div class="form-group"><div class="input-group"><div class="input-group-prepend"><div class="input-group-text">Группа</div></div><select class="form-control" onchange="app(this.value)"><option value="none">--</option>');
                        APIController::getGroups($_GET["seccession"]);
                        print("</select></div></div><script>function app(group) { if(group != 'none') { $('#loading').show(); $('#content').html('');$.get('/api/plane?group='+ group, function(data){ $.cookie('default', group, {expires: 365});$('#loading').hide();$('#content').html(data);});}} </script>");
                    }
                    if(isset($_GET["group"]) AND isset($_GET["seccession"])) {
                        print('<div class="row">');
                            $days = array('Понедельник','Вторник','Среда','Четверг','Пятница','Суббота');
                            foreach ($days as $day) { APIController::get_Plane($day, $_GET["seccession"], $_GET["group"]); }
                        print('</div>');
                    }
                }
        }
        public static function praepostor() {
            
            AppController::session_check();
			AppController::check('admin');
            
            if(!isset($_GET["seccession"])) { 
                    return print("<div class='form-group'><div class='input-group'><div class='input-group-prepend'><div class='input-group-text'>Отделение</div></div><select class='form-control' name='select_seccession' onchange='seccession(this.value)'><option value='none'>--</option><option value='aivt'>АиВТ</option><option value='td'>Технология и Дизайн</option><option value='awc'>Автосервис</option></select></div></div><script>function seccession(group) { if(group != 'none') { $('#loading').show();$('#content').html('');$.get('/api/praepostor?seccession='+ group, function(data){ $('#loading').hide();$('#group').html(data);});}}</script>");
            } 
            else {
                    if(!isset($_GET["group"])) {
                        print('<div class="form-group"><div class="input-group"><div class="input-group-prepend"><div class="input-group-text">Группа</div></div><select class="form-control" name="select_group"><option value="none">--</option>');
                        
                        $seccession = $_GET["seccession"];
                        
                        $mysqli = database::connect();
                        $sql = $mysqli->query("SELECT * FROM `groups` WHERE seccession = '$seccession' ORDER BY id DESC");
                        while ($result = mysqli_fetch_array($sql)) { print("<option value='".$result["sgroup"]."'>".$result["sgroup"]." Группа</option>");}
                        database::close($mysqli); 
                        
                        print("</select></div></div>");
                    }
            }
            
        }
            
        function get_Plane($day, $seccession, $ggroup) {

            $mysqli = database::connect();
            $hwork = $mysqli->query("SELECT * FROM `plane` WHERE seccession = '$seccession' and ggroup = '$ggroup' and day = '$day'");
            
               if(mysqli_num_rows($hwork) == null) print('<script> $("#content").html("Попросите вашего старосту обновить расписание!"); </script>');
               else {
                    print('<div class="col-md-4"><div class="table table-responsive-md"><div class="card-header">'.$day.'</div><table class="table table-striped"><thead><tr><th scope="col"><i class="fa fa-bars" aria-hidden="true"></i></th><th scope="col"><i class="fa fa-book" aria-hidden="true"></i> Предмет</th></tr></thead><tbody>'); $d = 1;
                    while ($result = mysqli_fetch_array($hwork)) {
                        print('<tr><th scope="row">'.$d.'</th><td>'.$result["predmet"].'</td></tr>');$d++;
                    } print('</tbody></table></div></div>');
                }
                database::close($mysqli); 
            
            }
        public static function getGroups($seccession) {

            $mysqli = database::connect();
            $sql = $mysqli->query("SELECT * FROM `groups` WHERE seccession = '$seccession' ORDER BY id DESC");
            while ($result = mysqli_fetch_array($sql)) { print("<option value='".$result["sgroup"]."&seccession=".$_GET["seccession"]."'>".$result["sgroup"]." Группа</option>");}
            database::close($mysqli); 

        }

    }

    class AppController {
        
        public static function PraepostorRemove($id) {
			AppController::session_check();
			AppController::check('admin');

			$mysqli = database::connect();
			$mysqli->query("DELETE FROM `users` WHERE id = '$id'");
			database::close($mysqli); 
			header("Location: /app/praepostor");
		}
        public static function PraepostorAdd($login, $password, $seccession, $ggroup) {
			AppController::session_check();
			AppController::check('admin');
			if($login == '' || $password == '' || $seccession == 'null' || $ggroup == 'null') return print("Ошибка");
			$mysqli = database::connect();
			$check = $mysqli->query("SELECT * FROM users WHERE login = '$login'");
			if(mysqli_num_rows($check) != null) return print("Ошибка");
			$mysqli->query("INSERT INTO `users`(`login`, `password`, `role`, `seccession`, `ggroup`) VALUES ('$login','$password', 'praepostor', '$seccession', '$ggroup')");
			database::close($mysqli); 
			header("Location: /app/praepostor");
		}
        
        public static function NewsAdd($title, $text) {

			AppController::session_check();
			AppController::check('admin');

			$title = htmlspecialchars($title);
			$text = htmlspecialchars($text);
			$mysqli = database::connect();
			$mysqli->query("INSERT INTO `news`(`title`, `text`) VALUES ('$title','$text')");
			database::close($mysqli); 
			header("Location: /app/news");
		}
		public static function NewsUpdate($id, $title, $text) {
			AppController::session_check();
			AppController::check('admin');
			
			$id = htmlspecialchars($id);
			$title = htmlspecialchars($title);
			$text = htmlspecialchars($text);

			$mysqli = database::connect();
			$mysqli->query("UPDATE `news` SET `title`='$title',`text`='$text' WHERE id = '$id'");
			database::close($mysqli); 
			header("Location: /app/news");
		}
		public static function NewsRemove($id) {
			AppController::session_check();
			AppController::check('admin');

			if(!$id) return print('Ошибка');

			$mysqli = database::connect();
			$mysqli->query("DELETE FROM `news` WHERE id = '$id'");
			database::close($mysqli); 
			header("Location: /app/news");
		}
        
        public static function HomeworkAdd($predmet, $text) {

			AppController::session_check();
			AppController::check('praepostor');

			$predmet = htmlspecialchars($predmet);
			$text = htmlspecialchars($text);
			$seccession = htmlspecialchars($_SESSION["seccession"]);
			$ggroup = htmlspecialchars($_SESSION["ggroup"]);

			$mysqli = database::connect();
			$mysqli->query("INSERT INTO `homework`(`predmet`, `text`, `seccession`, `ggroup`) VALUES ('$predmet','$text','$seccession','$ggroup')");
			database::close($mysqli); 
			header("Location: /app/homework");
		}
		public static function HomeworkRemove($id) {

			AppController::session_check();
			AppController::check('praepostor');

			if(!$id) return print('Ошибка');

			$mysqli = database::connect();
			$mysqli->query("DELETE FROM `homework` WHERE id = '$id'");
			database::close($mysqli); 
			header("Location: /app/homework");
		}
		public static function HomeworkUpdate($id, $predmet, $text) {
            
            AppController::session_check();
			AppController::check('praepostor');
            
			$id = htmlspecialchars($id);
			$predmet = htmlspecialchars($predmet);
			$text = htmlspecialchars($text);

			$seccession = htmlspecialchars($_SESSION["seccession"]);
			$ggroup = htmlspecialchars($_SESSION["ggroup"]);

			$mysqli = database::connect();
			$mysqli->query("UPDATE `homework` SET `predmet`='$predmet',`text`='$text' WHERE id = '$id' and seccession = '$seccession' and ggroup = '$ggroup'");
			database::close($mysqli); 
			header("Location: /app/homework");
		}
        
        public static function PlaneUpdate() {
        
			AppController::session_check();
			AppController::check('praepostor');
            
			$seccession = $_SESSION["seccession"];
			$group = $_SESSION["ggroup"];

			$mysqli = database::connect();
			$mysqli->query("DELETE FROM `plane` WHERE seccession = '$seccession' and ggroup = '$group'");
			database::close($mysqli); 

			if($seccession == 'aivt') $filename = $seccession.'.xlsx';
			else $filename = $seccession.'.xls';
		
		
			require(__DIR__ . '/../Excel/PHPExcel.php');
			$tabs = array('E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ');

			$table = ExcelController::search($group, $tabs, 10, $filename);	
            
			ExcelController::getdatatable(11,24, $table, 'Понедельник', $seccession, $group, $filename);
			ExcelController::getdatatable(25,39, $table, 'Вторник', $seccession, $group, $filename);
			ExcelController::getdatatable(40,53, $table, 'Среда', $seccession, $group, $filename);
			ExcelController::getdatatable(54,67, $table, 'Четверг', $seccession, $group, $filename);
			ExcelController::getdatatable(68,80, $table, 'Пятница', $seccession, $group, $filename);
			ExcelController::getdatatable(82,93, $table, 'Суббота', $seccession, $group, $filename);
            
			return header("Location: /app/plane");          
            
        }
        public static function PlaneEdit() {

			AppController::session_check();
			AppController::check('praepostor');

			$id = htmlspecialchars($_GET["value"]); 
			$predmet = htmlspecialchars($_GET["predmet"]); 
			$seccession = htmlspecialchars($_SESSION["seccession"]); 
			$group = htmlspecialchars($_SESSION["ggroup"]);
			
			$mysqli = database::connect();
			$mysqli->query("UPDATE `plane` SET `predmet`='$predmet' WHERE id = '$id' and seccession = '$seccession' and ggroup = '$group'");
			database::close($mysqli); 
			return print('{"status": "success", "msg": "Успешно"}');
		}
        public static function PlaneDelete() {
            
			AppController::session_check();
			AppController::check('admin');
            
			$mysqli = database::connect();
			$mysqli->query("TRUNCATE TABLE plane");
			database::close($mysqli); 
			return header("Location: /app/main");
		}
        
        public static function AllUpdate() {
            
            AppController::session_check();
			AppController::check('admin');
            
            $mysqli = database::connect();
            $mysqli->query("DELETE FROM `users` WHERE role = 'praepostor'");
            $mysqli->query("TRUNCATE TABLE groups");
            $mysqli->query("TRUNCATE TABLE plane");
            
            $seccessions = array('aivt.xlsx', 'td.xls', 'awc.xls');

			require(__DIR__ . '/../Excel/PHPExcel.php');

			$tabs = array('E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ');
            
			foreach ($seccessions as $filename) {
                
				$Excel = ExcelController::fileUpdate($filename);
                
				$sc = explode('.xlsx', $filename);
				$sc = explode('.xls', $filename);
				$sc = $sc[0];
                
				foreach($tabs as $r) {
					if($Excel->getActiveSheet()->getCell($r.'10')->getValue()) {
						$group = $Excel->getActiveSheet()->getCell($r.'10')->getValue();
						$mysqli->query("INSERT INTO `groups`(`sgroup`, `seccession`, `file`) VALUES ('$group','$sc', '$filename')");
					}
				}
			}
			print('Обновлено <a href="/app/main">Перейти в App панель</a>');
            
			database::close($mysqli); 
        }
        
        /* Auth */
        public static function checkUser($login, $password) {
                if(($login == "") || ($password == "")) return false;
                $mysqli = database::connect();
                $sql = $mysqli->query("SELECT password FROM users WHERE login = '$login'");
                $u = $sql->fetch_assoc();
                $access = $u["password"];
                database::close($mysqli); 
                return $access == $password;
            }
        public static function session_check() {
                    if(!AppController::checkUser($_SESSION["login"], $_SESSION["password"])) return header('Location: /app/logout'); 
                    if(!isset($_SESSION["role"])) return header('Location: /app/logout');	
                    if(!isset($_SESSION["seccession"])) return header('Location: /app/logout');	
                    if(!isset($_SESSION["ggroup"])) return header('Location: /app/logout');	
            }
        public static function check($role) {	
			if($_SESSION["role"] != $role) return header('Location: /app/');
		}
    }
    
    class ExcelController {
        public static function search($group, $tab, $int, $filename) {
		  $Excel = ExcelController::fileUpdate($filename);
		  foreach($tab as $t) if($Excel->getActiveSheet()->getCell($t.$int)->getValue() == $group) return $t;
        }
        public static function fileUpdate($seccession) {
            $filename = __DIR__ . '/../cache/'.$seccession; 
            file_put_contents($filename, file_get_contents('http://ktk-45.ru/images/Raspisanie/'.$seccession));	
            return PHPExcel_IOFactory::load($filename);
        }
        public static function getdatatable($min, $max, $table, $day, $seccession, $ggroup, $filename) {
            $Excel = ExcelController::fileUpdate($filename);
            $mysqli = database::connect();
            for ($i = $min; $i <= $max; $i++) {
                $s = $Excel->getActiveSheet()->getCell($table.$i )->getValue();
                if($Excel->getActiveSheet()->getCell($table.$i )->getValue() == null) $s = '...';
                if($i % 2 == 0) $mysqli->query("INSERT INTO `plane`(`predmet`, `seccession`, `ggroup`, `day`) VALUES ('$s','$seccession', '$ggroup', '$day')");
            }
            database::close($mysqli); 
        }  
    }