<!-- Formulario de creacion de Incidencia -->
<div class="modal fade" id="Vmodalequipos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel" align="left"><B> Creacion de Planificaciones</B></h5>
      </div>
      <div class="modal-body">
	<div class="panel panel-default panel-fade col-md-12 col-center">
		<div class="panel-body">
			<div style="margin:10px"></div>
      <div class="row" >
        <div class="col-xs-4 col-md-6">
          <span>*Tipo de Equipo</span>
          <select id="selecttipoequipo" class="form-control requerido2">
            <option value="0">Seleccione el Tipo de Equipo</option>
            <?php
              foreach ($tiposbienes as $i) {
                echo '<option value="'.$i->idtipobien.'">'.$i->nombretipobien.'</option>';
              }
            ?>
        </select>
        </div>
        <div class="col-xs-4 col-md-6">
          <span>*Codigo Equipo</span>
          <input id="codequipo" type="text" class="form-control input-md requerido2" title="Codigo del equipo por defecto">
        </div>
    </div>
    <div class="row" >
        <div class="col-xs-4 col-md-6">
          <span>*Familia del Equipo</span>
          <select id="selectequipo" class="form-control" disabled="true">
        </select>
        </div>
        <div class="col-xs-4 col-md-6">
          <span>*Serial de Inventario</span>
          <input id="codequipoinventario" type="text" class="form-control input-md requerido2" title="Codigo del equipo asignado en Bodega">
        </div>
    </div>

    <div class="row" >
        <div class="col-xs-4 col-md-6">
          <span>*Subfamilia del Equipo</span>
          <select id="selectsubequipo" class="form-control" disabled="true">
        </select>
        </div>
        <div class="col-xs-4 col-md-6">
            <div class="form-group">
              <span>*Fecha de Compra del Equipo</span>
                <div class="input-group date">
                    <input type="text" class="form-control requerido2" id="fechacompra" readonly="readonly">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-xs-4 col-md-12">
        <span>*Nombre del Equipo</span>
        <input id="nombreequipo" type="text" class="form-control input-md requerido2" title="Nombre del equipo">
    </div>
    </div>
  <div class="row" >
    <div class="col-xs-2 col-md-2">
      <span>Precio Compra</span>
        <div class="input-group">
          <input id="preciocompra" type="text" class="form-control input-md"  style="text-align:right;" title="Codigo del equipo por defecto">
          <span class="input-group-addon">.00</span>
        </div>
    </div>
    <div class="col-xs-2 col-md-2">
      <span>Vida util</span>
        <input id="vidautil" type="text" class="form-control input-md" title="Codigo del equipo por defecto">
      <select id="vidautiltiempo" class="form-control">
          <option value="AÑOS">AÑOS</option>
          <option value="MESES">MESES</option>
        </select>
    </div>
    <div class="col-xs-2 col-md-2">
      <span>Garantia</span>
        <input id="garantia" type="text" class="form-control input-md" title="Codigo del equipo por defecto">
        <select id="garantiatiempo" class="form-control">
          <option value="AÑOS">AÑOS</option>
          <option value="MESES">MESES</option>
        </select>
    </div>
    <div class="form-group filtros col-md-6">
          <span>Custodio</span>
          <select id="cmb_custodio" name="custodio" class="selectpicker custodio" data-live-search="true" data-width="100%">
            <option value="0">Seleccione Persona</option>
          </select>
        </div>
  </div>
    <div class="row" >
      <div class="col-xs-4 col-md-12">
          <span>*Localizacion</span>
        <select id="cmb_localizacion" name="busqueda" class="selectpicker busqueda requerido2" data-live-search="true" data-width="100%">
            <option selected disabled="disabled">Seleccione Localizacion</option>
          </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-md-12">
          <span>Descripción</span>
          <textarea class="form-control" id="descripcion" rows="3" style="resize: none;"></textarea>
        </div>
    </div>
  </div>

	    </div>
		<div style="margin:10px"></div>
	</div>
</div>
</div>
<div class="modal-footer">
		<button type="button" class="btn btn-error" data-dismiss="modal"> Cerrar</button>
		<button type="submit" id="btn-guardar-planificacion" class="btn btn-info"> Guardar Equipos</button>
	</div>
</div>
</div>
