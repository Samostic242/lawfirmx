To Set up the application 
1- Kindly clone the github repository from Github through the link
2- After sucessfully cloning it, run composer install in order to install the neccessary dependencies
3- Once operation Two is successful, proceed to configure the environmental variables by adding the following details
//for connection to the database
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

//for mailing, mailtrap was used, add the corresponding details
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls

The images of the clients are uploaded to cloudinary, Consequently, supply your cloudinary credentials
CLOUDINARY_URL=
CLOUDINARY_UPLOAD_PRESET=
CLOUDINARY_NOTIFICATION_URL=

Note, If application key is empty in the env file, Run the php artisan key:generate command to generate the APP_KEY:

4 Kindly proceed to run the migration command to create the corresponding tables in the database [php artisan migrate]

Once you are all caught up with this, you can proceed to run the php artisan serve command to start up the server and follow the url to visit the application


The application DEMO is live on heroku, you can follow this link to visit!
http://lawfirmx.herokuapp.com/
