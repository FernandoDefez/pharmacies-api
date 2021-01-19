<?php
class Pharmacy #extends Connection sin constructor
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }
    
    public function getPharmacies(){
        try{
            $stmt = $this->con->getConnection()->prepare("SELECT * FROM STOCK;");
            $stmt->execute();
            return $stmt;
        }catch(PDOException $e) {
            return $e->getMessage();
        }
        $this->con = null;
    }
}
?>