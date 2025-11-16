<?php

include 'connectdb.php';

function getAllProducts(){
    $conn = Connect();

    $query = 'SELECT * FROM product';
    $result = $conn->query($query); 
    $data=[]; //data set
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}
?>

<?php
function getAllOrders(){
    $conn = Connect();

    $query = 'SELECT invoice.inv_number, invoice.inv_date, invoice.inv_subtotal, invoice.inv_tax, invoice.inv_total,customer.cus_code,
                    CONCAT(customer.cus_fname," ",customer.cus_lname) AS CustomerName
              FROM invoice
              INNER JOIN customer ON invoice.cus_code = customer.cus_code
              ORDER BY invoice.inv_number ASC
              ';
    $result = $conn->query($query); 
    $data = [];
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}

?>