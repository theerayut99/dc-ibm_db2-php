<?php
    $value = "World";
    // echo phpinfo();

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
        db2_close($conn);
    }
    else {
        echo "Connection failed: " . db2_conn_errormsg();
    }
    
    ?>
    
    <html>
        <body>
            <h1>Hello, <?= $value ?>!</h1>
    
            <!-- <?php foreach($databaseTest as $row): ?>
                <p>Hello, <?= $row->name ?></p>
            <?php endforeach; ?> -->
        </body>
    </html>
    