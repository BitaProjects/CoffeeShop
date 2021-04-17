@extends('layouts.app')
@section('content')
    @include('components.sidebar')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col col-md-12">
                    <div class="box box-primary formBorders">
                        <div class="box-header" >
                            <h4 style="background-color: salmon;padding: 20px">Options create page</h4>
                        </div>
                        <form name="myForm" action="{{url('/panel/option/store')}}" method="post" style="padding: 30px"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label> name </label>
                                <input class="form-control" name="option" placeholder="option name">
                            </div>

                            <div class="form-group">
                                <label>choices</label>
                              <input class="form-control" type="text" id="choices" name="choices[]" class="form-control" data-role="tagsinput">
                            </div>

                            <button type="submit"  class="btn btn-primary">submit</button>
                        </form>
                        <div class="box-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="application/javascript">
        $(document).ready(function () {
            $('#choices').tagsinput();
        });

        $(document).keypress(
            function(event){
                if (event.which == '13') {
                    event.preventDefault();
                }
            });

    </script>
@endsection