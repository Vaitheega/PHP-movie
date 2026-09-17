Create_table.sql
● What do you think that this file does?
 What columns are created? 
 What data types are stored in our columns? 
 And which size is the data allowed to be? Which column holds the primary key (and why?) What do you think AUTO_INCREMENT does?

 Ans - This file creates the movie database and its tables (movies and genres). It defines the columns, data types, and sizes. mid and gid are primary keys because they uniquely identify each row. AUTO_INCREMENT automatically gives each new movie or genre a new ID.

 Get_data.php

● Observe on line 1 and 28 that we need to open and close a .php file. Write down the
syntax to do so.
    Ans- We use <?php to open/start a PHP file and ?> to close/end the PHP code.

● Observe on line 2-5 that we are creating variables. Write down the syntax to create a
variable in php.
   Ans- A PHP variable is created by using the $ sign followed by the variable name and assigning a value to it.

Example: $name = "Avatar";

● For each of the variables on line 2-5, describe what they are. What values should they
hold in your case? (don’t write this down, as this can be a threat to your IMS security)
     Ans - $servername – stores the database server name. In our case, it is localhost.
$username – stores the database username.
$password – stores the database password.
$dbname – stores the database name. In our case, it is movies.

● Line 8: what variable is created here, and why? What do you think is the purpose of line
10-12, why do we need this?
       Ans- Line 8 creates the variable $link. It stores the connection to the database.

Lines 10–12 check if the database connection was successful. If the connection fails, the program shows an error message and stops. This is needed to make sure we can connect to the database before working with it

● Line 14: What does echo do? What would you call this statement in other programming
languages you know?
     Ans - echo is used to display or print something on the screen. In other programming languages, it is similar to print.

● Line 14: you can see HTML code here. What do you think this echo statement returns?
      Ans- The echo statement returns HTML code that creates and displays a row in the table, containing the data from the database.

● Line 17: here we are calling our $link variable. Why do you think that is? Here we
introduce a new operator: “->”. Why do you think this operator is useful? Here we
introduce a new method, query. What do you think this method does, and which
parameter do we use?
    Ans- $link is used because it contains our connection to the database.

The -> operator is used to access a method or function belonging to $link.

The query() method sends an SQL query to the database. The parameter we use is $sql, which contains the SQL statement we want to execute.

● On line 19: we observe that num_rows is not coloured yellow like our methods. At the
same time, it is not a variable either, since it does not start with $. We call this a property
access. What are we accessing, and from where?
    Ans- num_rows is a property of the $result object. It tells us how many rows were returned by the SQL query.

So, we are accessing the num_rows property from $result.

● Line 19 - 25: a conditional loop is introduced. Can you guess what the output is of this
code? Under which conditions?
     Ans The loop outputs the movie data in each row of the database.

It runs while there are rows in the result, and continues until all rows have been displayed.

Index.php
● Can you guess what the purpose is of this file? Hint: Think about your IMS. If the user is
on the index page, where would they be?
    Ans- The purpose of index.php is to be the main/home page of the IMS. It is the page where the user starts when they enter the system.

Insert_data.html
● What do you think a form is in HTML?
        Ans- A form in HTML is used to collect information from the user and send it to the server for processing.

● Take note of the post method, we will see it come back in the next file
   Ans- The POST method is used to send the form data to the server. We will see how this data is received and used in the next file, insertdata.php.

Insertdata.php
New concept: In PHP, variables that start with $_ are superglobals. Superglobals are special
built-in arrays that PHP automatically creates and fills with data about the request, the server,
the environment, etc.
● Line 16-21. What do you think the $_POST superglobal does?
    Ans- The $_POST superglobal receives the data submitted from the HTML form using the POST method.

For example, it receives the movie name, year, genre, and rating entered by the user.

● Line 23: here we prepare a SQL query. Why do you think the values are left blank for
now? (?,?,?)
    Ans - The values are left as ? because we will add the actual values later using the data received from the $_POST variables.

This also makes the SQL query safer.
    
New concept: bind_param -> Bind variables for the parameter markers in the SQL statement
prepared by mysqli_prepare() or mysqli_stmt_prepare().
This method takes two parameters: a type definition string:
● s = string
● i = integer
● d = double/float
● b = blob (binary data)
And PHP variables to bind the placeholder values to.
● Line 27: Even though we have $_POST[‘id’] data, we do not enter this into our
database! Why is that? Think about our first file, create_table.sql
    Ans- We do not enter the id because the id is AUTO_INCREMENT in create_table.sql. The database automatically creates a unique ID for each new movie.

● Line 36: Close db connection. This is the first time we see this. Why does it occur here?
     Ans- We close the database connection because we have finished using the database. It is good practice to close the connection when we are done.