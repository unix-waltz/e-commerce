<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        h1, h2, h3 {
            color: #333;
        }
        code {
            background-color: #f4f4f4;
            padding: 0.2em 0.4em;
            border-radius: 3px;
        }
        pre {
            background-color: #f4f4f4;
            padding: 1em;
            border-radius: 3px;
            overflow-x: auto;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>E-Commerce Platform</h1>
        <p>This is an elegant and modern e-commerce platform built to provide a seamless online shopping experience. The project focuses on delivering a clean and responsive interface, along with secure payment processing.</p>

        <h2>Features</h2>
        <ul>
            <li><strong>Elegant UI/UX:</strong> A clean, user-friendly design for easy navigation and a pleasant shopping experience.</li>
            <li><strong>Secure Payment Gateway:</strong> Integrated with Midtrans for fast and secure transactions.</li>
            <li><strong>Responsive Design:</strong> Built using Tailwind CSS and Flowbite for a fully responsive layout.</li>
            <li><strong>Product Management:</strong> Browse, add to cart, and purchase products effortlessly.</li>
        </ul>

        <h2>Technologies Used</h2>
        <ul>
            <li><strong>Tailwind CSS:</strong> For creating a responsive and customizable user interface.</li>
            <li><strong>Flowbite:</strong> To streamline UI components and enhance design aesthetics.</li>
            <li><strong>Midtrans:</strong> Payment gateway integration for secure and reliable payment processing.</li>
            <li><strong>Laravel:</strong> Backend framework for robust and scalable application logic.</li>
        </ul>

        <h2>Installation</h2>
        <ol>
            <li>Clone the repository:
                <pre><code>git clone https://github.com/unix-waltz/e-commerce.git</code></pre>
            </li>
            <li>Navigate to the project directory:
                <pre><code>cd e-commerce</code></pre>
            </li>
            <li>Install dependencies:
                <pre><code>composer install
npm install</code></pre>
            </li>
            <li>Set up the environment file:
                <pre><code>cp .env.example .env</code></pre>
            </li>
            <li>Configure your .env file with database and payment gateway credentials.</li>
            <li>Run the migrations:
                <pre><code>php artisan migrate</code></pre>
            </li>
            <li>Start the development server:
                <pre><code>php artisan serve</code></pre>
            </li>
        </ol>

        <h2>Midtrans API Key Setup</h2>
        <ol>
            <li>Sign up or log in to your Midtrans account at Midtrans Dashboard.</li>
            <li>Navigate to the Settings section and select Access Keys.</li>
            <li>Copy the Server Key and Client Key.</li>
            <li>Open the .env file in the project root and update the following lines:
                <pre><code> MIDTRANS_SERVER_KEY=your_midtrans_server_key
MIDTRANS_CLIENT_KEY=your_midtrans_client_key</code></pre>
            </li>
        </ol>

        <h2>Preview</h2>
        <p>Video Demo</p>
        <p>Screenshots</p>
        <ul>
            <li>Home Page</li>
            <li>Product Page</li>
        </ul>

        <h2>Contribution</h2>
        <p>Feel free to fork this repository, submit issues, or make pull requests to contribute to the project.</p>

        <h2>License</h2>
        <p>This project is licensed under the MIT License. See the LICENSE file for details.</p>
    </div>
</body>
</html>
