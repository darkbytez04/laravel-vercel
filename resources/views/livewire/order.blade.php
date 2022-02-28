<div class="col-lg-12">
    <div class="row">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header"> 
            <h4 style="float: left">Order Products </h4>
            <a href=" #" style="float: right" class="btn btn-light" 
            data-bs-toggle="modal" data-bs-target="#addproduct">  
              <i class="fa fa-plus"></i> Add New Product  </a>  </div>
              <form action=" {{route('orders.store')}} " method="post">
                @csrf
                
        <div class="card-body">
                <div class="my-2">
                 <input type="text" name=""  wire:model="prodoct_code" id="" class="form-control" placeholder="Input code..">
               </div>  
                 <table class="table table-bordered table-left">
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
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-header"> <h4> <b class="total"> Total  </b> </h4> </div>
              <div class="card-body">
                <div class="btn-group">
                  <button  type="button" onclick="PrintReceiptContent('print')" 
                  class="btn btn-dark"> <i class="fa fa-print"></i>Print </button>
                  <button  type="button" onclick="PrintReceiptContent('print')" 
                  class="btn btn-primary"> <i class="fa fa-print"></i>History </button>
                  <button  type="button" onclick="PrintReceiptContent('print')" 
                  class="btn btn-danger"> <i class="fa fa-print"></i>Report</button>
                </div>
                <div class="panel">
                  <div class="row">
                    <table class="table table-stripped">
                      <tr>
                        <td>
                          <div class="form-group">
                            <label for="">Customer Name</label>
                          
                             <input type="text" name="customer_name" id="" class="form-control">
                         
                        </td>
                           <td>
                            <div class="form-group">
                              <label for="">Customer Phone</label>
                              
                               <input type="text" name="customer_phone" id="" class="form-control">
                               
                           </td>
                      </tr>
                    </table>
                  <td>
                    Payment Method<br>
                    <span class="radio-item">
                      <input type="radio" name="payment_method" id="payment_method" class="true"
                      value="cash" checked="checked">
                      <label for="payment_method"> <i class="fa fa-money-bill text-success "></i> Cash</label>
                    </span>

                    <span class="radio-item">
                      <input type="radio" name="payment_method" id="payment_method" class="true"
                      value="gcash" >
                      <label for="payment_method"> <i class="fa fa-globe text-primary"></i> Gcash</label>
                    </span>

                    <span class="radio-item">
                      <input type="radio" name="payment_method" id="payment_method" class="true"
                      value="bank" >
                      <label for="payment_method"> <i class="fa fa-university text-danger "></i> Bank Transfer</label>
                    </span>
                  </td> <br>
                  <td>Payment <input type="number" name="paid_amount" id="paid_amount" class="form-control">
                  </td>

                  <td>Returning Change <input type="number" readonly name="balance" id="balance"" class="form-control">
                  </td>
                  <td>
                    <button class="btn-primary btn-md btn-block mt-3"> Save </button>
                    <button class="btn-danger btn-md btn-block mt-2"> Calculator </button>
                  </td> 
                  <br>
                   <div class="text-center" style="text-align: center !important">
                     <a href="#" class="text-danger text-center"> <i class="fa fa-sign-out-alt"></i></a>
                   </div>
                     </div>
                    </div>
                  </div>
                </div>
            </div> 
            </form>
          </div>
        </div>
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