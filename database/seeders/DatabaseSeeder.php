<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        DB::table('statuses')->insert([
            'category'      => 'order',
            'code'          => 'BOR',
            'next_code'     => 'PAG',
            'description'   => 'borrador',
            'priority'      => 20,
            'exec_function' => null,
            'html_icon'     => null,
            'is_active'     => true
        ]);
        DB::table('statuses')->insert([
            'category'    => 'order',
            'code'        => 'PAG',
            'next_code'   => 'EMP',
            'description' => 'Pagar',
            'priority'    => 60,
            'exec_function' => 'Pay',
            'html_icon'     =>  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                                </svg>',
            'is_active'   => true
        ]);
        DB::table('statuses')->insert([
            'category'    => 'order',
            'code'        => 'EMP',
            'next_code'   => 'ENV',
            'description' => 'Empacar',
            'priority'    => 30,
            'exec_function' => null,
            'html_icon'     => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                                </svg>',
            'is_active'   => true
        ]);
        DB::table('statuses')->insert([
            'category'    => 'order',
            'code'        => 'ENV',
            'next_code'   => 'TER',
            'description' => 'Enviar',
            'priority'    => 10,
            'exec_function' => null,
            'html_icon'     =>  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>',
            'is_active'   => true
        ]);
        DB::table('statuses')->insert([
            'category'    => 'order',
            'code'        => 'TER',
            'next_code'   => 'TER',
            'description' => 'Terminar',
            'priority'    => 0,
            'exec_function' => null,
            'html_icon'     =>  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>',
            'is_active'   => true
        ]);
        DB::table('statuses')->insert([
            'category'    => 'order',
            'code'        => 'CAN',
            'next_code'   => 'CAN',
            'description' => 'cancelar',
            'priority'    => 0,
            'exec_function' => null,
            'html_icon'     => null,
            'is_active'   => true
        ]);
        DB::table('statuses')->insert([
            'category'    => 'order',
            'code'        => 'CON',
            'next_code'   => 'EMP',
            'description' => 'contratiempo',
            'priority'    => 100,
            'exec_function' => null,
            'html_icon'     =>  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16">
                                    <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>',
            'is_active'   => true
        ]);

        DB::table('clients')->insert([
            'name'          => 'Invitado',
            'phone'         => '0000-0000',
            'is_active'     => true,
            ]);

        DB::table('shipping_informations')->insert([
            'client_id'   => 1,
            'name_holder' => 'Invitado',
            'phone'       => '0000-0000',
            'city'        => 'CITY',
            'address'     => 'ADDRESS',
            'is_active'   => true,
            'is_default'  => true,
            'is_locked'   => false
        ]);

        /**
        * \App\Models\Product::factory(25)->create();
        * \App\Models\Client::factory(5)->create();
        * \App\Models\Shipping_information::factory(15)->create();
        */

    }
}
