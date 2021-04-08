# Robot Simulator

Install:
	- php artisan route:clear
	- php artisan config:clear
	- php artisan cache:clear
	- php artisan key:generate
	- Create database named(iot_dashboard_db)
	- Update database settings if needed, default are:
		* username: root
		* password: 
		* dbname: iot_dashboard_db
		* host: 127.0.0.1
	- php artisan migrate
	- php artisan db:seed
	- Create admin user by running the following command:
		* php artisan create:suser
	- php artisan serve

Voice commands to use with the robot :
	- Find them in the JS file that serve the robot page.