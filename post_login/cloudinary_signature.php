<?php

// include Cloudinary files
include_once('../cloudinary_settings.php');

    if(isset($_GET['data']))
    {
        echo \Cloudinary::api_sign_request($_GET['data'], 'EkGD-AZvVIy9wl7KnfB_3QgffVk'); // CLOUDINARY API SECRET
    }
?>