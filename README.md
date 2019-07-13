ReadMe Doc

What I follow the process:

#First Install Laravel 5.8 using composer.
#Create Database with given credentials: DB:advira,USER:advire,PASS:advira@123#
#Make Migration like users, posts, comments table using `php artisan make:migrations `migration_name` --create=TABLE_NAME`
#Run created Migartions to create table in database using `php artisan migrate`
#Make Seeder and Factory to insert dummy data in tables;
#Run database seed using `php artisan db:seed`
#create models like User,Post and Comment to Handle DB operation for data and they also have relation with each other

#create Resource for API like User,Post,Comment using `php artisan make:resource RESOURCE_NAME`
#Make Controller `UserController` and BaseController inside App\Http\Controllers\API using `php artisan make:controller CONTROLLER_NAME`
#Inside BaseController created three method to handle API Response Data.
#Inside UserController, 3 methods getUserList,getUserInfo and getUserInfoAlt
	#getUserList: return all users list
	#getUserInfo: return single user detail on the basis of USER_ID 
	#getUserInfoAlt: return single user info on the basis of USER_ID in altername way
	
	

How to run project:

#first clone the project in C:\xammp\htdocs or as you wish
#create database and update .env file with database credentials.
#Open cmd prompt and go to root directory of project.
#run command `php artisan migrate`.(This will create tables in your database you can check)
#Run command `php artisan DB:seed`	(Insert Dummy data in all tables)
#Rub command `php artisan serve` (to start local server)

