/*
 * get vaues from rangeSlider to inputs represent min and max  range 
 */
function getValues(data){
    
    $("#endRange").val(data.to);
    $("#startRange").val(data.from);
}



/*
 * rangeSlider initial options to render correctly
 */
$(".js-range-slider").ionRangeSlider({
    skin: "round",
    step: 50,
    type: "double",
    grid: true,
    min: 0,
    max: 800,
    from: 200,
    to: 800,
    prefix: "$",
    onStart:getValues,
    onChange:getValues
});



/*
 * send request to load all Brand 's Items 
 */

$('.brand').on('click',function(){
    
    $.ajax({
        type: "GET",
        url: "/brand/items/"+$(this).val(),
        cache: false,
        success: function(data){
           $("#content-items").html(data);
        }
      });
});



/*
 * send request to load all category 's Items 
 */

$('.category').on("click",function(){
    $.ajax({
        type: "GET",
        url: "/category/items/"+$(this).val(),
        cache: false,
        success: function(data){
           $("#content-items").html(data);
        }
      });
});


/*
 * send request  to load all items that it 's name match input value
 */


$('#searchInput').on('keyup',function(){
    
    var value;
    if(this.value==''){
       value=" "; 
    }else{
        value=this.value;
    }
    console.log(value);
    $.ajax({
        type: "GET",
        url: "/items/search/"+value,
        cache: false,
        success: function(data){
           $("#content-items").html(data);
        }
      });
    
});


/*
 * send request  to load all items that it 's price between choosen range
 */


$("#priceSearch").on("click",function(e){
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/items/search/prices/"+$("#startRange").val()+"/"+$("#endRange").val(),
        cache: false,
        success: function(data){
           $("#content-items").html(data);
        }
      });
});

// varaible represent items added to shopping Cart to make order
var shoppingCartItems=[];


/*
 * event add items to shoppingCart variable 
 * and render them in Dom elements
 */
$(".shopping-cart-input").on('input',function(){
    var quantity=this.value;
    var id=$(this).attr("itemid");
    
    $.each(items,function(index,obj){
        if(obj.id==id){
            obj.quantity=quantity;
            if(shoppingCartItems.indexOf(obj)==-1&& quantity>0){
                shoppingCartItems.push(obj);
                $('#shopping-cart-badge-items').text(parseInt($('#shopping-cart-badge-items').text())+1);
            }else if(shoppingCartItems.indexOf(obj)!=-1&&quantity==0){
                shoppingCartItems.pop(obj);
                $('#shopping-cart-badge-items').text(parseInt($('#shopping-cart-badge-items').text())-1);
            }
            
            return false;
        }
        
    });
    displayShoppingCart();
});

/* 
 * *  render shopping Cart in Dom elements
 */

function  displayShoppingCart(){
    var element=$("#shopping-cart-list-group");
    element.html("");
    var url='/storage/uploads/';
    var  total=0,itemTotal=0;
    $.each(shoppingCartItems,function(index,obj){
        itemTotal=(obj.price*obj.quantity);
        total+=itemTotal;
        var addElement= `
                        <li class="list-group-item  " style="padding: .35rem 0.75rem;" >
                                            <div id="alert-shoppingcart" class="  alert  alert-dismissible  fade show" itemtotal="${itemTotal}" item="${obj.id}" style="padding: 0;" role="alert">
                                                <div class="row">
                                                    <div style="width: 50px; height: 50px;" class="col-3">
                                                         <img src="${url+obj.image}" style="width:  100%; height: 100%;" class="card-img-top" alt="...">
                                                    </div>
                                                    <div class="col-6" style="">
                                                        <span class="badge" style="padding:0; white-space:initial; text-align:inherit;">${obj.name}</span><br>
                                                        <span class="badge" style="padding:0; white-space:initial; text-align:inherit;">$ ${obj.price} Ea</span>
                                                    </div>
                                                    <div class="col-3" style="">
                                                        <span class="badge badge-light">${obj.quantity}</span>
                                                    </div>
                                                </div>
                                                <button style="padding:0;" type="button"  class="close " data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </li>
                `;
        element.append(addElement);
    });
    $('#shopping-cart-total').text(total);
}


/*
 * event hande remove items from  Shopping Cart list
 */

$(document).on('close.bs.alert',"#alert-shoppingcart", function(){
    var id =$(this).attr('item');
    shoppingCartItems=shoppingCartItems.filter(function(obj){
        return obj.id!=id;
    });
    $('#shopping-cart-badge-items').text(parseInt($('#shopping-cart-badge-items').text())-1);
    $( "input[itemid='"+id+"']" ).val(0);
    $("#shopping-cart-total").text(parseInt($('#shopping-cart-total').text())-parseInt($(this).attr('itemtotal')));
});


/*
 * send request to make order from shopping cart items
 */

$('#orderSubmit').on('click', function(){
    var total=$("#shopping-cart-total").text();
       
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        type: "post",
        url: "/orders/add",
        data:{"data":shoppingCartItems,"total":total},
        cache: false,
        success: function(data){
           if(data){
               shoppingCartItems=[];
               $("#shopping-cart-list-group").html("");
               $("#shopping-cart-total").text(0);
               $('.shopping-cart-input').val(0);
               $('#success-message').show();
           }else{
               $('#error-message').show();
           }
        }
      });
    
    
});