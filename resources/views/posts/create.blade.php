@extends('layouts.app')

@section('content')

    <div class="container">
        <hr>
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title :</label>
                <input type="text" name="title" placeholder="Post Title" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">Content :</label>
                <textarea  name="content" placeholder="Post Content" class="form-control"></textarea>
            </div>


            <div class="form-group">
                <label for="title">Country :</label>
                <select name="country_id" class="form-control">
                    <option label="Choose Category"></option>
                    @foreach($countries as $count)
                        <option name="country_id" value="{{$count->id}}">{{$count->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">City :</label>
                <select name="city_id" data-placeholder="Choose City" class="form-control">
                </select>
            </div>

            <input type="submit" value="Create" class="btn btn-success">
        </form>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="country_id"]').on('change',function(){
            var country_id = $(this).val();
            if (country_id) {

                $.ajax({
                    url: "{{ url('/get/country/') }}/"+country_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="city_id"]').empty();
                        $.each(data, function(key, value){
                            alert('done')
                            $('select[name="city_id"]').append('<option value="'+ value.id + '">' + value.name + '</option>');
                        });
                    },
                });

            }else{
                alert('danger');
            }

        });
    });

</script>
