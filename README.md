# 🍽️ FoodBooking Website

A Laravel-powered web application for browsing, ordering, and managing food bookings. This project includes a clean frontend with Laravel Breeze, Vite asset bundling, and a secure backend architecture for managing customers and orders.

---

## 🚀 Features

- ✅ User registration & login (Laravel Breeze)
- 🛒 Browse menu and book food
- 🔐 Authenticated dashboard
- 📦 Order management
- 💡 Clean and responsive design
- ⚙️ Built with Laravel 11 and Vite

---

## 🛠 Tech Stack

| Tool         | Purpose                 |
|--------------|-------------------------|
| Laravel      | Backend framework       |
| Laravel Breeze | Auth scaffolding     |
| Vite         | Frontend asset bundler  |
| Blade        | Frontend templating     |
| MySQL        | Database                |
| Tailwind CSS | Styling                 |

---

## ⚙️ Local Installation

```bash
git clone https://github.com/your-username/foodbooking.git
cd foodbooking

# Install PHP dependencies
composer install

# Install JS dependencies and compile assets
npm install
npm run dev

# Set environment variables
cp .env.example .env
php artisan key:generate

# Configure .env (DB credentials, app name, etc)
# Then migrate database
php artisan migrate
🌍 Deployment on Linux (e.g. AWS EC2)
Upload files to /var/www/foodbooking

Set permissions:

bash
Copy
Edit
sudo chown -R www-data:www-data /var/www/foodbooking
Install dependencies:

bash
Copy
Edit
cd /var/www/foodbooking
composer install
Set up .env and run:

bash
Copy
Edit
php artisan migrate
php artisan config:cache
php artisan route:cache
php artisan view:cache
Build frontend assets (recommended to do locally):

bash
Copy
Edit
npm install
npm run build
Or upload /public/build from local to server manually if Node.js is not installed.

Set web root to:

swift
Copy
Edit
/var/www/foodbooking/public
🧹 Last Maintenance Steps
After deploying or updating:

bash
Copy
Edit
# Build frontend assets (locally or on server)
npm run build

# Cache Laravel configs and views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ensure correct file permissions
sudo chown -R www-data:www-data /var/www/foodbooking
sudo chmod -R 755 /var/www/foodbooking/public
📬 Support & Contributions
Pull requests are welcome. For major changes, please open an issue first to discuss what you'd like to change.

📄 License
This project is open source under the MIT License.

