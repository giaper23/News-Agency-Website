# News-Agency-Website

<b>Description</b>:<br>
A News Agency Website featuring a <b>CUSTOM CMS for CRUD operations</b>  (<b>Bootstrap, jQuery, PHP, MySQL</b>) - <b>AJAX</b>

----------------------------
<b>Info</b>:

I had the responsibility of building the Back-End and deploying the project while also helping our Front-End team wherever they needed me. My original plan was to use Laravel but due to complications I had to scrap and rebuild the project without the help of a framework. Below is a list of features I built for this project while on tight schedule and under pressure.

----------

<b>My Features</b>:

* Form/Input Validation (Front-End, Back-End)
* Registration (Email Confirmation)
* Forgot Password (Email Confirmation)
* Contact Form
* Subscribe to mailing list (AJAX)
* Unsubscribe from mailing list (AJAX)
* Login
* Logout
* User Dashboard (CRUD his Comments, Change Profile Image, Change Password)
* Admin Dashboard (CRUD on Articles/Comments, Change Profile Image, Change Password)
* Live Search (AJAX)
* Bring All/By Category Articles
* Related Articles (Articles from the same category)
* Popular Articles (Articles with most comments)
* Custom Clock/Date Widget (jQuery, PHP)-AJAX
* reCaptcha v3

---------------

<b>Instructions</b>:

1. Install <b>Composer</b> (https://getcomposer.org/) and download <b>PHP dotenv</b> with ---> <b>$ composer require vlucas/phpdotenv</b>
(Detailed instructions ---> https://github.com/vlucas/phpdotenv)
2. Get your <b>reCaptcha v3</b> keys from Google (https://www.google.com/recaptcha/intro/v3.html)
3. Rename <b>.env.example</b> to <b>.env</b> and CHANGE your CREDENTIALS for local version (Some defaults already used for DB)
4. Import <b>cosmosnewsagency_db.sql</b> file to the DB
5. Use the accounts below to test admin/user dashboard:

* Admin: username ---> admin@cosmosnewsagency.eu // password ---> admin1234!@#$
* User: username ---> user@cosmosnewsagency.eu // password ---> user1234!@#$

(You can also import a user in the DB using a <b>BCRYPT</b> password and SET the <b>USER LEVEL</b> to <b>1</b> for admin rights)

<b>WARNING</b>: (Forgot password feature will not work with a fake email like the above accounts because of email confirmation!)

* Accounts also work in live version! I keep backup files to reset the DB in case anyone thinks he's funny! ;)
