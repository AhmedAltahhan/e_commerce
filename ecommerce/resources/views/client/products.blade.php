@extends('client/navbar')

@section('content')

      <!-- <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section> -->

      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
                @foreach ($data as $d)

               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">

                            <form action="" method="POST">
                                @csrf
                                <input  type="number" name="description" placeholder="number of pieces">
                                <input  type="hidden" name="vendor_id" value={{$d -> vendor_id}} >
                                <input  type="hidden" name="name" value={{$d -> name}} >
                                <input  type="hidden" name="price" value={{$d -> price}} >
                                <button class="option1" type="submit">Buy Now</button>
                            </form>


                        </div>
                     </div>

                     <div class="img-box">
                        <img src="images/{{$d -> image}}" width="90px" height="90px">
                     </div>
                     <div class="detail-box">
                        <h5>
                            {{$d -> name}}
                        </h5>
                        <h6>
                            {{$d -> price}}
                        </h6>
                     </div>

                  </div>
               </div>

               @endforeach
            </div>
         </div>
      </section>
@endsection

