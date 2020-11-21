@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
            </ul>
            <p class="alert-success">
                        <?php
                        $messege = Session::get('messege');
                        if($messege){
                            echo $messege;
                            Session::put('messege', null);
                        }
                        ?>
                    </p>
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Comment ID</th>
								  <th>Comment Text</th>
								  <th>Actions</th>
							  </tr>
                          </thead>
                          @foreach($all_comment_info as $v_comment)
						  <tbody>
							<tr>
								<td>{{ $v_comment->comment_id}}</td>
								<td class="center">{{ $v_comment->comment_text}}</td>
								<td class="center">
                                    <a class="btn btn-success" href="{{URL::to('/delete-comment/' .$v_comment->comment_id)}}" id="delete" data-toggle="tooltip" title="Delete">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
                          </tbody>
                          @endforeach
					  </table>
					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection
