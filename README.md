# PasswordResetPHP (and Multiple File Upload)
PHP MySQL FileMaker User Registration System with Secure Password Reset and Multiple File Upload

User registration and secure password reset code.
With registration, login, and password reset pages.

Also includes code for uploading files to your web server and to a <a href="https://cloudinary.com/">Cloudinary</a> account.

Built using PHP, MySQL, FileMaker API for PHP, FileMaker, jQuery and Bootstrap 4.
You can use either MySQL or FileMaker as your database. Sample MySQL and FileMaker databases included.

The FileMaker database includes scripts to dynamically create FileMaker accounts and put uploaded files into a container field.


**NOTE: The FileMaker username is Admin, password is admin.**
 
**NOTE:** This code stores passwords in the database in plain text. <strong>Never store passwords in plain text!</strong> It is only done here for demonstration purposes. If you use this code in a real site remove all references to the **password_plaintext** field from **register.php** and **reset_password.php** and remove the **password_plaintext** field from the **user** table.


## Inspiration
* [Everything you ever wanted to know about building a secure password reset feature](https://www.troyhunt.com/everything-you-ever-wanted-to-know/)
* [PHP: simple multiple file upload](https://gist.github.com/N-Porsh/7766039)
* [Handling File Upload With Cloudinary](https://cloudinary.com/blog/file_upload_with_php#handling_file_upload_with_cloudinary)


## Screenshots
a
![multiple field upload form](https://github.com/asktami/PasswordResetPHP/blob/master/img/Screenshots/multiple_file_upload.png)

![registration pageflow](https://github.com/asktami/PasswordResetPHP/blob/master/__PAGEFLOWS/Registration_Pageflow.png)
![reset password pageflow](https://github.com/asktami/PasswordResetPHP/blob/master/__PAGEFLOWS/Reset_Password_Pageflow.png)

![registration form](https://github.com/asktami/PasswordResetPHP/blob/master/img/Screenshots/1_registration_form.png)
![login form](https://github.com/asktami/PasswordResetPHP/blob/master/img/Screenshots/2_login_form.png)
![forgot password form](https://github.com/asktami/PasswordResetPHP/blob/master/img/Screenshots/3_forgot_password_form.png)
![post login dashboard](https://github.com/asktami/PasswordResetPHP/blob/master/img/Screenshots/4_post_login_dashboard.png)
![password reset email](https://github.com/asktami/PasswordResetPHP/blob/master/img/Screenshots/5_password_reset_email.png)
![password reset email sent](https://github.com/asktami/PasswordResetPHP/blob/master/img/Screenshots/6_password_reset_email_sent.png)
![password reset email error](https://github.com/asktami/PasswordResetPHP/blob/master/img/Screenshots/7_password_reset_error_email.png)
![reset password form](https://github.com/asktami/PasswordResetPHP/blob/master/img/Screenshots/8_reset_password_form.png)
