<?php

namespace App\Http\Controllers;

use App\Connote;
use App\Customer;
use App\Koli;
use App\Location;
use App\PaymentType;
use App\State;
use App\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Ramsey\Uuid\Uuid as Generator;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class PackageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAll() {
  		return response()->json(Transaction::with(['connote', 'connote.kolis'])->get());
    }

    public function show($id) {
  		return response()->json(Transaction::with(['connote', 'connote.kolis'])->where('transaction_id', $id)->get());
    }

    public function update(Request $request, $id) {
    	return response()->json($this->save($request, $id));

    }

    public function delete($id) {
    	$transaction = Transaction::firstWhere('transaction_id', $id);
    	$connote = $transaction->connote;
	    foreach ($connote->kolis as $_d){
			$_d->delete();
		}
		$connote->delete();
		$transaction->delete();
		$res = ["status" => true, "error" => []];
    	return response()->json($res);
    }


    public function insertData(Request $request) {
    	return response()->json($this->save($request, null));
    }
    private function save($request, $id) {
    	$res = ["status" => false, "error" => []];
    	$this->validate($request, [
            'customer_code' => 'required',
            'transaction_amount' => 'required|numeric|min:0',
            'transaction_cash_amount' => 'required|numeric|min:0',
            'transaction_cash_change' => 'required|numeric|min:0',
            'transaction_discount' => 'required|numeric|min:0|max:100',
            'transaction_code' => 'required',
            'transaction_order' => 'required',
            'location_id' => 'required',
            'organization_id' => 'required',
            'transaction_payment_type' => 'required',
            'origin_customer_code' => 'required',
            'destination_customer_code' => 'required',
            'connote' => 'required',
            'connote.connote_state_id' => 'required',
            'connote.connote_number' => 'required',
            'connote.connote_service' => 'required',
            'connote.connote_service_price' => 'required',
            'connote.connote_amount' => 'required',
            'connote.connote_code' => 'required',
            'connote.connote_order' => 'required',
            'connote.connote_sla_day' => 'required',
            'koli_data' => 'required',
            'koli_data.*.koli_chargeable_weight' => 'required|numeric|min:0',
            'koli_data.*.koli_width' => 'required|numeric|min:0',
            'koli_data.*.koli_height' => 'required|numeric|min:0',
            'koli_data.*.koli_volume' => 'required|numeric|min:0',
            'koli_data.*.koli_weight' => 'required|numeric|min:0',
            'koli_data.*.koli_length' => 'required|numeric|min:0',
            'koli_data.*.koli_description' => 'required|max:255',

        ]);

        $error = [];

        $tran_customer = Customer::firstWhere('customer_code', $request->customer_code);
    	if (empty($tran_customer)) {
    		$error = Arr::add($error, 'customer', 'Customer not found.');
		}

		$tran_location = Location::firstWhere('location_id', $request->location_id);
    	if (empty($tran_location)) {
    		$error = Arr::add($error, 'location', 'Location not found.');
		}

		$tran_payment_type = PaymentType::firstWhere('payment_type', $request->transaction_payment_type);
    	if (empty($tran_payment_type)) {
    		$error = Arr::add($error, 'payment_type', 'Payment Type not found.');
		}

		$customer_attributes = [];
		foreach ($request->customer_attribute as $key => $val){ 
			$customer_attributes = Arr::add($customer_attributes, str_replace(' ', '_', $key), $val);
		}

		$origin_customer = Customer::firstWhere('customer_code', $request->origin_customer_code);
    	if (empty($origin_customer)) {
    		$error = Arr::add($error, 'origin_customer', 'Customer not found.');
		}

		$destination_customer = Customer::firstWhere('customer_code', $request->destination_customer_code);
    	if (empty($destination_customer)) {
    		$error = Arr::add($error, 'destination_customer', 'Customer not found.');
		}

		$state = State::firstWhere('state_id', $request->connote['connote_state_id']);
    	if (empty($state)) {
    		$error = Arr::add($error, 'state', 'State not found.');
		}

		if ($error) {
    		$res['error'] = $error;
    		return $res;
    	}

    	$transaction = new Transaction;
    	if ($id) {
    		$transaction = Transaction::firstWhere('transaction_id', $id);
    		if (empty($transaction)) {
	    		$res['error'] = ['transaction_id' => 'Can not find transaction with this id.'];
	    		return $res;
    		}
    	} else {
		    try {
	            $transaction->transaction_id = Generator::uuid4()->toString();
	        } catch (UnsatisfiedDependencyException $e) {
	            abort(500, $e->getMessage());
	        }
	    }
    	$transaction->customer_code = $tran_customer->customer_code;
    	$transaction->customer_name = $tran_customer->customer_name;

    	$transaction->transaction_amount = $request->transaction_amount;
    	$transaction->transaction_discount = $request->transaction_discount;
    	$transaction->transaction_code = $request->transaction_code;
    	$transaction->transaction_order = $request->transaction_order;
    	$transaction->location_id = $request->location_id;
    	$transaction->organization_id = $request->organization_id;

    	$transaction->transaction_payment_type = $tran_payment_type->payment_type;
    	$transaction->transaction_payment_type_name = $tran_payment_type->payment_type_name;

    	$transaction->transaction_cash_amount = $request->transaction_cash_amount;
    	$transaction->transaction_cash_change = $request->transaction_cash_change;
    	$transaction->origin_customer_code = $request->origin_customer_code;
    	$transaction->destination_customer_code = $request->destination_customer_code;
    	$transaction->customer_attribute = $customer_attributes;
    	$transaction->transaction_state = $state->state;

    	$transaction->save();


    	$connote = new Connote;
    	if ($transaction->connote) {
    		$connote = $transaction->connote;
    		foreach ($connote->kolis as $_d){
    			$_d->delete();
    		}
    	} else {
		    try {
	            $connote->connote_id = Generator::uuid4()->toString();
	        } catch (UnsatisfiedDependencyException $e) {
	            abort(500, $e->getMessage());
	        }
	    }
        $connote->connote_state_id = $request->connote['connote_state_id'];
        $connote->connote_number = $request->connote['connote_number'];
        $connote->connote_service = $request->connote['connote_service'];
        $connote->connote_service_price = $request->connote['connote_service_price'];
        $connote->connote_code = $request->connote['connote_code'];
        $connote->connote_booking_code = $request->connote['connote_booking_code'];
        $connote->connote_order = $request->connote['connote_order'];
        $connote->surcharge_amount = $request->connote['surcharge_amount'];
        $connote->connote_sla_day = $request->connote['connote_sla_day'];
        $connote->pod = $request->connote['pod'];

        $_connote = $transaction->connote()->save($connote);

        $actual_weight = 0;
        $volume_weight = 0;
        $chargeable_weight = 0;
		foreach ($request->koli_data as $_d){ 
			$koli = new Koli;
		    try {
	            $koli->koli_id = Generator::uuid4()->toString();
	        } catch (UnsatisfiedDependencyException $e) {
	            abort(500, $e->getMessage());
	        }
			$koli->koli_chargeable_weight = $_d['koli_chargeable_weight'];
			$koli->koli_width = $_d['koli_width'];
			$koli->koli_surcharge = $_d['koli_surcharge'];
			$koli->koli_height = $_d['koli_height'];
			$koli->koli_description = $_d['koli_description'];
			$koli->koli_formula_id = $_d['koli_formula_id'];
			$koli->koli_volume = $_d['koli_volume'];
			$koli->koli_weight = $_d['koli_weight'];
			$koli->koli_length = $_d['koli_length'];
			$koli->koli_code = $_d['koli_code'];
			$koli->awb_url = "https://tracking.mile.app/label/".$_d['koli_code'];
			$koli->koli_custom_field = $_d['koli_custom_field'];

			$actual_weight += $_d['koli_weight'];
			$volume_weight += $_d['koli_volume'];
			$chargeable_weight += $_d['koli_chargeable_weight'];
			$_connote->kolis()->save($koli);
		}
		$_connote->actual_weight = $actual_weight;
		$_connote->volume_weight = $volume_weight;
		$_connote->chargeable_weight = $chargeable_weight;
		$_connote->connote_total_package = count($request->koli_data);
		$_connote->save();

 // "connote": {

 //        "connote_surcharge_amount": "0",
 //        "source_tariff_db": "tariff_customers",
 //        "id_source_tariff": "1576868",
 //        "history": []
 //    },



		$res['status'] = true;
    	return $res;
    }




}
