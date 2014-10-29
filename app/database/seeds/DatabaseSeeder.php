<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
		$this->call('MenuItemsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('BrandsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('OrdersTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('SuppliersTableSeeder');
	}


}
