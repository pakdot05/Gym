<?php
    define('SITE_URL', 'http://k0c4w8480gcw48kswg4cw0kc.146.190.103.211.sslip.io/gymko/');
    define('ABOUT_IMG_PATH', SITE_URL . 'images/about/');
    define('CAROUSEL_IMG_PATH', SITE_URL . 'images/carousel/');
    define('TRAINORS_IMG_PATH', SITE_URL . 'images/trainors/');

    // BACK END PURPOSE
  define('UPLOAD_IMAGE_PATH', '/'http://k0c4w8480gcw48kswg4cw0kc.146.190.103.211.sslip.io/gymko/images/'); 
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

    // Example of uploading an image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_file = UPLOAD_IMAGE_PATH . basename($_FILES['image']['name']);

        // Check if directory exists, create it if not
        if (!is_dir(UPLOAD_IMAGE_PATH)) {
            mkdir(UPLOAD_IMAGE_PATH, 0755);
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "File already exists";
        } else {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                echo "The file ". basename( $_FILES['image']['name']). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
?>
