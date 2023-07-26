<?php
class Item {	
   
	private $gamyItemsTable = 'gamy_items';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function itemsList(){		
		$stmt = $this->conn->prepare("SELECT id, name, price, description, images, images_front, images_back FROM ".$this->gamyItemsTable);				
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}
	public function getItemById($item_id) {
        $stmt = $this->conn->prepare("SELECT id, name, price, description, images, images_front, images_back FROM ".$this->gamyItemsTable." WHERE id = ?");
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
?>