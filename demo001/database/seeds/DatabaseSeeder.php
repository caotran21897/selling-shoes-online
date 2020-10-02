<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


       $this->call(userSeeder::class);
       $this->call(dateSeeder::class);
       $this->call(brandSeeder::class);
       $this->call(statusSeeder::class);
       $this->call(colorSeeder::class);
       $this->call(ziseSeeder::class);
       $this->call(supplierSeeder::class);
       $this->call(productSeeder::class);
       $this->call(product_colorSeeder::class);
       $this->call(imageseeder::class);
       $this->call(product_detailSeeder::class);
       $this->call(priceSeeder::class);
       $this->call(orderSeeder::class);
       $this->call(order_statusSeeder::class);
       $this->call(order_detailSeeder::class);
       $this->call(billSeeder::class);
       $this->call(sales_promotionSeeder::class);
       $this->call(goods_receiptSeeder::class);
       $this->call(goods_receipt_detailSeeder::class);
       $this->call(product_saleseeder::class);
    }
}

class userSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'birthday'=>'1997-08-12',
            'phone_number'=>'0123456789',
            'role'=>'admin',
            'address'=>Str::random(10).'- Viet Nam',
            'sex'=>'1',
            'created_at'=>now(),'updated_at'=>now()
            ],

            [
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('matkhau'),
            'birthday'=>rand(1960,2010).'-'.rand(1,12).'-'.rand(1,29),
            'phone_number'=>'0'.rand(3,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
            'role'=>null,
            'address'=>Str::random(10).'- Viet Nam',
            'sex'=>rand(0,1),
            'created_at'=>now(),'updated_at'=>now()
            ],

            [
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('matkhau'),
            'birthday'=>rand(1960,2010).'-'.rand(1,12).'-'.rand(1,29),
            'phone_number'=>'0'.rand(3,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
            'role'=>null,
            'address'=>Str::random(10).'- Viet Nam',
            'sex'=>rand(0,1),
            'created_at'=>now(),'updated_at'=>now()
            ],

            [
            'name' => 'user3',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('matkhau'),
            'birthday'=>rand(1960,2010).'-'.rand(1,12).'-'.rand(1,29),
            'phone_number'=>'0'.rand(3,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
            'role'=>null,
            'address'=>Str::random(10).'- Viet Nam',
            'sex'=>rand(0,1),
            'created_at'=>now(),'updated_at'=>now()
            ],

            [
            'name' => 'user4',
            'email' => 'user4@gmail.com',
            'password' => bcrypt('matkhau'),
            'birthday'=>rand(1960,2010).'-'.rand(1,12).'-'.rand(1,29),
            'phone_number'=>'0'.rand(3,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
            'role'=>null,
            'address'=>Str::random(10).'- Viet Nam',
            'sex'=>rand(0,1),
            'created_at'=>now(),'updated_at'=>now()
            ],

            [
            'name' => 'user5',
            'email' => 'user5@gmail.com',
            'password' => bcrypt('matkhau'),
            'birthday'=>rand(1960,2010).'-'.rand(1,12).'-'.rand(1,29),
            'phone_number'=>'0'.rand(3,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
            'role'=>null,
            'address'=>Str::random(10).'- Viet Nam',
            'sex'=>rand(0,1),
            'created_at'=>now(),'updated_at'=>now()
            ],

            [
            'name' => 'user6',
            'email' => 'user6@gmail.com',
            'password' => bcrypt('matkhau'),
            'birthday'=>rand(1960,2010).'-'.rand(1,12).'-'.rand(1,29),
            'phone_number'=>'0'.rand(3,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
            'role'=>null,
            'address'=>Str::random(10).'- Viet Nam',
            'sex'=>rand(0,1),
            'created_at'=>now(),'updated_at'=>now()
            ],
            
          
        ]);
    }
    
}



class colorSeeder extends Seeder
{
    public function run()
    {
        DB::table('colors')->insert([
            ['hex'=>'#000000','color_name'=>'Đen','created_at'=>now(),'updated_at'=>now()],
            ['hex'=>'#FFFFFF','color_name'=>'Trắng','created_at'=>now(),'updated_at'=>now()],
            ['hex'=>'#FF0000','color_name'=>'Đỏ','created_at'=>now(),'updated_at'=>now()],
            ['hex'=>'#0000FF','color_name'=>'Xanh Dương','created_at'=>now(),'updated_at'=>now()],
            ['hex'=>'#FFFF00','color_name'=>'Vàng','created_at'=>now(),'updated_at'=>now()],
            ['hex'=>'#00FFFF','color_name'=>'Xanh Ngọc','created_at'=>now(),'updated_at'=>now()],
            ['hex'=>'#C0C0C0','color_name'=>'Bạc','created_at'=>now(),'updated_at'=>now()],
            ['hex'=>'#808080','color_name'=>'Xám','created_at'=>now(),'updated_at'=>now()],          
            ['hex'=>'#008000','color_name'=>'Xanh Lá','created_at'=>now(),'updated_at'=>now()],
            ['hex'=>'#ff471a','color_name'=>'Cam','created_at'=>now(),'updated_at'=>now()],
           

        ]);
    }
}




class brandSeeder extends Seeder
{
    public function run()
    {
        DB::table('brands')->insert([
            ['brand_name'=>'adidas','created_at'=>now(),'updated_at'=>now()],
            ['brand_name'=>'converse','created_at'=>now(),'updated_at'=>now()],
            ['brand_name'=>'bitis','created_at'=>now(),'updated_at'=>now()],
            ['brand_name'=>'nike','created_at'=>now(),'updated_at'=>now()],
            ['brand_name'=>'vans','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

class ziseSeeder extends Seeder
{
    public function run()
    {
        DB::table('sizes')->insert([
            ['id'=>34,'created_at'=>now(),'updated_at'=>now()],
            ['id'=>35,'created_at'=>now(),'updated_at'=>now()],
            ['id'=>36,'created_at'=>now(),'updated_at'=>now()],
            ['id'=>37,'created_at'=>now(),'updated_at'=>now()],
            ['id'=>38,'created_at'=>now(),'updated_at'=>now()],
            ['id'=>39,'created_at'=>now(),'updated_at'=>now()],
            ['id'=>40,'created_at'=>now(),'updated_at'=>now()],
            ['id'=>41,'created_at'=>now(),'updated_at'=>now()],
            ['id'=>42,'created_at'=>now(),'updated_at'=>now()],
            ]);
    }
}

class statusSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuses')->insert([
            ['status_name'=>'Khởi tạo đơn hàng','created_at'=>now(),'updated_at'=>now()],
            ['status_name'=>'Đang chờ xữ lý','created_at'=>now(),'updated_at'=>now()],
            ['status_name'=>'Đã thanh toán','created_at'=>now(),'updated_at'=>now()],
            ['status_name'=>'Huỷ đơn hàng','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

class dateSeeder extends Seeder
{
    public function run()
    {
        DB::table('dates')->insert([
            ['date_time'=>'2020-03-10 00:00:00'],
            ['date_time'=>'2020-03-25 00:00:00'],
            ['date_time'=>'2020-04-01 08:00:00'],
            ['date_time'=>'2020-04-06 09:00:00'],
            ['date_time'=>'2020-04-12 18:00:00'],
            ['date_time'=>'2020-04-02 08:00:00'],
            ['date_time'=>'2020-04-07 09:00:00'],
            ['date_time'=>'2020-04-13 18:00:00'],
            ['date_time'=>'2020-06-01 00:00:00'],
            ['date_time'=>'2020-06-03 23:59:59'],
            ['date_time'=>'2020-06-12 00:00:00'],
            ['date_time'=>'2020-06-20 23:59:59'],
            ['date_time'=>'2020-07-01 00:00:00'],
            ['date_time'=>'2020-07-05 23:59:59'],
            ['date_time'=>'2020-06-09 00:00:00'],
            ['date_time'=>'2020-06-12 23:59:59'],
            ['date_time'=>'2020-05-20 00:00:00'],
            // ['date_time'=>''],





           
        ]);
    }
}

class supplierSeeder extends Seeder
{
    public function run()
    {
        DB::table('suppliers')->insert([
            ['supplier_name'=>'Công ty giầy Đại Lợi','supplier_address'=>'123 Ngô Quyền - TPHCM','supplier_phone'=>'0988562730'],
            ['supplier_name'=>'Công ty giầy Sao Mai','supplier_address'=>'62 Trần Hưng Đạo - Hà Nội','supplier_phone'=>'03885227642'],
          
        ]);
    }
}



class productSeeder extends Seeder
{
    public function run()
    {
        //style 1 la nam 2 la all 3 la nu
        DB::table('products')->insert([
            ['product_name'=>'ULTRABOOST 20','brand_id'=>1,'show'=>1,'style'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['product_name'=>'EDGE XT','brand_id'=>1,'show'=>1,'style'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_name'=>'Chuck Taylor All Star','brand_id'=>2,'show'=>1,'style'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['product_name'=>'Chuck 70','brand_id'=>2,'show'=>1,'style'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_name'=>'Bitis Hunter X BKL - Midnight Black Inverted','brand_id'=>3,'show'=>1,'style'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['product_name'=>'Bitis Hunter X Midnight Passion','brand_id'=>3,'show'=>1,'style'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_name'=>'Nike Air Force 1','brand_id'=>4,'show'=>1,'style'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['product_name'=>'Jordan Maxin 200','brand_id'=>4,'show'=>1,'style'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_name'=>'AUTHENTIC PLATFORM 2.0','brand_id'=>5,'show'=>1,'style'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['product_name'=>'MADE FOR THE MAKERS AUTHENTIC UC','brand_id'=>5,'show'=>1,'style'=>1,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

class imageseeder extends Seeder
{
    public function run()
    {
        DB::table('images')->insert([


            // ['product_color_id'=>1,'image'=>'upload/1.1.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.2.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.3.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.4.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.5.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.6.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.7.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.8.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.9.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.10.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.11.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.12.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.13.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.14.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.15.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.16.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.17.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.18.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'image'=>'upload/1.19.png','created_at'=>now(),'updated_at'=>now()],
            
            // ['product_color_id'=>1,'image'=>'upload/1.1.webp','created_at'=>now(),'updated_at'=>now()],
            // ['product_color_id'=>1,'image'=>'upload/1.2.webp','created_at'=>now(),'updated_at'=>now()],
            // ['product_color_id'=>1,'image'=>'upload/1.3.webp','created_at'=>now(),'updated_at'=>now()],
            // ['product_color_id'=>1,'image'=>'upload/1.4.webp','created_at'=>now(),'updated_at'=>now()],
            // ['product_color_id'=>1,'image'=>'upload/1.5.webp','created_at'=>now(),'updated_at'=>now()],
            // ['product_color_id'=>1,'image'=>'upload/1.6.webp','created_at'=>now(),'updated_at'=>now()],
           
            
            ['product_color_id'=>2,'image'=>'upload/2.1.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'image'=>'upload/2.2.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'image'=>'upload/2.3.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'image'=>'upload/2.4.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'image'=>'upload/2.5.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'image'=>'upload/2.6.webp','created_at'=>now(),'updated_at'=>now()],
           
            
            ['product_color_id'=>3,'image'=>'upload/3.1.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'image'=>'upload/3.2.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'image'=>'upload/3.3.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'image'=>'upload/3.4.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'image'=>'upload/3.5.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'image'=>'upload/3.6.jpg','created_at'=>now(),'updated_at'=>now()],
          
            
            ['product_color_id'=>4,'image'=>'upload/4.1.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'image'=>'upload/4.2.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'image'=>'upload/4.3.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'image'=>'upload/4.4.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'image'=>'upload/4.5.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'image'=>'upload/4.6.jpg','created_at'=>now(),'updated_at'=>now()],
      
            
            ['product_color_id'=>5,'image'=>'upload/5.1.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'image'=>'upload/5.2.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'image'=>'upload/5.3.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'image'=>'upload/5.4.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'image'=>'upload/5.5.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'image'=>'upload/5.6.webp','created_at'=>now(),'updated_at'=>now()],
       
            ['product_color_id'=>6,'image'=>'upload/6.1.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'image'=>'upload/6.2.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'image'=>'upload/6.3.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'image'=>'upload/6.4.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'image'=>'upload/6.5.webp','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'image'=>'upload/6.6.webp','created_at'=>now(),'updated_at'=>now()],
            
            
            ['product_color_id'=>7,'image'=>'upload/7.1.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'image'=>'upload/7.2.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'image'=>'upload/7.3.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'image'=>'upload/7.4.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'image'=>'upload/7.5.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'image'=>'upload/7.6.jpg','created_at'=>now(),'updated_at'=>now()],
          
            
            ['product_color_id'=>8,'image'=>'upload/8.1.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'image'=>'upload/8.2.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'image'=>'upload/8.3.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'image'=>'upload/8.4.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'image'=>'upload/8.5.jpg','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'image'=>'upload/8.6.jpg','created_at'=>now(),'updated_at'=>now()],
       
            
            ['product_color_id'=>9,'image'=>'upload/9.1.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'image'=>'upload/9.2.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'image'=>'upload/9.3.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'image'=>'upload/9.4.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'image'=>'upload/9.5.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'image'=>'upload/9.6.png','created_at'=>now(),'updated_at'=>now()],
          
            
            ['product_color_id'=>10,'image'=>'upload/10.1.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'image'=>'upload/10.2.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'image'=>'upload/10.3.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'image'=>'upload/10.4.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'image'=>'upload/10.5.png','created_at'=>now(),'updated_at'=>now()],

            ['product_color_id'=>11,'image'=>'upload/11.1.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.2.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.3.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.4.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.5.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.6.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.7.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.8.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.9.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.10.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.11.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.12.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.13.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.14.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.15.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.16.png','created_at'=>now(),'updated_at'=>now()],
            // ['product_color_id'=>11,'image'=>'upload/11.17.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.18.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.19.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.20.png','created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'image'=>'upload/11.21.png','created_at'=>now(),'updated_at'=>now()],
            
        ]);
    }

}

class product_detailSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_details')->insert([
            ['product_color_id'=>1,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'size_id'=>35,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'size_id'=>38,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'size_id'=>40,'quantity'=>4,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>1,'size_id'=>42,'quantity'=>4,'created_at'=>now(),'updated_at'=>now()],

            ['product_color_id'=>2,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'size_id'=>35,'quantity'=>4,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'size_id'=>38,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'size_id'=>40,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>2,'size_id'=>42,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],

            ['product_color_id'=>3,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'size_id'=>35,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'size_id'=>38,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'size_id'=>40,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>3,'size_id'=>42,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],

            ['product_color_id'=>4,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'size_id'=>35,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'size_id'=>38,'quantity'=>4,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'size_id'=>40,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>4,'size_id'=>42,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],

            ['product_color_id'=>5,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'size_id'=>35,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'size_id'=>38,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'size_id'=>40,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>5,'size_id'=>42,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],

            ['product_color_id'=>6,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'size_id'=>35,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'size_id'=>38,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'size_id'=>40,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>6,'size_id'=>42,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],

            ['product_color_id'=>7,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'size_id'=>35,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'size_id'=>38,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'size_id'=>40,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>7,'size_id'=>42,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],

            ['product_color_id'=>8,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'size_id'=>35,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'size_id'=>38,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'size_id'=>40,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>8,'size_id'=>42,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],

            ['product_color_id'=>9,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'size_id'=>35,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'size_id'=>38,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'size_id'=>40,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>9,'size_id'=>42,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],

            ['product_color_id'=>10,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'size_id'=>35,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'size_id'=>38,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'size_id'=>40,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>10,'size_id'=>42,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            
            ['product_color_id'=>11,'size_id'=>34,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'size_id'=>35,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'size_id'=>36,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'size_id'=>37,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'size_id'=>38,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'size_id'=>39,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'size_id'=>40,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'size_id'=>41,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['product_color_id'=>11,'size_id'=>42,'quantity'=>5,'created_at'=>now(),'updated_at'=>now()],
            
        ]);
    }
}

class priceSeeder extends Seeder
{
    public function run()
    {
        DB::table('prices')->insert([
            ['product_id'=>1,'price'=>4633000,'date_apply'=>'2020-03-25 00:00:00','created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>2,'price'=>4045000 ,'date_apply'=>'2020-03-25 00:00:00','created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>3,'price'=>1740000,'date_apply'=>'2020-03-25 00:00:00','created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>4,'price'=>1805000,'date_apply'=>'2020-03-25 00:00:00','created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>5,'price'=>999000,'date_apply'=>'2020-03-25 00:00:00','created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>6,'price'=>899000,'date_apply'=>'2020-03-25 00:00:00','created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>7,'price'=>2315000,'date_apply'=>'2020-03-25 00:00:00','created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>8,'price'=>3618000,'date_apply'=>'2020-03-25 00:00:00','created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>9,'price'=>1694000,'date_apply'=>'2020-03-25 00:00:00','created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>10,'price'=>1505000,'date_apply'=>'2020-03-25 00:00:00','created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>1,'price'=>4533000,'date_apply'=>'2020-05-20 00:00:00','created_at'=>now(),'updated_at'=>now()],
          
        ]);
    }
}

class goods_receiptSeeder extends Seeder
{
    public function run()
    {
        DB::table('goods_receipts')->insert([
            ['supplier_id'=>1,'date_receipt'=>'2020-03-10 00:00:00','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

class goods_receipt_detailSeeder extends Seeder
{
    public function run()
    {
        DB::table('goods_receipt_details')->insert([
            ['goods_receipt_id'=>1,'product_detail_id'=>1,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>2,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>3,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>4,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>5,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>6,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>7,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>8,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>9,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>10,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            
            ['goods_receipt_id'=>1,'product_detail_id'=>11,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>12,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>13,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>14,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>15,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>16,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>17,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>18,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>19,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>20,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
           
            ['goods_receipt_id'=>1,'product_detail_id'=>21,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>22,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>23,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>24,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>25,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>26,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>27,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>28,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>29,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>30,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
           
            ['goods_receipt_id'=>1,'product_detail_id'=>31,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>32,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>33,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>34,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>35,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>36,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>37,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>38,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>39,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>40,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            
            ['goods_receipt_id'=>1,'product_detail_id'=>41,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>42,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>43,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>44,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>45,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>46,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>47,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>48,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>49,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>50,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            
            ['goods_receipt_id'=>1,'product_detail_id'=>51,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>52,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>53,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>54,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>55,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>56,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>57,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>58,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>59,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>60,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            
            ['goods_receipt_id'=>1,'product_detail_id'=>61,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>62,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>63,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>64,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>65,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>66,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>67,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>68,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>69,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>70,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            
            ['goods_receipt_id'=>1,'product_detail_id'=>71,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>72,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>73,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>74,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>75,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>76,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>77,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>78,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>79,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>80,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            
            ['goods_receipt_id'=>1,'product_detail_id'=>81,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>82,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>83,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>84,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>85,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>86,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>87,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>88,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>89,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>90,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            
            ['goods_receipt_id'=>1,'product_detail_id'=>91,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>92,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>93,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>94,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>95,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>96,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>97,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>98,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            ['goods_receipt_id'=>1,'product_detail_id'=>99,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
            // ['goods_receipt_id'=>1,'product_detail_id'=>100,'quantity_receipt'=>5,'price_receipt'=>220000,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}



class orderSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            ['user_id'=>2,'date_buy'=>'2020-04-01 08:00:00','payment'=>1,'address_pay'=>'NVL123','created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>4,'date_buy'=>'2020-04-06 09:00:00','payment'=>1,'address_pay'=>'NVL456','created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>6,'date_buy'=>'2020-04-12 18:00:00','payment'=>1,'address_pay'=>'NVL789','created_at'=>now(),'updated_at'=>now()],

        ]);
    }
}

class order_statusSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_statuses')->insert([
            ['order_id'=>1,'status_id'=>3,'time_update'=>'2020-04-02 08:00:00','created_at'=>now(),'updated_at'=>now()],
            ['order_id'=>2,'status_id'=>3,'time_update'=>'2020-04-07 09:00:00','created_at'=>now(),'updated_at'=>now()],
            ['order_id'=>3,'status_id'=>3,'time_update'=>'2020-04-13 18:00:00','created_at'=>now(),'updated_at'=>now()],
           
        ]);
    }
}

class order_detailSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_details')->insert([
            ['order_id'=>1,'product_detail_id'=>7,'quantity_buy'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['order_id'=>2,'product_detail_id'=>12,'quantity_buy'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['order_id'=>3,'product_detail_id'=>9,'quantity_buy'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['order_id'=>3,'product_detail_id'=>35,'quantity_buy'=>1,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}


class billSeeder extends Seeder
{
    public function run()
    {
        DB::table('bills')->insert([
            ['order_id'=>1,'sum'=>250000],
            ['order_id'=>2,'sum'=>250000],
            ['order_id'=>3,'sum'=>500000],
        ]);
    }
}

class sales_promotionSeeder extends Seeder
{
    public function run()
    {
        DB::table('sale_promotions')->insert([
            ['sale_detail'=>'Quốc tế thiếu nhi','discount'=>10,'begin'=>'2020-06-01 00:00:00','end'=>'2020-06-03 23:59:59','created_at'=>now(),'updated_at'=>now()],
            ['sale_detail'=>'kỉ niện thành lập','discount'=>20,'begin'=>'2020-06-12 00:00:00','end'=>'2020-06-20 23:59:59','created_at'=>now(),'updated_at'=>now()],
            ['sale_detail'=>'tháng 7 may mắn','discount'=>15,'begin'=>'2020-07-01 00:00:00','end'=>'2020-07-05 23:59:59','created_at'=>now(),'updated_at'=>now()],
            
            ['sale_detail'=>'test','discount'=>10,'begin'=>'2020-06-09 00:00:00','end'=>'2020-06-12 23:59:59','created_at'=>now(),'updated_at'=>now()],
           
        ]);
    }
}

class product_colorSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_colors')->insert([
            ['product_id'=>1,'color_id'=>10,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>2,'color_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>3,'color_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>4,'color_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>5,'color_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>6,'color_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>7,'color_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>8,'color_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>9,'color_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>10,'color_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>1,'color_id'=>6,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}

class product_saleseeder extends Seeder
{
    public function run()
    {
        DB::table('product_sale')->insert([
            ['product_id'=>1,'sale_promotion_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>3,'sale_promotion_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>4,'sale_promotion_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>6,'sale_promotion_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>8,'sale_promotion_id'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>10,'sale_promotion_id'=>1,'created_at'=>now(),'updated_at'=>now()],

            ['product_id'=>1,'sale_promotion_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>2,'sale_promotion_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>5,'sale_promotion_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>6,'sale_promotion_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>8,'sale_promotion_id'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>9,'sale_promotion_id'=>2,'created_at'=>now(),'updated_at'=>now()],

            ['product_id'=>3,'sale_promotion_id'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>5,'sale_promotion_id'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>7,'sale_promotion_id'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>8,'sale_promotion_id'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>10,'sale_promotion_id'=>3,'created_at'=>now(),'updated_at'=>now()],

            ['product_id'=>1,'sale_promotion_id'=>4,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>2,'sale_promotion_id'=>4,'created_at'=>now(),'updated_at'=>now()],
            ['product_id'=>4,'sale_promotion_id'=>4,'created_at'=>now(),'updated_at'=>now()],
           
        ]);
    }
}

