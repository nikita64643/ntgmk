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
        <!--<li>
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
            <h1 class="text-center">Ввод и редактирование студентов</h1>
          </div>
        </div>
        <div class="row d-flex justify-content-around mt-5 block">
          <div class="col-12 col-md-12">
            <form>
              <div class="row my-3">   
                <div class="form-group">
                  <select class="form-control mx-5" id="exampleFormControlSelect4">
                    <option>Выберите группу</option>
                    <option>861</option>
                  </select>
                </div>
                <div class="form-check form-check-inline mx-5 height">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Действующий студент</label>
                </div> 
              </div>
              <div class="row my-3">  
                <div class="col-12 col-md-3">
                  <input type="text" class="form-control my-1" placeholder="Фамилия">
                </div>
                <div class="col-12 col-md-3">
                  <input type="text" class="form-control my-1" placeholder="Имя">
                </div>
                <div class="col-12 col-md-3">
                  <input type="text" class="form-control my-1" placeholder="Отчество">
                </div>
                <div class="col-12 col-md-3">
                  <input type="date" class="form-control my-1" id="date" name="date" placeholder="Дата рождения">
                </div>
              </div>
              <div class="row my-3"> 
                <div class="col-12 col-md-3">
                  <input type="text" class="form-control my-1" placeholder="Школа">
                </div>
                <div class="col-12 col-md-3">
                  <input type="text" class="form-control my-1" placeholder="Адрес">
                </div>
                <div class="col-12 col-md-3">
                  <input type="text" class="form-control my-1" placeholder="Комната в общежитии">
                </div>
                <div class="col-12 col-md-3">
                  <input type="tel" name="phone" id="phone" class="my-1 form-control bfh-phone" placeholder="Номер телефона" data-format="+7 (ddd) ddd-dddd" value="" pattern="(\+[\d\ \(\)\-]{16})" />
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row d-flex justify-content-around mt-2 block">
          <div class="col-12 col-md-12">
            <h2 class="text-center">Организационные настройки</h2>
          </div>
          <div class="col-12 col-md-12">
            <form>
              <div class="row">
              <div class="col-12 col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect2">Должность в группе</label>
                  <select multiple class="form-control" id="exampleFormControlSelect2">
                    <option>Староста</option>
                    <option>Замстаросты</option>
                    <option>Главный дежурный</option>
                    <option>Физорг</option>
                    <option>Профорг</option>
                    <option>Ответственный за журнал</option>
                  </select>
                </div>   
              </div>  
              <div class="col-12 col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Подгруппы</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                  </select>
                </div> 
              </div>  
              <div class="col-12 col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect3">Выбор группы ин. языка</label>
                  <select multiple class="form-control" id="exampleFormControlSelect3">
                    <option>Английский</option>
                    <option>Немецкий</option>
                    <option>Французский</option>
                  </select>
                </div>                
              </div>          
            </form>
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-around block">
        <div class="col-12 col-md-12">
          <h2 class="text-center">Дополнительные данные</h2>
        </div>
        <div class="col-12 col-md-12 mt-2 mb-5">
          <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-around mt-4">
        <div class="col-12">
          <a href="#" class="makeplans float-none d-block text-center">Записать в группу</a>
        </div>
      </div>
      <div class="row d-flex justify-content-around mt-4">
        <div class="col-12">
          <a href="#" class="makeplans float-left">Назад</a>
          <a href="#" class="makeplans float-right">Далее</a>
        </div>
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