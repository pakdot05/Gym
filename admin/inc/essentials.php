<?php

    // FRONT END PURPOSE
    define('SITE_URL','http://http://k0c4w8480gcw48kswg4cw0kc.146.190.103.211.sslip.io/gymko/');
    define('ABOUT_IMG_PATH', SITE_URL . 'images/about/');
    define('CAROUSEL_IMG_PATH', SITE_URL . 'images/carousel/');
    define('TRAINORS_IMG_PATH', SITE_URL . 'images/trainors/');

    // BACK END PURPOSE (Using Relative Path)
    define('UPLOAD_IMAGE_PATH', __DIR__ . '/images/'); // Relative path
    define('ABOUT_FOLDER', 'about/');
    define('CAROUSEL_FOLDER', 'carousel/');
    define('USERS_FOLDER', 'users/');
    define('TRAINORS_FOLDER', 'trainors/');

    function uploadImage($image, $folder) {
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];

        // Check if the MIME type is valid
        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img'; // INVALID IMAGE MIME OR FORMAT
        } else {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_' . random_int(11111, 99999) . "." . $ext; 

            // Set image path using relative directory
            $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;

            // Move the uploaded file to the destination path
            if (move_uploaded_file($image['tmp_name'], $img_path)) {
                return $rname; // Image upload successful
            } else {
                return 'upd_failed'; // Image upload failed
            }
        }
    }

    function deleteImage($image, $folder) {
        $img_path = UPLOAD_IMAGE_PATH . $folder . $image;
        return unlink($img_path); // Return true or false based on success
    }

    function uploadUserImage($image) {
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];

        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img'; // INVALID IMAGE MIME OR FORMAT
        } else {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_' . random_int(11111, 99999) . ".jpeg";

            // Set image path using USERS_FOLDER for user-specific uploads
            $img_path = UPLOAD_IMAGE_PATH . USERS_FOLDER . $rname;

            if (move_uploaded_file($image['tmp_name'], $img_path)) {
                return $rname;
            } else {
                return 'upd_failed';
            }
        }
    }

?>
     
