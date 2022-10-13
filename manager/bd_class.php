<?php
session_start();
class App
 {
    private $db_name, $db_user, $db_pass, $db_host, $pdo;
    public $status = 0;
  
 

    public function __construct( $db_name = "malki_business", $db_user = "root", $db_pass = "", $db_host = 'localhost' )
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function getPDO()
    {
        try {
            if ( $this->pdo === null ) {
                $pdo_ = new PDO( 'mysql:host=' . $this->db_host . '; port=3306; dbname=' . $this->db_name . ';charset=utf8', $this->db_user, $this->db_pass );
                $pdo_->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
                $this->pdo = $pdo_;
            }
        } catch ( PDOException $ex ) {
        die( $ex->getMessage() );
        }
        return $this->pdo;
    }

    public function query_exec( $statement )
    {
        $req = $this->getPDO()->query( $statement );
        $data = $req->fetchAll( PDO::FETCH_OBJ );
        return $data;
    }
    
    public function prepare( $statement, $attribut = [], $test )
    {
        try {
            $req = $this->getPDO()->prepare( $statement );
            switch ( $test ) {
                //lors de l'insertion ou update
                case 1:
                     return $req->execute($attribut);
                       
                break;
                //lors de l'affichage
                case 6:
                    $req->execute();
                return $req->fetchAll();
                break;
                //login
                case 2:
                    $req->execute($attribut);
                return $req->rowCount();
                break;

                default:
                     $req->execute( $attribut );
                return ( $req->fetchAll() );
            }
        } catch ( PDOException $exception ) {
             die( $exception->getMessage());
        }
    }

    public function fetchPrepared( $statement )
    {
        $req = $this->getPDO()->prepare( $statement );
        $req->execute();
        return $req->fetchAll();
    }
    public function fetch( $statement )
    {
        $req = $this->getPDO()->query( $statement );
        $data = $req->fetch();
        return $data;
    }
    public function rowCount( $statement )
    {
        $req = $this->getPDO()->query( $statement );
        $data = $req->rowCount();
        return $data;
    }

    public function getValues($rqt)
    {
        $querry = $this->getPDO()->prepare($rqt);
        $querry->execute();
        while ($row = $querry->fetch()) {
            return $row["value"];
        }
        return null;
    }
    public function dateconv( $date )
    {
        $dateconv = date("d/m/Y", strtotime($date));
        return $dateconv;
    }
    public function sendMessage($to,$text,$source){



        $from    ="$source";

        $username='espoesbaoot9y2022';

        $password='esm81012';

        // $tel=substr($to,1);

        // $url="https://doddymatabaroispbukavu.000webhostapp.com/?num=$tel&message=$text";

        

        $url     ="https://www.easysendsms.com/sms/bulksms-api/bulksms-api?username=$username&password=$password&from=$from&to=$to&text=$text&type=0";

        $urt     = str_replace(" ", '%20', $url);

        $sms     =curl_init($urt);

        curl_setopt_array($sms,[

            CURLOPT_HEADER=>true,

            CURLOPT_RETURNTRANSFER=>true,

            CURLOPT_HTTPHEADER    , array('Content-Type: application/json'),

            CURLOPT_TIMEOUT=>20

            ]

        );

        $data     =curl_exec($sms);

        

             if($data===true){

              

             }else{

                 if(curl_getinfo($sms,CURLINFO_HTTP_CODE)===200){

                    return true;

                 }else{

                    return false;

                 }

             }

        curl_close ($sms);

    }

 }

 $app=new App('malki_business');
