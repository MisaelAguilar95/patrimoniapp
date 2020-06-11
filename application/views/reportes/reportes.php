<div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label" for="area">Mes : </label>
                            <select id="mes" class="form-control"  name="SEL" required>
                                <option value="">Enero</option>
                                <option value="">Febrero</option>
                                <option value="">Marzo</option>
                                <option value="">Abril</option>
                                <option value="">Mayo</option>
                                <option value="">Junio</option>
                                <option value="">Julio</option>
                                <option value="">Agosto</option>
                                <option value="">Septiembre</option>
                                <option value="">Octubre</option>
                                <option value="">Noviembre</option>
                                <option value="">Diciembre</option>
                                
                            </select>
                        </div>
</div>
<canvas id="myChart" width="300" height="80"></canvas>
<script> 
var sel = document.getElementById('mes');

// display value property of select list (from selected option)
console.log( sel );
</script>