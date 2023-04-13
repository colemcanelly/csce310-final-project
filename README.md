## XAMPP Setup

Go to https://www.apachefriends.org/download.html
Download Windows installer 8.1.17 / PHP 8.1.17
If you get a warning about UAC, be sure to install in a root directory e.g. `C:\xampp\`. The default option should look something like this.
run xampp as administrator
In the xampp control panel, start Apache and MySQL
in your web browser, navigate to localhost aka `127.0.0.1`
on the top tab bar of the site, click the phpMyAdmin button
on the upper tab bar, click Databases
locate the database named "foodies" with the default collation option
You should now have this database in `C:\xampp\mysql\data\foodies`
You can create tables with the GUI under the structure tab, or directly write SQL queries with the SQL tab.

## git

1. navigate to `C:\xampp\htdocs`. This is the location of our frontend. You can make new webpages here e.g. `foo.php`, then navigate to them in the browser with `localhost/foo.php`.
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

