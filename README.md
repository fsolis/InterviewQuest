InterviewQuest
==============


A web application that allows the user to add their own interview questions with answers and also practice with quizzes that use saved questions and answers. 


This applications will use PHP, HTML, MySQL, BootStrap3.

The back end will be ran on a PHP Server based on a Linux Distro. 

For the initial version it will be running on Ubuntu 14.10.

*This website runs on a LAMP Server on an Ubuntu Linux Machine. 

*Version: 1.0

*Once released it will be seen on [HERE](http://www.fsolis.net/InterviewQuest)

### How do I get set up? ###

#### There is a script in this repository that will run all these commands! ####

####Summary of set up####

* Initial Commands to get your machine up and running. (This assumes you have sudo privilages).

##### Update machine repository list:#####
*   sudo apt-get update 

##### Install any update to any programs#####
*   sudo apt-get upgrade
*(If asked to install new software hit 'Y')

##### Install Apache Server #####
*  sudo apt-get install apache2
*(If asked to install new software hit 'Y')

##### Install MySQL #####
* sudo apt-get install mysql-server
*(If asked to install new software hit 'Y')
*(You will have to enter an admin password, don't forget this password!)

##### Install PHP #####
* sudo apt-get install php5 libapache2-mod-php5
*(If asked to install new software hit 'Y')

###### Restart Server (If needed!) ######
* (Read terminal window if it says it restarted the server then this is not needed)
* sudo /etc/init.d/apache2 restart

##### Check Apache Server #####
* Go to [http://localhost/](http://localhost/)
* (You should see a message saying it works!)

##### Test PHP #####
*(Type this into the terminal to see if your PHP server is working).
* php -r 'echo "\n\nYour PHP installation is working fine. \n\n\n";'
*( You should see a message that says 'Your PHP installation is working fine.')
*( If this is not shown there have been errors in the PHP installation)

##Set Up Script ##
*A script can be found in the resources folder named webServerSetupScript.
*To run this script. Enter the following commands:
*cd resources/
*chmod 777 webServerSetupScript
*./webServerScript

#### Configuration ####
##### Apache server #####
* Apache server sets all public files in the /var/www/html/ directory
* to change it to another directory edit /etc/apache2/apache2.conf
* for this project we will use /var/www/html/

#### Dependencies
* N/A

#### Database configuration 
*Using phpMyAdmin you can run the sql found in the resource 
*folder. You must create a database named InterviewQuest and then 
*run these commands.

#### How to run tests ####
* Test creation in progress. JavaScript will 
* be tested using QUnit. 

#### Initial Repository Clone ####
* THIS STEP ASSUMES YOU HAVE YOUR COMPUTER PRIVATE KEY ASSOCIATED WITH YOUR ACCOUNT
* 1. Create a directory where you want hold all your files 
*  mkdir interviewQuest
* 2. Change into this directory
*  cd interviewQuest
* 3. Pull from the repository
*  git clone https://github.com/fsolis/interviewQuest.git
* 5. All files should now be in current directory (interviewQuest)

#### Deployment instructions ####
* 1. Make a symbolic link between current working directory 
*  sudo ln -s ~/Desktop/interviewQuest /var/www/html
* 2. Make sure the link worked by going to [http://localhost/interviewQuest](http://localhost/interviewQuest)



### Who do I talk to? ###

* For questions or more information contact creator Freddy Solis at fsolis@csumb.edu
