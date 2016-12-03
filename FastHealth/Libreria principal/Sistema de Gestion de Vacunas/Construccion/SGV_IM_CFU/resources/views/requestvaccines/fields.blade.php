<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Solicitante:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- City Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('city', 'Fecha:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!--- Country Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('country', 'Hora:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>
<!--- Vacuna --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('vaccine', 'Nombre vacuna:') !!}
    {!! Form::select('vaccine_id', $vaccines, null, ['class' => 'form-control']) !!}
</div>

<!--- Telephone Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telephone', 'Cantidad:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>


<!--- Proveedor --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('supplier', 'Via administración:') !!}
    {!! Form::select('supplier_id', $supplier, null, ['class' => 'form-control']) !!}
</div>

<!--- Observation Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('observation', 'Observación:') !!}
    {!! Form::text('observation', null, ['class' => 'form-control']) !!}
</div>




<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
