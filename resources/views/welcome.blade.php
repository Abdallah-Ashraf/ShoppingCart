@extends("layouts/layout")
    @section("content")
    

        <div class="container-fluid">
            <!--begin header contain shopping Cart  -->
            <ul class="nav justify-content-end">
                <li class="nav-item ">
                    <div class="dropdown dropleft">
                        <div class="nav-link btn btn-primary dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-cart" style="font-size: 20px; "></i>
                            <span class="badge badge-primary " id="shopping-cart-badge-items">0</span>
                        </div>
                        <div class="dropdown-menu" style="padding: 5px;">
                            <form>
                                <div class="card" style="width: 20rem;">
                                    <ul class="list-group " id="shopping-cart-list-group">
                                        
                                        
                                    </ul>
                                </div>
                                <div class=" row justify-content-center ">
                                    <div class="badge badge-light " style="display: block;">Total $<span id="shopping-cart-total" ></span></div>
                                </div>
                                <div class=" row justify-content-center " style="padding: 5px;">
                                    {{csrf_field()}}
                                    <button type="button" class="btn btn-primary"  id="orderSubmit" >Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </li>
                
            </ul>
            <!--end header contain shopping Cart  -->
            
            <!--begin div contain search input  -->
            <nav aria-label="breadcrumb">
                
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active  " aria-current="page">
                      <form class="form-inline">
                       
                        <div class="input-group mb-2 mr-sm-2"> 
                            <input type="text" class="form-control" id="searchInput" placeholder="Search">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-search"></i></div>
                            </div>
                        </div>
                    </form>
                  </li>
                </ol>
                
                
            </nav>
            <!--end div contain search input  -->
            
            <!--begin Cntainer  -->
            <div class="container-fluid">
                
                <!--begin user interaction message  -->
                <div class="alert alert-success " id="success-message" style="text-align: center; display: none;" role="alert">
                    Order Added Sucessfully ...
                </div>
                <div class="alert alert-danger" id="error-message" style="text-align: center; display: none;" role="alert">
                    Something Error happen try again ...
                </div>
                <!--end user interaction message  -->
                
                
                <div class="row">
                    <!-- end sidebar-->
                    <div class="col-md-2 col-sm-12" >
                        <div class="card" >
                            <div class="">
                                <h5 class="card-title">
                                    <a class=" badge badge-light" type="button" data-toggle="collapse" href="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories" ><i class="fas fa-caret-right"></i> Categories</a>
                                </h5>
                             
                            
                                <div class="collapse show" id="collapseCategories">
                                    <div class="">
                                        <ul class="list-group">
                                            <?php foreach($categories as $category){ ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center category" value="{{$category->id}}">
                                              {{$category->title}}
                                              <span class="badge badge-primary badge-pill">{{$category->items->count()}}</span>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <h5 class="card-title">
                                    <a class=" badge badge-light" type="button" data-toggle="collapse" href="#collapseBrand" aria-expanded="false" aria-controls="collapseExample" ><i class="fas fa-caret-right"></i> Brand</a>
                                </h5>
                             
                            
                                <div class="collapse show" id="collapseBrand">
                                    <div class="">
                                        <ul class="list-group">
                                            <?php foreach ($brands as $brand){ ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center brand" value="{{$brand->id}}">
                                              {{$brand->title}}
                                              <span class="badge badge-primary badge-pill">{{$brand->items->count()}}</span>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <h5 class="card-title">
                                    <a class=" badge badge-light" type="button" data-toggle="collapse" href="#collapsePrice" aria-expanded="false" aria-controls="collapseExample" ><i class="fas fa-caret-right"></i> Price</a>
                                </h5>
                             
                            
                                <div class="collapse show" id="collapsePrice">
                                    <div class="card card-body">
                                        <form>
                                            <div class="form-group">
                                                
                                                <input type="range" class="js-range-slider" id="formControlRange" min="20" max="800">
                                            </div>
                                            <div class="form-row align-items-center">
                                            
                                                <div class="col">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                          <div class="input-group-text range-element">$</div>
                                                        </div>
                                                        <input type="number" min="0" class="form-control range-element" id="startRange" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                          <div class="input-group-text range-element">$</div>
                                                        </div>
                                                        <input type="number" min="0" class="form-control range-element" id="endRange" placeholder="">
                                                    </div>

                                                </div>
                                                
                                            
                                            
                                             </div>
                                            <div class="form-row justify-content-center">
                                                <button type="submit" class="btn btn-primary mb-2" id="priceSearch">Go</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end sidebar-->
                    
                    <!-- begin items Content-->
                    <div class="col-md-10 col-sm-12">
                        <div class="card" id="content-items">
                            @include('items')
                        </div>
                    </div>
                    <!-- end items Content-->
                </div>
            </div>
            <!--end Container  -->
        </div>
    
    @endsection
   