Database structure:


Database - administrator
		|
		---------------admin_user(table)
		|		|		
		|		 ---------------(fields)
		|				id	
		|				username	
		|				encry_pass	
		|				reg_date
		|
		|
		---------------booking_db(table)\
|		|		
		|		 ---------------(fields)
		|		 		order_id	
		|				user_id	
		|				car_model	
		|				arrival_date	
		|				return_date	
		|				phone_number	
		|				email_address
		|
		---------------car_db(table)
		|		|
		|		 ---------------(fields)
		|				id	
		|				brand	
		|				colour	
		|				discounted_price
		|				actual_price
		|				descr
		|				file_name 
		|
		---------------costumer_db(table)
				|		
				 ---------------(fields)
						id	
						username	
						pass_word	
						email
						docreation
	
		