<form method="POST" action="{{route('game.edit')}}" >
  <label> Name: </label> <input type="textbox"  class="form-control" name="name" value="{{$game_info->name}}">
  <br><label> Author: </label><input type="textbox"  class="form-control" name="author" value="{{$game_info->author}}">
  <br><label> Price: </label> <input type="textbox"  class="form-control" name="price" value="{{$game_info->price}}">
  <br><label> Number of Copies: </label><input type="textbox"  class="form-control" name="number_of_copies" value="{{$game_info->number_of_copies}}">
  <br><label> Number of Borrows: </label><input type="textbox"  class="form-control" readonly value="{{$game_info->borrows}}">
  <input type='hidden' name='id' value="{{$game_info->id}}">
  <input type='hidden' name='_token' value="{{\Session::token()}}">
  <input type='submit' id='editButton' style="display:none">
