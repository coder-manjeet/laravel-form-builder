# Laravel Form Builder
A powerful and flexible form builder package for Laravel, inspired by WordPress Gravity Forms. This package allows you to create, manage, and embed dynamic forms into your Laravel applications with ease. It includes a robust API for managing forms, fields, and submissions, as well as reusable Vue.js components for building and rendering forms.

## Features
- <strong>Form Management:</strong> Create, update, and delete forms via API or UI.
- <strong>Field Types:</strong> Supports various field types (text, textarea, select, file upload, etc.).

- <strong>Conditional Logic:</strong> Add conditional logic to show/hide fields based on user input.

- <strong>Form Submissions:</strong> Collect and manage form submissions with ease.

- <strong>Reusable Components:</strong> Vue.js components for form building and rendering.

- <strong>Export/Import:</strong> Export forms and submissions in CSV/JSON format.

- <strong>Webhooks:</strong> Integrate with third-party services using webhooks.

- <strong>Multi-step Forms:</strong> Create multi-step forms with progress tracking.

- <strong>Spam Protection:</strong> Built-in spam protection with honeypot and reCAPTCHA.

- <strong>Payment Integration:</strong> Easily integrate payment gateways like Stripe and PayPal.


## Installation

### Step 1: Install via Composer
Run the following command to install the package:
```bash
composer require coder-manjeet/laravel-form-builder
```

### Step 2: Publish Assets
Publish the package assets (config, migrations, and views):
```bash
php artisan vendor:publish --provider="CoderManjeet\LaravelFormBuilder\FormBuilderServiceProvider"
```

### Step 3: Run Migrations
Run the migrations to create the necessary database tables:
```bash
php artisan migrate
```

### Step 4: Install Frontend Dependencies
Install the required frontend dependencies (Vue.js and Tailwind CSS):
```bash
npm install
```

### Step 5: Compile Assets
Compile the frontend assets:
```bash
npm run dev
```

## License
This package is open-source software licensed under the MIT License.

## Support
For issues, feature requests, or questions, please open an issue on [GitHub](https://github.com/coder-manjeet/laravel-form-builder/issues).

## Credits
Developed by [Coder Manjeet](https://github.com/coder-manjeet)
