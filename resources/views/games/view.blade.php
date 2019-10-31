@extends('layouts.app')

@section('title',$game->name)

@section('content')
<div class="col-sm-6">
<div class="panel">
    <div class="panel-heading">
        <h4><span class="fa fa-info-circle"></span> Game's Information</h4>
    </div>
    <div class="panel-body">
        <label>Game Title: </label> {{$game->name}}<br>
        <label>Publisher's Name: </label> {{$game->publisher}}<br>
        <label>Game's Price: </label> Rs. {{$game->price}}<br>
        <label>Number Of Copies: </label> {{$game->number_of_copies}}<br>
        <label>Available Copies: </label> {{$game->copies_available()}}<br />
        <label>Total Number Of Borrows: </label> {{$game->borrows}}<br>

    </div>
    <div class="panel-body">
        <a href="#" onclick ="showGameInfo({{$game->id}})" class="pull-left"><span class="fa fa-edit"></span> Edit</a>
        <a href="#" onclick ="deleteModal({{$game->id}},'books')" class="pull-right"><span class="fa fa-trash"></span> Delete</a>
    </div>
</div>
</div>

<div class="col-sm-6">
<div class="panel">
    <div class="panel-heading">
        <h4><span class="fa fa-check-circle"></span> Recent Borrows</h4>
    </div>
    <div class="panel-body">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>Borrower's Name</th>
            <th>Issued Date</th>
            <th>Status</th>
          </tr>
        @foreach($borrows as $borrow_event)
          <tr>
            <td>{{$borrow_event->borrowers['name']}}</td>
            <td>{{substr($borrow_event->created_at,0,10)}}</td>
            <td><div class="label label-danger">{{$borrow_event->status()}}</div></td>
          </tr>
        @endforeach

      </tbody>
      </table>
    </div>
</div>
</div>
<script>
function showGameInfo(id){
    $.get("{{url('/')}}/book/edit/"+id,function(dataHTML){
        $('#modalHeader').html("<h4><span class='fa fa-book'></span> Game's Information</h4>");
        $('#modalBody').html(dataHTML);
        $('#modalFooter').html("<button onclick=\"editGameInfo()\" class='btn btn-info'><span class='fa fa-edit'></span> Edit</button></form>")
    });
    $('#def-modal').modal("show");
}

function editGameInfo(){
    document.getElementById('editButton').click();
}

</script>
@endsection
