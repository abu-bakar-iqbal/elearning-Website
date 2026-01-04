# How to Run the Elearn Website (PHP Version)

Since this project now uses a **PHP Backend** and **MySQL Database**, you cannot run it with `python app.py`. You need a web server environment. The widely used, free option for Windows is **XAMPP**.

## Step 1: Install XAMPP
1.  **Download XAMPP**: Go to [apachefriends.org](https://www.apachefriends.org/download.html) and download XAMPP for Windows.
2.  **Install**: Run the installer. Keep the default settings.
3.  **Start Control Panel**: Open the **XAMPP Control Panel** as Administrator.
4.  **Start Services**: Click **Start** next to **Apache** (Web Server) and **MySQL** (Database). They should turn green.

## Step 2: Deploy the Website
1.  **Locate htdocs**: Navigate to your XAMPP installation folder (usually `C:\xampp\htdocs`).
2.  **Copy Project**: Copy your entire `website` folder (the one containing `index.php`, `login.php`, etc.) into `C:\xampp\htdocs`.
    *   You should end up with: `C:\xampp\htdocs\website`.

## Step 3: Setup the Database
1.  **Open phpMyAdmin**: In your browser, go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2.  **Create Database**:
    *   Click **New** in the sidebar.
    *   Enter database name: `elearn_db`.
    *   Click **Create**.
3.  **Import Schema**:
    *   Select `elearn_db` in the sidebar.
    *   Click the **Import** tab at the top.
    *   Click **Choose File** and select `database.sql` from your project folder (`C:\xampp\htdocs\website\database.sql`).
    *   Click **Import** (or Go) at the bottom.
    *   *Success! Your tables are created.*

## Step 4: Run the Website
1.  Open your browser.
2.  Go to: [http://localhost/website/index.php](http://localhost/website/index.php)
3.  You should see the homepage.
4.  Click **Login** or **Sign Up** to test the authentication!

## Debugging
*   **Database Error?**: Open `includes/db.php` and check the settings. By default, XAMPP uses:
    *   Host: `localhost`
    *   User: `root`
    *   Pass: `` (empty)
*   **Email Verification**: Since you don't have a mail server, finding the "email code" is easy:
    *   Go to your project folder (`C:\xampp\htdocs\website`).
    *   Open `email_log.txt`.
    *   Copy the 6-digit code to verify your account.
