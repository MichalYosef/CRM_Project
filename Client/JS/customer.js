
function Customer(  customer_name, 
                    customer_phone, 
                    customer_profession, 
                    prospect_id, 
                    id=0)
{

    this.customer_name  = customer_name ;
    this.    customer_phone  = customer_phone ;
    this.    customer_profession = customer_profession;
    this.    prospect_id  = prospect_id ;
    this.    id = id;

    this.runValidation = function(){

        //TODO...

        alert("runValidation"); 
    }
/*
    this.select()
    
    this.update()
    this.delete()
    this.create()
    
*/
}