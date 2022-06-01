<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;

class PlaceToPayController extends Controller{
    //
    private $scretKey;
    private $login;
    private $endpoint;
    private $appurl;

    public function __construct(){
        $this->scretKey = env('PLACE_TO_PAY_SECRET');
        $this->login = env('PLACE_TO_PAY_LOGIN');
        $this->appurl = env('APP_URL');
        $this->endpoint = 'https://dev.placetopay.com/redirection/api/notify';
    }

    public function getAuth(){
		//dd($this->endpoint);
		$seed = date('c');

		if (function_exists('random_bytes')) {
			$nonce = bin2hex(random_bytes(16));
		} elseif (function_exists('openssl_random_pseudo_bytes')) {
			$nonce = bin2hex(openssl_random_pseudo_bytes(16));
		} else {
			$nonce = mt_rand();
		}
		
		//$nonceBase64 = base64_encode($nonce);

		$placetopay = new \Dnetix\Redirection\PlacetoPay([//new Orders([
			"login" => $this->login,
			"tranKey" => $this->scretKey, //base64_encode(sha1($nonce . $seed . $this->scretKey, true)), //$this->scretKey,
			"baseUrl" => $this->endpoint,
		]);
		return $placetopay;
    }
	
    public function createPayRequest(Request $request){

    	$placetopay = $this->getAuth();
		
    	//$payAttempt['mount'] = $request->mount;
    	//$payAttempt['description'] = $request->description;

        $payAttempt['customer_name'] = Auth::user()->name;
        $payAttempt['customer_email'] = Auth::user()->email;
        $payAttempt['status'] = 'CREATED';

    	//$payAttempt['user_id'] = Auth::user()->id;
    	$newpayAttemp = Orders::create($payAttempt);
    	$reference = $newpayAttemp->id;
		$dataenvio = [
		    'payment' => [
		        'reference' => $reference,
		        'description' => $request->product,
		        'amount' => [
		            'currency' => 'COP',
		            'total' => $request->Value,
		        ],
		    ],
		    'expiration' => date('c', strtotime('+2 days')),
			'returnUrl' => $this->appurl.'/placetopay/callback/'.$reference,
		    'ipAddress' => '127.0.0.1',
		    'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
		];
     // dd($placetopay);
		$response = $placetopay->request($dataenvio);
        
		if ( $response->isSuccessful() ) {

			$newpayAttemp->request_id = $response->requestId();
			$newpayAttemp->process_url = $response->processUrl();
			$newpayAttemp->save();
			Log::info('place.requests', ['requestid' => $response->requestId()]);
			Log::info('place.requests', ['requesturl' => $response->processUrl()]);
			return redirect($response->processUrl());

		} else {

			return redirect('home')->with('warning',$response->status()->message());
		}
    }
}


/*	public function callbackHandler($ref)
    {
		$attempt = payAttempt::find($ref);
		if($attempt)
		{
			$placetopay = $this->getAuth();
    	    $response = $placetopay->query($attempt->request_id);

    	    $obj = json_decode (json_encode ($response->toArray()), FALSE);
    	    $attempt->status = $obj->status->status;
    	    $attempt->reason = $obj->status->message;
    	    $attempt->internalReference = $obj->payment[0]->internalReference;
    	    $attempt->franchise = $obj->payment[0]->franchise;
    	    $attempt->paymentMethod = $obj->payment[0]->paymentMethod;
    	    $attempt->paymentMethodName = $obj->payment[0]->paymentMethodName;
    	    $attempt->authorization = $obj->payment[0]->authorization;
    	    $attempt->issuerName = $obj->payment[0]->issuerName;
    	    $attempt->receipt = $obj->payment[0]->receipt;

    	    if($attempt->save())
    	    	if($response->isApproved())
    	    	return redirect('home')->with('status',$attempt->reason);
    	    	else
    	    	return redirect('home')->with('warning',$attempt->reason);

    	    else
    	    	return redirect('home')->with('warning','Ha ocurrido un error');

		}
		else
		{
			return redirect('home')->with('warning','Referencia de pago no encontrada');

		}

    }
}*/