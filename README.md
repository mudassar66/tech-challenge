# User Management Application

This is a simple user management application built with Laravel. It consists of two microservices - "users" and "notifications" - communicating via a message bus. The "users" service provides an endpoint for creating users, and the "notifications" service listens for user creation events and saves the user data to a log file.

## Prerequisites

- PHP >= 8.0
- Composer
- Laravel 8.x
- Message broker (e.g., RabbitMQ, Kafka)

## Installation


 1. Clone the repository:

   ```bash
   git clone https://github.com/mudassar66/tech-challenge.git
   
 2. Install dependencies using Composer:
cd tech-challenge
composer install

3. Copy the .env.example file to .env and configure your environment variables, including database connections and message broker settings.

Generate an application key:

## Usage
Start the Laravel Development Server
To start the Laravel development server, run the following command:

php artisan serve

This will start the server on http://localhost:8000.


# Creating Users
To create a new user, send a POST request to the /users endpoint with the required user data (email, first name, last name) in the request body. For example:
curl -X POST http://localhost:8000/users \
     -H "Content-Type: application/json" \
     -d '{"email": "test@example.com", "firstName": "John", "lastName": "Doe"}'


# Running Tests
To run the PHPUnit tests, use the following command:

php artisan test

# Configuration
Event Listener Configuration
Ensure that the UserCreatedListener is registered in the EventServiceProvider to handle user creation events. Check the $listen array in app/Providers/EventServiceProvider.php to confirm that the listener is mapped correctly.

Message Broker Configuration
Configure your message broker settings in the .env file under the BROKER_ prefix. Specify the connection details for your message broker (e.g., RabbitMQ, Kafka).

# Contributing
Contributions are welcome! If you find any issues or have suggestions for improvements, please submit a pull request or open an issue on GitHub.

# License
This project is open-source and available under the MIT License.
Feel free to customize this README file according to your specific project requirements and conventions. You can include additional sections or information as needed.






