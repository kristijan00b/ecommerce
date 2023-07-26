<?php
class Order {	
   
	private $ordersTable = 'gamy_orders';	
	private $conn;
	private $item_id;
    private $item_name;
    private $item_price;
    private $item_quantity;
    private $order_date;
    private $client_name;
    private $client_surname;
    private $client_mail;
    private $client_city;
    private $client_address;
    private $client_phone;
    private $item_size;

	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function insert($item_id, $item_name, $item_price, $item_quantity, $order_date,
                       $client_name, $client_surname, $client_mail, $client_city, $client_address, $client_phone, $item_size){
    if ($item_name) {
        $stmt = $this->conn->prepare("
            INSERT INTO ".$this->ordersTable."(`item_id`, `item_name`, `item_price`, `item_quantity`, `order_date`,
            `client_name`,`client_surname`,`client_mail`,`client_city`,`client_address`,`client_phone`,`item_size`)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");		

        $stmt->bind_param("ississssssss", $item_id, $item_name, $item_price, $item_quantity, $order_date,
                          $client_name, $client_surname, $client_mail, $client_city, $client_address, $client_phone, $item_size);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

public function ordersList(){		
    $stmt = $this->conn->prepare("SELECT id, item_id, item_name, item_price, item_quantity, order_date,
                                client_name, client_surname, client_city, client_address, client_phone, client_mail, item_size FROM ".$this->ordersTable);				
    $stmt->execute();			
    $result = $stmt->get_result();		
    return $result;	
}


}
?>