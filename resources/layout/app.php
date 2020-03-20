<!doctype html>
<html>
  <head>
    <title>Главная Веб-кабинет</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
     <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  </head>
  <body class="bg-light">
  <div class="wrapper">

  <nav id="sidebar">
      <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
      </div>
      <div class="sidebar-header">
        <div class="logosidebar"></div>  
      </div>
      <ul class="list-unstyled components">
        <li>
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Редактирование данных</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a href="/editing/groups">Группа</a>
            </li>
            <li>
              <a href="/editing/students">Студенты</a>
            </li>
            <li>
              <a href="#">Родители</a>
            </li>
            <li>
              <a href="#">Расписание сегодня</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">Студенты</a>
        </li>
        <li>
          <a href="#">Списки групп</a>
        </li>
        <li>
          <a href="#">Журнал пропусков</a>
        </li>         
      </ul>
    </nav>      

    <!-- <div id="loading" class="center box-shadow" style="display: none;"><div class="loader-5 center"><span></span></div></div>

      
      
    <nav class="navbar navbar-expand-lg navbar-light bg-white box-shadow">
            <div class="container">
              <a class="navbar-brand" href="/app/main">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                  App Panel
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <?php if($_SESSION["role"] == 'admin') { ?>  
                  <li class="nav-item">
                    <a class="nav-link" href="/app/praepostor"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Старосты</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/app/news"><i class="fa fa-briefcase" aria-hidden="true"></i> Новости </a>
                  </li>
                  <?php } else { ?>    

                    <li class="nav-item">
                        <a class="nav-link" href="/app/homework"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Домашняя работа</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/plane"><i class="fa fa-briefcase" aria-hidden="true"></i> Расписание </a>
                    </li>

                  <?php } ?> 

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?php print(htmlspecialchars($_SESSION["login"])); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/app/logout">Выход</a>
                        </div>
                    </li>
                </ul>  
              </div>
          </div>       
    </nav> -->
      
  <div class="container p-3 mb-4"><?php require(__DIR__ . '/../'.$empty); ?></div>
  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="/assets/js/alljs.js"></script> 
  </body>
</html>   