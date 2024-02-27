<!-- Edit Modal -->
<div class="modal fade" id="editPatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Student</h4>
            </div>
            {!! Form::model($patient, [
                'enctype' => 'multipart/form-data',
                'method' => 'PATCH',
                'route' => ['patient.update', $patient->id],
            ]) !!}
            <div class="modal-body">
                <div class="row">
                    <div class=" col-md-4 form-group">
                        <label>DBR</label>
                        {!! Form::text('DBR', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class=" col-md-4 form-group">
                        <label>First Name:</label>
                        {!! Form::text('first_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <div class=" col-md-4 form-group">
                        <label>Father Name:</label>
                        {!! Form::text('father_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class=" col-md-4 form-group">
                        <label>Class:</label>
                        {!! Form::text('class', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class=" col-md-4 form-group">
                        <label>Age:</label>
                        {!! Form::input('number', 'age', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class=" col-md-4 form-group">
                        <label>Any Disease:</label>
                        {!! Form::input('any_disease', 'any-disease', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class=" col-md-4 form-group">
                        <label>Gender:</label>
                        <select name="gender" class="form-control" required>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class=" col-md-4 form-group">
                        <label>Blood Group:</label>
                        <select name="blood_group" class="form-control">
                            <option value="">Select</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                            <option>O+</option>
                            <option>O-</option>
                        </select>
                    </div>
                    <div class=" col-md-4 form-group">
                        <label>Issue Date:</label>
                        {!! Form::date('issue_date', null, ['class' => 'form-control']) !!}
                    </div>





                    <div class=" col-md-4 form-group">
                        <label>Location:</label>
                        {!! Form::textarea('location', '', ['class' => 'form-control', 'required' => 'required', 'size' => '5x3']) !!}
                    </div>


                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <button class="btn btn-success" type="submit">Save changes</button>
                    {{ Form::close() }}
                    @permission('patient.destroy')
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['patient.destroy', $patient->id],
                            'id' => 'deleteConfirm',
                            'style' => 'display:inline',
                            'class' => 'pull-left',
                        ]) !!}
                        <button type="submit" name="" class="btn  btn-danger"><span
                                class="glyphicon glyphicon-remove"></span> Delete</button>

                        {!! Form::close() !!}
                    @endpermission
                </div>

            </div>
        </div>
    </div>
</div>
