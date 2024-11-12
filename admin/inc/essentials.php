<?php
// Start session at the very beginning of the file, ensuring no whitespace or output before this
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Define constants
define('SITE_URL', 'http://hkc0s08c4so4k8k0ck8wk8gs.146.190.103.211.sslip.io/');
define('ABOUT_IMG_PATH', SITE_URL . 'images/about/');
define('CAROUSEL_IMG_PATH', SITE_URL . 'images/carousel/');
define('TRAINORS_IMG_PATH', SITE_URL . 'images/trainors/');
define('UPLOAD_IMAGE_PATH', '/app/gymko/images/');
define('ABOUT_FOLDER', 'about/');
define('CAROUSEL_FOLDER', 'carousel/');
define('USERS_FOLDER', 'users/');
define('TRAINORS_FOLDER', 'trainors/');

function adminLogin() {
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] === true)) {
        header('Location: index.php');
        exit;
    }
}

function redirect($url) {
    header("Location: $url");
    exit;
}


// Alert function
function alert($type, $msg) {
    $bs_class = ($type === "success") ? "alert-success" : "alert-danger";
    echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show custom-alert text-center" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
}
