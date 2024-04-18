<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_status = [
            [
                'name'              =>'Approved',
                'created_at'        =>date('Y-m-d H:i:s'),
                'updated_at'        =>date('Y-m-d H:i:s')
            ],
            [
                'name'              =>'Rejected',
                'created_at'        =>date('Y-m-d H:i:s'),
                'updated_at'        =>date('Y-m-d H:i:s')
            ],
            [
                'name'              =>'Prosses',
                'created_at'        =>date('Y-m-d H:i:s'),
                'updated_at'        =>date('Y-m-d H:i:s')
            ],
            [
                'name'              =>'Approved',
                'created_at'        =>date('Y-m-d H:i:s'),
                'updated_at'        =>date('Y-m-d H:i:s')
            ]
        ];
        OrderStatus::insert($order_status);
    }
}
