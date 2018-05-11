<?php 

// include cloudinary files
require('cloudinary/Cloudinary.php');
require('cloudinary/Uploader.php');
require('cloudinary/Api.php');

\Cloudinary::config(array(
    "cloud_name" => "YOUR CLOUDINARY NAME",
    "api_key" => "YOUR CLOUDINARY API KEY",
    "api_secret" => "EkGD-YOUR CLOUDINARY API SECRET"
));

?>
