Sistema DEPAE top top

https://gitlab.com/viniciusrosa444/depae.git

https://auth-db97.hostinger.com/index.php?db=u504061722_rdd

u504061722_rdd

rddrddrdd

function conecta()
{
    try {
        $con =
            new PDO("mysql:host=mysql.hostinger.com;dbname=u504061722_rdd", "u504061722_rdd", "rddrddrdd");
        $con->query("SET NAMES utf8");
        return $con;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}