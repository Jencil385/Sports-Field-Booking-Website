    <?php

class DbConnector {//extends SystemComponent {

var $theQuery;
var $link;

//*** Function: DbConnector, Purpose: Connect to the database ***
public function __construct(){
     $host='localhost:3306';
    $user='root';
    $pass='';
    $db= 'crossfit';
    $this->link = mysqli_connect($host, $user, $pass);
    mysqli_select_db($this->link,$db);
    register_shutdown_function(array(&$this, 'close'));
}

//*** Function: query, Purpose: Execute a database query ***
function query($query) {
    $this->theQuery = $query;
    return mysqli_query($this->link,$query);
}

//*** Function: getQuery, Purpose: Returns the last database query, for debugging ***
function getQuery() {
    return $this->theQuery;
}

//*** Function: getNumRows, Purpose: Return row count, MySQL version ***
function getNumRows($result) {
    return mysqli_num_rows($result);
}

//*** Function: fetchArray, Purpose: Get array of query results ***
function fetchArray($result) {
    return mysqli_fetch_array($result);
}

//*** Function: close, Purpose: Close the connection ***
function close() {
    mysqli_close($this->link);
}

function escapeString($val){
    return mysqli_real_escape_string($this->link,$val);
}

function getSingleRow($result){
    return mysqli_fetch_assoc($result);
}

function prepare($sql){
    return mysqli_prepare($this->link,$sql);
}
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);
        
        echo '<script>console.log( "Debug Objects: ' . $output . '" );</script>';
}

function ExecutePreparedStatement($query,$dataType,$values)
{
 if ($stmt = mysqli_prepare($this->link, $query)) {
    /* bind parameters for markers */
 //$params=&$values;

  $params = array();
        foreach($values as $key => $value){
            if($key==5 || $key==6){
              $values[$key]=password_hash($values[$key], PASSWORD_DEFAULT);
            }
            $params[$key] = &$values[$key];

        }

     array_unshift($params,$stmt,$dataType);
    call_user_func_array("mysqli_stmt_bind_param",$params);
    /* execute query */
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
}

function ExecutePreparedStatementInsert($query,$dataType,$values)
{
 if ($stmt = mysqli_prepare($this->link, $query)) {
    /* bind parameters for markers */
 //$params=&$values;

  $params = array();
        foreach($values as $key => $value){
            $params[$key] = &$values[$key];

        }
     
     array_unshift($params,$stmt,$dataType);
    call_user_func_array("mysqli_stmt_bind_param",$params);
    /* execute query */
   mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
}
}
?>
