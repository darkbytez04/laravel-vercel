@extends('layouts.app')
@section('content')
<div id="cart">
    <div class="row">
        <div class="col-md-6 col-lg-6 ">
         <div class="row mb-2">
             <div class="col">
                 <input type="text" class="form-control" placeholder="Scan Barcode...">
             </div>
             <div class="col">
                 <select name="" id=""   class="form-control">
                     <option value="Walking Customer"></option>
                 </select>
             </div>
        <div class="user-cart" >

            
            <div class="card">
              <a href=" #" style="float: right" class="btn btn-light" 
              data-bs-toggle="modal" data-bs-target="#addproduct">  
                <i class="fa fa-plus"></i> Add New Product  </a> 
                 <table class="table table-stripped">
               <thead>
                 <tr>
                  
                  <th></th>
                   <th>Product Name</th>
                   <th>Qty</th>
                   <th>Price</th> 
                   <th>Dis(%)</th> 
                   <th>Total</th> 
                   <th> <a href="#" class="btn btn-sm btn-success add_more rounded-circle"> <i class="fa fa-plus"></i> </a> </th>
                  
                 </tr>
               </thead>
               <tbody class="addMoreProduct">
                <tr>
                  <td> 1 </td>
                  <td>
                    <select name="product_id[]" id="product_id" class="form-control product_id">
                      <option value=""> Select Item</option>
                     @foreach ($products as $product)
                     <option data-price="{{ $product->price? $product->price : ''}}"  
                       value=" {{ $product->id}}" >
                       {{ $product->product_name }} 
                     </option>

                     @endforeach

                    </select>
                  </td>
                  <td>
                    <input type="number" name="quantity[]" class="form-control quantity" >
                  </td>
                  <td>
                   <input type="number" name="price[]" class="form-control price" 
                  >
                 </td>
                 <td>
                   <input type="number" name="discount[]" class="form-control discount" 
                   >
                 </td>
                 <td>
                   <input type="number" name="total_amount[]" class="form-control total_amount"
                   >
                 </td>
                 <td> <a href="#" class="btn btn-sm btn-danger rounded-circle"> <i class="fa fa-times"></i> </a> </th>
                         
                      </td>
                   </tr>
                  
               </tbody>
               </table>
            </div>
        </div>
            
            <div class="row">
                <div class="col">
                    <button class="btn btn-danger btn-block">Cancel</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-success btn-block">Submit</button>
                </div>
            </div>
         </div>
         <div class="col-md-3">
          <div class="card">
            <div class="card-header"> <h4> <b class="total"> 0.00 </b> </h4> </div>
              <div class="card-body">
                ..... 
              </div> 
          </div>
        </div>
         </div>

        </div>
    </div>

</div>

<!-- Modal Add product-->
<div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Add New product</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="{{ route ('products.store') }}" method="post">
         @csrf
         <div class="form-group">
           <label for="">Product Name</label>
           <input type="text" name="product_name" id="" class="form-control">
         </div>
         <div class="form-group">
            <label for="">Brand</label>
            <input type="text"  name="brand" id="" class="form-control">
          </div>     
        <div class="form-group">
          <label for="">Price</label>
          <input type="number" name="price" id="" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Quantity</label>
          <input type="number" name="quantity" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Alert Stock</label>
            <input type="number" name="alert_stock" id="" class="form-control">
          </div>
        <div class="form-group">
          <label for="">Description</label>
          <textarea name="description" id="" cols="30"  rows="2"  class="form-control"> </textarea>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-block">Save product</button>
        </div>
       </form>
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>

<style>
  .modal.right .modal-dialog {
  /**  position: absolute; **/
    top: 0;
    right: 0;
    margin-right: 20vh;
  }
  .modal.fade:not(.in).right .modal-dialog{
    -webkit-transform: translate3d(25%,0,0);
    transform: translate3d(25%,0,0);

  }

</style>

@endsection


@section('script')
<script>
  // $(document).ready(function() {
  //   alert(1);
  // })  
          $('.add_more').on('click',function() {
            var product = $('.product_id').html();
            var  numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
            var tr = '<tr><td class"no"">' + numberofrow + '</td>' +
                    '<td><select class="form-control product_id" name="product_id[]">' + product + 
                    '</select></td>' + 
                    '<td> <input type="number" name="quantity[]"   class="form-control quantity"></td> ' +
                    '<td> <input type="number" name="price[]"  class="form-control price"></td>' +
                    '<td> <input type="number" name="discount[]" class="form-control discount"></td>' +
                    '<td> <input type="number" name="total_amount[]" class="form-control total_amount  "></td>' +
                    '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-times-circle"> </a></td>';
                    $('.addMoreProduct').append(tr);
          });
          //delete
          $('.addMoreProduct').delegate('.delete', 'click', function(){
            $(this).parent().parent().remove();
          })

          function TotalAmount() {
            var total= 0; 
            $('.total_amount').each(function(i, e){
              var amount= $(this).val() - 0;
              total += amount;
            });

            $('.total').html(total);
          }

          $('.addMoreProduct').delegate('.product_id', 'change', function() {
            var tr = $(this).parent().parent();
            var price = tr.find('.product_id option:selected').attr('data-price');
            tr.find('.price').val(price);
            var qty =    tr.find('.quantity').val() - 0;
            var disc =    tr.find('.discount').val() - 0;
            var price =    tr.find('.price').val() - 0;
            var total_amount =   (qty * price) - ((qty * price * disc) /  100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
          });

          $('.addMoreProduct').delegate('.quantity , .discount' , 'keyup', function(){
            var tr = $(this).parent().parent();
            var price = tr.find('.product_id option:selected').attr('data-price');
            tr.find('.price').val(price);
            var qty =    tr.find('.quantity').val() - 0;
            var disc =    tr.find('.discount').val() - 0;
            var price =    tr.find('.price').val() - 0;
            var total_amount =   (qty * price) - ((qty * price * disc) /  100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
          })
  
</script>
@endsection

