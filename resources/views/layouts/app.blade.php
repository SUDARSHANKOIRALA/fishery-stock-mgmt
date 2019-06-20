<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prf.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">

        @include('inc.navbar')       

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>



    <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>  
    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
</script>



    <script>
    $(document).ready(function(){
//amount calculation and totaling

     $('tbody').delegate('.unit_price,.quantity,.discount','keyup',function(){
        var tr =$(this).parent().parent();
        var unit_price = tr.find('.unit_price').val();
        var quantity = tr.find('.quantity').val();
        var discount = tr.find('.discount').val();
        var amount= (unit_price*quantity)- (unit_price*quantity*discount)/100;
        tr.find('.amount').val(amount);
        total();
    });
      function total()
    {
        var total =0;
        $('.amount').each(function(i,e){
            var amount = $(this).val()-0;
            total +=amount;
        });
        $('.total').html(total+" Rs");
    };

    $('.addRow').on('click',function(){
        addRow();
    });
   
    function addRow()
    {
        // alert('asd');
        //adding row
      var tr='<tr>'+
                 '<td><select class="form-control item_name" name ="item_name[]""><option>All Items</option>@foreach($items as $item)<option value="{{ $item->id }}">{{ $item->item_name }}</option>@endforeach</select></td>'+
            '<td><input type="text" name="unit_price[]" class="form-control unit_price"></td>'+
           '<td><input type="text" name="quantity[]" class="form-control quantity"></td>'+
           '<td><input type="text" value="0" name="discount[]" class="form-control discount"></td>'+
           '<td><input type="text" name="amount[]" class="form-control amount"></td>'+
            '<td><a href="#" class="btn btn-danger remove">-</a></td>'
               $('tbody').append(tr);
     };
     //fetching price using item name
     $('tbody').delegate('.item_name','change',function(){
        var tr= $(this).parent().parent();
        var id= tr.find('.item_name').val();
        var dataId={'id':id};
        $.ajax({
            type  :  'GET',
            url   :  '{!!URL::route('findPrice')!!}',
            data  : dataId,
            success:function(data){
                tr.find('.unit_price').val(data.unit_price); 
            }
        });
     });

     //removing row
     $('.remove').live('click',function(){
        var last=$('tbody tr').length;
        if(last==1){
            alert("You Cant Remove This");
        }
        else {
        $(this).parent().parent().remove();
    }
     });

    });
    
</script>
   
</body>
</html> 

