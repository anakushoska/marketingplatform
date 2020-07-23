@extends('dashboard.layouts.admin')

@section('headIncludes')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        {{isset($notification)?'Edit Notification':'Add Notification'}}
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">

            <form id="notificationForm" method="post"
            action="{{isset($notification)?route('notifications.update',$notification->id):route('notifications.store')}}" enctype="multipart/form-data">
                @if(isset($notification))
                    {{ method_field("PUT") }}
                @endif

                @csrf

                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-5">
                                <h3>Basic info</h3>
                                <hr style="border: 1px solid #525793;">

                                <div class="form-group">
                                        <label for="name">Recipient</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                        <a href="#" class="btn btn-primary" onclick="addEmail()">Add email to list</a>
                                        <ul id="emailList" name="emailList" max=10>
                                        </ul>
                                </div>

                                <div class="form-group">
                                    <label for="name">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" value="{{isset($notification)?old('subject', $notification->subject):old('subject')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Text</label>
                                    <textarea name="body" id="body" class="form-control" rows="7" required>{{isset($notification)?old('body',$notification->body):old('body')}}</textarea>
                                </div>

                            </div>


                            <div class="col-md-6 p-5">
                                <h3>Photo</h3>
                                <hr style="border: 1px solid #525793;">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="photo"
                                                   name="photo"
                                                   accept=".jpg,.png">
                                            <label class="custom-file-label" for="photo">Choose a photo</label>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>


                    </div>

                    {{--Errors and messages block--}}

                    {{--Errors and messages block end--}}

                    <div class="card-footer">
                        <div class="col-md-12 px-5 mt-3 text-right">
                            <a href="{{route('notifications.index')}}" class="mr-2 text-dark">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {{--Card footer--}}

                </div>
            </form>

        </div>
    </div>
@endsection





<script>

    //ADD EMAILS

function addEmail(){
	// Get email from text field:

	var email = document.getElementById("email").value;


	// Validate email here
	if (emailIsValid (email)){
		addToForm(email)
		addToList(email);

	  	// Clear out the email field
	  	document.getElementById("email").value = "";
	} else{
		alert(email + " is invalid")
	}
}

function emailIsValid (email) {
  return /\S+@\S+\.\S+/.test(email)
}

var count=0;
function addToList(email){
    if(count < 10){
	var node = document.createElement("li");
  	var textnode = document.createTextNode(email);
  	node.appendChild(textnode);
  	document.getElementById("emailList").appendChild(node);
    count++;
    }else{
    alert("Max allowed number of emails is 10");
    }
}

function addToForm(email){
	var input = document.createElement("input");
	input.setAttribute("type", "hidden");
	input.setAttribute("name", "emails[]");
	input.setAttribute("value", email);
	document.getElementById("notificationForm").appendChild(input);

    }



</script>
