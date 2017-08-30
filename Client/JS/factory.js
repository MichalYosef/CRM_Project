function factory( objType)
{
    type = objType;

    this.createObj = function( type ){

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
        console.log(obj);
        if( obj.runValidation() )
        {
            return obj;
        }
        else
        {
            return null;
            //TODO: log
        }
    }();
}
