
# Laravel-contact-form package

The laravel contact form package is a customizable and easy-to-use package designed to quickly integrate a fully functional contact form into any Laravel project. This package provides seamless form management, email notifications, and storage of contact form submissions in the database.


# Installation

To install the package, run the command:

```bash
composer require laracontact/contactform
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
