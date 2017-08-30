
$(document).ready(function()
{
    try 
    {
        $( ".navbar li" ).click( function( event ) 
        {
            
            if( this.parentElement.parentElement.id == "mainNav")
            {
                navigateMainNav( this.id );
            }
            else
            {
                var objType = this.parentElement.parentElement.parentElement.id;

                var newObj = new factory( objType );

                if( !newObj )
                {
                    notify();
                    return false;
                }
                newObj = newObj.createObj('customer');

                if( newObj.runValidation() )
                {
                    var requiredAction = this.className;

                    switch( requiredAction )
                    {
                        case "select":
                        {
                            newObj.select();
                            break;
                        }
                        case "update":
                        {
                            newObj.update();
                            break;
                        }
                        case "delete":
                        {
                            newObj.delete();
                            break;
                        }
                        case "create":
                        {
                            newObj.create();
                            break;
                        }
                        default:
                        {
                            break;
                        }
                    }
                    
                }
            }
        });
    }
    catch(err) {
        alert( "Error! " + err.message);
    }
})

function navigateMainNav( selectedId )
{
    var tmp = "../html/" + selectedId + "/" + selectedId + ".html";
    window.location.href = "../html/" + selectedId + "/" + selectedId + ".html";
}

