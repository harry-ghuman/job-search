@extends('layouts.modulePage')
@section('page.title')
    Teachers
@endsection
@section('page.body')
    <div class="title">
        <div class="container">
            List of Teachers
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <?php if(!count($teachers)){ ?>
                        <div class="alert alert-info text-center h4">
                            No teacher has registered with Job Search App right now!
                        </div>
                    <?php }
                    else{ ?>
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<th>#</th>
									<th>Name</th>
									<th>Job title</th>
									<th>Department</th>
									<th>Actions</th>
								</thead>
								<tbody>
								<?php $i = 1; ?>
									@foreach ($teachers as $teacher)
										<tr>
											<td><?php echo $i; ?></td>
											<td title="Click to view more information"><a href="{{ URL::to('teacher/' . $teacher->id) }}">{{ ucwords($teacher->teacherInfo->name) }}</a></td>
											<td>{{ ucwords($teacher->job_title) }}</td>
											<td>{{ ucwords($teacher->department) }}</td>
											<td>
												<a href="{{ URL::to('teacher/' . $teacher->id.'/edit') }}" class="btn btn-xs btn-primary">Edit</a>
												<div style="display: inline-block;">
												{{ Form::open(array('url' => 'teacher/' . $teacher->id,'onsubmit' => 'return confirm("Are you sure you want to delete '.$teacher->teacherInfo->name.'?")')) }}
													{{ Form::hidden('_method', 'DELETE') }}
													{{ Form::submit('Delete', array('class' => 'btn btn-xs btn-primary')) }}
												{{ Form::close() }}
												</div>
											</td>
										</tr>
										<?php $i++; ?>
									@endforeach
								</tbody>
							</table>
						</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
@endsection
