<?php
 namespace App;
 class Sale{
    public $products = null;
    public $num =0;

    public function __construct($Sale)
    {
        if($Sale)
        {
            $this->products = $Sale->products;  
            $this->num = $Sale->num;
        }
    }

    
    public function addSale($product,$id)
    {
        //item trong gio hang
        $newproduct =['productInfo'=>$product,'id'=>$id];
        if ($this->products) {
            if(array_key_exists($id, $this->products))
            {
                $newproduct = $this->products[$id];
                
            }
        }
       
        $this->products[$id]= $newproduct;
        $this->num++;
        
    }

    public function deleteItemSale($id)
    {$this->num--;
        unset($this->products[$id]);
        
    }

 }
?>