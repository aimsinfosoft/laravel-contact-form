#laravel-contact-form pcakage 
Step 1: 
run command to composer :
 => composer require laracontact/contactform
 => php artisan vendor:publish --tag=contactform-config
 => php artisan vendor:publish --tag=public
 
Step 2: 
Change in config/contactform.php file.

=> 'admin_email'=> 'admin_email'=>env('ADMIN_EMAIL','') change =>  'admin_email'=>env('MAIL_FROM_ADDRESS','')
 
Step 3: 
create new database and step database details in .env file

Step 4: 
set Smtp Details in env file :

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=test@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

Step 5
after run this command and composer : php artisan migrate

Step 6
run command: php artisan serve :
=> http://127.0.0.1:8000/contact-form

