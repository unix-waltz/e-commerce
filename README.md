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

<li>Clone the repo:
    <pre><code>
   git clone https://github.com/unix-waltz/e-commerce.git
    </code></pre>
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
<li>Sign up or log in to your Midtrans account at <a href="https://midtrans.com">Midtrans Dashboard</a>.</li>
<li>Navigate to the Settings section and select Access Keys.</li>
<li>Copy the Server Key and Client Key.</li>
<li>Open the .env file in the project root and update the following lines:
    <pre><code>MIDTRANS_SERVER_KEY=your_midtrans_server_key
MIDTRANS_CLIENT_KEY=your_midtrans_client_key</code></pre>
</li>
</ol>

<h2>Preview</h2>
<ul>
    <li>
        <strong>Video Demo:</strong><br>
        <video controls style="max-width: 100%; height: auto; margin-bottom: 10px;">
            <source src="https://github.com/user-attachments/assets/f682bd07-5d6c-4c38-8b63-17bf0f626a5f" type="video/webm">
            Your browser does not support the video tag.
        </video>
    </li>
    <li>
        <strong>Screenshots:</strong><br>
        <img src="https://github.com/user-attachments/assets/85221f3c-770e-4cd6-8b46-6fc255c0919a" alt="Screenshot from 2024-08-12 14-15-35" style="max-width: 100%; height: auto; margin-bottom: 10px;">
        <img src="https://github.com/user-attachments/assets/d5c4f574-7f2e-49e2-96f1-0e952820d8eb" alt="Screenshot from 2024-08-12 14-15-48" style="max-width: 100%; height: auto; margin-bottom: 10px;">
        <img src="https://github.com/user-attachments/assets/c0b725ef-6cd2-4414-9a40-7d801b5b7624" alt="Screenshot from 2024-08-12 14-15-58" style="max-width: 100%; height: auto; margin-bottom: 10px;">
        <img src="https://github.com/user-attachments/assets/d5163d95-bd62-4a52-adec-0a5a9c66a3cb" alt="Screenshot from 2024-08-12 14-17-31" style="max-width: 100%; height: auto; margin-bottom: 10px;">
        <img src="https://github.com/user-attachments/assets/97261a6a-9f05-4932-b4dd-16ee1193979b" alt="Screenshot from 2024-08-12 14-18-16" style="max-width: 100%; height: auto; margin-bottom: 10px;">
        <img src="https://github.com/user-attachments/assets/8cc2abe9-d33c-4ea3-b4f5-b05892fc20bc" alt="Screenshot from 2024-08-12 14-18-41" style="max-width: 100%; height: auto;">
    </li>
</ul>



<h2>Contribution</h2>
<p>Feel free to fork this repository, submit issues, or make pull requests to contribute to the project.</p>

<h2>License</h2>
<p>This project is licensed under the MIT License. See the LICENSE file for details.</p>

</div>
</body>
</html>
