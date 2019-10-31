<table class ="table table-hover">
    <tbody>
        <tr>
            <th>B. No</th>
            <th>Title</th>
            <th>Publisher</th>
        </tr>

        @foreach ($games as $g)
        <tr>
            <td>{{$g->id}}</td>
            <td><a href="{{url('/')}}/book/{{$g->id}}">{{$g->name}}</a></td>
            <td>{{$g->publisher}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
{{$games->links()}}
