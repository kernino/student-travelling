<h1>Vliegtuig</h1>

<h3>Algemene info:</h3>
<p>{{ $flight->flight_info }}</p>
<hr>
<h1>Auto</h1>
<h3>Auto verdeling:</h3>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<table style="width:100%" id="myTable">
    @foreach ($chaufers as $chaufeur)
    <tr>
        <th>{{ $auto->id }}</th>
        @foreach ($travellers as $traveller)
        <td>{{ $traveller->first_name }}<br>
        {{ $traveller->phone }}</td>
        @endforeach
    </tr>
    @endforeach
</table>
<script>

function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
