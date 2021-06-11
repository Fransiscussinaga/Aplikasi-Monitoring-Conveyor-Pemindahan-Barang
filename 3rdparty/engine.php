<?php

  class database_daya
  {
    var $server,
        $host,
        $user,
        $password,
        $database;

    function database_daya($db_name = '', $db_password = '', $db_user = '', $db_host = 'localhost', $debug = '')
    {
      $this->host = $db_host;
      $this->user = $db_user;
      $this->password = $db_password;
      $this->database = $db_name;

      $this->open();
    }

    function open()
    {
      $this->server = @mysql_connect($this->host, $this->user, $this->password) or die("Couldn't connect to SQL server");
      @mysql_select_db($this->database, $this->server);
    }

    function query($sql, $debug = 0)
    {

      if($debug)
        echo "database/query :<strong>$sql</strong>:<br>\n";


      $result = @mysql_query($sql, $this->server);

      if( ($sql[0] == 'i') || ($sql[0] == 'I') )
        return mysql_insert_id();

      while( $row = @mysql_fetch_array($result) )
        $data[] = $row;


    if(isset($data)){
    return $data;
    }

    }

    function queryItem($sql, $debug = 0)
    {
      $result = $this->query($sql." LIMIT 0,1", $debug);
      return $result[0][0];
    }
  };
  
  
  $db = new database_daya("proyek1", "", "root", "localhost");

?>