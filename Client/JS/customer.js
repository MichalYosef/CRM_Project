
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


}

Customer.show = function() {
  /* 
  $.ajax(app.screensApi).done(function(data) {
    if (app.debugMode) {
        console.log("screensApi response");
        console.log(data);
    }
    data = JSON.parse(data);
    // step 1
    for(let i=0; i < data.length; i++) {
        screensArray.push(new Screen(
            data[i].manufacturer,
            data[i].price,  
            data[i].model,
            data[i].size
        ));
    }
    
  $.ajax('templates/screen-template.html')
    .done(function(data) {
        for(let i=0; i < screensArray.length; i++) {
            let template = data;
            template = template.replace("{{manufacturer}}", screensArray[i].manufacturer);
            template = template.replace("{{price}}", screensArray[i].price);
            template = template.replace("{{model}}", screensArray[i].model);
            template = template.replace("{{size}}", screensArray[i].size);

            $('.screens').append(template);
        }
    });*/
  }
