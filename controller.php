<!DOCTYPE html>
<?php
    session_start();
    #$_SESSION['user_id'] = 1234;
	$url = explode('/', $_SERVER['REQUEST_URI']);

	if(!isset($_GET['request'])) {
        require_once("view/header.php");

        switch($url[1]) {
			case '':
                require('home.php');
            case 'admin':
                require('file/admin.php');
                break;
			case 'faq':
				require('view/faq.php');
            default:
                require('404.php');
        }

        require_once("view/footer.php");

    } else {
        switch($url[1]) {
            case 'upload':
                require('upload.php');
                break;
        }
    }

?>
