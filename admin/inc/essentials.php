<?php
    // FRONT END PURPOSE
    define('SITE_URL','http://http://k0c4w8480gcw48kswg4cw0kc.146.190.103.211.sslip.io/gymko/');
    define('ABOUT_IMG_PATH', SITE_URL . 'images/about/');
    define('CAROUSEL_IMG_PATH', SITE_URL . 'images/carousel/');
    define('TRAINORS_IMG_PATH', SITE_URL . 'images/trainors/');

    // BACK END PURPOSE
    define('UPLOAD_IMAGE_PATH', getenv('UPLOAD_IMAGE_PATH') ?: __DIR__ . '/images/');
    define('ABOUT_FOLDER', 'about/');
    define('CAROUSEL_FOLDER', 'carousel/');
    define('USERS_FOLDER', 'users/');
    define('TRAINORS_FOLDER', 'trainors/');

    function adminLogin()
    {
        session_start();
        if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] === true)) {
            echo "<script>window.location.href='index.php';</script>";
            exit;
        }
    }

    function redirect($url)
    {
        echo "<script>window.location.href='$url';</script>";
        exit;
    }

    function alert($type, $msg)
    {
        $bs_class = ($type === "success") ? "alert-success" : "alert-danger";
        echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert text-center" role="alert">
                <strong class="me-3">$msg</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
    }
?>
