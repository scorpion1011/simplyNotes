# simplyNotes

INSTALLATION:
1) create database
2) import data from simply_notes.sql
3) go to simplyNotes/website/core/config.php and set up db connection params
4) open website in your browser

TO TEST:
1) login with credentials: vlad321 / 123456Qw
2) create new note, edit it, delete
3) logout and register new user
4) try to open vlad321 note with url http://notes.web/edit/27 - system doesn't allow to open it 
5) try to delete vlad321 note with url http://notes.web/delete/27  - system doesn't delete it but shows success message
6) try to open unexisting page - 404 page will show

IMPLEMENTATION NOTES:
Controller:
1) controller is in index.php and is implemented with switch operator
2) simple implementation of route analizes request and defines a name of target controller
Model:
1) models are in folder "models"
2) to communicate with DB, models use PdoAdapter object ( core/pdoAdapter.php ), that defines the basic operation like read and write
3) PDOAdapter is a singleton 
4) models use dependency injection instance to get access to PdoAdapter object
View:
1) views are in folder "views"
2) views are plain html + php templates that use global variables
3) system uses output bufferization to put content of a page in views/layout.php. core/view.php defines a callback for this
Sessions:
system uses sessions to store information about logged in users, to display errors and informaion messages
