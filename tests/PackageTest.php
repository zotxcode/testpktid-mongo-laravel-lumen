<?php

use App\Transaction;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class PackageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldReturnAllPackages(){

        $this->get("api/package", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            ['*' => 'transaction_id']
        ]);
        
    }


    public function testShouldReturnPackage(){
        $tr = Transaction::first();

        $this->get("api/package/".$tr->transaction_id, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            ['*' => 'transaction_id']
        ]);
        
    }

    public function testShouldReturnInsertPackage(){
        $parameters = [
            "customer_code" => "1678593",
            "origin_customer_code" => "9999999",
            "destination_customer_code" => "8888888",
            "transaction_amount" => "70700",
            "transaction_discount" => "0",
            "transaction_additional_field" => "",
            "transaction_payment_type" => "29",
            "transaction_code" => "CGKFT20200715121",
            "transaction_order" => 121,
            "location_id" => "5cecb20b6c49615b174c3e74",
            "organization_id" => 6,
            "created_at" => "2020-07-15T11:11:12+0700",
            "updated_at" => "2020-07-15T11:11:22+0700",
            "transaction_payment_type_name" => "Invoice",
            "transaction_cash_amount" => 0,
            "transaction_cash_change" => 0,
            "customer_attribute" => [
                "Nama_Sales" => "Radit Fitrawikarsa",
                "TOP" => "14 Hari",
                "Jenis_Pelanggan" => "B2B"
            ],
            "connote" => [
                "connote_number" => 1,
                "connote_service" => "ECO",
                "connote_service_price" => 70700,
                "connote_amount" => 70700,
                "connote_code" => "AWB00100209082020",
                "connote_booking_code" => "",
                "connote_order" => 326931,
                "connote_state_id" => 2,
                "zone_code_from" => "CGKFT",
                "zone_code_to" => "SMG",
                "surcharge_amount" => null,
                "actual_weight" => 20,
                "volume_weight" => 0,
                "chargeable_weight" => 20,
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74",
                "connote_total_package" => "3",
                "connote_surcharge_amount" => "0",
                "connote_sla_day" => "4",
                "source_tariff_db" => "tariff_customers",
                "id_source_tariff" => "1576868",
                "pod" => null,
                "history" => []
            ],
            "koli_data" => [
                [
                    "koli_length" => 0,
                    "koli_chargeable_weight" => 9,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "koli_description" => "V WARP",
                    "koli_formula_id" => null,
                    "koli_volume" => 0,
                    "koli_weight" => 9,
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.1"
                ],
                [
                    "koli_length" => 0,
                    "koli_chargeable_weight" => 9,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "koli_description" => "V WARP",
                    "koli_formula_id" => null,
                    "koli_volume" => 0,
                    "koli_weight" => 9,
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.2"
                ],
                [
                    "koli_length" => 0,
                    "koli_chargeable_weight" => 2,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "koli_description" => "LID HOT CUP",
                    "koli_formula_id" => null,
                    "koli_volume" => 0,
                    "koli_weight" => 2,
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.3"
                ]
            ],
            "custom_field" => [
                "catatan_tambahan" => "JANGAN DI BANTING \/ DI TINDIH"
            ]

        ];

        $this->json('POST', '/api/package', $parameters)
             ->seeJson([
                'status' => true,
             ]);
       
    }

    public function testShouldReturnUpdatedPackage(){
        $tr = Transaction::first();
        $parameters = [
            "customer_code" => "1678593",
            "origin_customer_code" => "9999999",
            "destination_customer_code" => "8888888",
            "transaction_amount" => "70700",
            "transaction_discount" => "0",
            "transaction_additional_field" => "",
            "transaction_payment_type" => "29",
            "transaction_code" => "CGKFT20200715121",
            "transaction_order" => 121,
            "location_id" => "5cecb20b6c49615b174c3e74",
            "organization_id" => 6,
            "created_at" => "2020-07-15T11:11:12+0700",
            "updated_at" => "2020-07-15T11:11:22+0700",
            "transaction_payment_type_name" => "Invoice",
            "transaction_cash_amount" => 0,
            "transaction_cash_change" => 0,
            "customer_attribute" => [
                "Nama_Sales" => "Radit Fitrawikarsa",
                "TOP" => "14 Hari",
                "Jenis_Pelanggan" => "B2B"
            ],
            "connote" => [
                "connote_number" => 1,
                "connote_service" => "ECO",
                "connote_service_price" => 70700,
                "connote_amount" => 70700,
                "connote_code" => "AWB00100209082020",
                "connote_booking_code" => "",
                "connote_order" => 326931,
                "connote_state_id" => 2,
                "zone_code_from" => "CGKFT",
                "zone_code_to" => "SMG",
                "surcharge_amount" => null,
                "actual_weight" => 20,
                "volume_weight" => 0,
                "chargeable_weight" => 20,
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74",
                "connote_total_package" => "3",
                "connote_surcharge_amount" => "0",
                "connote_sla_day" => "4",
                "source_tariff_db" => "tariff_customers",
                "id_source_tariff" => "1576868",
                "pod" => null,
                "history" => []
            ],
            "koli_data" => [
                [
                    "koli_length" => 0,
                    "koli_chargeable_weight" => 9,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "koli_description" => "V WARP",
                    "koli_formula_id" => null,
                    "koli_volume" => 0,
                    "koli_weight" => 9,
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.1"
                ],
                [
                    "koli_length" => 0,
                    "koli_chargeable_weight" => 9,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "koli_description" => "V WARP",
                    "koli_formula_id" => null,
                    "koli_volume" => 0,
                    "koli_weight" => 9,
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.2"
                ],
                [
                    "koli_length" => 0,
                    "koli_chargeable_weight" => 2,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "koli_description" => "LID HOT CUP",
                    "koli_formula_id" => null,
                    "koli_volume" => 0,
                    "koli_weight" => 2,
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.3"
                ]
            ],
            "custom_field" => [
                "catatan_tambahan" => "JANGAN DI BANTING \/ DI TINDIH"
            ]

        ];

        $this->json('PUT', '/api/package/'.$tr->transaction_id, $parameters)
             ->seeJson([
                'status' => true,
             ]);
       
    }


    public function testShouldReturnDeletedPackage(){
        $tr = Transaction::first();

        $this->json('DELETE', '/api/package/'.$tr->transaction_id)
             ->seeJson([
                'status' => true,
             ]);
       
    }
}
