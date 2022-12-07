@extends('dashboard.layouts.main')

@section('container')
<div class="card">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs profile-tab" role="tablist">
        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Saved Books</a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel">
            <div class="card-body">
                @foreach ($myBook[0]->saverBook as $item)
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <img src="{{ asset('storage/' . $item->cover) }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $item->category->name }}</small></p>
                        </div>
                    </div>
                </div>
                <hr>
                {{-- <div class="sl-item">
                    <a href="#" class="link">{{ $item->name }}</a> 
                    <span class="sl-date">{{ $item->category->name }}</span>
                    <div class="m-t-20 row">
                        <div class="col-md-3 col-xs-12">
                            <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->name }}" class="img-responsive radius" />
                        </div>
                        <div class="col-md-9 col-xs-12">
                            <p>{{ $item->description }}</p>
                            <a href="#" class="btn btn-success"> Design weblayout</a>
                        </div>
                    </div>
                    <div class="like-comm m-t-20">
                        <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> 
                    </div>
                </div> --}}
                @endforeach
            </div>
        </div>
        
        <div class="tab-pane" id="profile" role="tabpanel">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                        <br>
                        <p class="text-muted">Johnathan Deo</p>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                        <br>
                        <p class="text-muted">(123) 456 7890</p>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                        <br>
                        <p class="text-muted">johnathan@admin.com</p>
                    </div>
                    <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                        <br>
                        <p class="text-muted">London</p>
                    </div>
                </div>
                <hr>
                <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen item. It has survived not only five centuries </p>
                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>
        <div class="tab-pane" id="settings" role="tabpanel">
            <div class="card-body">
                <form class="form-horizontal form-material">
                    <div class="form-group">
                        <label class="col-md-12">Full Name</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-12">
                            <input type="password" value="password" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Phone No</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Message</label>
                        <div class="col-md-12">
                            <textarea rows="5" class="form-control form-control-line"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Select Country</label>
                        <div class="col-sm-12">
                            <select class="form-control form-control-line">
                                <option>London</option>
                                <option>India</option>
                                <option>Usa</option>
                                <option>Canada</option>
                                <option>Thailand</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection