# TEAMAPHPTUT
A simple PHP tutorial for the team.

## How to setup
1. Clone this git
2. Download XAMPP: [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)

3. Open the control panel, and on the Apache line, click on the "config" button then edit `httpd.conf` file. Search for "DocumentRoot" and edit it like this:
```
DocumentRoot "C:/Files/git/TEAMAPHPTUT"
<Directory "C:/Files/git/TEAMAPHPTUT">
```

4. At `localhost/phpmyadmin` create a database named `testcms` and import the `sql_create.sql` file that can be found in the `docs` folder.

5. If everything was setup correctly, you can load the site in the browser with the `localhost` address!