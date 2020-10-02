<?php
 namespace App;
 class Cart{
    public $products = null;
    public $totalprice =0;
    public $totalquantity =0;



    public function __construct($Cart)
    {
        if($Cart)
        {
            $this->products = $Cart->products;
            $this->totalprice = $Cart->totalprice;
            $this->totalquantity = $Cart->totalquantity;
            
            
        }
    }


    public function addCart($product,$id_de,$id,$color,$size,$qty)
    {
        //item trong gio hang
        $newproduct =['quantity'=>0,'id_de'=>$id_de, 'color'=>$color,'size'=>$size,'price'=>$product->prices->last()->price,'productInfo'=>$product];
        if ($this->products) {
            if(array_key_exists($id_de, $this->products))
            {
                $newproduct = $this->products[$id_de];
            }
        }
        
        
        $this->totalprice -=  $newproduct['quantity'] * $product->prices->last()->price;
        $newproduct['quantity']+=$qty;
        $newproduct['price'] =  $newproduct['quantity'] * $product->prices->last()->price;
        $this->products[$id_de]= $newproduct;
        $this->totalprice +=  $newproduct['quantity'] * $product->prices->last()->price;
        $this->totalquantity+=$qty;
    }

    public function deleteItemCart($id)
    {
        $this->totalquantity -= $this->products[$id]['quantity'];
        $this->totalprice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function updateItemCart($id,$quantity)
    {
        $this->totalquantity -= $this->products[$id]['quantity'];
        $this->totalprice -= $this->products[$id]['price'];
        
        $this->products[$id]['quantity'] =$quantity;
        $this->products[$id]['price'] =$quantity * $this->products[$id]['productInfo']->prices->last()->price;

        $this->totalquantity += $this->products[$id]['quantity'];
        $this->totalprice += $this->products[$id]['price'];
    }


 }
?>