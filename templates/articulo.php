

    {{#items}}
    <div class="article">
    <div class="row" id="{{ISBN}}">
            <div class="col-xs-2">
            </div>
            <div class="col-xs-4">
                <h4 class="product-name" id="titulo{{ISBN}}"><strong>{{ titulo }}</strong></h4><h4></h4>
            </div>
            <div class="col-xs-6">
                    <div class="col-xs-6 text-right">
                            <h6 id="precio{{ISBN}}"><strong>{{ precio }}<span class="text-muted">x</span></strong></h6>
                    </div>
                    <div class="col-xs-4">
                        <input type="number" min="1" class="form-control input-sm" value="{{cantidad}}"  onBlur='checkQty(this); updateQty({{ISBN}}, $(this).val());refreshTotal();'>
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-link btn-xs" onClick="removeFromCart({{ISBN}});removeFromDisplay(this);refreshTotal();">
                                    <span class="glyphicon glyphicon-trash"> </span>
                            </button>
                    </div>
            </div>
        
    </div>
        <hr>
    </div>
    
    {{/items}}
