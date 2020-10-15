 
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
├───databases
│       database.sqlite
│
└───html
    │   addingUser.php
    │   addingUserPage.php
    │   deleteUser.php
    │   doDetails.php
    │   editPassword.php
    │   editPasswordPage.php
    │   editUser.php
    │   editUserPage.php
    │   header.php
    │   includes.php
    │   index.php
    │   link.php
    │   listUser.php
    │   login.php
    │   loginPage.php
    │   logout.php
    │   messageDetails.php
    │   phpliteadmin.php
    │   sentBox.php
    │   success.php
    │   write.php
    │   writeMessagePage.php
    │
    ├───assets
    │   ├───bootstrap
    │   ├───css
    │   └───img
    │
    ├───controller
    │       Message.php
    │       User.php
    │
    └───dataManager
            Db.php
```
### Quick start
### How to use 
 
