This is a boilerplate application that is structured with MVC architecture.

README.txt         - About the application
CREDITS.txt        - Mention about third-party library

config.php         - configuration setup.
administrator.php  - entry point for administrator controller.
index.php          - main entry point for application.
install.php        - installer file.
src/
	Request.php         - Helper class to work with $_REQUEST, $_GET, $_POST...
	Session.php         - Helper class to work with $_SESSION
	connectors/
		DBConnector.php - Database connector
	controllers/
		Controller.php  - Abstract controller class
	models/
		BaseModel.php   - Base model class
		UserModel.php   - User model class
	viewers/
		Viewer.php      - View controller class

resources/ - Resource folder for application files like css, javascript, images...
templates/              - Smarty template files
third-party/            - Third party library files
writeable/              - Directory expected to have writeable permission for server process owner.
	templates_c/        - Smarty template compile directory
	
