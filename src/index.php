<?php
    $value = "World";
    // echo phpinfo();

    // $db = new PDO('mysql:host=database;dbname=mydb;charset=utf8mb4', 'myuser', 'secret');
    
    // $databaseTest = ($db->query('SELECT * FROM dockerSample'))->fetchAll(PDO::FETCH_OBJ);

    // try {
    //     $db = new PDO("odbc:DRIVER={IBM i Access ODBC Driver};DATABASE=testdb;HOSTNAME=db2;PORT=50000;PROTOCOL=TCPIP;", "db2inst1", "db2inst1");
    //     echo "<pre>";
    //     print_r($db);
    //     exit;
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    // }

    // try { 
    //     $connection = new PDO("ibm:testdb", "db2inst1", "db2inst1", array(
    //         PDO::ATTR_PERSISTENT => TRUE, 
    //         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    //     ); 
    // }
    // catch (Exception $e) {
    //     echo($e->getMessage());
    // }

    // $database = 'testdb';
    // $user = 'db2inst1';
    // $password = 'db2inst1';
    // $conn = db2_connect($database, $user, $password);

    $driver      = "DRIVER={IBM DB2 ODBC DRIVER};";

    $database    = "testdb";         # Get these database details from
    $hostname    = "localhost";   # the Connect page of the Db2 on Cloud
    $port        = 50000;           # web console.
    $user        = "db2inst1";    #
    $password    = "db2inst1";    #
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
    