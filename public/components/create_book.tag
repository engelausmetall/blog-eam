<create-book>

<!-- Modal -->
<!-- la variables en riot son de la siguiente maneta {VARIABLE} -->
<div class="modal fade" id="dvCreateBook" tabindex="-1" role="dialog" aria-labelledby="dialog" aria-labelledby="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{_title}</h4>
      </div>
      <div class="modal-body">
        <!-- Creo mi mensaje de Cargando, con el signo de admiracion pongo si es false me sale cargando -->
            <div if={!_load}>
                Cargando......
            </div>
            <!-- Este div esta presente cuando load sea true-->
            <div if={_load}>
                <div class="form-group">
                <label>Categorias</label>
                <select id="cmbCategorias" class="form-control">
                <option each={categories} value='{id}'>{name}</option></select>
            </div>
            <!-- Defino mi demas Combo -->
            <div class="form-group">
                <label>Titulo</label>
                <input id="title" class="form-control" />
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <input id="description" class="form-control" />
            </div>
            <div class="form-group">
                <label>Imagen</label>
                <input id="picture" class="form-control" type='file'/>
            </div>
            <!-- Fin del Menu de Combo -->
            </div>
      </div>
      <!-- Un guardar tradicional onclick="guardar" -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="{guardar}">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Scrip debe estar dentro del tag, invoco que cuando
ejecute mount me llame el modal create
opts es una palabra reservada, que son variables que vienen desde el padre -->
<!-- si veo una funcion con function es una de JS si no es de riot como guardar()-->
<script>
    this.on('mount',function(){
        $("#dvCreateBook").modal();
    });

    var self=this;
    self._title=opts.title;
    self._load=false;
    getCategories();


    function getCategories(){
        $.get('/catalogos/categories-select',function(result){
            self.categories=result;
            self._load=true;
            self.update();
        },'json');
    }

    guardar(){
            var _parameters = new FormData();
            _parameters.append('picture', $("#picture").prop("files")[0]);
            _parameters.append('title', $("#title").val());
            _parameters.append('description', $("#description").val());
            _parameters.append('categoria', $("#cmbCategorias").val());
        
        $.ajax({
        url: '/catalogos/books',
        type: "POST",
        dataType: "json",
        data: _parameters,
        enctype: 'multipart/form-data',
        cache: false,
        contentType: false,
        processData: false,
        headers:{'X-CSRF-TOKEN':opts.token},

        success: function(msg){
            /*alert('ok');*/
            alertToastSuccess('Libro Publicado Correctamente',3000);
            /* Invocamos nuestra modal y eliminamos para que desaparesca al guardar*/
            $("#dvdCreateBook .close").click();
    },
    error: function(xhr, status) {
        if( xhr.status == 422 ) {
            var errores='';
            errors = xhr.responseJSON;
            $.each( errors.errors, function( key, value ) {
                errores += value[0]+"\n";
        });
        if(errores.trim()!=""){
                    alert(errores);
        }
        }else{console.log(xhr);
            if( xhr.status == '404' ) {
                alert("C\u00F3digo o Pagina no encontrado");
            }else{
                alert("Error de procesamiento (cod: "+xhr.status+ ")\n"+xhr.responseText);
            }
          }
        },
    });        
}
</script>
</create-book>