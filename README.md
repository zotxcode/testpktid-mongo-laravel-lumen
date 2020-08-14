# TestPaket!

Backend Engginer TEST, [
https://quip.com/bQZeAyoqbmVg](https://quip.com/bQZeAyoqbmVg)
1.  GET /package
2.  GET /package/{id}
3.  POST /package
4.  PUT /package/{id}
5.  PATCH /package/{id}
6.  DELETE /package/{id}

# Seed

    php artisan migrate:refresh --seed


# Run Server

    php -S localhost:8000 -t public

# Test

    vendor/bin/phpunit



## Get All Packages
### url
GET http://localhost:8000/api/package
### example
    curl -XGET 'http://localhost:8000/api/package/'

## Get Package by Transaction ID
### how to get transaction id
you can get transaction id from get request
### url
GET http://localhost:8000/api/package/{transaction_id}
### example

    curl -XGET 'http://localhost:8000/api/package/ffb1b60a-3d08-4717-82d3-38860feb08a8'

## Insert Package

### url
POST http://localhost:8000/api/package
### example

    curl -XPOST -H "Content-type: application/json" -d '{
    "customer_name": "PT. AMARA PRIMATIGA",
    "customer_code": "1678593",
    "origin_customer_code": "9999999",
    "destination_customer_code": "8888888",
    "transaction_amount": "70700",
    "transaction_discount": "0",
    "transaction_additional_field": "",
    "transaction_payment_type": "29",
    "transaction_code": "CGKFT20200715121",
    "transaction_order": 121,
    "location_id": "5cecb20b6c49615b174c3e74",
    "organization_id": 6,
    "transaction_payment_type_name": "Invoice",
    "transaction_cash_amount": 0,
    "transaction_cash_change": 0,
    "customer_attribute": {
        "Nama_Sales": "Radit Fitrawikarsa",
        "TOP": "14 Hari",
        "Jenis_Pelanggan": "B2B"
    },
    "connote": {
        "connote_number": 1,
        "connote_service": "ECO",
        "connote_service_price": 70700,
        "connote_amount": 70700,
        "connote_code": "AWB00100209082020",
        "connote_booking_code": "",
        "connote_order": 326931,
        "connote_state": "PAID",
        "connote_state_id": 2,
        "zone_code_from": "CGKFT",
        "zone_code_to": "SMG",
        "surcharge_amount": null,
        "actual_weight": 20,
        "volume_weight": 0,
        "chargeable_weight": 20,
        "organization_id": 6,
        "location_id": "5cecb20b6c49615b174c3e74",
        "connote_total_package": "3",
        "connote_surcharge_amount": "0",
        "connote_sla_day": "4",
        "location_name": "Hub Jakarta Selatan",
        "location_type": "HUB",
        "source_tariff_db": "tariff_customers",
        "id_source_tariff": "1576868",
        "pod": null,
        "history": []
    },
    "koli_data": [
        {
            "koli_length": 0,
            "koli_chargeable_weight": 9,
            "koli_width": 0,
            "koli_surcharge": [],
            "koli_height": 0,
            "koli_description": "V WARP",
            "koli_formula_id": null,
            "koli_volume": 0,
            "koli_weight": 9,
            "koli_custom_field": {
                "awb_sicepat": null,
                "harga_barang": null
            },
            "koli_code": "AWB00100209082020.1"
        },
        {
            "koli_length": 0,
            "koli_chargeable_weight": 9,
            "koli_width": 0,
            "koli_surcharge": [],
            "koli_height": 0,
            "koli_description": "V WARP",
            "koli_formula_id": null,
            "koli_volume": 0,
            "koli_weight": 9,
            "koli_custom_field": {
                "awb_sicepat": null,
                "harga_barang": null
            },
            "koli_code": "AWB00100209082020.2"
        },
        {
            "koli_length": 0,
            "koli_chargeable_weight": 2,
            "koli_width": 0,
            "koli_surcharge": [],
            "koli_height": 0,
            "koli_description": "LID HOT CUP",
            "koli_formula_id": null,
            "koli_volume": 0,
            "koli_weight": 2,
            "koli_custom_field": {
                "awb_sicepat": null,
                "harga_barang": null
            },
            "koli_code": "AWB00100209082020.3"
        }
    ],
    "custom_field": {
        "catatan_tambahan": "JANGAN DI BANTING \/ DI TINDIH"
    },
    "currentLocation": {
        "name": "Hub Jakarta Selatan",
        "code": "JKTS01",
        "type": "Agent"
    }
    }' 'http://localhost:8000/api/package'


## Update Package by Transaction ID

### how to get transaction id
you can get transaction id from get request
### url
PUT http://localhost:8000/api/package/{transaction_id}
### example

    curl -XPUT -H "Content-type: application/json" -d '{
    "transaction_id": "d0090c40-539f-479a-8274-899b9970bddc",
    "customer_name": "PT. AMARA PRIMATIGA",
    "customer_code": "1678593",
    "origin_customer_code": "9999999",
    "destination_customer_code": "8888888",
    "transaction_amount": "70700",
    "transaction_discount": "0",
    "transaction_additional_field": "",
    "transaction_payment_type": "29",
    "transaction_code": "CGKFT20200715121",
    "transaction_order": 121,
    "location_id": "5cecb20b6c49615b174c3e74",
    "organization_id": 6,
    "transaction_payment_type_name": "Invoice",
    "transaction_cash_amount": 0,
    "transaction_cash_change": 0,
    "customer_attribute": {
        "Nama_Sales": "Radit Fitrawikarsa",
        "TOP": "14 Hari",
        "Jenis_Pelanggan": "B2B"
    },
    "connote": {
        "connote_number": 1,
        "connote_service": "ECO",
        "connote_service_price": 70700,
        "connote_amount": 70700,
        "connote_code": "AWB00100209082020",
        "connote_booking_code": "",
        "connote_order": 326931,
        "connote_state": "PAID",
        "connote_state_id": 2,
        "zone_code_from": "CGKFT",
        "zone_code_to": "SMG",
        "surcharge_amount": null,
        "actual_weight": 20,
        "volume_weight": 0,
        "chargeable_weight": 20,
        "organization_id": 6,
        "location_id": "5cecb20b6c49615b174c3e74",
        "connote_total_package": "3",
        "connote_surcharge_amount": "0",
        "connote_sla_day": "4",
        "location_name": "Hub Jakarta Selatan",
        "location_type": "HUB",
        "source_tariff_db": "tariff_customers",
        "id_source_tariff": "1576868",
        "pod": null,
        "history": []
    },
    "koli_data": [
        {
            "koli_length": 0,
            "koli_chargeable_weight": 9,
            "koli_width": 0,
            "koli_surcharge": [],
            "koli_height": 0,
            "koli_description": "V WARP",
            "koli_formula_id": null,
            "koli_volume": 0,
            "koli_weight": 9,
            "koli_custom_field": {
                "awb_sicepat": null,
                "harga_barang": null
            },
            "koli_code": "AWB00100209082020.1"
        },
        {
            "koli_length": 0,
            "koli_chargeable_weight": 9,
            "koli_width": 0,
            "koli_surcharge": [],
            "koli_height": 0,
            "koli_description": "V WARP",
            "koli_formula_id": null,
            "koli_volume": 0,
            "koli_weight": 9,
            "koli_custom_field": {
                "awb_sicepat": null,
                "harga_barang": null
            },
            "koli_code": "AWB00100209082020.2"
        },
        {
            "koli_length": 0,
            "koli_chargeable_weight": 2,
            "koli_width": 0,
            "koli_surcharge": [],
            "koli_height": 0,
            "koli_description": "LID HOT CUP",
            "koli_formula_id": null,
            "koli_volume": 0,
            "koli_weight": 2,
            "koli_custom_field": {
                "awb_sicepat": null,
                "harga_barang": null
            },
            "koli_code": "AWB00100209082020.3"
        }
    ],
    "custom_field": {
        "catatan_tambahan": "JANGAN DI BANTING \/ DI TINDIH"
    },
    "currentLocation": {
        "name": "Hub Jakarta Selatan",
        "code": "JKTS01",
        "type": "Agent"
    }
    }' 'http://localhost:8000/api/package'

## Patch Package by Transaction ID

### how to get transaction id
you can get transaction id from get request
### url
PATCH http://localhost:8000/api/package/{transaction_id}
### example

    curl -XPATCH -H "Content-type: application/json" -d '{
    "transaction_id": "d0090c40-539f-479a-8274-899b9970bddc",
    "customer_name": "PT. AMARA PRIMATIGA",
    "customer_code": "1678593",
    "origin_customer_code": "9999999",
    "destination_customer_code": "8888888",
    "transaction_amount": "70700",
    "transaction_discount": "0",
    "transaction_additional_field": "",
    "transaction_payment_type": "29",
    "transaction_code": "CGKFT20200715121",
    "transaction_order": 121,
    "location_id": "5cecb20b6c49615b174c3e74",
    "organization_id": 6,
    "transaction_payment_type_name": "Invoice",
    "transaction_cash_amount": 0,
    "transaction_cash_change": 0,
    "customer_attribute": {
        "Nama_Sales": "Radit Fitrawikarsa",
        "TOP": "14 Hari",
        "Jenis_Pelanggan": "B2B"
    },
    "connote": {
        "connote_number": 1,
        "connote_service": "ECO",
        "connote_service_price": 70700,
        "connote_amount": 70700,
        "connote_code": "AWB00100209082020",
        "connote_booking_code": "",
        "connote_order": 326931,
        "connote_state": "PAID",
        "connote_state_id": 2,
        "zone_code_from": "CGKFT",
        "zone_code_to": "SMG",
        "surcharge_amount": null,
        "actual_weight": 20,
        "volume_weight": 0,
        "chargeable_weight": 20,
        "organization_id": 6,
        "location_id": "5cecb20b6c49615b174c3e74",
        "connote_total_package": "3",
        "connote_surcharge_amount": "0",
        "connote_sla_day": "4",
        "location_name": "Hub Jakarta Selatan",
        "location_type": "HUB",
        "source_tariff_db": "tariff_customers",
        "id_source_tariff": "1576868",
        "pod": null,
        "history": []
    },
    "koli_data": [
        {
            "koli_length": 0,
            "koli_chargeable_weight": 9,
            "koli_width": 0,
            "koli_surcharge": [],
            "koli_height": 0,
            "koli_description": "V WARP",
            "koli_formula_id": null,
            "koli_volume": 0,
            "koli_weight": 9,
            "koli_custom_field": {
                "awb_sicepat": null,
                "harga_barang": null
            },
            "koli_code": "AWB00100209082020.1"
        },
        {
            "koli_length": 0,
            "koli_chargeable_weight": 9,
            "koli_width": 0,
            "koli_surcharge": [],
            "koli_height": 0,
            "koli_description": "V WARP",
            "koli_formula_id": null,
            "koli_volume": 0,
            "koli_weight": 9,
            "koli_custom_field": {
                "awb_sicepat": null,
                "harga_barang": null
            },
            "koli_code": "AWB00100209082020.2"
        },
        {
            "koli_length": 0,
            "koli_chargeable_weight": 2,
            "koli_width": 0,
            "koli_surcharge": [],
            "koli_height": 0,
            "koli_description": "LID HOT CUP",
            "koli_formula_id": null,
            "koli_volume": 0,
            "koli_weight": 2,
            "koli_custom_field": {
                "awb_sicepat": null,
                "harga_barang": null
            },
            "koli_code": "AWB00100209082020.3"
        }
    ],
    "custom_field": {
        "catatan_tambahan": "JANGAN DI BANTING \/ DI TINDIH"
    },
    "currentLocation": {
        "name": "Hub Jakarta Selatan",
        "code": "JKTS01",
        "type": "Agent"
    }
    }' 'http://localhost:8000/api/package'
    
## Delete Package by Transaction ID

### how to get transaction id
you can get transaction id from get request
### url
DELETE http://localhost:8000/api/package/{transaction_id}
### example

    curl -XDELETE 'http://localhost:8000/api/package/ffb1b60a-3d08-4717-82d3-38860feb08a8'

