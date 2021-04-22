# Laravel 5 Forum

## Summary
1. [General dsescription](#generalDescription)
2. [Installation](#installation)
3. [Web interface](#webInterface)
   - [Users](#webInterfaceUsers)
   - [Topics](#webInterfaceTopics)
   - [Posts](#webInterfacePosts)
   - [Search engine](#webInterfaceSearchEngine)
   - [Online demo](#webInterfaceOnlineDemo)
4. [Testing](#testing)

<a name="generalDescription"></a>
## 1. General description
This forum was developed using PHP7, Laravel 5.5, Bootstrap 4 and jQuery 3.2

Has the basic functions of a forum and was developed as a programming test for VanHack, but can easily be extended and adapted to meet any forum needs.

<a name="installation"></a>
## 2. Installation
1. Clone the repository (https://github.com/AngelGris/laravel-forum)
2. Create an empty database for this project in your database engine.
3. Configure the database connection in config/database.php file.
4. Copy or rename .env.example file to .env and change the database connection configuration there too. Optionally, the application name can be set in the .env file too. (If the application name has more than one word it’s required to enclose them in quotes, i.e. APP_NAME=“My App”)
5. In a command line window go to the Laravel project folder and update dependencies running `composer update`.
6. Still in Laravel’s project folder run `php artisan migrate` to create the tables in the database.
7. Optionally, seed the database by running `php artisan db:seed`. This creates 20 users, 20 topics and 20 posts in each topic.
8. Now run `php artisan key:generate` to generate a unique encryption key for this Laravel instance.
9. Change permissions in storage folder to allow Laravel log everything: `sudo chmod -R 777 storage`.
10. Run `php artisan serve` in the command line to start Laravel server. Now you can enter your web browser and go to `http://localhost:8000` to see it working.

<a name="webInterface"></a>
## 3. Web interface
The home page shows a button to create a new topic, pagination links (if necessaries) and topics ordered by the last post date, this way topics with the latest posts appear on top.

Below the topics some basic statistics are shown: total posts, total topics, total members and latest member.

<a name="webInterfaceUsers"></a>
### Users
Users can register by clicking in the *“Register”* link and completing the registration form. All fields in the for are mandatory. No email validation is sent, but this functionality can be added but this forum was developed with no emailing enabled so all email related functionalities have been dismissed.

After completing the registration, users can edit their profile in order to change their information, update their password, or add a signature and a profile picture, which are not past of the registration process.

<a name="webInterfaceTopics"></a>
### Topics
Any user can create a new topic. Clicking the *“New Topic”* button in the Board index page shows the form to create a new topic. Only a title and the description of the topic is required for this.

Newly cerated topics will appear on top of the topic’s list until another topic is created, or a new post is added to another topic.

<a name="webInterfacePosts"></a>
### Posts
Entering a topics page you can read all the responses for that topic, or write your own answer in a new post.

Both, the topic description and the posts creator use TinyMCE WYSIWYG editor to allow text formatting and including links, images or videos.

<a name="webInterfaceSearchEngine"></a>
### Search engine
The search box in the header allows you to search in topic’s title and description as well as in the posts for particular keywords.

The results are shown highlighting the words that match your keyword and group in topics and posts. Both groups ordered from newer to older.

<a name="webInterfaceOnlineDemo"></a>
### Online demo
An online demo can be found at http://35.163.165.1:8080/

<a name="testing"></a>
## 4. Testing
Laravel includes PHPUnit for testing, and this project has code for testing the responses to different requests.

To run the test cases for Laravel open a command line prompt, go to the project folder and `run ./vendor/bin/phpunit`

Laravel tests for response codes on the different URLs and views display.