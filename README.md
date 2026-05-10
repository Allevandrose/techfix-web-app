🔧 TechFix - Phone Repair Shop Management System
A full-featured web application for electronics repair shops to manage services, blogs, bookings, and customer communication with built-in SEO optimization for local Kenyan markets.

🚀 Features
Multi-Authentication System
Admin Panel - Full system control via Filament admin interface

Customer Dashboard - Users can manage bookings and profile

Role-based access control (Admin / Customer)

Service Management
Create, Read, Update, Delete repair services

Upload service images

Set pricing for different services

Location-specific service pages (SEO optimized)

Blog Management
Create and publish blog posts

Rich text editor for content

Featured images support

Publish/unpublish with date scheduling

Booking System
Users register/login to book services

Book repair services with item details

Automatic notification system (3 channels):

📱 Telegram - Instant notifications to shop owner

📧 Email - Detailed booking information

💬 WhatsApp - Click-to-chat link for direct communication

SEO Optimized
Automatic slug generation for URLs

Meta tags management

Location-based service pages

Sitemap generation ready

Schema.org markup support

🛠️ Tech Stack
Backend
Laravel 11 - PHP Framework

MySQL - Database

Filament v3 - Admin Panel

Spatie Media Library - Image management

Artesaos SEOTools - SEO optimization

Frontend
Tailwind CSS - Styling

Alpine.js - Interactivity

Breeze - Authentication scaffolding

Vite - Asset bundling

Features & Integrations
Telegram Bot API - Instant notifications

Laravel Mail - Email notifications (Gmail/SMTP)

WhatsApp Click-to-Chat - Free communication

📋 Prerequisites
PHP >= 8.2

Composer

Node.js & NPM

MySQL >= 5.7

Git

🔧 Installation
1. Clone the repository
bash
git clone https://github.com/yourusername/techfix.git
cd techfix
2. Install dependencies
bash
composer install
npm install
3. Environment setup
bash
cp .env.example .env
php artisan key:generate
4. Configure database in .env
env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=techfix
DB_USERNAME=root
DB_PASSWORD=
5. Run migrations & seeders
bash
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
6. Create Filament admin user
bash
php artisan make:filament-user
Name: Admin TechFix

Email: admin@techfix.com

Password: your-password

7. Link storage for images
bash
php artisan storage:link
8. Install & build frontend assets
bash
npm run build
9. Configure Telegram Bot (Optional)
Create bot via @BotFather on Telegram

Get bot token and chat ID

Add to .env:

env
TELEGRAM_BOT_TOKEN=your_bot_token
TELEGRAM_OWNER_CHAT_IDS=your_chat_id
10. Configure Email (Optional)
env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@techfix.com
MAIL_FROM_NAME="${APP_NAME}"
11. Start the application
bash
php artisan serve
npm run dev
🚦 Usage
Default Admin Login
URL: http://127.0.0.1:8000/login

Email: admin@techfix.com

Password: password123

Admin Panel
Access: http://127.0.0.1:8000/admin

Manage services, blogs, and view bookings

Customer Flow
Register/Login on website

Browse services

Book a repair

Receive confirmation via Telegram/Email

Owner contacts customer via WhatsApp

📁 Project Structure
text
techfix/
├── app/
│   ├── Filament/Resources/     # Admin CRUD resources
│   ├── Http/
│   │   ├── Controllers/         # Application controllers
│   │   └── Middleware/          # Role & auth middleware
│   ├── Models/                  # Eloquent models
│   └── Services/                # Telegram & notification services
├── database/
│   ├── migrations/              # Database schema
│   └── seeders/                 # Test data seeders
├── resources/
│   ├── views/                   # Blade templates
│   │   ├── admin/               # Admin views
│   │   ├── auth/                # Authentication views
│   │   └── layouts/             # App layouts
│   ├── css/                     # Stylesheets
│   └── js/                      # JavaScript files
└── routes/
    ├── web.php                  # Web routes
    └── auth.php                 # Authentication routes
🔑 Key Features Explained
Multi-Authentication
Users have role column (admin/customer)

Middleware checks role before allowing access

Different dashboards for each role type

SEO Strategy
Location-based service URLs (e.g., /services/iphone-repair/nairobi)

Automatic sitemap generation

Meta tags for each service and blog

Schema markup for local business

Notification System
Telegram: Real-time alerts to shop owner

Email: Detailed booking confirmation

WhatsApp: Click-to-chat link in emails

🐛 Troubleshooting
Images not displaying in Filament
bash
php artisan storage:link
php artisan config:clear
Login redirects to wrong dashboard
Check user role in database:

bash
php artisan tinker
$user = User::where('email', 'admin@techfix.com')->first();
echo $user->role;  // Should output 'admin'
Clear all caches
bash
php artisan optimize:clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
📦 Dependencies
Composer (Backend)
laravel/framework: ^11.0

laravel/breeze

filament/filament: ^3.2

spatie/laravel-medialibrary: ^11.0

artesaos/seotools

guzzlehttp/guzzle

NPM (Frontend)
tailwindcss

alpinejs

sweetalert2

flatpickr

🤝 Contributing
Fork the repository

Create feature branch (git checkout -b feature/amazing-feature)

Commit changes (git commit -m 'Add amazing feature')

Push to branch (git push origin feature/amazing-feature)

Open Pull Request

📄 License
This project is open-sourced software licensed under the MIT license.

👨‍💻 Author
Your Name - Your GitHub

🙏 Acknowledgments
Laravel Community

Filament PHP

Spatie Packages

All open-source contributors

📞 Support
For support, email support@techfix.com or open an issue on GitHub.

Built with ❤️ for Kenyan phone repair businesses
