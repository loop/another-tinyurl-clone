# another-tinyurl-clone
=====================

Another tinyurl clone.

This is a tiny URL script which I made was made in 2009. I have decided to open source it and share it.

It is:

- Written in PHP
- Smarty templates
- Member area with tracking
- Admin area to manage
- Simple API

## Requirements

- PHP 5+
- mySQL 4+
- PHP cURL Extension
- Apache mod_rewrite enabled

----------------------------
## Instructions
Please follow the instructions carefully and this script will work without a problem.

1. Log on to your hosting panel and create a new database name, database user and password (Make sure you note these down).
2. Now execute the database.sql located in the install folder to the database you have just created.
3. Edit includes/configs/config_database and enter your database info.
4.Edit includes/configs/config_general.php to suit you and your site needs.
5. Upload all the files to your website main directory.
6. Add write permissions to screenshots (0777 or 0755).
7. Add write permissions to cache/templates (0777 or 0755).
8. Login using admin and admin123.

## Open Source License

Released under the MIT public license.