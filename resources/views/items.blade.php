<?php $i=0;

if($items->count()>0){
    foreach ($items as $item){ 
                                
                                if($i%4==0&&$i==0){
                                    echo '<div class="row">';
                                }elseif($i%4==0&&$i>0){
                                    echo '</div><div class="row">';
                                }
                                ?>
                            
                            
                                <div class=" col-md-3 col-sm-12 " style="">
                                    <div class="card">
                                        <div style="width: 250px; height: 200px;">
                                            <img src="{{Storage::url("uploads/" . $item->image)}}" style="width:  100%; height: 100%;" class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title" style="height: 50px;">{{$item->name}} </h5>
                                            <p class="card-text">{{"$".$item->price." Ea"}}</p>
                                            <div class="input-group mb-2" style="width: 40%;">
                                                
                                                <input type="number" min="0" step="1" class="form-control range-element shopping-cart-input" itemid="{{$item->id}}"  placeholder="">
                                                <div class="input-group-prepend" style="padding-left: 10px;">
                                                    <i class="fas fa-shopping-cart" style="font-size: 20px; "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            <?php   $i++; }  echo '</div>';
                            
                            
                            
}else{
                            ?>


                            <div class="alert alert-danger " style="text-align: center;" role="alert">
                                No Results Found
                            </div>
<?php } ?>

<script>
    
    var items=<?php echo json_encode($items); ?>
</script>

                            