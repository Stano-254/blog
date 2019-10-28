
   <div class="form-group">
        <label for="name">Name</label>
        <span class="alert-danger" role="alert">{{$errors->first('name')}}</span>
        <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $customer->name}}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <div>{{$errors->first('email')}}</div>
        <input type="email" name="email" id="email" class="form-control" value="{{old('email') ?? $customer->email}}">
    </div>

    <div class="form-group">
        <label for="active">Status</label>
        <div>{{$errors->first('active')}}</div>
        <select name="active" id="active" class="form-control" >
            <option  disabled selected>select status</option>
            @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)

                <option value="{{$activeOptionKey}}" {{$customer->active == $activeOptionValue ? 'selected':''}}>{{$activeOptionValue}}</option>
                @endforeach

              </select>
    </div>

    <div class="form-group">
        <label for="company_id">Company</label>
        {{--            <div>{{$errors->first('company')}}</div>--}}
        <select name="company_id" id="company_id" class="form-control">
            {{--                <option  disabled selected>select Company</option>--}}
            @foreach($companies as $company)
                <option value="{{$company->id}}"{{$company->id==$customer->company_id ? 'selected':''}}>{{$company->name}}</option>
            @endforeach
        </select>
    </div>
    @csrf

