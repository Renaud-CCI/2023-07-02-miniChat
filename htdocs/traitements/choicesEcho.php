<?php

if (!isset($_GET['theme'])){
    echo '
        <div class="row mt-5">
        <div class="col col-lg-4 col-md-4 col-sm-4 ">
        <form action="./traitements/choicesEcho.php" method="get">
            <input type="hidden" name="theme" value="HTML-CSS">
            <button type="submit" value="HTML-CSS">
            <img src="IMAGES/coding.png" alt="" height="120" width="120">
            </button>
        </form>
        </div>
        <div class="col col-lg-4 col-md-4 col-sm-4">
        <form action="./traitements/choicesEcho.php" method="get">
            <input type="hidden" name="theme" value="JavaScript">
            <button type="submit" value="JavaScript">
            <img src="IMAGES/js.png" alt="" height="120" width="120">
            </button>
        </form>
        </div>
        <div class="col col-lg-4 col-md-4 col-sm-4">
        <form action="./traitements/choicesEcho.php" method="get">
            <input type="hidden" name="theme" value="PHP">
            <button type="submit" value="PHP">
            <img src="IMAGES/php.png" alt="" height="120" width="120">
            </button>
        </form>
        </div>
        </div>
    ';
} else {
    switch ($_GET['theme']) {
        case "HTML-CSS" :
            header('Location:../index.php?theme=HTML-CSS');
            break;
        case "JavaScript":
            header('Location:../index.php?theme=JavaScript');
            break;
        case "PHP":
            header('Location:../index.php?theme=PHP');
            break;
        case "destroy":
            unset($_GET['theme']);
            header('Location:../index.php');
            break;
    }
    
}