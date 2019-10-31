<div>
    <form class="form" method="POST" action="{{route('game.add')}}">
        @if(\Session::get('game_add_error'))
            <div class="alert alert-danger">{{\Session::get('game_add_error')}} <span class="close" data-dismiss="alert">&times;</span></div>
        @endif
        <label>Game name:</label>
        <input class="form-control" name="name" placeholder="Enter Game's Name"/><br>

        <label>Publisher's name:</label>
        <input class="form-control" name="publisher" placeholder="Enter Publisher's Name" /><br>

        <label>Price:</label>
        <input class="form-control" name="price" placeholder="Enter Game's Price" /><br>

        <label>Platform:</label>
        <input class="form-control" name="platform" placeholder="Enter Game's Platform" /><br>

        <label>Genre:</label>
        <input class="form-control" name="genre" placeholder="Enter Game's Genre" /><br>

        {{-- <label>Purchased Date:</label>
        <input class="form-control" type="date" name="purchased_date" placeholder="Enter Purchased Date" /><br>

        <label>Published Date:</label>
        <input class="form-control" type="date" name="published_date" placeholder="Enter Published Date" /><br> --}}

        <label>Number Of Copies:</label>
        <input class="form-control" name="number_of_copies" placeholder="Enter Number Of Copies" /><br>

        <input type="hidden" name="_token" value="{{\Session::token()}}" />
        <button type="submit" class="form-control btn btn-success"><span class="fa fa-plus-circle"></span> Add</button>
    </form>
</div>
