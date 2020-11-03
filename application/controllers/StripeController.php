<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripeController extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('my_stripe');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        $customer = \Stripe\Customer::create([
            "email" => 'test2@essay.com',
            "description" => "Test Essay Payment",
            "source" => $this->input->post('stripeToken'),
          ]);

        $charge = \Stripe\Charge::create ([
                "customer" => $customer->id,
                "amount" => 100000 * 100,
                "currency" => "idr",
                // "source" => $this->input->post('stripeToken'),
                "description" => "Program Essay Editing 1" ,
        ]);

        $charge->jsonSerialize();
            
        $this->session->set_flashdata('success', 'Payment made successfully.');
             
        redirect('/my-stripe', 'refresh');
    }

    public function listCharges()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
        
        $charge = \Stripe\Charge::all();
        $data = $charge['data'];
        $jml =  count($data);
        
        // var_dump($charge['data']['id']);
        // ["limit" => 1]
        
        for($i=0;$i<10;$i++)
        {
            echo $data[$i]['id'].'<br>';
            echo $data[$i]['description'].'<br>';
            echo ($data[$i]['amount']/100).'<br>';
        }

        // foreach($data as $c):
        //     echo $i;
        // endforeach;
        // $i++
        // echo $charge['data'];
    }
}