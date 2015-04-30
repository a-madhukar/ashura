<div class="form-group">
{!!Form::label('faculty_id','Faculty :')!!}
{!!Form::select('faculty_id',$faculty,null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('course_type_id','Course Type :') !!}
{!!Form::select('course_type_id',$type, null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
{!!Form::label('course_name','Course Name :') !!}
{!!Form::text('course_name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::submit($button,['class'=>'btn btn-primary form-control']) !!}
</div>