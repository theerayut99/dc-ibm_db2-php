<?php
    $driver      = "DRIVER={IBM DB2 ODBC DRIVER};";

    $database    = "testdb";        # Get these database details from
    $hostname    = "db2";           # Container name
    $port        = 50000;           # web console.
    $user        = "db2inst1";
    $password    = "db2inst1";
    $dsn         = "DATABASE=$database;" .
                   "HOSTNAME=$hostname;" .
                   "PORT=$port;" .
                   "PROTOCOL=TCPIP;" .
                   "UID=$user;" .
                   "PWD=$password;";
   
    $conn_string = $driver . $dsn;
   
    $conn        = db2_connect( $conn_string, "", "" );

    if ($conn) {
        echo "Connection succeeded.";
    }
    else {
        echo "Connection failed: " . db2_conn_errormsg();
    }

    // Create the test table
    $create = 'CREATE TABLE animals (id INTEGER, breed VARCHAR(32), name CHAR(16), weight DECIMAL(7,2))';
    $result = db2_exec($conn, $create);
    if ($result) {
        print "Successfully created the table.\n";
    } else {
        echo "Can not Create Table.";
    }

    $animals = array(
        array(0, 'cat', 'Pook', 3.2),
        array(1, 'dog', 'Peaches', 12.3),
        array(2, 'horse', 'Smarty', 350.0),
        array(3, 'gold fish', 'Bubbles', 0.1),
        array(4, 'budgerigar', 'Gizmo', 0.2),
        array(5, 'goat', 'Rickety Ride', 9.7),
        array(6, 'llama', 'Sweater', 150)
    );

    foreach ($animals as $animal) {
        $rc = db2_exec($conn, "INSERT INTO animals (id, breed, name, weight) VALUES ({$animal[0]}, '{$animal[1]}', '{$animal[2]}', {$animal[3]})");
        if ($rc) {
            echo "Insert... <br>";
        }
    }

    $sql = "SELECT name FROM animals WHERE weight < 10.0 ORDER BY name";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        while ($row = db2_fetch_array($stmt)) {
            echo "$row[0]<br>";
        }
    }
    db2_close($conn);
