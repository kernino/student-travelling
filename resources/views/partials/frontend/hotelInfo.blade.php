<h1>Kamer indeling</h1>
        @foreach ($hotels as $hotel)
        <button type="button" class="btn btn-primary">{{ $hotel->hotel_name }}</button>
        @endforeach
<h3>Algemene info:</h3>
<p>{{ $hotel->hotel_info }}</p>
<h3>Adres:</h3>
<p>{{ $hotel->hotel_adres }}</p>
<hr>
<h2>Kamer indeling</h2>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<table style="width:100%" id="myTable">
    @foreach ($kamers as $kamer)
    <tr>
        <th>kamer {{ $kamer->id }}</th>
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
