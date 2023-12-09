# README

## Introduction

This repository contains a web application built using PHP, MySQL, and Bootstrap, created with passion and dedication by `Huy Thanh`. The purpose of this project is to serve as a comprehensive collection of labs for the Web Programming course. The integration of PHP for server-side scripting, MySQL for database management, and Bootstrap for front-end styling ensures a robust and user-friendly web experience.

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

1. **Web Server**: Ensure you have a web server (e.g., Apache) installed on your machine.
2. **PHP**: Make sure PHP is installed. You can download it from [php.net](https://www.php.net/downloads.php).
3. **MySQL Database**: Set up a MySQL database and note down the credentials.

### Database Configuration

Database configuration is stored in the `database_config.php` file. Update the following variables with your MySQL credentials:

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OnlineStore";
```

### Installation

1. Clone the repository to your local machine and save this to `\xampp\htdocs\`.

   ```bash
   https://github.com/HThanh-how/php-web
   ```

2. Navigate to the project directory:

   ```bash
   cd php-web
   ```

3. Configure the database connection by editing the `config.php` file and entering your MySQL credentials:

   ```php
   <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "OnlineStore";
   ```

4. Run `Xampp` and configure the database connection with `MySQL` credentials by starting the the `config.php` file


5. Import the MySQL database schema by running the SQL script provided in the `database` folder:

   ```bash
   mysql -u root -p OnlineStore < database/schema.sql
   ```

6. Start your web server and open the project in a web browser.

## Features

- **Lab Modules**: The web application is organized into lab modules, each covering specific topics in web programming.
- **Interactive Exercises**: Engage in hands-on learning through interactive exercises within each lab.
- **Database Integration**: Explore examples demonstrating the integration of PHP with a MySQL database.
- **User Authentication**: The website supports user authentication with features such as login, logout, and register functionalities.
- **Product Management**: Implement CRUD operations for managing products.
- **Ajax Search and Pagination**: Utilize Ajax for seamless product searching and pagination for improved user experience.
- **Lazy Loading**: Implement lazy loading to enhance the performance of the website.
- **Google Map Integration**: The website includes a Google Map for users to search locations.
- **Dropdown List for Locations**: Support dropdown lists for selecting provinces and districts in Vietnam, redirecting to separate pages for detailed information.

## Contributing

If you'd like to contribute to this project, please follow these guidelines:

1. Fork the repository on GitHub.
2. Create a new branch for your feature or bug fix.
3. Make your changes and submit a pull request.

Special thanks to [Trong Nghia Nguyen](https://github.com/ngaymai) for creating this project with a wholehearted commitment to excellence.

## License

This project is licensed under the [MIT License](LICENSE.md) - see the [LICENSE.md](LICENSE.md) file for details.

## Acknowledgments

- The project makes use of [Bootstrap](https://getbootstrap.com/) for front-end styling.
- Special thanks to the contributors and the web programming community.

Feel free to explore the labs and enhance your skills in web programming!