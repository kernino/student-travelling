@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<!-- Modal -->
<div class="modal fade" id="{{ $sAccepted }}" tabindex="-1" role="dialog" aria-labelledby="AlgemeneAfspraken" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Algemene Afspraken</h5>
      </div>
      <div class="modal-body">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elementum, est quis scelerisque volutpat, ipsum ante tincidunt enim, id tincidunt nulla risus eget eros. Nullam in nisl et ex rutrum imperdiet. Mauris gravida, ipsum ultricies elementum scelerisque, enim diam ornare dolor, nec sodales leo lorem sit amet nulla. Fusce maximus lacinia dui, scelerisque ornare justo hendrerit a. Nullam vel vulputate metus, vitae maximus massa. Praesent dictum nulla id neque tristique lobortis. Praesent placerat congue lectus sed pharetra. Duis vitae dui dictum, viverra elit tempus, hendrerit augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Proin laoreet congue augue eget mollis. Ut pharetra tellus eget metus aliquam, ut hendrerit massa tempus. Nulla facilisis augue ac aliquet mollis. Vivamus faucibus justo nec justo fermentum pulvinar. Maecenas ullamcorper lectus eu mauris convallis porttitor. Aenean nisl eros, mattis et laoreet in, ullamcorper et ante. Quisque eu metus velit. Etiam cursus fermentum libero ac fermentum. Aliquam sagittis gravida nibh et consectetur.Proin eget aliquet lorem, sit amet consectetur velit. Nullam velit arcu, imperdiet ut risus et, pellentesque tempus odio. In sit amet condimentum nulla, vitae sagittis felis. Nam porta vehicula tellus, sit amet interdum quam commodo a. In ornare blandit felis, non pulvinar magna dictum quis. Cras egestas ultrices rhoncus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam feugiat id est in tristique. Integer pharetra ultrices velit, pulvinar condimentum velit pellentesque condimentum.Proin fermentum feugiat ex, sit amet porta lacus finibus vitae. Nam dignissim, nulla vel sollicitudin sollicitudin, nibh dolor fermentum quam, eu vulputate sapien tortor sed lacus. Nunc accumsan ipsum quis diam consequat, a imperdiet diam eleifend. Fusce eget placerat ipsum. Aenean lobortis sapien quis magna malesuada, sed congue augue vehicula. Fusce posuere tellus sit amet neque tincidunt, ac laoreet purus fringilla. Praesent egestas congue cursus. Integer molestie sapien eu tempor egestas. Curabitur pellentesque at orci eget ullamcorper. Fusce venenatis congue nibh. Pellentesque vestibulum mauris nec elementum vestibulum.Ut leo velit, tempus nec turpis eu, tincidunt luctus ex. Phasellus non malesuada augue, ac ullamcorper ipsum. Aenean aliquet tristique felis, quis convallis diam pulvinar sed. Maecenas et tempor nisi. Donec consequat faucibus leo. Morbi in viverra ligula. Aliquam ut feugiat libero, eget efficitur diam. Nunc tincidunt est vel sollicitudin molestie. Fusce eget risus metus.Etiam lorem nunc, ultrices accumsan pharetra ac, placerat ac lorem. Cras a tincidunt mauris. Proin vulputate iaculis enim. Suspendisse cursus placerat lobortis. Suspendisse potenti. In lacinia a odio et convallis. Vestibulum et vulputate enim. Nulla nec orci finibus, iaculis neque ut, viverra risus. In fermentum, ipsum at consequat rutrum, neque massa pellentesque ipsum, at ornare urna diam non libero. Nulla ut quam lobortis, dictum eros at, egestas nunc.Vivamus eget risus non orci fermentum mattis luctus non quam. Praesent lacinia sollicitudin massa, quis sollicitudin odio pellentesque eu. Nunc non ipsum in tellus elementum pellentesque. Cras molestie, lectus quis ullamcorper rutrum, sapien nisi interdum nulla, sit amet ultrices massa turpis eu est. Donec in fringilla felis, sed mollis est. Vestibulum pretium leo.
      </div>
      <form name="modalForm" action="{{ route("accepted") }}">
        <div class="modal-footer">
            <div class="form-check">
		<input type="checkbox" class="form-check-input" id="check">
		<label class="form-check-label " for="modalForm">Gelezen en goedgekeurd</label>
            </div>
            <button type="submit"  id="sluitKnop" disabled class="btn btn-secondary disabled">Sluiten</button>
        </div>
      </form>
    </div>
  </div>
</div>

<h1>{{ $aHomeData->destination }}</h1>
<p>{{ $aHomeData->start_date }} - {{ $aHomeData->end_date }}</p>


@endsection

@section('scripts')
<script>
    $( document ).ready(function() {
        document.getElementById('sluitKnop').disabled = true;
        
        $("#AlgemeneAfspraken").modal({
            backdrop: 'static',
            keyboard: false
        });

        $("#check").change(function()
        {
            if (document.getElementById('check').checked) 
            {
                document.getElementById('sluitKnop').disabled = false;
            } else 
            {
                document.getElementById('sluitKnop').disabled = true;
            }
        });
    });
</script>
@endsection