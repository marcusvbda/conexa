## Prerequisites

Before you begin, make sure you have the following prerequisites installed on your system:

- Docker
- Docker Compose

## Installation

Follow the steps below to set up the WordPress project using Docker:

1. Create a Docker network:

   ```bash
   docker network create web
   ```

2. Clone this repository:

   ```bash
   git clone <repository_url>
   ```

3. Navigate to the project directory:

   ```bash
   cd wordpress-docker-boilerplate
   ```

4. Start the Docker containers:

   ```bash
   docker-compose up -d --force-recreate
   ```

   This command will start the WordPress and MySQL containers defined in the `docker-compose.yml` file.

5. Access MySQL and create a database:

   - Host: `localhost`
   - Port: `3306`
   - Username: `root`
   - Password: `<leave_blank>`
   
   Use your preferred MySQL client or command-line tool to connect to the MySQL server running on `localhost:3306`. Create a new database with the name of your choice.

6. Configure WordPress installation:

   - Open your web browser and visit `http://localhost:8080`.
   - Select your preferred language.
   - On the WordPress installation screen, fill in the following details:
     - Database Name: `<your_database_name>`
     - Username: `root`
     - Password: `<leave_blank>`
     - Database Host: `wordpress_db`
     - Table Prefix: `<your_table_prefix>` (optional)
   - Click on the **Submit** button to proceed with the installation.
   - Follow the on-screen instructions to set up your WordPress site.

7. Voila! Your WordPress installation is now ready. You can access your site by visiting `http://localhost:8080` in your web browser.

## Project Structure

The project structure is organized as follows:

```
.
├── docker-compose.yml
└── README.md
```

- `docker-compose.yml`: Contains the configuration for the Docker containers used in this project.
- `README.md`: The file you are currently reading, providing instructions for installing and setting up the project.

## Customization

Feel free to customize the `docker-compose.yml` file according to your specific requirements. You can modify environment variables, ports, volumes, etc., as needed.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request on the GitHub repository.

## License

This project is licensed under the [MIT License](LICENSE).