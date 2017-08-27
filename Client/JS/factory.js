function factory( objType, requiredAction )
{
    this.createObj = function( objType, requiredAction ){

        var obj;
        alert(objType);
        alert(requiredAction);

        switch( objType )
        {
            case lead:
            {
               obj = new Lead( );
               break;
            }
            case prospect:
            {
               obj = new Prospect();
               break;
            }
            case customer:
            {
                obj = new Customer();
                break;
            }
            case product:
            {
                obj = new Product();
                break;
            }
            case profession:
            {
                obj = new Profession();
                break;
            }
            default:
            {
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