# FiveM-UCP-ACP

Welcome to the FiveM UCP/ACP V2

I have learned a lot from the previous version.
And try to incorporate as much as possible in the V2.
The code is much clearer.
# I am not an application developer I teach myself everything. It will be 100% possible to make everything better and faster. If you have any ideas feel free to open a pull request.

# Installation

## Prerequisites
Web server

MySQL ( Phpmyadmin if necessary ) 

A FiveM server with a FiveM database

# Implementation

Download the project

Install it on the web server

Go to: config/config.php and edit the variable $db

```$db = new PDO('mysql:host=localhost;dbname=fivem', 'root', ''); // Main Database String```

import the cp_user SQL file

# What should be possible with the ACP?

1. General
   - [x] Login and logout function of users
   - [x] Login and logout function of users
   - [x] Different ranks like administrator and super administrator
   - [x] Security for logins without rights
   - [x] Constant polling of session variables so that no user gets rights he does not have
   
2. Administration
   - [x] Viewing team members
   - [x] Management of team members ( name change, role change)
   - [x] Create new Team Members
   - [ ] Delete Team Members
   - [ ] Write News
   - [ ] Rolecheck, just a specific group is able to " Manage specific groups"
   - [ ] Own Navbar Option for Logs, so its possible that Persons who arent able to access the Logs on the Webserver check Logfiles
   
3. User
   - [ ] Viewing users
   - [ ] Edit users ( name, first name, inventory etc )
   - [ ] Possibility to modify database entries ( whitelist & ban )
   - [ ] Create new Players in the Database
   - [ ] Reset Data like Passwords ( When the Server use Passwords for Login for Example )
   - [ ] Different Buttons for fast Options like : ( Reset Inventory, Reset Position )
   
4. Other things
   - [ ] News system ( writing news and viewing news
   - [ ] Log system for reviewing
   - [ ] Frontend Updates ( I am so bad with that stuff :D )

More Stuff is coming Soon
