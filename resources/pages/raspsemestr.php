<!DOCTYPE html>
<html>
  <head>
    <title>Блокнот Веб-кабинет</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
     <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  </head>
  
  <body>   
  <div class="wrapper">
    <nav id="sidebar">
      <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
      </div>
      <div class="sidebar-header">
        <div class="logosidebar"></div>  
      </div>
      <ul class="list-unstyled components">
       <!-- <li>
          <a class="active" href="/page/notebook.php">Блокнот</a>
        </li>  -->
        <li>
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Редактирование данных</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a href="/page/group.php">Группа</a>
            </li>
            <li>
              <a href="/page/students.php">Студенты</a>
            </li>
            <li>
              <a href="/page/parents.php">Родители</a>
            </li>
            <li>
              <a href="/page/rasp.php">Расписание сегодня</a>
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
          <a href="/page/journal.php">Журнал пропусков</a>
        </li>         
      </ul>
    </nav>     
    <div id="content">
      <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fas fa-align-left"></i>
        </button>
        <div class="row d-flex justify-content-around mt-5">
          <div class="col-12 col-md-12">
            <h1 class="text-center">Расписание семестр</h1>
            <!--<p class="date text-center">03.06.2019</p>-->
          </div>
        </div>
        <form class="semestr">
          <div class="row d-flex justify-content-around mt-5">
            <div class="col-12 col-md-4">     
              <p>Понедельник</p>       
              <input type="text" class="form-control my-1" placeholder="1 пара">
              <input type="text" class="form-control my-1" placeholder="2 пара">
              <input type="text" class="form-control my-1" placeholder="3 пара">
              <input type="text" class="form-control my-1" placeholder="4 пара">
              <input type="text" class="form-control my-1" placeholder="5 пара">
            </div>
            <div class="col-12 col-md-4">                       
              <p>Вторник</p>       
              <input type="text" class="form-control my-1" placeholder="1 пара">
              <input type="text" class="form-control my-1" placeholder="2 пара">
              <input type="text" class="form-control my-1" placeholder="3 пара">
              <input type="text" class="form-control my-1" placeholder="4 пара">
              <input type="text" class="form-control my-1" placeholder="5 пара">
            </div>
            <div class="col-12 col-md-4">
              <p>Среда</p>       
              <input type="text" class="form-control my-1" placeholder="1 пара">
              <input type="text" class="form-control my-1" placeholder="2 пара">
              <input type="text" class="form-control my-1" placeholder="3 пара">
              <input type="text" class="form-control my-1" placeholder="4 пара">
              <input type="text" class="form-control my-1" placeholder="5 пара">
            </div>
            <div class="col-12 col-md-4"> 
              <p>Четверг</p>       
              <input type="text" class="form-control my-1" placeholder="1 пара">
              <input type="text" class="form-control my-1" placeholder="2 пара">
              <input type="text" class="form-control my-1" placeholder="3 пара">
              <input type="text" class="form-control my-1" placeholder="4 пара">
              <input type="text" class="form-control my-1" placeholder="5 пара"> 
            </div>
            <div class="col-12 col-md-4"> 
              <p>Пятница</p>       
              <input type="text" class="form-control my-1" placeholder="1 пара">
              <input type="text" class="form-control my-1" placeholder="2 пара">
              <input type="text" class="form-control my-1" placeholder="3 пара">
              <input type="text" class="form-control my-1" placeholder="4 пара">
              <input type="text" class="form-control my-1" placeholder="5 пара">
            </div>
            <div class="col-12 col-md-4"> 
              <p>Суббота</p>       
              <input type="text" class="form-control my-1" placeholder="1 пара">
              <input type="text" class="form-control my-1" placeholder="2 пара">
              <input type="text" class="form-control my-1" placeholder="3 пара">
              <input type="text" class="form-control my-1" placeholder="4 пара">
              <input type="text" class="form-control my-1" placeholder="5 пара"> 
            </div>                                                     
            <a href="#" class="makeplans float-none d-block text-center">Записать</a>                                 
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="overlay"></div>
  
  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  
  <script src="/js/alljs.js"></script> 
  
  </body>

</html>