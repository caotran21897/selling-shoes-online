<?php
 namespace App;
 class Receipt{
    public $products = null;
    public $totalprice =0;
    public $totalquantity =0;



    public function __construct($Receipt)
    {
        if($Receipt)
        {
            $this->products = $Receipt->products;
            $this->totalprice = $Receipt->totalprice;
            $this->totalquantity = $Receipt->totalquantity;
            
            
        }
    }

    
    public function addReceipt($product,$id_de,$id,$color,$size,$qty,$pri)
    {
        //item trong gio hang
        $newproduct =['quantity'=>0,'id_de'=>$id_de, 'pri'=>0, 'color'=>$color,'size'=>$size,'price'=>0,'productInfo'=>$product];
        if ($this->products) {
            if(array_key_exists($id_de, $this->products))
            {
                $newproduct = $this->products[$id_de];
            }
        }
        
        
        $this->totalprice -=  $newproduct['price'];
        $newproduct['quantity']+=$qty;
        $newproduct['pri']=$pri;
        $newproduct['price'] =  $newproduct['quantity'] * $pri;
        $this->products[$id_de]= $newproduct;
        $this->totalprice +=  $newproduct['price'];
        $this->totalquantity+=$qty;
    }

    public function deleteItemReceipt($id)
    {
        $this->totalquantity -= $this->products[$id]['quantity'];
        $this->totalprice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function updateItemReceipt($id,$quantity,$pri)
    {
        $this->totalquantity -= $this->products[$id]['quantity'];
        $this->totalprice -= $this->products[$id]['price'];
        
        $this->products[$id]['quantity'] =$quantity;
        $this->products[$id]['price'] =$quantity * $pri;

        $this->totalquantity += $this->products[$id]['quantity'];
        $this->totalprice += $this->products[$id]['price'];
    }


 }
?>