# FiveM-UCP-ACP

Welcome to the FiveM UCP/ACP V2

I have learned a lot from the previous version.
And try to incorporate as much as possible in the V2.
The code is much clearer.
# I am not an application developer I teach myself everything. It will be 100% possible to make everything better and faster. If you have any ideas feel free to open a pull request.

# Dont forget to backup your database before starting the Installation

# Installation

## Prerequisites
Web server

MySQL ( Phpmyadmin if necessary ) 

A FiveM server with a FiveM database

# Implementation

Download the project

Install it on the web server

Go to: config/config.php and edit the variable $db

Make sure you use the correct FiveM Database

```$db = new PDO('mysql:host=localhost;dbname=fivem', 'root', ''); // Main Database String```

import the ```cp_user``` SQL file

import the ```cp_logfiles``` SQL file

## Dont forget to select the fivem database for that step

# Usage 

## Language Variable

I added the Possibility to add own Languages, i will add more variables. But for now i show you how it works

You just need to change / add new Variables in the ```en.php``` and edit the code then to insert the variables. I will later add a context menu to change the languages on the website


![Screenshot_29](https://user-images.githubusercontent.com/43492760/190622454-0e11368f-20d9-4489-bd5c-5c13e5a8d346.png)

![Screenshot_30](https://user-images.githubusercontent.com/43492760/190622518-624bdfb8-95cb-4486-8907-6846332dda3e.png)


# Here are some Pictures


![Screenshot_33](https://user-images.githubusercontent.com/43492760/190617396-eefdda31-96e4-4dcd-9d6d-6ab29d0d6d2a.png)
![Screenshot_34](https://user-images.githubusercontent.com/43492760/190617442-1613e685-a9f6-4cd8-b0cb-ed61eb6fb2ac.png)
![Screenshot_35](https://user-images.githubusercontent.com/43492760/190617493-526d41dc-2f00-4b66-a9c0-b76a6eb04c02.png)
![Screenshot_36](https://user-images.githubusercontent.com/43492760/190617529-0061eb2e-f8e3-43a3-8943-3523ebf73f8e.png)
![Screenshot_37](https://user-images.githubusercontent.com/43492760/190617551-14bb9fc3-878e-4c3c-87a4-3751bdc233e8.png)
![Screenshot_38](https://user-images.githubusercontent.com/43492760/190617592-504fa188-e3a8-4c6e-8d06-282d378b4fc9.png)
![Screenshot_39](https://user-images.githubusercontent.com/43492760/190617667-d6a1de32-54e6-4630-a518-6fa03093d9ea.png)
![Screenshot_40](https://user-images.githubusercontent.com/43492760/190617695-c83b2892-6c77-4711-842a-28ea4ca0858b.png)


# What should be possible with the ACP?

1. General
   - [x] Login and logout function of users
   - [x] Login and logout function of users
   - [x] Different ranks like administrator and super administrator
   - [x] Security for logins without rights
   - [x] Constant polling of session variables so that no user gets rights he does not have
   - [ ] Add Possibility to enable / disable 2FA Authentication
   
2. Administration
   - [x] Viewing team members
   - [x] Management of team members ( name change, role change)
   - [x] Create new Team Members
   - [ ] Delete Team Members
   - [ ] Write News
   - [ ] Rolecheck, just a specific group is able to " Manage specific groups"
   - [x] Own Navbar Option for Logs, so its possible that Persons who arent able to access the Logs on the Webserver check Logfiles
   
3. User
   - [x] Viewing users
   - [x] Edit users ( name, first name, inventory etc )
   - [x] Possibility to modify database entries ( whitelist & ban )
   - [ ] Create new Players in the Database
   - [ ] Reset Data like Passwords ( When the Server use Passwords for Login for Example )
   - [ ] Different Buttons for fast Options like : ( Reset Inventory, Reset Position )
   
4. Other things
   - [ ] News system ( writing news and viewing news
   - [x] Log system for reviewing
   - [ ] Frontend Updates ( I am so bad with that stuff :D )
   
5. Logging
   - [x] Option in the config file for deactivate the Logging
   - [x] Database Queries 
   - [x] Logsite for Staff Members without Databaseaccess
   - [x] Button for delete Rows
   - [ ] More Loggingoptions

6. Language
   - [ ] Language Folder so Owner can edit the Language Variables
   - [ ] Possibility to switch the Language on click
   - [ ] Config File Entry for Default Language


More Stuff is coming Soon
