<?php
include 'vendor/autoload.php';

use Doctrine\DBAL\DriverManager;

$connectionParams = array(
    'dbname'   => 'test',
    'user'     => 'root',
    'password' => 'apdi',
    'host'     => '192.168.0.19',
    'driver'   => 'pdo_mysql',
    );

/*
 * http://doctrine-orm.readthedocs.io/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html
 */
$conn = DriverManager::getConnection($connectionParams);

////insert
$conn->insert('usuario', array('nombre'=>'wladimir'));
////delete
$conn->delete('usuario', array('id'=>1));
////$update
$conn->update('usuario', array('user' => 'admin'), array('id' => 1));
//
//
////select
$users = $conn->fetchAll('SELECT * FROM usuario');


/*
array(
  0 => array(
    'username' => 'jwage',
    'password' => 'changeme'
  )
)
*/



/*
 * 
 * info con query builder
 * http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/query-builder.html
 */

$result= $conn->createQueryBuilder()
        ->select('*')
        ->from('usuario')->execute();

foreach ($result as $value) {
    echo $value['id'].'  -  ' .$value['nombre'] .'</br>'; 
}