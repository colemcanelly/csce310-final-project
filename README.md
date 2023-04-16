## TODO
- figure out MariaDB syntax for `foreign key`
- add `auto_increment` constraints if possible
- check that `unique` also turns attributes into primary keys

## XAMPP Setup

1. Go to https://www.apachefriends.org/download.html
2. Download Windows installer 8.1.17 / PHP 8.1.17.
If you get a warning about UAC, be sure to install in a root directory e.g.
`C:\xampp\`. The default option should look something like this.
3. run xampp as administrator
4. In the xampp control panel, start Apache and MySQL
5. In your web browser, navigate to localhost aka `127.0.0.1`
6. On the top tab bar of the site, click the phpMyAdmin button
7. On the upper tab bar, click Databases
8. Create the database named "foodies" with the default collation option.
You should now have this database in `C:\xampp\mysql\data\foodies`
9. You can create tables with the GUI under the structure tab, or directly write
 SQL queries with the SQL tab. If you run XAMPP as administrator, you can also open a terminal from the XAMPP menu to make the database using `mysql`.

## git

1. navigate to `C:\xampp\htdocs`. This is the location of our pages. You can make new webpages here e.g. `foo.php`, then navigate to them in the browser with `localhost/foo.php`.
2. clone the repository here.

when you `git add`, you might get this warning:
`warning: LF will be replaced by CRLF in index.php.
The file will have its original line endings in your working directory`
This shouldn't be an issue. If we need to change it, we can do that on the bottom right of VSCode.

## Visual Studio Code

You should be able to edit files with Visual Studio Code using `code .`.
I recommend the PHP Extension Pack from Xdebug for php development.
If you get a warning about not having php support, add this to the end of VSCode's `settings.json`:
`"php.validate.executablePath": "C:\\xampp\\php\\php.exe"`

This repository includes erd.pdf for reference when making the database.

## PowerShell

- `New-Item foo.php` make a new file
- `attrib +h/-h foo` hide/unhide directory or file

## Mysql Command Line Client

1. In the XAMPP menu, click "shell". If the terminal crashes, make sure you run XAMPP as administrator.
2. In the terminal, start the client with `mysql -u root -p`
3. when prompted for a password, you should be able to just press enter to gain access.

It will be easier to check syntax and write queries using your text editor instead
of typing them directly into the mysql prompt. Instructions:

1. navigate to xampp/htdocs/queries
2. make a new file with `touch <filename>.sql` (linux) or `New-Item <filename>.sql` (Powershell).
3. write sql statements in the file
4. launch and log in to the MySQL Command Line Client
5. `USE foodies`
6. `SOURCE htdocs\queries\<>filename.sql`
7. Check that everything worked properly with `show` or something.


useful commands:
- `show databases`: list databases on server
- `use foodies`: query/edit the foodies database
- `show tables`: show tables of current DB
- `drop table <table>` removes table from database

SQL Intro video: https://youtu.be/Cz3WcZLRaWc?t=350

SQL syntax reference: https://mariadb.com/kb/en/sql-statements-structure/

`mysql --i-am-a-dummy [database]` will add some safeguards to mysql to prevent
things like `DELETE`ing without a `WHERE` clause and gigantic `JOIN`s and `SELECT`s.
