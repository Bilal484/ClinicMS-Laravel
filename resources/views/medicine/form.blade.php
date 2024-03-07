<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Medicine Name:</strong>
            {!! Form::text('medicine_name', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {!! Form::textarea('description', null, [
                'placeholder' => 'Description',
                'class' => 'form-control',
                'style' => 'height:70px',
            ]) !!}
        </div>
        <div class="form-group">
            <strong>Quantity:</strong>
            {!! Form::text('quantity', null, ['placeholder' => 'Quantity', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Given Medicine:</strong>
            {!! Form::text('given_medicine', null, ['placeholder' => 'Given Medicine', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Remain Medicine:</strong>
            {!! Form::text('remain_medicine', null, ['placeholder' => 'Remain Medicine', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Expire Date:</strong>
            {!! Form::date('expire_date', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Price:</strong>
            {!! Form::text('price', null, ['placeholder' => 'Price', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <strong>Issue Date:</strong>
            {!! Form::date('issue_date', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
