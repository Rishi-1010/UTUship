# UTUship

## Project Overview
UTUship is a social connection platform designed for the students of Uka Tarsadia University. The platform allows students to create anonymous profiles with just their profile pictures and names. Students can view other profiles, and in the future, we plan to add features like matching and subscriptions.

## Features
- User Registration: Students can register with their name and profile picture.
- Anonymous Profiles: Only profile pictures and names are displayed.
- View Profiles: Students can view the profiles of other students.
- Mobile-Friendly: The website is designed to be mobile-friendly using Bootstrap.

## Technology Stack
- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, Bootstrap
- **Version Control**: Git

## Project Structure
```
UTUship/ 
│ 
├── auth/ 
│ └── register.php 
├── src/ 
│ ├── db.php
│ ├── get_users.php 
├── index.html 
└──README.md
```

## Setup Instructions

### Prerequisites
- XAMPP (or any other PHP and MySQL server)
- Git

### Database Setup
1. Open phpMyAdmin and create a new database named `utu_ship`.
2. Run the following SQL commands to create the `users` table:
   ```sql
   CREATE DATABASE utu_ship;

   USE utu_ship;

   CREATE TABLE users (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(255) NOT NULL,
     profile_picture VARCHAR(255) NOT NULL,
     likes TEXT,
     dislikes TEXT
   );

   ## Project Setup
1. Clone the repository using Git: 
   ```
   git clone https://github.com/your-username/
   cd UTUship
   ```

2. Place the project in the htdocs directory of your XAMPP installation:
    ```
    mv UTUship /c/xampp/htdocs/
    ```

3. Start the Apache and MySQL servers using XAMPP.

4. Open your browser and navigate to ```
http://localhost/UTUship/index.html
```.

 ### Usage
 - Register a User: Use the register.php endpoint to register a new user.
 - View Users: The index.html file fetches and displays the list of users from the get_users.php endpoint.

 ### Future Enhancements
- Implement swipe functionality for liking and disliking profiles.
- Add match notifications.
- Implement a chat system for matched users.
- Introduce subscription plans for premium features.