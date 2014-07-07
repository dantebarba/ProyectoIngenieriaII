

    {{#items}}
    <div class="article">
    <div class="row" id="{{id}}">
            <div class="col-xs-2">
            </div>
            <div class="col-xs-4">
                <h4 class="product-name"><strong>{{ titulo }}</strong></h4><h4>{{ descripcion }}</h4>
            </div>
            <div class="col-xs-6">
                    <div class="col-xs-6 text-right">
                            <h6><strong>{{ precio }}<span class="text-muted">x</span></strong></h6>
                    </div>
                    <div class="col-xs-4">
                            <input type="text" class="form-control input-sm" value="{{cantidad}}">
                    </div>
                    <div class="col-xs-2">
                            <button type="button" class="btn btn-link btn-xs" id="itemTrash">
                                    <span class="glyphicon glyphicon-trash"> </span>
                            </button>
                    </div>
            </div>
        
    </div>
        <hr>
    </div>
    
    {{/items}}
