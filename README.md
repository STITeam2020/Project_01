 
# Messaging app


### Introduction 

 This  projects is developed within the scope of the course Internet Technology Security ,as a part of a main project of Security and vulnerability .
It therefore consists to develop a very simple web application which allow users , as part of a business, to send text messages between collaborators.

  ### Main features
  The application offer many features for each type of user .As said previously,we can use the messaging application as a collaborator or as an administrator.
  By using it as a administrator you can :
  *    Add,delete or modify  a user
  *    Send and Read message as like reply for them .you can also delete a message . (2)
  *    Modify his password (3)
  *    Consult the main directory of all users
      
  In the other hand ,If you use the application as an collaborator ,you will get the same features as the administrator in the point (2) and (3) .  
  
### Main structure 

```shell
          File                   |           Use
---------------------------------|---------------------------------------------
├───databases                ----> Contain the database 
│       database.sqlite
│
└───html
    │   addingUser.php       ---->  adding a user .
    │   addingUserPage.php   ---->  adding a user view (HTML)
    │   deleteUser.php       ---->  delete a user 
    │   doDetails.php        ---->  contain commands that delete and reply a message 
    │   editPassword.php     ---->  modify the password 
    │   editPasswordPage.php ---->  modify the password view (HTML) 
    │   editUser.php         ---->  modify a user 
    │   editUserPage.php     ---->  modify user view
    │   header.php           ---->  the header of all pages ( used for navigation )
    │   includes.php         ---->  by including this file we keep the current session
    │   index.php            ---->  the home page
    │   listUser.php         ---->  list of all users 
    │   login.php            ---->  the login page 
    │   loginPage.php        ---->  the login page view
    │   logout.php           ---->  contains the logout commands 
    │   messageDetails.php   ---->  view page of the details of a message 
    │   phpliteadmin.php     ---->
    │   sentBox.php          ---->  the outbox 
    │   success.php          ---->  page indicate the succuess of operation
    │   write.php            ---->  write a message commands 
    │   writeMessagePage.php ---->  write a message view
    │
    ├───assets               ----> all bootstap and css files 
    │   ├───bootstrap
    │   ├───css
    │   └───img
    │
    ├───controller           
    │       Message.php      ----> object contains all function for a user 
    │       User.php         ---->  object contains all function of message
    │
    └───dataManager              
            Db.php           ----> Object take care of database connection and most used function 
```
### Quick start
### How to use 
 
