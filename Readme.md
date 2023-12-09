# HUY THANH PROJECT AHD WEB PROGRAMING

## Introduction

This repository contains a web application built using PHP, MySQL, and Bootstrap. The purpose of this project is to serve as a comprehensive collection of labs for the Web Programming course. The integration of PHP for server-side scripting, MySQL for database management, and Bootstrap for front-end styling ensures a robust and user-friendly web experience.

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

1. **Web Server**: Ensure you have a web server (e.g., Apache) installed on your machine.
2. **PHP**: Make sure PHP is installed. You can download it from [php.net](https://www.php.net/downloads.php).
3. **MySQL Database**: Set up a MySQL database and note down the credentials.

### Installation

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/your-username/your-repo.git
   ```

2. Navigate to the project directory:

   ```bash
   cd your-repo
   ```

3. Configure the database connection by editing the `config.php` file and entering your MySQL credentials:

   ```php
   <?php
   define('DB_HOST', 'your-host');
   define('DB_USER', 'your-username');
   define('DB_PASSWORD', 'your-password');
   define('DB_NAME', 'your-database');
   ```

4. Import the MySQL database schema by running the SQL script provided in the `database` folder:

   ```bash
   mysql -u your-username -p your-database < database/schema.sql
   ```

5. Start your web server and open the project in a web browser.

## Features

- **Lab Modules**: The web application is organized into lab modules, each covering specific topics in web programming.
- **Interactive Exercises**: Engage in hands-on learning through interactive exercises within each lab.
- **Database Integration**: Explore examples demonstrating the integration of PHP with a MySQL database.
- **Responsive Design**: Bootstrap ensures a responsive and visually appealing user interface across various devices.

## Contributing

If you'd like to contribute to this project, please follow these guidelines:

1. Fork the repository on GitHub.
2. Create a new branch for your feature or bug fix.
3. Make your changes and submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE.md) - see the [LICENSE.md](LICENSE.md) file for details.

## Acknowledgments

- The project makes use of [Bootstrap](https://getbootstrap.com/) for front-end styling.
- Special thanks to the contributors and the web programming community.

Feel free to explore the labs and enhance your skills in web programming!