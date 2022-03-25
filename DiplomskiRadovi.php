<?php
interface iRadovi
{
    public function create($data);
    public function save();
    public function read();
}

class DiplomskiRad implements iRadovi
{
    private $naziv_rada = NULL;
    private $tekst_rada = NULL;
    private $link_rada = NULL;
    private $oib_tvrtke = NULL;
    private $id = NULL;

    function __construct($data)
    {
        $this->_id = uniqid();
        $this->_naziv_rada = $data['naziv_rada'];
        $this->_tekst_rada = $data['tekst_rada'];
        $this->_link_rada = $data['link_rada'];
        $this->_oib_tvrtke = $data['oib_tvrtke'];
    }

    function create($data)
    {
        self::__construct($data);
    }

    function echoData()
    {
        echo 'Naziv: ' . $this->_naziv_rada . "<br>";
        echo 'Tekst: ' . $this->_tekst_rada . "<br>";
        echo 'Link: ' . $this->_link_rada . "<br>";
        echo 'OIB: ' . $this->_oib_tvrtke . "<br>";
    }

    function save()
    {
        //server settings
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "radovi";

        //connect to server
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //set values
        $id = $this->_id;
        $naziv = $this->_naziv_rada;
        $tekst = $this->_tekst_rada;
        $link = $this->_link_rada;
        $oib = $this->_oib_tvrtke;

        //insert into table
        $sql = "INSERT INTO `diplomski_radovi` (`id`, `naziv_rada`, `tekst_rada`, `link_rada`, `oib_tvrtke`) VALUES ('$id', '$naziv', '$tekst', '$link', '$oib')";
        if ($conn->query($sql) === true) {
            $this->read();
        } else {
            echo "Error! " . $sql . "<br>" . $conn->error;
        };

        //close connection
        $conn->close();
    }

    function read()
    {
        //server settings
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "radovi";

        //connect to server
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //get all values and print
        $sql = "SELECT * FROM `diplomski_radovi`";
        $output = $conn->query($sql);
        if ($output->num_rows > 0) {
            while ($item = $output->fetch_assoc()) {
                $th = new DiplomskiRad($item);
                $th->echoData();
            }
        }

        //close connection
        $conn->close();
    }
}
