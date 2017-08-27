
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
                    notify()   ;
                    return false;
                }

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

function factory( objType)
{

    this.createObj = function( objType ){

        var obj;

        switch( objType )
        {
            case "lead":
            {
               obj = new Lead();
               break;
            }
            case "prospect":
            {
               obj = new Prospect();
               break;
            }
            case "customer":
            {
                obj = new Customer();
                break;
            }
            case "product":
            {
                obj = new Product();
                break;
            }
            case "profession":
            {
                obj = new Profession();
                break;
            }
            default:
            {
                notify("Factory didnt recognize object type. object was not created.")
                break;
            }
        }

        if( obj.runValidation() )
        {
            return obj;
        }
        else
        {
            return null;
            //TODO: log
        }
    }
}
