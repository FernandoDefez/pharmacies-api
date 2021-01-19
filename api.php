<?php

spl_autoload_register(function($class){
    include("$class.class.php");
});

class Api 
{

    public function getAllProductsFromAPharmacy($pharmacyId){
        $obj = new Product(new Connection);
        $products = array();
        $res = $obj->getProductsFromAPharmacy($pharmacyId);

        if($res->rowCount())
        {    
            while ($row = $res->fetch(PDO::FETCH_ASSOC))
            {
                $temp = array( 
                    "productId" => $row['PRO_ID'],
                    "productName" => $row['PRO_NAME'],
                    "productDesc" => $row['PRO_DESC'],
                    "productRoute" => $row['PRO_ROUTE_OF_ADM'],
                    "productTips" => $row['PRO_TIPS'],
                    "productLab" => $row['PRO_LAB'],
                    "productQuant" => $row['PRO_QUANT']
                );
                array_push($products, $temp);
            }
            echo json_encode(array($products));
        }else{
            echo json_encode(array('message' =>  'Empty Stock' ));
        }
    }

    public function getAllCategoriesFromAPharmacy($pharmacyId){
        $obj = new Product(new Connection);
        $categories = array();
        $res = $obj->getCategoriesFromAPharmacy($pharmacyId);

        if($res->rowCount())
        {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) 
            {
                $temp = array( 
                    "category" => $row['CAT_NAME']
                );
                array_push($categories, $temp);
            }
            echo json_encode(array($categories));
        }else{
            echo json_encode(array('message' =>  'There is no categories from this pharmacy' ));
        }
    }


    public function getAllProductsFromAPharmacyByCategory($category, $pharmacyId){
        $obj = new Product(new Connection);
        $products = array();
        $res = $obj->getProductsFromAPharmacyByCategory($category, $pharmacyId);

        if($res->rowCount())
        {    
            while ($row = $res->fetch(PDO::FETCH_ASSOC))
            {
                $temp = array( 
                    "productId" => $row['PRO_ID'],
                    "productName" => $row['PRO_NAME'],
                    "productDesc" => $row['PRO_DESC'],
                    "productRoute" => $row['PRO_ROUTE_OF_ADM'],
                    "productTips" => $row['PRO_TIPS'],
                    "productLab" => $row['PRO_LAB'],
                    "productQuant" => $row['PRO_QUANT']
                );
                array_push($products, $temp);
            }
            echo json_encode(array($products));
        }else{
            echo json_encode(array('message' =>  'Empty Stock' ));
        }
    }


    public function getAllProductsFromAPharmacyByName($productName, $pharmacyId){
        $obj = new Product(new Connection);
        $res = $obj->getProductsFromAPharmacyByName($productName, $pharmacyId);
        $products = array();
        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $temp = array(
                    "productId" => $row['PRO_ID'],
                    "productName" => $row['PRO_NAME'],
                    "productDesc" => $row['PRO_DESC'],
                    "productRoute" => $row['PRO_ROUTE_OF_ADM'],
                    "productTips" => $row['PRO_TIPS'],
                    "productLab" => $row['PRO_LAB'],
                    "productQuant" => $row['PRO_QUANT']
                );
                array_push($products, $temp);
            }
            echo json_encode(array($products));
        }else{
            echo json_encode(array("message"=>"There is no such product"));
        }
    }

    /**
     *  Pharmacies Methods
     */
    public function getAllPharmacies(){
        //Getting all the methods that are in pharmacy
        $obj = new Pharmacy(new Connection);
        $res = $obj->getPharmacies();
        
        //Declaring an object array for creating an JSON of it
        $stock = array();
        $stock = array();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                //Declaring a temporal array for the temp array
                $temp = array(
                    "stockId" => $row["STOCK_ID"],
                    "pharmacyId" => $row["PHA_ID"]
                );
                array_push($stock, $temp);
            }
            echo json_encode(array($stock));
        }else{
            echo json_encode(array('message' =>  'There are any pharmacies' ));
        }
    }
}

?>