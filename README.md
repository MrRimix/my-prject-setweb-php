# Project for Hosting Website on Azure Using IIS and MySQL

## Overview:
This project aims to host a website using Windows Server and IIS in a virtual environment via VMware, with MySQL used to manage the website's database. The website is deployed to the cloud using Azure services, where the application and database are hosted.

## Tools Used:
- **Windows Server (Inside VMware)**: The operating system where the website is hosted in a virtual environment using VMware.
- **VMware Workstation/Player**: A tool to create and run virtual machines like Windows Server.
- **IIS (Internet Information Services)**: Web hosting service within Windows Server to run the website on the server.
- **MySQL Server**: Tools to create the database for the website hosted on Windows Server.
- **PHP & MySQL**: For programming the website and storing user data.
- **Microsoft Azure**: 
  - **Azure App Services**: Used for hosting the website on the cloud.
  - **Azure SQL Database**: For migrating the database.
  - **Azure Migrate**: To automate the migration process.
  - **Azure Backup & Site Recovery**: For protecting and recovering data.
  - **Azure Security Center**: For securing servers and services.

## Steps Taken:

### 1. **Install IIS and MySQL on Windows Server:**
   - Set up **IIS** for hosting the website.
   - Install **MySQL** on the local server for the database.

### 2. **Create MySQL Database on Azure:**
   - Set up **Azure MySQL Database** for storing data.

### 3. **Deploy Website to Azure:**
   - Used **Azure App Services** to migrate the website to the cloud.
   - Used **Azure Migrate** for application migration to Azure.

### 4. **Backup and Security Setup:**
   - Enabled **Azure Backup** for data protection.
   - Configured **Azure Security Center** for securing Azure resources.

### 5. **Using Git & GitHub:**
   - Pushed the project files to **GitHub** using Git.
   - Linked the project to **Azure App Service** for automatic deployment.

## Challenges and Issues Faced:

### 1. **High Cost on Azure:**
   - I deleted the project after the free trial period ended to avoid high costs.

### 2. **Difficulty in Deploying the Project Online for Free:**
   - There was no reliable free hosting that supports PHP and MySQL fully.

### 3. **IIS Configuration Errors:**
   - **403.14 Forbidden** because the `index.php` file was missing in the website's folder.
   - **PHP not working in browser** due to incorrect `php.ini` settings.

### 4. **Database Connection Issues:**
   - **Access Denied** when connecting to MySQL on Azure due to firewall settings.
   - Issues with **MySQL authentication** using `caching_sha2_password`.

### 5. **Git Issues:**
   - **"dubious ownership"** error when executing Git commands due to ownership mismatches.
   - **"git push" failed** because there were remote changes not present locally, solved by using `git pull origin main --allow-unrelated-histories`.

### 6. **PHP Version Compatibility Issues:**
   - **PHP version 8.4.5** is not supported on Azure.
   - **Azure Migrate** does not directly support PHP websites.

### 7. **Limited Features on Azure Free Tier:**
   - Automatic backup for the website was not enabled as the current **App Service Plan** was free.

## Solutions Implemented:
- **Fixed `php.ini` settings** to enable extensions like `mysqli` and `pdo_mysql`.
- **Configured firewall settings** in Azure to allow connections from my local IP.
- **Used GitHub** for automatic deployment to Azure.

## Attached Files:
- Word files with additional project details.

## Notes:
- Due to **high costs** on Azure, I stopped using it after the free trial period ended.
- **PHP 8.4.5** is currently unsupported on Azure, causing issues with migration.

## How to Run the Project:
1. Clone the project from GitHub.
2. Import the database from MySQL.
3. Modify the `php.ini` settings and **IIS** configuration.
4. Deploy the website via Azure using **App Services**.

## References:
- [Azure Documentation](https://learn.microsoft.com/en-us/azure/)
- [GitHub](https://github.com/)
