yii2-advanced-api-template 
======================

Yii2-advanced-template is based on yii2-app-advanced created by yii2 core developers. That being said the yii2-advanced-api-template is based on the yii2-advanced-template.

There are several upgrades made to this template, including both Nenand's and Sandy's changes

1. Support for an off webroot API application that can be used for a service layer or what ever you might want to call it. It has no view configuration.
2. This template has additional features listed in the next section of this guide.
3. Application structure has been changed to be 'shared hosting friendly'.
4. Added example modules and set up for REST as well as simple ajax api like calls with versions of the API (Via Modules and Routing)

Features (Most From Yii2-advanced-template)
-------------------

- Signup with/without account activation
    - You can chose whether or not new users need to activate their account using email account activation system before they can log in. (see: common/config/params.php).
- Login using email/password or username/password combo.
    - You can chose how users will login into system. They can log in either by using their username|password combo or email|password. (see: common/config/params.php).
- Rbac tables are installed with other migrations when you run ```yii migrate``` command.
    - RbacController's init() action will insert 5 roles and 2 permissions in our rbac tables created by migration.
    - Roles can be easily assigned to users by administrators of the site (see: backend/user).
    - Nice example of how to use rbac in your code is given in this application. See: BackendController.
- Users with editor+ roles can create articles.
- Session data is stored in database out of box.
- System setting are stored in config/params.php file ( changes from v2 ).
- Theming is supported out of the box.
- Translation is supported out of the box.
- Administrators and The Creator can manage users ( changes from v2 ).
- Password strength validation and strength meter.
- All functionalities of default advanced template are included in this template.
- Code is heavily commented out.
- New API support with simple versioning. The folder structure is similar to the backend with some UI code and related directories removed


Installation
-------------------
>I am assuming that you know how to: install and use Composer, and install additional packages/drivers that may be needed for you to run everything on your system. In case you are new to all of this, you can check my guides for installing default yii2 application templates, provided by yii2 developers, on Windows 8 and Ubuntu based Linux operating systems, posted on www.freetuts.org.

1. Create database that you are going to use for your application (you can use phpMyAdmin or any
other tool you like).

2. Now open up your console and ```cd``` to your web root directory, 
for example: ``` cd /var/www/sites/ ```

3. Run the Composer ```create-project``` command:

   ``` composer create-project sganz/yii2-advanced-api-template advanced ```

4. Once template is downloaded, you need to initialize it in one of two environments:
development (dev) or production (prod). Change your working directory to ```_protected``` 
and execute ```php init``` command.

   ```cd advanced/_protected/```

   ```php init ```

   Type __0__ for development, execute coomant, type __yes__ to confirm, and execute again.

5. Now you need to tell your application to use database that you have previously created.
Open up main-local.php config file in ```advanced/_protected/common/config/main-local.php``` 
and adjust your connection credentials.

6. Back to the console. It is time to run yii migrations that will create necessary tables in our database.
While you are inside ```_protected``` folder execute ```./yii migrate command```:

   ``` ./yii migrate ``` or if you are on Windows ``` yii migrate ```

7. Execute _rbac_ controller _init_ action that will populate our rbac tables with default roles and
permissions:

   ``` ./yii rbac/init ``` or if you are on Windows ``` yii rbac/init ```

You are done, you can start your application in your browser.

__*Tip__: if your application name is, for example, __advanced__, to see the frontend side of it you 
just have to visit this url in local host: ```localhost/advanced```. To see backend side, this is 
enough: ```localhost/advanced/backend```.

> Note: First user that signs up will get 'The Creator' (super admin) role. This is supposed to be you. This role have all possible super powers :) . Every other user that signs up after the first one will get 'member' role. Member is just normal authenticated user. 

Testing
-------------------

If you want to run tests you should create additional database that will be used to store 
your testing data. Usually testing database will have the same structure like the production one.
I am assuming that you have Codeception installed globally, and that you know how to use it.
Here is how you can set up everything easily:

1. Let's say that you have created database called ```advanced```. Go create the testing one called    ```advanced_tests```.

2. Inside your ```main-local.php``` config file change database you are going to use to ```advanced_tests```.

3. Open up your console and ```cd``` to the ```_protected``` folder of your application.

4. Run the migrations again: ``` ./yii migrate ``` or if you are on Windows ```yii migrate```

5. Run rbac/init again: ``` ./yii rbac/init ``` or if you are on Windows ```yii rbac/init```

6. Now you can tell your application to use your ```advanced``` database again instead of ```advanced_tests```.
Adjust your ```main-local.php``` config file again.

7. Now you are ready to tell Codeception to use ```advanced_tests``` database.
   
   Inside: ``` _protected/tests/codeception/config/config.php ``` file tell your ```db``` to use 
   ```advanced_tests``` database.

8. Start your php server inside the root of your application: ``` php -S localhost:8080 ``` 
(if the name of your application is advanced, then root is ```advanced``` folder) 

9. To run tests written for frontend side of your application 
   ```cd``` to ```_protected/tests/codeception/frontend``` , run ```codecept build``` and then run your tests.

10. Take similar steps like in step 9 for backend and common tests.

Directory structure
-------------------

```
_protected
    api
        assets/              contains backend assets definition
        config/              contains backend configurations
        helpers/             contains helper classes
        models/              contains backend-specific model classes
        runtime/             contains files generated during runtime
    backend
        assets/              contains backend assets definition
        config/              contains backend configurations
        controllers/         contains Web controller classes
        helpers/             contains helper classes
        models/              contains backend-specific model classes
        runtime/             contains files generated during runtime
        views/               contains view files for the Web application
        widgets/             contains backend widgets
    common
        config/              contains shared configurations
        helpers/             contains helper classes
        mail/                contains view files for e-mails
        models/              contains model classes used in both backend and frontend
        rbac/                contains role based access control classes
        translations/		 contains translations
    console
        config/              contains console configurations
        controllers/         contains console controllers (commands)
        migrations/          contains database migrations
        helpers/             contains helper classes
        models/              contains console-specific model classes
        runtime/             contains files generated during runtime
    environments             contains environment-based overrides
    frontend
        assets/              contains frontend assets definition
        config/              contains frontend configurations
        controllers/         contains Web controller classes
        helpers/             contains helper classes
        models/              contains frontend-specific model classes
        runtime/             contains files generated during runtime
        views/               contains view files for the Web application
        widgets/             contains frontend widgets

api                      contains the entry script and Web resources for api services
assets                   contains application assets generated during runtime
backend                  contains the entry script and Web resources for backend side of application
themes                   contains frontend themes
uploads                  contains various files that can be used by both frontend and backend applications

```


Comments
-------------------
Built from From v2.2.0 of yii-advanced-template. Added some examples for Rest API and simple controllers with some versions of the controller. The original 
is from  https://github.com/nenad-zivkovic/yii2-advanced-template specific examples from Nenad Zivkovic can be found if you poke around his github page. 

The example code for the 'country' REST calls require a table in your DB to work. Put this in what ever DB you are activly connected to.

The sql for the test table for countries is -

```sql
CREATE TABLE `country` (
  `code` CHAR(2) NOT NULL PRIMARY KEY,
  `name` CHAR(52) NOT NULL,
  `population` INT(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Country` VALUES ('AU','Australia',18886000);
INSERT INTO `Country` VALUES ('BR','Brazil',170115000);
INSERT INTO `Country` VALUES ('CA','Canada',1147000);
INSERT INTO `Country` VALUES ('CN','China',1277558000);
INSERT INTO `Country` VALUES ('DE','Germany',82164700);
INSERT INTO `Country` VALUES ('FR','France',59225700);
INSERT INTO `Country` VALUES ('GB','United Kingdom',59623400);
INSERT INTO `Country` VALUES ('IN','India',1013662000);
INSERT INTO `Country` VALUES ('RU','Russia',146934000);
INSERT INTO `Country` VALUES ('US','United States',278357000); 
```

This was from a nice simple intro to yii2 and restfull controllers at - http://budiirawan.com/setup-restful-api-yii2

Licensing 
-------------------
My work (Sandy Ganz) is licenced as WTFPL, which is NOT true for the original work which should remain as Nenad Zivkovic and possibly YiiSoft Licensed it. 

[![WTFPL](https://img.shields.io/badge/License-WTFPL-orange.svg)](http://www.wtfpl.net)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)
