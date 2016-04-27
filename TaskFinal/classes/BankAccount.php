<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
         		
		 $this->balance =   $amount->amount + ($this->balance->amount);
		
		return   $this->balance;
    }

    public function withdraw(Money $amount)
    {
        
   		if (is_object($this->balance))
		{
		             
			if($this->balance->amount > $amount->value())
			{
			$this->balance = ($this->balance->amount) - $amount->value();

			}
		}else{
 
		 throw new Exception('Withdrawl amount larger than balance');
		 
 
			}     
        
        
    }
    
    
    public function transfer(Money $amount, BankAccount $account)
    {
        	$accounts = $this->balance;
	 
	
	 
	  if($accounts > $amount->value())
	  { 
	  
		$this->balance =  $accounts - (int)$amount->value();
		$account->balance = $account->balance + (int)$amount->value();
		return $account->balance;
		  
	  }
	  else{
	 
	  throw new Exception('Withdrawl amount larger than balance');
	  
	  }
    }
}
