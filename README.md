# E-Commerce Platform

This is an elegant and modern e-commerce platform built to provide a seamless online shopping experience. The project focuses on delivering a clean and responsive interface, along with secure payment processing.

## Features

- **Elegant UI/UX:** A clean, user-friendly design for easy navigation and a pleasant shopping experience.
- **Secure Payment Gateway:** Integrated with Midtrans for fast and secure transactions.
- **Responsive Design:** Built using Tailwind CSS and Flowbite for a fully responsive layout.
- **Product Management:** Browse, add to cart, and purchase products effortlessly.

## Technologies Used

- **Tailwind CSS:** For creating a responsive and customizable user interface.
- **Flowbite:** To streamline UI components and enhance design aesthetics.
- **Midtrans:** Payment gateway integration for secure and reliable payment processing.
- **Laravel:** Backend framework for robust and scalable application logic.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/unix-waltz/e-commerce.git
   ```
   <h1>Navigate to the project directory:</h1>

<pre><code>bash
cd e-commerce
</code></pre>

<h1>Install dependencies:</h1>

<pre><code>bash
composer install
npm install
</code></pre>

<h1>Set up the environment file:</h1>

<pre><code>bash
cp .env.example .env
</code></pre>

<p>Configure your <code>.env</code> file with database and payment gateway credentials.</p>

<h1>Run the migrations:</h1>

<pre><code>bash
php artisan migrate
</code></pre>

<h1>Start the development server:</h1>

<pre><code>bash
php artisan serve
</code></pre>

<h1>Midtrans API Key Setup</h1>

<ul>
    <li>Sign up or log in to your Midtrans account at <a href="https://dashboard.midtrans.com/">Midtrans Dashboard</a>.</li>
    <li>Navigate to the <strong>Settings</strong> section and select <strong>Access Keys</strong>.</li>
    <li>Copy the <code>Server Key</code> and <code>Client Key</code>.</li>
    <li>Open the <code>.env</code> file in the project root and update the following lines:</li>
</ul>

<pre><code>env
MIDTRANS_SERVER_KEY=your_midtrans_server_key
MIDTRANS_CLIENT_KEY=your_midtrans_client_key
</code></pre>

<h1>Preview</h1>

<h2>Video Demo</h2>

<h2>Screenshots</h2>

<p><strong>Home Page</strong></p>

<p><strong>Product Page</strong></p>

<h1>Contribution</h1>

<p>Feel free to fork this repository, submit issues, or make pull requests to contribute to the project.</p>

<h1>License</h1>

<p>This project is licensed under the MIT License. See the <a href="LICENSE">LICENSE</a> file for details.</p>

