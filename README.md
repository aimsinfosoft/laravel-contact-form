
# Laravel-contact-form package

The laravel contact form package is a customizable and easy-to-use package designed to quickly integrate a fully functional contact form into any Laravel project. This package provides seamless form management, email notifications, and storage of contact form submissions in the database.


# Installation

To install the package, run the command:

```bash
composer require aimsinfosoft/laravel-contact-form
```

After installation, you need to publish the configuration file:

```bash
php artisan vendor:publish --tag=contactform-config
```

After installation, you need to publish the public assets file:

```bash
php artisan vendor:publish --tag=public
```

After installation, you need to Change in ```config/contactform.php``` file.

Locate the following line:
```config file
'admin_email'=> 'admin_email'=>env('ADMIN_EMAIL',''); 
```

Change it to: 
```config file
'admin_email'=>env('MAIL_FROM_ADDRESS','');
```

After making the changes, you need to follow these steps to create a new database and set SMTP details in the ```.env``` file

#### Database Configuration
```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=laravel_contact
DB_USERNAME=root
DB_PASSWORD=
````

#### SMTP Configuration
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=test@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

After that, you can run the migration:

```
php artisan migrate
```
After that, you need to run this command.

```
php artisan serve
```  










    
## Usage

#### Registering the routes

#### Define contact form types

Default configuration file include default contact form type with ``` name ```,``` email```, ```message```fields.

``` contact 
 public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        contact::create($validated);
        
        $admin_email=\config('contactform.admin_email');
        if($admin_email===null || $admin_email===''){ echo 'The value of admin email not set';
        }
        Mail::to($validated['email'])->send(new contact_mail($validated));
        return back()->with('success', 'Your message has been sent successfully!');
    }
```

#### Examples

Here is example of sends email to the administrator and users.

```mail
Mail::to($validated['email'])->send(new contact_mail($validated));
```
Request to contact-form :

```url
your-project-url/contact-form
```
Example:

```exmple
http://127.0.0.1:8000/contact-form

```
#### Error response:
```error
@error('name')
    <div class="error-message">{{ $message }}</div>
@enderror
@error('email')
    <div class="error-message">{{ $message }}</div>
@enderror
@error('message')
    <div class="error-message">{{ $message }}</div>
@enderror
```
#### Success response:

```success
@session('success')
    <div class="alert alert-success">{{ session('success')}}</div>
@endsession
```

You can see the frontend contact form by using this URL: ```http://127.0.0.1:8000/contact-form```.









   
## Customization

### Overriding a View File

To override a view file from a package (e.g., `vendor/aimsinfosoft/laravel-contact-form/example.blade.php`), you should follow these steps:

Steps:

* Create the folder structure: Inside the `resources/views` directory, create the `vendor/contactform/` folder.

    Path:  

    ```path
    resources/views/vendor/contactform/
    ```
* #### Copy the package’s view file: 
    Copy the view file (e.g., ```example.blade.php```) from the package’s ```vendor/contactform/``` directory into the newly created folder in ```resources/views/vendor/contactform/```.

    example: 
    ``` 
    resources/views/vendor/contactform/example.blade.php
    ```
 
### Overriding a Controller File

To override a controller file from a package (e.g., ```vendor/aimsinfosoft/laravel-contact-form/src/Http/Controllers/ExampleController.php```), follow these steps:

Steps:

* Create the folder structure: Inside the ```app/Http/Controllers/``` directory, create the necessary subfolders to match the package’s controller file location.

    Path:
   ```path
   app/Http/Controllers/vendor/contactform/src/Http/Controllers/
    ```

* Copy the package’s controller file: Copy the controller file (e.g., `ExampleController.php`) from the package’s `vendor/contactform/src/Http/Controllers/` directory into the `app/Http/Controllers/vendor/contactform/src/Http/Controllers/` directory.

    example:

    ```
    app/Http/Controllers/vendor/contactform/src/Http/Controllers/ExampleController.php
    ```

### Overwrite the Assets Folder

To override a assets folder from a package, you need to run this command:

```
php artisan vendor:publish --tag=public
```
After installation, you need to check a public folder in the directory.

exmple:

```
public/vendor/contactform
```
