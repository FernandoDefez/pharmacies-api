<?php

class Product #extends Connection sin constructor
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }
 
    public function getProductsFromAPharmacy($pharmacyId){
        try{
            $query = "SELECT * FROM PRODUCTS_VIEW WHERE  PHA_ID = :pharmacyId";
            $stmt = $this->con->getConnection()->prepare($query);
            $stmt->bindParam(":pharmacyId", $pharmacyId);
            $stmt->execute();
            return $stmt;
            echo $stmt;
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $this->con = null;
    }


    public function getCategoriesFromAPharmacy($pharmacyId){
        try{
            $stmt = $this->con->getConnection()->prepare("SELECT DISTINCT(CAT_NAME) FROM CATEGORIES INNER JOIN PRODUCTS ON PRODUCTS.CAT_ID_FK = CAT_ID INNER JOIN STOCK ON STOCK_ID_FK = STOCK.STOCK_ID WHERE  PHA_ID = :pharmacyId");
            $stmt->bindParam(":pharmacyId",$pharmacyId);
            $stmt->execute();
            return $stmt;
            echo $stmt;
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $this->con = null;
    }


    public function getProductsFromAPharmacyByCategory($category, $pharmacyId){
        try{
            $query = "SELECT * FROM PRODUCTS_VIEW WHERE  CAT_NAME = :category AND PHA_ID= :pharmacyId";
            $stmt = $this->con->getConnection()->prepare($query);
            $stmt->bindParam(":category", $category);
            $stmt->bindParam(":pharmacyId", $pharmacyId);
            $stmt->execute();
            return $stmt;
            echo $stmt;
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $this->con = null;
    }

    public function getProductsFromAPharmacyByName($productName, $pharmacyId){
        try {
            $sql = "SELECT * FROM PRODUCTS_VIEW WHERE PHA_ID = :pharmacyId AND PRO_NAME LIKE '$productName%'";
            $stmt = $this->con->getConnection()->prepare($sql);
            $stmt->bindParam(":pharmacyId", $pharmacyId);
            $stmt->execute();
            return $stmt;
            echo $stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>