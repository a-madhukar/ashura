
            <div class="form-group">
                {!!Form::label('course_id','Course :') !!}
                {!!Form::select('course_id',$courses, null, ['class'=>'form-control']) !!}
            </div>

             <div class="form-group">
                {!!Form::label('firstname','First Name :') !!}
                {!!Form::text('firstname',null,['class'=>'form-control','placeholder'=>'First Name']) !!}
            </div>

           <div class="form-group">
                {!!Form::label('lastname','Last Name : ') !!}
                {!!Form::text('lastname',null,['class'=>'form-control','placeholder'=>'Last Name'])!!}
            </div>
        
            <div class="form-group">
                {!!Form::label('passport','Passport :') !!}
                {!!Form::text('passport',null,['class'=>'form-control','placeholder'=>'Passport']) !!}
            </div>

            <div class="form-group">
                {!!Form::label('addressline1','Address Line 1 :') !!}
                {!!Form::text('addressline1',null,['class'=>'form-control','placeholder'=>'Address Line 1']) !!}
            </div>
            <div class="form-group">
                {!!Form::label('addressline2','Address Line 2 :') !!}
                {!!Form::text('addressline2',null,['class'=>'form-control','placeholder'=>'Address Line 2']) !!}
            </div>

            <div class="form-group">
                {!!Form::label('city','City :') !!}
                {!!Form::text('city',null,['class'=>'form-control','placeholder'=>'City'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('state','State :')!!}
                {!!Form::text('state',null,['class'=>'form-control','placeholder'=>'State']) !!}
             </div>

            <div class="form-group">
                {!!Form::label('country','Country :') !!}
                {!!Form::text('country',null,['class'=>'form-control','placeholder'=>'Country']) !!}
            </div>

           <div class="form-group">
                {!!Form::label('postcode','Postcode :') !!}
                {!!Form::text('postcode',null,['class'=>'form-control','placeholder'=>'Post Code'])!!}
            </div>

           <div class="form-group">
                {!!Form::label('email','Email :') !!}
                {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
            </div>

           
           <div class="form-group">
                {!!Form::submit($submitbutton,['class'=>'btn btn-primary form-control']) !!}
            </div>
                

