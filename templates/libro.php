


            <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-6">
                
                <div class="panel">
                    <div class="panel-heading">
                        <h3>{{titulo}}</h3>
                    </div>
                    <div class="panel-body">
                        {{descripcion}}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
            </div>
            <div class="panel panel-footer">
                <div class="panel-body" >
                    <?php 
                        include_once '../restricted/securitycheck.php';
                        if (loginCheck() && !adminCheck()) {
                            echo '<button type="button" style="float:right;" onClick="addToCart({{ISBN}})" class="btn btn-default btn-primary">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a></button>
                            <h4 style="float:right;padding-right:20px;">Precio: ${{precio}}    </h4> ';
                        }
                    ?>        
                </div>
            </div>
            <script>
                $(document).bind("keydown", "ctrl+shift+l", function (){
                    addToCart("{{ISBN}}");
                });
            </script>


            