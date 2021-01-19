<?php
    include_once('api.php');

    //echo "Hola";

    $api = new Api();

    /** Getting all the pharmacies that are in our database * */
    if (isset($_GET['pharmacies'])){
        $args = $_GET['pharmacies'];
        if($args == "all"){
            $api->getAllPharmacies();
        }
    }

   
    if (isset($_GET['pharmacyId'])){
        $pharmacyid = $_GET['pharmacyId'];
        $api->getAllCategoriesFromAPharmacy($pharmacyid);
    }
    

    if (isset($_GET['selectedCategory'])){
        $category = $_GET['selectedCategory'];
        $id = $_GET['id'];
        if($category == "all"){
            $api->getAllProductsFromAPharmacy($id);
        }
        else if($category == "Analgésicos"){
            $api->getAllProductsFromAPharmacyByCategory($category, $id);
        }
        else if($category == "Antiácidos"){
            $api->getAllProductsFromAPharmacyByCategory($category, $id);
        }
        else if($category == "Antiinflamatorios"){
            $api->getAllProductsFromAPharmacyByCategory($category, $id);
        }
        else if($category == "Laxantes"){
            $api->getAllProductsFromAPharmacyByCategory($category, $id);
        }
    }

    

    if (isset($_GET['search'])){
        if (isset($_GET['phaId'])) {
            $search = $_GET['search'];
            $pha_id = $_GET['phaId'];
            $api->getAllProductsFromAPharmacyByName($search, $pha_id);
        }
    }

    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");
?> 